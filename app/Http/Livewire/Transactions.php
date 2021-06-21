<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;

class Transactions extends Component
{
    public $invoice_number, $user_id, $pay, $total;

    public function render()
    {
        $transaction = Transaction::orderBy('created_at', 'DESC')->get();
        return view('livewire.transaction', [
            'transaction' => $transaction
        ]);
    }
}
