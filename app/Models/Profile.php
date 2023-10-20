<?php

namespace App\Models;

use App\Enums\State;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        $builder->where('name', 'LIKE', '%' . $search . '%');
    }

    public function scopeState(Builder $builder, ?string $state): void
    {
        $builder->when($state, fn (Builder $builder) => $builder->where('state', $state));
    }
}
