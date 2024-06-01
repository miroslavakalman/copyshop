<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'nullable',
            'description' => 'nullable',
            'price' => 'nullable',
            'quantity' => 'nullable',
            'country' => 'nullable',
            'category' => 'nullable',
            'model' => 'nullable',
            'year' => 'nullable',
            'image_path' => 'nullable',
        ]);
    
        $product = Product::findOrFail($id);
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->quantity = $validatedData['quantity'];
        $product->country = $validatedData['country'];
        $product->category = $validatedData['category'];
        $product->model = $validatedData['model'];
        $product->year = $validatedData['year'];
        $product->image_path = $validatedData['image_path'];
    
        $product->save();
    
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'country' => 'required',
            'category' => 'required',
            'model' => 'required',
            'year' => 'required|numeric',
            'image_path' => 'required',
        ]);

        $product = new Product();
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->quantity = $validatedData['quantity'];
        $product->country = $validatedData['country'];
        $product->category = $validatedData['category'];
        $product->model = $validatedData['model'];
        $product->year = $validatedData['year'];
        $product->image_path = $validatedData['image_path'];


        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

}
