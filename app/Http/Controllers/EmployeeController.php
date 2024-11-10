<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        $users = User::where('role_type', 'employee')->get();
        return view('employee.index', [
            'users' => $users,
        ]);
    }

    public function showCreate(): View|Factory|Application
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('employee.create', [
                'departments' => $departments,
                'positions' => $positions,
            ]);
    }

    public function showUpdate(): View|Factory|Application
    {
        return view('employee.update');
    }
}
