<?php

namespace App\Models;

use App\Enums\State;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
    use HasFactory;

    protected $casts = [
        'state' => State::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function preferredChampions(): HasMany
    {
        return $this->hasMany(PreferredChampion::class);
    }

    public function scopePublic(Builder $builder): void
    {
        $builder->where('public', true);
    }

    public function scopeSearch(Builder $builder, string $search): void
    {
        $builder->when($search, fn (Builder $builder) => $builder->where('name', 'LIKE', '%' . $search . '%'));
    }

    public function scopeState(Builder $builder, string $state): void
    {
        $builder->when($state, fn (Builder $builder) => $builder->where('state', $state));
    }

    public function photoUrl(): Attribute
    {
        return Attribute::get(function () {
            return $this->photo
                    ? Storage::disk('public')->url($this->photo)
                    : $this->defaultProfilePhotoUrl();
        });
    }

    protected function defaultProfilePhotoUrl()
    {
        $name = trim(collect(explode(' ', $this->name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&color=7F9CF5&background=EBF4FF';
    }
}
