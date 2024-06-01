<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }


    public function filter(Request $request)
    {
        $category = $request->input('category');
        $price = $request->input('price');
        $year = $request->input('year');
    
        $query = Product::query();
    
        if ($category) {
            $categories = ['Laser Printers', 'Inkjet Printers', 'Thermal Printers', 'Cartridge', 'Scanner'];
            if (in_array($category, $categories)) {
                $query->where('category', $category);
            }
        }
    
        if ($price) {
            if ($price === 'low_to_high') {
                $query->orderBy('price', 'asc');
            } elseif ($price === 'high_to_low') {
                $query->orderBy('price', 'desc');
            }
        }
    
        if ($year) {
            $years = ['2024', '2023', '2022', '2021'];
            if (in_array($year, $years)) {
                $query->where('year', $year);
            } elseif ($year === 'older_than_2021') {
                $query->where('year', '<', '2021');
            }
        }
    
        $filteredProducts = $query->get();
    
        return view('products.index', ['products' => $filteredProducts]);
    }
    


}

