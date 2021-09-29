<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berkas;

class TransaksiBaruController extends Controller
{
    public function index()
    {
        $datas = Berkas::get();
        return view('TransaksiBaru.index', compact('datas'));
    }
}
