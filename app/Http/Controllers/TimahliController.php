<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Korlap;
use App\Models\TimAhli;
use App\Models\Pelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class TimahliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users=DB::table('users')
        ->join('tim_ahli','users.id','=','tim_ahli.user_id')
        ->select()
        ->get();
        return view('page.admin.timahli',['users'=>$users]);

        // return $users;
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

        // $jml_timahli=TimAhli::count('id')+1;
        $jml_timahli=TimAhli::count('id');
        if($jml_timahli==0){
            $jml_timahli++;
        }else{
            $jml_timahli=TimAhli::all()->last()->id;
        }

        $role=auth()->user()->role;
        $id= auth()->user()->id;

        // return "id :".$id."<br>"."role :".$role  ;

        if ($role===1){
            $reff=Admin::where('user_id',$id)->first()->code;
        }
        else if ($role===2){
            $reff=Pelayanan::where('user_id',$id)->first()->code;
        }
        if ($role===3){
            $reff=Korlap::where('user_id',$id)->first()->code;
        }

        // $reff=Korlap::get();
        $timahli_id ='TA'.str_pad($jml_timahli, 3, '0', STR_PAD_LEFT);

        // return $admin_id;

        return view('page.add_timahli', [
            'timahli_id' => $timahli_id,
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
        $role=auth()->user()->role;
        $validatedData = $request->validate([
            'name' => ['required','max:255'],
            'email' => ['required','email:rfc','unique:users'],
            'phone' => ['required','min:999999','max:9999999999999','numeric'],
            'reff' => ['required'],
            'provinsi'=> ['required'],
            'kota'=> ['required'],
            'kec'=> ['required'],
            'desa'=> ['required'],
            'code'=> ['required','unique:tim_ahli']
        ],[
            'phone.min'=> 'Phone Minimal 7 Karakter',
            'phone.max'=> 'Phone Maksimal 13 Karakter',
            'phone.numeric'=> 'Phone Harus Berisi Angka',
            'email.unique'=> 'Email Telah Terdaftar',
        ]);
        // return request()->all();
        if ($validatedData==true) {


            if ($role===1){
                $user = User::create([
                    'name'=>$request->name,
                    'password'=> bcrypt('123456'),
                    'role'=> 4,
                    'email'=> $request->email,
                    'phone'=> $request->phone,
                    'reff'=> $request->pelayanan_id

                ]);
                $timahli = TimAhli::create([
                    'user_id'=> $user->id,
                    'pelayanan_id'=> $request->pelayanan_id,
                    'status'=> 1,
                    'provinsi'=> $request->provinsi,
                    'kota'=> $request->kota,
                    'kecamatan'=> $request->kec,
                    'desa'=> $request->desa,
                    'code'=> $request->code.$request->pelayanan_id
                ]);
            }else{
                $user = User::create([
                    'name'=>$request->name,
                    'password'=> bcrypt('123456'),
                    'role'=> 4,
                    'email'=> $request->email,
                    'phone'=> $request->phone,
                    'reff'=> $request->reff
                ]);
                $timahli = TimAhli::create([
                    'user_id'=> $user->id,
                    'pelayanan_id'=> $request->pelayanan_id,
                    'status'=> 2,
                    'provinsi'=> $request->provinsi,
                    'kota'=> $request->kota,
                    'kecamatan'=> $request->kec,
                    'desa'=> $request->desa,
                    'code'=> $request->code.$request->pelayanan_id
                ]);

            }

        }

        return redirect('tim-ahli')->with(
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
    return redirect('tim-ahli')
    ->with(
    'status',
    'Data Berhasil di Hapus'
    );
    }
}
