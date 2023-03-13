<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\Alamat;
use App\Models\Tempat_Pelayanan;


class PelayananController extends Controller
{
    public function index(){
        $users=DB::table('users')
        ->join('alamat','users.id','=','alamat.id_user')
        ->join('tempat_pelayanan','users.id','=','tempat_pelayanan.id_user')
        ->select()
        ->get();
        return view('page.admin.tempatpelayanan',['users'=>$users]);
        // return dd($users);
    }



    //form Create
    public function create()
    {
        $jml_tp=DB::table('tempat_pelayanan')->count('id')+1;
        $response = Http::get('https://mediatech88.github.io/api-wilayah-indonesia/api/provinces.json');
        $response=$response->json();

        // $jml_korlap= DB::table('korlap')
        //             ->join('tempat_pelayanan','tempat_pelayanan.id','=','korlap.reff')
        //             ->get();
        //             // ->count();

        // return dd($jml_korlap);
        // return dd($data);
        $role=auth()->user()->role;


        //Refferal
        $id=auth()->user()->id;
        if ($role==1){
            $reff=DB::table('admin')
            ->where('id_user','=',$id)
            ->first();
        }
        if ($role==2){
            $reff=DB::table('tempat_pelayanan')
            ->where('id_user','=',$id)
            ->first();
        }

        // return view('page.add_pelayanan', ['data' => $data]);
        $id_tp ='TP'.str_pad($jml_tp, 3, '0', STR_PAD_LEFT);

        $alamat=$response;
        // $data=$response;
        return view('page.add_pelayanan', [
            'id_tp' => $id_tp,
            'reff'=>$reff,
            'alamat'=>$alamat
        ]);

        // return $data;

    }

    public function store(PostRequest $request){

        // return dd($request);
        $users = User::create([
            'name'=>$request->name,
            'password'=> bcrypt('123456'),
            'role'=> 2,
            'email'=> $request->email,
            'phone'=> $request->phone

        ]);

        $alamat = Alamat::create([
            'id_user'=> $users->id,
            'provinsi'=> $request->provinsi,
            'kota_kab'=> $request->kota,
            'kecamatan'=> $request->kec,
            'desa'=> $request->desa,
            'alamat_lain'=> $request->alamat_lain

        ]);

        $pelayanan = Tempat_Pelayanan::create([
            'id'=> $request->id,
            'id_user'=> $users->id,
            'reff'=> $request->reff

        ]);

        return redirect('tempat-pelayanan')->with('status', 'Data Berhasil di Tambahkan');
    }

    //edit

    public function edit($id){
        $users=DB::table('users')
        ->join('alamat','users.id','=','alamat.id_user')
        ->join('tempat_pelayanan','users.id','=','tempat_pelayanan.id_user')
        ->select()
        ->get();
        $user = $users->where('id_user','=',$id)->first();

        $jml_tp=DB::table('tempat_pelayanan')->count('id')+1;
        $response = Http::get('https://mediatech88.github.io/api-wilayah-indonesia/api/provinces.json');
        $alamat=$response->json();
        return view('page.edit_pelayanan',[
            'user'=>$user,
            'alamat'=>$alamat ]);
        }

    public function update(PostRequest $request, User $user){
        $users= User::where('id',$id)->first();
        $alamat= Alamat::where('id_user',$id)->first();
        $users->update([
                        'email'=>$request->email,
                        'name'=>$request->name
                    ]);
 return "berhasil Update";
    }

//         return dd($request);

// //         $users=DB::table('users')->find($id);
// //         // $users->update([
// //         //     'name'=>$request->name
// //         // ]);
// // return dd($users);
//     //     // $user->update([
//     //     //     array('name'=>$request->name)
//     //     // ]);
//     //     // $users = User::update([
//     //     //     'name'=>$request->name,
//     //     //     'password'=> bcrypt('123456'),
//     //     //     'role'=> 2,
//     //     //     'email'=> $request->email,
//     //     //     'phone'=> $request->phone

//     //     // ]);

//     //     // $alamat = Alamat::update([
//     //     //     'id_user'=> $users->id,
//     //     //     'provinsi'=> $request->provinsi,
//     //     //     'kota_kab'=> $request->kota,
//     //     //     'kecamatan'=> $request->kec,
//     //     //     'desa'=> $request->desa,
//     //     //     'alamat_lain'=> $request->alamat_lain

//     //     // ]);

//     //     // $pelayanan = Tempat_Pelayanan::update([
//     //     //     'id'=> $request->id,
//     //     //     'id_user'=> $users->id,
//     //     //     'reff'=> $request->reff

//     //     // ]);
//     // return 'data berhasil di update';
//     //     // return redirect('/tempat-pelayanan/{$id}/edit')->with('status', 'Data Berhasil di Update');
//     }

    // //Delete
    // // public function destroy($id){
    // //     Tempat_Pelayanan::destroy($id);
    // // }

};
