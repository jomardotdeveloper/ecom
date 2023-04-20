<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_ids',
        'product_quantities',
        'contact',
        'address',
        'shipping_fee',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment ()
    {
        return $this->hasOne(Payment::class);
    }

    public function getProductIdsArrAttribute() {
        $checklists = $this->product_ids;

        if(!$checklists)
            return [];
        
        if(strpos($checklists, ',') === false)
            return [$checklists];

        return explode(',', $checklists);
    }

    public function getProductsAttribute() {
        $product_ids = $this->product_ids_arr;
        $products = [];
        foreach ($product_ids as $product_id) {
            $products[] = Product::find($product_id);
        }
        return $products;
    }


    public function getProductQuantitiesArrAttribute() {
        $checklists = $this->product_quantities;

        if(!$checklists)
            return [];
        
        if(strpos($checklists, ',') === false)
            return [$checklists];

        return explode(',', $checklists);
    }

    public function getTotalAttribute()
    {
        $total = 0;
        $product_ids = $this->product_ids_arr;
        $product_quantities = $this->product_quantities_arr;
        foreach ($product_ids as $key => $product_id) {
            $product = Product::find($product_id);
            $total += $product->price * $product_quantities[$key];
        }
        return $total + floatval($this->shipping_fee);
    }

    public function getTotalFormattedAttribute()
    {
        return "₱ " . number_format($this->total, 2);
    }


    public function getStatusAttribute()
    {
        if ($this->payment) {
            return $this->payment->is_paid ? 'Paid' : 'Pending Payment';
        } else {
            return 'No Payment';
        }
    }

    public function getSpecialNameAttribute() {
        return $this->formatted_id . " - " . $this->total_formatted;
    }

    public function getFormattedIdAttribute()
    {
        $id = strval($this->id);
        return "SO" . str_pad($id, 4, "0", STR_PAD_LEFT);
    }
}
