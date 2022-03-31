<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $role = Role::findByName('user');
        $role->givePermissionTo('show product', 'add product');

        $products = Product::query()->get();
        return view('index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'article' => ['required', 'unique:products', 'regex:/^[a-zA-Z0-9_\-]*$/'],
            'name' => ['required', 'min:10'],
        ]);

        $data = new Product();
        $data->article = $request->article;
        $data->name = $request->name;
        $data->status = $request->status;
        $data->color = $request->color;
        $data->size = $request->size;
        $data['user_id'] = Auth::id();
        $data->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('update', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        if (Auth::user()->hasRole('user') == true) {
            $request->validate([
                'article' => ['unique:products', 'regex:/^[a-zA-Z0-9_\-]*$/'],
                'name' => ['required', 'min:10'],
            ]);
        } else {
            $request->validate([
                'article' => ['required', 'unique:products', 'regex:/^[a-zA-Z0-9_\-]*$/'],
                'name' => ['required', 'min:10'],
            ]);
        }

        $product->update($request->all());

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index');
    }
}
