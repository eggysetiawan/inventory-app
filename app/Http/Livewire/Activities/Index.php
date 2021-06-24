<?php

namespace App\Http\Livewire\Activities;

use Livewire\Component;
use App\Models\Activity;

class Index extends Component
{
    public function render()
    {
        $activities = Activity::all();
        return view('livewire.activities.index', compact('activities'));
    }
}
