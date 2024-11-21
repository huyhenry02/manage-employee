<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class ContractController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        $contracts = Contract::all();
        return view('contract.index'
            , ['contracts' => $contracts]);
    }

    public function showCreate(): View|Factory|Application
    {
        $users = User::where('role_type', 'employee')->orderBy('created_at')->get();
        return view('contract.create',
            ['users' => $users]);
    }

    public function showUpdate(Contract $contract): View|Factory|Application
    {
        $users = User::where('role_type', 'employee')->orderBy('created_at')->get();
        return view('contract.update'
            , [
                'contract' => $contract,
                'users' => $users
            ]);
    }

    public function postCreate(Request $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            $model = new Contract();
            $model->fill($input);
            $model->save();
            if ($request->hasFile('attachment_file')) {
                $model->attachment_file = $this->handleUploadFile($request->file('attachment_file'), $model);
                $model->save();
            }
            DB::commit();
            return redirect()->route('contract.showIndex');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function postUpdate(Contract $contract, Request $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            $contract->fill($input);
            $contract->save();
            if ($request->hasFile('attachment_file')) {
                $contract->attachment_file = $this->handleUploadFile($request->file('attachment_file'), $contract);
                $contract->save();
            }
            DB::commit();
            return redirect()->route('contract.showIndex');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function delete(Contract $contract): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $contract->delete();
            DB::commit();
            return redirect()->route('contract.showIndex');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    private function handleUploadFile($file, $model): string
    {
        $fileName = 'FILE_CONTRACT' . '_' . $model->id . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storePubliclyAs('files/' . 'FILE_CONTRACT', $fileName);
        return asset('storage/' . $filePath);
    }
}
