<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        $positions = Position::all();
        return view('position.index',
            [
                'positions' => $positions,
            ]
        );
    }

    public function showCreate(): View|Factory|Application
    {
        return view('position.create');
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();

            $position = new Position();
            $position->fill($input);

            $position->save();

            DB::commit();
            return redirect()->route('position.showIndex')->with('created', 'Đã thêm thành công !!');
        }catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function showUpdate($id): View|Factory|Application
    {
        $position = Position::where('id', $id)->first();
        return view('position.update',
            [
                'position' => $position,
            ]
        );
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();

            $position = Position::where('id', $id)->first();
            $position->fill($input);

            $position->save();

            DB::commit();
            return redirect()->route('position.showIndex')->with('updated', 'Đã cập nhật thành công !!');
        }catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            Position::where('id', $id)->delete();
            DB::commit();
            return back()->with('deleted', 'Đã xoá thành công !!');
        }catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
