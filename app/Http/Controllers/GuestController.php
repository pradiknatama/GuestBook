<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class GuestController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi=Provinsi::all();
        return view('pages.create',compact('provinsi'));
    }

    public function getCity(Request $request){
        $kode_provinsi=$request->kode_provinsi;
        $city= Kota::where('kode','like', $kode_provinsi.'%')->get();
        foreach($city as $row){
            echo "<option value='$row->kode'>$row->nama</option>";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'fname'=>'required',
                'lname'=>'required',
                'organization'=>'required',
                'address'=>'required',
                'province'=>'required',
                'city'=>'required',
                'phone'=>'required',
            ]
        );
        Guest::insert(
            [
                'f_name'=>$request['fname'],
                'l_name'=>$request['lname'],
                'organization'=>$request['organization'],
                'address'=>$request['address'],
                'province'=>$request['province'],
                'city'=>$request['city'],
                'phone'=>$request['phone'],
            ]
        );
        Alert::success('Success', 'Success Add Guestbook');
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guest=Guest::with('kota','prov')->where('id',$id)->first();
        $provinsi=Provinsi::all();
        return view('pages.edit',compact('guest','provinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate(
            [
                'fname'=>'required',
                'lname'=>'required',
                'organization'=>'required',
                'address'=>'required',
                'province'=>'required',
                'city'=>'required',
                'phone'=>'required',
            ]
        );
        $guest=Guest::where('id',$id)->update(
            [
                'f_name'=>$request['fname'],
                'l_name'=>$request['lname'],
                'organization'=>$request['organization'],
                'address'=>$request['address'],
                'province'=>$request['province'],
                'city'=>$request['city'],
                'phone'=>$request['phone'],
            ]
        );
        Alert::success('Success', 'Success Edit Guestbook');
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guest=Guest::find($id);
        $guest->delete();
        Alert::success('Success', 'Success Delete Guestbook');
        return redirect('/home');
    }
}
