<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
       
        return view('Invoice.index');
    }

    public function storeIsian(Request $request)
    {
       dd($request->all());
        return view('Invoice.index');
    }
}
