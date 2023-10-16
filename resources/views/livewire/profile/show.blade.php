<div>
    <livewire:profile.infolist :$profile />
</div>

<?php

use App\Models\Profile;
use Livewire\Volt\Component;

new class extends Component
{
    public Profile $profile;
};
