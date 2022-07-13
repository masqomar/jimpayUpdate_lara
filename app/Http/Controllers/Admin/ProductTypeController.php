<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductTypeRequest;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = ProductType::query();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-primary"
               
                            href="' . route('producttype.edit', $item->id) . '">
                            Edit
                        </a>
                        <form action="' . route('producttype.destroy', $item->id) . '" method="POST">
                        <button class="btn btn-danger" >
                            Hapus
                        </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('admin.producttype.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.producttype.create', [
            'label' => 'Create',
            'producttype' => new ProductType()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductTypeRequest $request)
    {

        $data = $request->all();
        ProductType::create($data);

        return to_route('producttype.index')->with('success', 'Product Type created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductType $producttype)
    {
        return view('admin.producttype.edit', [
            'label' => 'Update',
            'producttype'  => $producttype
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductTypeRequest $request, ProductType $producttype)
    {
        $data = $request->all();

        $producttype->update($data);

        return to_route('producttype.index')->with('success', 'Product Type Post updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $producttype)
    {

        $producttype->delete();

        return to_route('producttype.index')->with('success', 'Product Type Post deleted successfully');
    }
}
