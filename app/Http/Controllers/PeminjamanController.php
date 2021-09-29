<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyewa;

class PeminjamanController extends Controller
{
    public function index()
    {
        $datas = Penyewa::get();
        return view('Peminjaman.indexPeminjaman', compact('datas'));
    }
}
