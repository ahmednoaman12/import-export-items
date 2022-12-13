<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Exports\ExportProduct;
use App\Imports\ImportProduct;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        $product = new Product;
        $product->name = 'God of War';


        $product->save();

        $category = Category::find([3, 4]);
        $product->categories()->attach($category);

        return 'Success';
    }


    public function show(Product $product)
    {
    return view('show', compact('product'));
    }




    
    public function importProductView(Request $request){
        return view('importProductFile');
    }

    public function importproduct(Request $request){
       Excel::import(new ImportProduct, $request->file('file')->store('files'));

       return redirect()->back();
    }

    public function exportProducts(Request $request){
        return Excel::download(new ExportProduct, 'items.xlsx');
    }









}





