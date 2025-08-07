<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
        public function index(){
            $user=User::all();
            return view('panel.admin.index',compact('user'));
        }
        public function delete($id){
            $user=User::find($id);
            $user->delete();
            return redirect()->back();
        }
        public function rolGuncelle(Request $request){
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'role' => 'required|in:0,1,2',
            ]);

            $user = User::findOrFail($request->user_id);
            $user->role = $request->role;
            $user->save();

            return redirect()->back()->with('success', 'Kullanıcının rolü başarıyla güncellendi.');
        }
}
