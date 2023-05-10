<?php

namespace App\Models\Order;

use App\Models\Payments\Payment;
use App\Models\User\UserAddress;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $cast = [
        'cart_id',
        'user_address_id',
    ];

    protected $fiilable = [
        'subtotal',
        'total',
        'is_paid',
        'tracking_number',
        'order_status'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function address()
    {
        return $this->belongsTo(UserAddress::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
   
}
