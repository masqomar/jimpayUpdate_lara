<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountTransactionRequest;
use App\Models\AccountTransaction;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AccountTransactionController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = AccountTransaction::query();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-primary"
               
                            href="' . route('accounttransaction.edit', $item->id) . '">
                            Edit
                        </a>
                        <form action="' . route('accounttransaction.destroy', $item->id) . '" method="POST">
                        <button class="btn btn-danger" >
                            Hapus
                        </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('admin.accounttransaction.index');
    }

    public function create()
    {
        return view('admin.accounttransaction.create', [
            'label' => 'Create',
            'accounttransaction' => new AccountTransaction()
        ]);
    }

    public function store(AccountTransactionRequest $request)
    {

        $data = $request->all();
        AccountTransaction::create($data);

        return to_route('accounttransaction.index')->with('success', 'Kode Akun created successfully');
    }

    public function edit(AccountTransaction $accounttransaction)
    {
        return view('admin.accounttransaction.edit', [
            'label' => 'Update',
            'accounttransaction'  => $accounttransaction
        ]);
    }

    public function update(AccountTransactionRequest $request, AccountTransaction $accounttransaction)
    {
        $data = $request->all();

        $accounttransaction->update($data);

        return to_route('accounttransaction.index')->with('success', 'Account Transasaction updated successfully');
    }

    public function destroy(AccountTransaction $accounttransaction)
    {
        $accounttransaction->delete();

        return to_route('accounttransaction.index')->with('success', 'Account Transaction deleted successfully');
    }
}
