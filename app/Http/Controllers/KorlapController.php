<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Korlap;
use App\Models\Pelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class KorlapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $prov= 34;
        // $kota= 3471;
        // $response = Http::get('https://mediatech88.github.io/api-wilayah-indonesia/api/regencies/'.$prov.'.json');
        // $data = $response->json();
        // foreach ($data as $key) {
        //     return $key;
        // }

        $users=DB::table('users')
        ->join('korlap','users.id','=','korlap.user_id')
        ->select()
        ->get();
        return view('page.admin.koordinatorlapangan',['users'=>$users]);
    }





    //
    public function create()
    {
        $response = Http::get('https://mediatech88.github.io/api-wilayah-indonesia/api/provinces.json');
        $alamat = $response->json();

        $admin_id=DB::table('users')
        ->join('pelayanan','users.id','=','pelayanan.user_id')
        ->select()
        ->get();

        $jml_korlap=Korlap::count('id')+1;
        $role=auth()->user()->role;
        $id= auth()->user()->id;

        // return Pelayanan::get()->where('id',$id);

        if ($role==1){
            $reff=Admin::where('id',$id)->first()->code;
        }
        if ($role==2){
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
        // return $request;
        $validatedData = $request->validate([
            'name' => ['required','max:255'],
            'email' => ['required','email:rfc','unique:users'],
            'phone' => ['required','min:999999','max:9999999999999','numeric'],
            'reff' => ['required'],
            'provinsi'=> ['required'],
            'kota'=> ['required'],
            'kec'=> ['required'],
            'desa'=> ['required'],
            'code'=> ['required','unique:korlap']
        ],[
            'phone.min'=> 'Phone Minimal 7 Karakter',
            'phone.max'=> 'Phone Maksimal 13 Karakter',
            'phone.numeric'=> 'Phone Harus Berisi Angka',
            'email.unique'=> 'Email Telah Terdaftar',
        ]);
        // return request()->all();
        if ($validatedData==true) {
            $user = User::create([
                'name'=>$request->name,
                'password'=> bcrypt('123456'),
                'role'=> 3,
                'email'=> $request->email,
                'phone'=> $request->phone,
                'reff'=> $request->reff
            ]);

            $pelayanan = Korlap::create([
                'user_id'=> $user->id,
                'pelayanan_id'=> $request->pelayanan_id,
                'provinsi'=> $request->provinsi,
                'kota'=> $request->kota,
                'kecamatan'=> $request->kec,
                'desa'=> $request->desa,
                'code'=> $request->code.$request->pelayanan_id
            ]);
        }

        return redirect('koordinator-lapangan')->with(
            'status',
            'Data Berhasil di Tambahkan'
        );
    }

    public function destroy($id)
    {
            // return dd($id);
    User::destroy($id);
    return redirect('koordinator-lapangan')
    ->with(
    'status',
    'Data Berhasil di Hapus'
    );
    }


};
