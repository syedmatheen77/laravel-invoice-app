<?php

namespace App\Services;

class InvoiceCalculationService
{
    public function calculate($quantity, $pricePerItem, $taxPercentage)
    {
       


        $subtotal = $quantity * $pricePerItem;
        $taxAmount = $subtotal * ($taxPercentage / 100);
        $total = $subtotal + $taxAmount;

        return [
            'subtotal' => $subtotal,
            'tax' => $taxAmount,
            'total' => $total,
        ];
    }
}
