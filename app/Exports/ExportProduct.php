<?php

namespace App\Exports;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductTranslation;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportProduct implements FromCollection,WithHeadings
{
    private $category ;
    public function __construct()
    {
       $this->category = Category::select('id')->get();
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return  ProductTranslation::select()->get();

    }

    // public function headings(): array
    // {
    //     return ["your", "headings", "here"];
    // }

    public function headings(): array
    {
        return [
            'id',
            'product_id',
            'name',
            'desc',
            'locale',
        ];
    }
}




