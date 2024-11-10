<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        return view('salary.index');
    }

    public function showCreate(): View|Factory|Application
    {
        return view('salary.create');
    }

    public function showUpdate(): View|Factory|Application
    {
        return view('salary.update');
    }
}
