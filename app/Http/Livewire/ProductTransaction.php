<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProductTranscation;

class ProductTransaction extends Component
{
    public $product_id, $invoice_number, $qty;

    public function render()
    {
        $producttransaction = ProductTranscation::orderBy('created_at', 'DESC')->get();
        return view('livewire.product-transaction', [
            'producttransaction' => $producttransaction
        ]);
    }
}
