<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
class AkunController extends Controller
{
    public function index()
    {   
        $user= User::where('id','=',Auth::user()->id)->first();
        
        return view('pages.account.index',compact('user'));
    }
    public function update(Request $request){
        $data=$request->all();
        $user= User::where('id','=',Auth::user()->id)->first();
        if ($request->current_password) {

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required','min:8'],
                'new_confirm_password' => ['same:new_password'],
            ],
            [   'new_password.required' => 'Password Baru Tidak Boleh Kosong',
                'new_password.min' => 'Password Minimal 8 karakter ',
                'new_confirm_password.same'=>'Konfirmasi Password baru harus sesuai'
            ]);
            $user['password'] = Hash::make($request->new_password);   
        }
        else{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
            ]);
        }
        $user['name']   = $request->input('name');  

        $user->update($data);
        Alert::success('Success', 'Success Edit Profile');
        return redirect('/profil')->with('success', 'Ubah Akun Berhasil.');
    }
    
}
