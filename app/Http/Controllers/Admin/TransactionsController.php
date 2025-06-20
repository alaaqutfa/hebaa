<?php
namespace App\Http\Controllers\Admin;


use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionsController
{
    public function index()
    {
        $transactions = Transaction::latest()->paginate(10);

        return view('web.transactions.index', compact('transactions'));
    }
}
