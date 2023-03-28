<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id',
        'is_active',
        'is_lubed',
        'type_of_switch'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPriceFormattedAttribute()
    {
        return "₱ " . number_format($this->price, 2);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }


    public function getStocksInAttribute()
    {
        return $this->stocks()->where('is_return', false)->where('is_validated', true)->sum('quantity');
    }

    public function getStocksOutAttribute()
    {
        return $this->stocks()->where('is_return', true)->where('is_validated', true)->sum('quantity');
    }

    public function getQuantityOrdersAttribute ()
    {
        $orders = Order::all();
        $num = 0;
        foreach ($orders as $order) {
            if($order->payment->is_paid) {
                for($i = 0; $i < count($order->product_ids_arr); $i++) {
                    if(intval($order->product_ids_arr[$i]) == $this->id) {
                        $num += intval($order->product_quantities_arr[$i]);
                    }
                }
            }
            
        }

        return $num;
    }

    public function getStocksTotalAttribute()
    {
        return ($this->stocks_in - $this->stocks_out) - $this->quantity_orders;
    }
}
