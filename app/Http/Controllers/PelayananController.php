<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class PelayananController extends Controller
{
    public function index(){
        $users=DB::table('users')
        ->join('alamat','users.id','=','alamat.id_user')
        ->select()
        ->get();
        return view('page.admin.tempatpelayanan',['users'=>$users]);
    }



    //form Create
    public function create()
    {
        $response = Http::get('https://mediatech88.github.io/api-wilayah-indonesia/api/provinces.json');
        $data = $response->json();
        return view('page.add_pelayanan', ['data' => $data ]);
        // return $data;

    }


    // public function create(){
    // return view ('page.add_pelayanan',['data'=>['1','2']]);
    // }
};
