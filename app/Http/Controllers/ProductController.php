<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Collor;
use App\Http\Resources\ProductResource;
use App\Http\Resources\CollorResource;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $productModel = app(Product::class);
       
        $productsResource =  new ProductResource($productModel->with('collor')->paginate('10'));

        return view('products.index', ['products' => $productsResource]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collorModel = app(Collor::class);

        Cache::forget('collor');

        $collorsResource = Cache::remember('color', (60*5), function () use($collorModel) {
            return CollorResource::collection($collorModel->all());
        });
// return $categoriesResource;
        return view('products.create', ['collors' => $collorsResource]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        $productModel = app(Product::class);

        $product = $productModel->create($data);

        if($product){
            return redirect()->route('products.index')->with('success', 'Produto cadastrado com sucesso!');
        }
        else{
            return redirect()->route('products.index')->with('warning', 'Erro ao cadastrar o Produto!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productModel = app(Product::class);
        $collorModel = app(Collor::class);
        $product = $productModel->with('collor')->find($id);
        $collorsResource = Cache::remember('collor', (60*5), function () use($collorModel) {
            return CollorResource::collection($collorModel->all());
        });
        $productResource =  new ProductResource($product);
// return $bookResource;
        return view('products.edit', compact('productResource','collorsResource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $data = $request->validated();

        $productModel = app(Product::class);

        $product = $productModel->find($id)->update($data);

        if($product){
            return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
        }
        else{
            return redirect()->route('products.index')->with('warning', 'Erro ao atualizar o Produto!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productModel = app(Product::class);
        $product = $productModel->find($id)->delete();

        return redirect()->route('products.index')->with('warning', 'Produto deletado com sucesso!');
    }
}
