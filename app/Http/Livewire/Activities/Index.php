<?php

namespace App\Http\Livewire\Activities;

use Livewire\Component;
use App\Models\Activity;
use App\Exports\ActivityExport;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{

    public $query = '';


    public $from;
    public $to;

    public $totalIn;
    public $totalOut;

    public bool $export = false;

    public function filterActivities()
    {
        $from = date('Y-m-d H:i', strtotime($this->from));
        $to = date('Y-m-d H:i', strtotime($this->to));

        $this->activities = Activity::filterActivities($from, $to, $this->query);

        $this->getQuantityIn($from, $to);
        $this->getQuantityOut($from, $to);

        $this->export = true;
    }

    public function getQuantityIn($from = null, $to = null)
    {
        $sumInQuantity = Activity::query()
            ->with('product', 'user')
            ->when($from && $to, function ($q) use ($from, $to) {
                return $q->whereBetween('created_at', [$from, $to]);
            })
            ->whereHas('product', function ($q) {
                return $q->where('name', 'like', "%$this->query%");
            })
            ->where('status', 'in')
            ->sum('quantity');

        return $this->totalIn = $sumInQuantity;
    }

    public function getQuantityOut($from = null, $to = null)
    {
        if ($from && $to) {
            $from = date('Y-m-d', strtotime($from));
            $to = date('Y-m-d', strtotime($to));
        }

        $sumOutQuantity = Activity::query()
            ->with('product', 'user')
            ->when($from && $to, function ($q) use ($from, $to) {
                return $q->whereBetween('created_at', [$from, $to]);
            })
            ->whereHas('product', function ($q) {
                return $q->where('name', 'like', "%$this->query%");
            })
            ->where('status', 'out')
            ->sum('quantity');

        return $this->totalOut = $sumOutQuantity;
    }

    public function exportExcel()
    {
        return Excel::download(new ActivityExport($this->from, $this->to, $this->query), 'CJFI_' . uniqid() . '.xlsx');
    }

    public function getActivitiesProperty()
    {
        return Activity::query()
            ->with('product', 'user')
            ->whereHas('product', function ($q) {
                return $q->where('name', 'like', "%$this->query%");
            })
            ->latest()
            ->get();
    }

    public function updatedQuery($value)
    {
        $this->totalQuantity = Activity::query()
            ->with('product', 'user')
            ->whereHas('product', function ($q) use ($value) {
                return $q->where('name', 'like', "%$value%");
            })
            ->get()
            ->sum('quantity');
        $from = $this->from ?? null;
        $to = $this->to ?? null;

        $this->getQuantityIn($from, $to);
        $this->getQuantityOut($from, $to);
    }



    public function mount()
    {
        $this->getQuantityIn();
        $this->getQuantityOut();
    }


    public function render()
    {

        return view('livewire.activities.index', [
            'activities' => $this->activities,
        ]);
    }
}
