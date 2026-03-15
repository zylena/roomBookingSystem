<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        $reports = [
            ['title' => 'Monthly Revenue', 'description' => 'Revenue trends for the past 6 months.'],
            ['title' => 'Booking Activity', 'description' => 'Recent booking volume and peak hours.'],
            ['title' => 'User Growth', 'description' => 'New customer registrations by week.'],
        ];

        return view('admin.reports.index', compact('reports'));
    }
}
