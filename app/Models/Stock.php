<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'is_validated',
        'is_return'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getOperationTypeAttribute()
    {
        return $this->is_return ? 'Return' : 'Stock In';
    }
}
