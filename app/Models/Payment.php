<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'amount',
        'is_paid',
        'proof_of_payment'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getFormattedIdAttribute()
    {
        $id = strval($this->id);
        return "PAY" . str_pad($id, 4, "0", STR_PAD_LEFT);
    }

    public function getStatusAttribute()
    {
        if($this->is_paid)
            return "Paid";
        else
            return "Unpaid";
    }

    public function getFormattedAmountAttribute()
    {
        return "₱ " . number_format($this->amount, 2);
    }
}
