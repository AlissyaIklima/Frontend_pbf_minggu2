<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $jumlahMahasiswa = 10;
        $jumlahDosen = 10;
        return view('welcome', [
            'jumlahMahasiswa' => $jumlahMahasiswa,
            'jumlahDosen' => $jumlahDosen,
        ]);
    }
}
