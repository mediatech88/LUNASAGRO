<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Korlap;
use App\Models\MitraTani;
use App\Models\Pelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class MitrataniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=DB::table('users')
        ->join('mitra_tani','users.id','=','mitra_tani.user_id')
        ->select()
        ->get();
        return view('page.admin.mitratani',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Http::get('https://mediatech88.github.io/api-wilayah-indonesia/api/provinces.json');
        $alamat = $response->json();

        $admin_id=DB::table('users')
        ->join('pelayanan','users.id','=','pelayanan.user_id')
        ->select()
        ->get();

        // $jml_mitratani=MitraTani::count('id')+1;
        $jml_mitratani=MitraTani::latest('id')->first()+1;


        $role=auth()->user()->role;
        $id= auth()->user()->id;

        // return "id :".$id."<br>"."role :".$role  ;

        if ($role===1){
            $reff=Admin::where('user_id',$id)->first()->code;
        }
        else if ($role===2){
            $reff=Pelayanan::where('user_id',$id)->first()->code;
        }
        elseif ($role===3){
            $reff=Korlap::where('user_id',$id)->first()->code;
        }

        // $reff=Korlap::get();
        $mitratani_id ='MT'.str_pad($jml_mitratani, 3, '0', STR_PAD_LEFT);

        // return $admin_id;

        return view('page.add_mitratani', [
            'mitratani_id' => $mitratani_id,
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
        $role=auth()->user()->role;
        $validatedData = $request->validate([
            'name' => ['required','max:255'],
            'email' => ['required','email:rfc','unique:users'],
            'phone' => ['required','min:999999','max:9999999999999','numeric'],
            'reff' => ['required'],
            'pelayanan_id' => ['required'],
            'korlap_id' => ['required'],
            'koor_lat' => 'required|numeric|between:-90,90',
            'koor_long' => 'required|numeric|between:-180,180',
            'elevasi' => ['required','numeric'],
            'luaslahan' => ['required','numeric'],
            'provinsi'=> ['required'],
            'kota'=> ['required'],
            'kec'=> ['required'],
            'desa'=> ['required'],
            'code'=> ['required','unique:mitra_tani']
        ],[
            'phone.min'=> 'Phone Minimal 7 Karakter',
            'phone.max'=> 'Phone Maksimal 13 Karakter',
            'phone.numeric'=> 'Phone Harus Berisi Angka',
            'email.unique'=> 'Email Telah Terdaftar',
        ]);
        if ($validatedData==true) {

            if ($role===1){
                $user = User::create([
                    'name'=>$request->name,
                    'password'=> bcrypt('123456'),
                    'role'=> 5,
                    'email'=> $request->email,
                    'phone'=> $request->phone,
                    'reff'=> $request->pelayanan_id
                ]);
                $pelayanan = MitraTani::create([
                    'user_id'=> $user->id,
                    'status'=> 1,
                    'admin_id'=> $request->pelayanan_id,
                    'korlap_id'=> $request->korlap_id,
                    'koordinat_lat'=> $request->koor_lat,
                    'koordinat_long'=> $request->koor_long,
                    'elevasi'=> $request->elevasi,
                    'luas_lahan'=> $request->luaslahan,
                    'provinsi'=> $request->provinsi,
                    'kota'=> $request->kota,
                    'kecamatan'=> $request->kec,
                    'desa'=> $request->desa,
                    'code'=> $request->code
                ]);
            }else{
                $user = User::create([
                    'name'=>$request->name,
                    'password'=> bcrypt('123456'),
                    'role'=> 5,
                    'email'=> $request->email,
                    'phone'=> $request->phone,
                    'reff'=> $request->reff
                ]);
                $pelayanan = MitraTani::create([
                    'user_id'=> $user->id,
                    'status'=> 2,
                    'admin_id'=> $request->pelayanan_id,
                    'korlap_id'=> $request->korlap_id,
                    'koordinat_lat'=> $request->koor_lat,
                    'koordinat_long'=> $request->koor_long,
                    'elevasi'=> $request->elevasi,
                    'luas_lahan'=> $request->luaslahan,
                    'provinsi'=> $request->provinsi,
                    'kota'=> $request->kota,
                    'kecamatan'=> $request->kec,
                    'desa'=> $request->desa,
                    'code'=> $request->code
                ]);
            }


        }

        return redirect('mitra-tani')->with(
            'status',
            'Data Berhasil di Tambahkan'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
    return redirect('mitra-tani')
    ->with(
    'status',
    'Data Berhasil di Hapus'
    );
    }
}
