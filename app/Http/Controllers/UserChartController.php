<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserChartController extends Controller
{
    public function index()
    {
        // Create a new chart instance
        $chart = Charts::create('line', 'highcharts')
            ->title('Sample Chart')
            ->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'])
            ->values([5, 10, 6, 15, 8, 12]);

        // Render the chart view and pass the $chart variable
        return view('admin.index', ['chart' => $chart]);
    }
}
