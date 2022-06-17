<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class,'product_product_category');
    }

    public function saleAccount()
    {
        return $this->belongsTo(ChartOfAccount::class,'sale_account')->withDefault();
    }

    public function purchaseAccount()
    {
        return $this->belongsTo(ChartOfAccount::class,'purchase_account')->withDefault();
    }

    public function salesPrice()
    {
        return Attribute::make(
            get: fn($price) => rupiah($price),
        );
    }

}
