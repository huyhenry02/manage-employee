<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\EmployeePerformance;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class EmployeePerformanceController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        $employeePerformances = EmployeePerformance::all();
        return view('employee-performance.index',
            ['employeePerformances' => $employeePerformances]);
    }

    public function showCreate(): View|Factory|Application
    {
        $employees = User::where('role_type', 'employee')->orderBy('created_at')->get();
        return view('employee-performance.create',
            ['employees' => $employees]);
    }

    public function showUpdate(EmployeePerformance $employeePerformance): View|Factory|Application
    {
        $employees = User::where('role_type', 'employee')->orderBy('created_at')->get();
        return view('employee-performance.update',
            [
                'employeePerformance' => $employeePerformance
                , 'employees' => $employees
            ]);
    }

    public function postCreate(Request $request): RedirectResponse
    {
        try {
            $input = $request->all();
            $input['reviewer_id'] = auth()->id();
            $model = new EmployeePerformance();
            $model->fill($input);
            $model->save();
            return redirect()->route('employee-performance.showIndex');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function postUpdate(EmployeePerformance $employeePerformance, Request $request): RedirectResponse
    {
        try {
            $input = $request->all();
            $input['reviewer_id'] = auth()->id();
            $employeePerformance->fill($input);
            $employeePerformance->save();
            return redirect()->route('employee-performance.showIndex');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete(EmployeePerformance $employeePerformance): RedirectResponse
    {
        try {
            $employeePerformance->delete();
            return redirect()->route('employee-performance.showIndex');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
