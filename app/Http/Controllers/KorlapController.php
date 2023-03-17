<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Korlap;
use App\Models\Pelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KorlapController extends Controller
{
    //
    public function create()
    {
        $response = Http::get('https://mediatech88.github.io/api-wilayah-indonesia/api/provinces.json');
        $alamat = $response->json();



        $jml_korlap=Korlap::count('id')+1;



        $role=auth()->user()->role;
        $id= auth()->user()->id;
        $admin_id= Pelayanan::all();

        if ($role==1||2){
            $reff=Pelayanan::where('id',$id)->first()->code;
        }
        if ($role==3){
            $reff=Korlap::where('id',$id)->first()->code;
        }

        // $reff=Korlap::get();
        $korlap_id ='KL'.str_pad($jml_korlap, 3, '0', STR_PAD_LEFT);

        // return $admin_id;

        return view('page.add_korlap', [
            'korlap_id' => $korlap_id,
            'admin_id' => $admin_id,
            'reff'=>$reff,
            'alamat'=>$alamat
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required','max:255'],
            'email' => ['required','email:rfc','unique:users'],
            'phone' => ['required'],
            'reff' => ['required'],
            'provinsi'=> ['required'],
            'kota'=> ['required'],
            'kec'=> ['required'],
            'desa'=> ['required'],
            'code'=> ['required']
        ]);
        // return request()->all();
        if ($validatedData==true) {
            $user = User::create([
                'name'=>$request->name,
                'password'=> bcrypt('123456'),
                'role'=> 2,
                'email'=> $request->email,
                'phone'=> $request->phone,
                'reff'=> $request->reff
            ]);

            $pelayanan = Korlap::create([
                'user_id'=> $user->id,
                'admin_id'=> $user->reff,
                'provinsi'=> $request->provinsi,
                'kota'=> $request->kota,
                'kecamatan'=> $request->kec,
                'desa'=> $request->desa,
                'code'=> $request->code
            ]);
        }

        return redirect('koordinator-lapangan')->with(
            'status',
            'Data Berhasil di Tambahkan'
        );
    }

};
