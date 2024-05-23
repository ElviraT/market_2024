<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'website',
        'notes',
        'id_status',
        'avatar'
    ];

    public function Idstatus(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'id_status', 'id');
    }

    public function bank(): BelongsTo
    {
        return $this->belongsTo(BankCustomer::class, 'id', 'id_customer');
    }

    public function billing(): BelongsTo
    {
        return $this->belongsTo(Billing_address::class, 'id', 'id_customer');
    }

    public function shipping(): BelongsTo
    {
        return $this->belongsTo(Shipping_address::class, 'id', 'id_customer');
    }
}