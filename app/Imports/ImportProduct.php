<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductTranslation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;



class ImportProduct implements ToModel, WithHeadingRow
{

private $category ;

    public function __construct()
    {
    $this->category = Category::select('id')->get();
    }
/**
* @param array $row
*
* @return \Illuminate\Database\Eloquent\Model|null
*/
public function model(array $row)
{
$cat_id = $row['cat_id'];

$new_product = Product::create([
'price' => $row['price'],
]);
$new_product->categories()->attach($cat_id);


$productid =$new_product->id ;
// if('name_en')
// $name_en = 'name_en';
// $name_en = 'name_ar';
if ('name_en' == 'name_en') {
    $new_productTrans = ProductTranslation::create([
        'product_id' => $productid ,
        'name' => $row['name_en'],
        'desc' => $row['desc_en'],
        'locale' => 'en',
    ]);
}
if('name_ar' == 'name_ar'){
    $new_productTrans = ProductTranslation::create([
        'product_id' => $productid ,
        'name' => $row['name_ar'],
        'desc' => $row['desc_ar'],
        'locale' => 'ar',
    ]);
}





}
}
