<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SoldProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Get request data
        $data = $request->all();

        $productCreated = Product::create([
            'name'  => $data['name'],
            'reference' => $data['reference'],
            'price' => $data['price'],
            'weight' => $data['weight'],
            'category' => $data['category'],
            'stock' => $data['stock'],
        ]);

        if($productCreated){
            return redirect()->route('home')
                ->with('success', 'Se ha creado el producto con éxito');
        }else{
            return redirect()->route('home')
                ->with('error', 'No se pudo crear el producto');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $product)
    {
        //
        $productToEdit = Product::find($product);

        return view('Product.edit', [
            'product' => $productToEdit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $product)
    {
        //Update a product
        $productToUpdate = Product::find($product);
        $data = $request->all();

        $productToUpdate->name  = $data['name'];
        $productToUpdate->reference = $data['reference'];
        $productToUpdate->price = $data['price'];
        $productToUpdate->weight = $data['weight'];
        $productToUpdate->category = $data['category'];
        $productToUpdate->stock = $data['stock'];

        $productToUpdate->update();

        return redirect()->route('home')
            ->with('success', 'Se ha actualizado el producto con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $product)
    {
        //Soft delete 
        $productToDelete = Product::find($product);
        $productToDelete->delete();

        return redirect()->route('home')
            ->with('success', 'Se ha eliminado el producto');

    }

    /**
     * Sell a product
     */
    public function sell(string $product, int $amountToSell)
    {
        $productToSale = Product::find($product);
        $productStock = $productToSale->stock;
        
        if( $productStock > 0 && $productStock >= $amountToSell){

            $productToSale->stock = $productStock - $amountToSell;
            $productToSale->update();

            $productCreated = SoldProduct::create([
                'product_id'  => $productToSale->id,
                'amount' => $amountToSell,
            ]);

            return redirect()->route('home')
                ->with('success', 'Se ha vendido el producto');
        }else{
            return redirect()->route('home')
                ->with('error', 'No hay la cantidad suficiente del producto para vender');
        }
    }
}
