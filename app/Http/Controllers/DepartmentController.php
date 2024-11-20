<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        $departments = Department::all();
        return view('department.index',
            [
                'departments' => $departments,
            ]);
    }

    public function showCreate(): View|Factory|Application
    {
        return view('department.create');
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();

            $department = new Department();
            $department->fill($input);
            // $department = $request->department_name;


            $department->save();

            DB::commit();
            return redirect()->route('department.showIndex')->with('created', 'Đã thêm thành công !!');
        }catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }


    public function showUpdate($id): View|Factory|Application
    {
        $department = Department::where('id',$id)->first();
        return view('department.update',
            [
                'department' => $department,
            ]);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();

            $department = Department::where('id',$id)->first();
            $department->fill($input);
            $department->save();

            DB::commit();
            return redirect()->route('department.showIndex')->with('updated', 'Đã cập nhập thành công !!');
        }catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            Department::where('id',$id)->delete();
            DB::commit();
            return back()->with('deleted', 'Đã xoá thành công !!');
        }catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

    }
}
