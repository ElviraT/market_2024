<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BankCustomer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_customer',
        'name',
        'account',
        'titular',
        'branch',
        'ifsc'
    ];

    public function customer(): HasMany
    {
        return $this->hasMany(Customer::class, 'id_customer', 'id');
    }
}