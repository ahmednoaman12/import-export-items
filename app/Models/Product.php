<?php
namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',

    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function product_translations()
    {
        return $this->hasOne(ProductTranslation::class);
    }


}
