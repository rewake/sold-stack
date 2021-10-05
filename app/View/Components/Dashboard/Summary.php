<?php

namespace App\View\Components\Dashboard;

use App\Services\DashboardService;
use Illuminate\View\Component;

class Summary extends Component
{
    public $summaryData;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(DashboardService $dashboardService)
    {
        $this->summaryData = $dashboardService->summaryData(auth()->id());
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.summary');
    }
}
