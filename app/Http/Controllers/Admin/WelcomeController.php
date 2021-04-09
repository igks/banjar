<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Helpers\Enums\TransaksiType;
use App\Helpers\Enums\TransaksiCat;

class WelcomeController extends Controller
{
     public function index()
    {   
        $banjarIn = Transaksi::where('jenis', '=', TransaksiType::getValue('kredit'))
            ->where('kategori', '=', TransaksiCat::getValue('kas'))
            ->sum('jumlah');
        $banjarOut = Transaksi::where('jenis', '=', TransaksiType::getValue('debet'))
            ->where('kategori', '=', TransaksiCat::getValue('kas'))
            ->sum('jumlah');

        $nyepiIn = Transaksi::where('jenis', '=', TransaksiType::getValue('kredit'))
            ->where('kategori', '=', TransaksiCat::getValue('nyepi'))
            ->sum('jumlah');
        $nyepiOut = Transaksi::where('jenis', '=', TransaksiType::getValue('debet'))
            ->where('kategori', '=', TransaksiCat::getValue('nyepi'))
            ->sum('jumlah');
        
        $piodalanIn = Transaksi::where('jenis', '=', TransaksiType::getValue('kredit'))
            ->where('kategori', '=', TransaksiCat::getValue('piodalan'))
            ->sum('jumlah');
        $piodalanOut = Transaksi::where('jenis', '=', TransaksiType::getValue('debet'))
            ->where('kategori', '=', TransaksiCat::getValue('piodalan'))
            ->sum('jumlah');

        $bantenIn = Transaksi::where('jenis', '=', TransaksiType::getValue('kredit'))
            ->where('kategori', '=', TransaksiCat::getValue('banten'))
            ->sum('jumlah');
        $bantenOut = Transaksi::where('jenis', '=', TransaksiType::getValue('debet'))
            ->where('kategori', '=', TransaksiCat::getValue('banten'))
            ->sum('jumlah');
        
        $banjar = $banjarIn - $banjarOut;
        $nyepi = $nyepiIn - $nyepiOut;
        $piodalan = $piodalanIn - $piodalanOut;
        $banten = $bantenIn - $bantenOut;
        
        return view('welcome', compact('banjar','nyepi', 'piodalan', 'banten'));
    }
}
