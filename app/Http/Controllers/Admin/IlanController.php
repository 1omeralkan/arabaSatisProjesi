<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class IlanController extends Controller
{
    public function index(){
        $ilanlar = Car::with(['model.carBrand', 'user'])->latest()->get();
        $bekleyenIlanlar = Car::where('status', 0)->get();

        return view('panel.admin.ilanlar.index', compact('ilanlar', 'bekleyenIlanlar'));
    }

    public function onayla($id)
    {
        $ilan = Car::findOrFail($id);
        $ilan->status = 1; // Yayında
        $ilan->save();

        return redirect()->back()->with('success', 'İlan yayına alındı.');
    }

    public function reddet($id)
    {
        $ilan = Car::findOrFail($id);
        $ilan->status = 2; // Reddedildi
        $ilan->save();

        return redirect()->back()->with('success', 'İlan reddedildi.');
    }

}
