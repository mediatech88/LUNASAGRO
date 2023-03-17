<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class PelayananController extends Controller
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
        ->join('pelayanan','users.id','=','pelayanan.user_id')
        ->select()
        ->get();
        return view('page.admin.tempatpelayanan',['users'=>$users]);
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



        $jml_tp=Pelayanan::count('id')+1;



        $role=auth()->user()->role;
        $id= auth()->user()->id;
        $reff=Pelayanan::where('id',$id)->first()->code;
        $id_tp ='TP'.str_pad($jml_tp, 3, '0', STR_PAD_LEFT);

        return view('page.add_pelayanan', [
            'id_tp' => $id_tp,
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

            $pelayanan = Pelayanan::create([
                'user_id'=> $user->id,
                'provinsi'=> $request->provinsi,
                'kota'=> $request->kota,
                'kecamatan'=> $request->kec,
                'desa'=> $request->desa,
                'code'=> $request->code
            ]);
        }

        return redirect('tempat-pelayanan')->with(
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
        // User::destroy($id);
        // return redirect('tempat-pelayanan')
        //     ->with('status','Data Berhasil di Hapus');
        $id_login = Auth::user()->id;

        // @if ($data->code !== 'ADM001')
        //                                         @if (auth()->user()->id !== $data->id)
        // $id_admin = 1;
        if($id !== $id_login ){
            if(Auth::user()->role!==1){
                User::destroy($id);
            return redirect('tempat-pelayanan')
                ->with(
                    'gagal',
                    'Data Berhasil di Hapus'
                );
            }

        }else{
            return redirect('tempat-pelayanan')
            ->with(
                'status',
                'Jangan Hapus Boss'
            );
        }


    }
}
