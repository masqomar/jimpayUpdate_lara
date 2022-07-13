<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KopkarProductRequest;
use App\Models\KopkarProduct;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KopkarProductController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = KopkarProduct::with('product_type');

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-primary" 
                          href="' . route('kopkarproduct.edit', $item->id) . '">
                            Edit
                        </a>
                        <form action="' . route('kopkarproduct.destroy', $item->id) . '" method="POST">
                        <button class="btn btn-danger" >
                            Hapus
                        </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('admin.kopkarproduct.index');
    }

    public function create()
    {
        $product_types = ProductType::all();
        return view('admin.kopkarproduct.create', [
            'label' => 'Create',
            'kopkarproduct' => new KopkarProduct()
        ], compact('product_types'));
    }

    public function store(KopkarProductRequest $request)
    {

        $data = $request->all();
        KopkarProduct::create($data);

        return to_route('kopkarproduct.index')->with('success', 'Product Kopkar created successfully');
    }

    public function edit(KopkarProduct $kopkarproduct)
    {
        return view('admin.kopkarproduct.edit', [
            'label' => 'Update',
            'kopkarproduct'  => $kopkarproduct
        ]);
    }

    public function update(KopkarProductRequest $request, KopkarProduct $kopkarproduct)
    {
        $data = $request->all();

        $kopkarproduct->update($data);

        return to_route('kopkarproduct.index')->with('success', 'Product Kopkar updated successfully');
    }

    public function destroy(KopkarProduct $kopkarproduct)
    {

        $kopkarproduct->delete();

        return to_route('kopkarproduct.index')->with('success', 'Product Kopkar deleted successfully');
    }
}
