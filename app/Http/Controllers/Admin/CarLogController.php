<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarLog;
use Illuminate\Http\Request;

class CarLogController extends Controller
{
    public function index()
    {
        $logs = CarLog::with([
            'user',
            'car' => function ($query) {
                $query->withTrashed()->with('model.carBrand');
            }
        ])->latest()->paginate(20);
        return view('panel.admin.car_logs', compact('logs'));
    }
}
