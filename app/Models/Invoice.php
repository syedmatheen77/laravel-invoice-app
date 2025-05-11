<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_name', 'client_email', 'item_description',
        'quantity', 'price_per_item', 'tax_percentage',
        'subtotal', 'tax_amount', 'total'
    ];
}
