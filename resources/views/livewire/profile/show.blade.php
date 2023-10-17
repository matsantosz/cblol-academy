<div>
    {{ $profile->name }}
</div>

<?php

use App\Models\Profile;
use function Livewire\Volt\state;

state(['profile' => fn () => $profile]);
