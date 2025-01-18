<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view("products.index", [
            'products'=> Product::paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        
        return view('products.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * 
     */
    public function store(Request $request) 
    {
        $product = Product::create($request->all());
        if($request->hasFile('image')){
            $product->image_path = $request->file('image')->store('products', 'public');
        }
        $product->save();
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Product $product
     * @return View
     */
    public function show(Product $product)
    {
        return view('products.show',[
            'product'=> $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return View
     */
    public function edit(Product $product)
    {
        return view("products.edit", [
            'product'=> $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        $product->fill($request->all());
        if($request->hasFile('image')){
            $product->image_path = $request->file('image')->store('products', 'public');
        }
        $product->save();
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return JsonResponse
     */
    public function destroy(Product $product)
    {
        // $user = User::find($id);
        try{
            $product->delete();
            return response()->json([
                'status' => 'success'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status'=> 'error',
                'message'=> 'Wystąpił błąd - USerController.php - 95',
            ])->setStatusCode(500);
        }
        
    }
}
