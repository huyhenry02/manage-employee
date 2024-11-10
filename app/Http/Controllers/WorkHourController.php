<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class WorkHourController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        return view('work_hour.index');
    }

    public function showCreate(): View|Factory|Application
    {
        return view('work_hour.create');
    }

    public function showUpdate(): View|Factory|Application
    {
        return view('work_hour.update');
    }
}
