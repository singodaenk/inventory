<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'name', 'category_id', 'description', 
        'price', 'stock', 'min_stock', 'unit'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function stockIns()
    {
        return $this->hasMany(StockIn::class);
    }

    public function stockOuts()
    {
        return $this->hasMany(StockOut::class);
    }

    public function getStockStatusAttribute()
    {
        if ($this->stock <= $this->min_stock) {
            return 'low';
        } elseif ($this->stock > $this->min_stock * 2) {
            return 'high';
        } else {
            return 'medium';
        }
    }
}