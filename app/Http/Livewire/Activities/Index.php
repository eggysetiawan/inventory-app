<?php

namespace App\Http\Livewire\Activities;

use Livewire\Component;
use App\Models\Activity;

class Index extends Component
{

    public $query = '';

    // public $perPage = 10;

    public $from;
    public $to;



    public $totalQuantity;


    // public function loadMore()
    // {
    //     $this->perPage += 10;
    // }

    public function filterActivities()
    {
        $from = date('Y-m-d H:i', strtotime($this->from));
        $to = date('Y-m-d H:i', strtotime($this->to));

        $this->activities = Activity::filterActivities($from, $to, $this->query);
    }

    public function getActivitiesProperty()
    {
        return Activity::query()
            ->with('product', 'user')
            ->whereHas('product', function ($q) {
                return $q->where('name', 'like', "%$this->query%");
            })
            ->latest()
            ->take(100)
            ->get();
    }

    public function updatedTotalQuantity()
    {
        if ($this->activities) {
            $this->totalQuantity = $this->activities->sum('quantity');
        }
    }


    public function mount()
    {
        if ($this->activities) {
            $this->totalQuantity = $this->activities->sum('quantity');
        }
    }


    public function render()
    {

        return view('livewire.activities.index', [
            'activities' => $this->activities,
        ]);
    }
}
