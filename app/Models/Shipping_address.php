<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shipping_address extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_customer',
        'name',
        'address1',
        'address2',
        'id_country',
        'id_state',
        'id_city',
        'pincode'
    ];

    public function customer(): HasMany
    {
        return $this->hasMany(Customer::class, 'id_customer', 'id');
    }
}