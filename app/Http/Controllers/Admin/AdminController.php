<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('panel.admin.index');
    }

    //CarBrandSTART
    public function carBrandIndex(){
        $carBrands= CarBrand::get();
        return view('panel.admin.carBrand.index',compact('carBrands'));
    }

    public function carBrandCreate(){

        return view('panel.admin.carBrand.create');
    }

    public function carBrandUpdate($id){
        $brand=CarBrand::find($id);
        return view('panel.admin.carBrand.update',compact('brand'));
    }

    public function carBrandAdd(Request $request){
          $request->validate([
              'brandName'=>'required|min:3|unique:car_brands,name',
          ]);
          $brand = new CarBrand();
          $brand->name=$request->brandName;
          $brand->save();
          return redirect()->route('admin.carBrand.index')->with(['success'=>'Marka başarıyla eklendi.']);
    }

    public function carBrandEdit(Request $request){
         $request->validate([
             'brandName'=>'required|min:3|unique:car_brands,name',
             'brandID'=>'required'
         ]);
         $oldBrand=CarBrand::find($request->brandID);
         $oldBrand->name=$request->brandName;
         $oldBrand->save();
        return redirect()->route('admin.carBrand.index')->with(['success'=>'Marka başarıyla güncellendi.']);
    }

    public function carBrandDelete($id){
        $brand = CarBrand::find($id);



        if($brand->deleted_at==null){
            $brand->delete();
            return redirect()->route('admin.carBrand.index')->with(['success'=>'Marka başarıyla silindi.']);

        }else{
            return redirect()->route('admin.carBrand.index')->with(['errors'=>'Hata oluştu.']);

        }
    }
    //CarBrandEND


    //CarBrandModelSTART
    public function carBrandModelIndex(){
        $carBrandModel= CarModel::with('carBrand')->get();
        return view('panel.admin.carBrandModel.index',compact('carBrandModel'));
    }

    public function carBrandModelCreate(){
        $carBrand= CarBrand::get();

        return view('panel.admin.carBrandModel.create',compact('carBrand'));
    }

    public function carBrandModelAdd(Request $request){
        $request->validate([
            'brandModelName'=>'required|min:2',
            'brand_id' => 'required|exists:car_brands,id'

        ]);
        $brandModel= new CarModel();

        $brandModel->name=$request->brandModelName;
        $brandModel->brand_id=$request->brand_id;
        $brandModel->save();
        return redirect()->route('admin.carBrandModel.index')->with(['success'=>'Model başarıyla eklendi.']);

    }

    public function carBrandModelUpdate($id){
        $brandModel= CarModel::find($id);
        return view('panel.admin.carBrandModel.update',compact('brandModel'));
    }

    public function carBrandModelEdit(Request $request){
        $request->validate([
            'brandModelName'=>'required|min:2',
            'brandModel_id' => 'required|exists:car_brands,id'
        ]);
        $oldBrandModel=CarModel::find($request->brandModel_id);
        $oldBrandModel->name=$request->brandModelName;
        $oldBrandModel->save();

        return redirect()->route('admin.carBrandModel.index')->with(['success'=>'Model başarıyla güncellendi.']);

    }
    public function carBrandModelDelete($id){
        $brandModel = CarModel::find($id);

        if($brandModel->deleted_at==null){
            $brandModel->delete();
            return redirect()->route('admin.carBrandModel.index')->with(['success'=>'Model başarıyla silindi.']);

        }else{
            return redirect()->route('admin.carBrandModel.index')->with(['errors'=>'Hata oluştu.']);

        }
    }
    //CarBrandModelEND


    public function statistics()
    {
        $toplamKullanici = User::count();
        $toplamIlan = Car::count();
        $yayindaOlan = Car::where('status', 1)->count();
        $bekleyen = Car::where('status', 0)->count();
        $reddedilen = Car::where('status', 2)->count();
        $bugunEklenen = Car::whereDate('announcement_date', Carbon::today())->count();

        $gunlukIlanlar = Car::selectRaw('DATE(announcement_date) as tarih, COUNT(*) as toplam')
            ->where('announcement_date', '>=', Carbon::now()->subDays(7))
            ->groupBy('tarih')
            ->orderBy('tarih')
            ->pluck('toplam', 'tarih');

        return view('panel.admin.statistics', compact(
            'toplamKullanici',
            'toplamIlan',
            'yayindaOlan',
            'bekleyen',
            'reddedilen',
            'bugunEklenen',
            'gunlukIlanlar',
        ));
    }



}
