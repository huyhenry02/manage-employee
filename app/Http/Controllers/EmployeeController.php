<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['role_type'] = User::ROLE_EMPLOYEE;
            $input['password'] = bcrypt($input['password']);
            $user = new User();
            $user->fill($input);
            $user->save();

            $user->code = 'NV-' . str_pad($user->id, 3, '0', STR_PAD_LEFT);
            $user->save();

            DB::commit();
            return redirect()->route('employee.showIndex');
        }catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
