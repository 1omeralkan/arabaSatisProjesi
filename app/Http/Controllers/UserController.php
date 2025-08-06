<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarBrand;
use App\Models\CarDamage;
use App\Models\CarModel;
use App\Models\City;
use App\Models\Town;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{

    //ArabaİlanSTART

    public function arabaIlanIndex(){
        $ilanlar= Car::get();
        $hasarlar=CarDamage::get();

        return view('panel.user.ilan.index',compact('ilanlar','hasarlar'));

    }
    public function arabaIlanCreate(){
        $ilan=Car::all();
        $modeller = CarModel::get();
        $sehir= City::all();
        $ilce=Town::all();
        return view('panel.user.ilan.create', compact('modeller','sehir','ilce','ilan'));



    }
    public function arabaIlanAdd(Request $request){
        $request->validate([
            'model_id' => 'required|exists:car_models,id',
            'year'=>'required|integer|min:1950|max:' . date('Y'),
            'color'=> 'required|string|starts_with:#|size:7', // örnek: #ff0000
            'km'=> 'required|integer|min:0|max:1000000',
            'guarantee_status'=> 'required|min:0|max:1',
            'vites_türü'=> 'required|min:0|max:2',
            'yakıt_türü'=> 'required|min:0|max:3',
            'fiyat'=> 'required|numeric|min:0|max:100000000',
            'description'=> 'required|string|max:1000',
        ]);


        $ilan=new Car();
        $hasar= new CarDamage();

        $hasar->hasar_tarihi=$request->hasar_tarihi;
        $hasar->description=$request->damage_description;

        $hasar->save();
        $ilan->damage_id=$hasar->id;



        $ilan->model_id = $request->model_id;
        $ilan->year=$request->year;
        $ilan->color=$request->color;
        $ilan->km=$request->km;
        $ilan->guarantee_status=$request->guarantee_status;
        $ilan->announcement_date = Carbon::now('Europe/Istanbul');
        $ilan->status=1;
        $ilan->vites_türü=$request->vites_türü;
        $ilan->yakıt_türü=$request->yakıt_türü;
        $ilan->fiyat=$request->fiyat;
        $ilan->description=$request->description;

        $ilan->user_id = auth()->id();


        $ilan->save();

        return redirect()->route('user.arabaIlan.index')->with(['success'=>'Marka başarıyla eklendi.']);

    }
    public function arabaIlanUpdate($id){
        $ilan= Car::find($id);
        $modeller = CarModel::all();
        $sehir= City::all();
        $ilce=Town::all();
        $hasarlar=CarDamage::all();
        return view('panel.user.ilan.update',compact('ilan', 'modeller','sehir','ilce','hasarlar'));
    }
    public function arabaIlanEdit(Request $request){
        $request->validate([
            'ilan_id'=>'required',
            'model_id' => 'required|exists:car_models,id',
            'year'=>'required|integer|min:1950|max:' . date('Y'),
            'color'=> 'required|string|starts_with:#|size:7', // örnek: #ff0000
            'km'=> 'required|integer|min:0|max:1000000',
            'guarantee_status'=> 'required|min:0|max:1',
            'vites_türü'=> 'required|min:0|max:2',
            'yakıt_türü'=> 'required|min:0|max:3',
            'fiyat'=> 'required|numeric|min:0|max:100000000',
            'description'=> 'required|string|max:1000',
        ]);


        $ilan= Car::find($request->ilan_id);
        $hasar=CarDamage::find($ilan->damage_id);

        $hasar->hasar_tarihi=$request->hasar_tarihi;
        $hasar->description=$request->damage_description;

        $hasar->save();
        $ilan->damage_id=$hasar->id;



        $ilan->model_id = $request->model_id;
        $ilan->year=$request->year;
        $ilan->color=$request->color;
        $ilan->km=$request->km;
        $ilan->guarantee_status=$request->guarantee_status;
        $ilan->announcement_date = Carbon::now('Europe/Istanbul');
        $ilan->status=1;
        $ilan->vites_türü=$request->vites_türü;
        $ilan->yakıt_türü=$request->yakıt_türü;
        $ilan->fiyat=$request->fiyat;
        $ilan->description=$request->description;

        $ilan->user_id = auth()->id();


        $ilan->save();

        return redirect()->route('user.arabaIlan.index')->with(['success'=>'İlan başarıyla güncellendi.']);

    }

    public function arabaIlanDelete($id){
        $ilan = Car::find($id);

        if($ilan->deleted_at==null){
            $ilan->delete();
            return redirect()->route('user.arabaIlan.index')->with(['success'=>'İlan başarıyla silindi.']);

        }else{
            return redirect()->route('user.arabaIlan.index')->with(['errors'=>'Hata oluştu.']);

        }
    }
    //ArabaİlanEND
}
