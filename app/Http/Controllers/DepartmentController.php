<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        return view('department.index');
    }

    public function showCreate(): View|Factory|Application
    {
        return view('department.create');
    }

    public function showUpdate(): View|Factory|Application
    {
        return view('department.update');
    }
}
