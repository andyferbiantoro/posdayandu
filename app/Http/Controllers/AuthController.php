<?php

namespace App\Http\Controllers;
use Auth; //untuk auth
use Illuminate\Http\Request;
use App\User;
use App\Posyandu;
use Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class AuthController extends Controller
{

    public function register(){

        $Dataposyandu = Posyandu::all();
        
        return view('register',compact('Dataposyandu'));
    }

    //
	//fungsi proses login post ambil request
    public function prosesLogin(Request $request){
         

         $ingat = $request->remember ? true : false; //jika di ceklik true jika tidak gfalse
        //akan ingat selama 5 tahun jika tidak logout
         
        //auth()->attempt buat proses login  request input username dan password,  request input  sama kayak $request->password dan usernamenya
        if(auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password'),'status'=>'terverifikasi'], $ingat)){
            //auth->user() untuk memanggil data user yang sudah login
             if(auth()->user()->role == "admin"){
                alert()->success('Selamat datang','Haloo !!');
                return redirect()->route('dashboard-admin');//route itu isinya name dari route di web.php
             }else if(auth()->user()->role == "kader"){
                alert()->success('Selamat datang','Haloo !!');
                return redirect()->route('dashboard-kader');//route itu isinya name dari route di web.php
             }
        }else{   
            alert()->error('Akun Tidak Ditemukan/Belum Terverifikasi','Maaf !');
            return redirect()->back(); //route itu isinya name dari route di web.php

        }

    }
    
    public function create(Request $request)
    {

        $messages = [
        'required' => ':attribute wajib diisi',
        'min' => ':attribute harus diisi minimal :min karakter',
        'max' => ':attribute harus diisi maksimal :max karakter',
        'same' => ':attribute harus sama dengan re password',
        ];
 
            //validasi
        $this->validate($request, [
            //pasword validasinya repassword
            'password' => 'min:8|required_with:repassword|same:repassword',
            'repassword' => 'min:8'
        ], $messages);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role']="kader",
            'password' => Hash::make($request['password']),
            'id_posyandu' => $request['id_posyandu'],
        ]);

        alert()->success('Tunggu Verifikasi Untuk Aktivasi Akun Anda','Register Berhasil');
        return redirect('/')->with(['success' => 'Register Berhasil']);
    }


    //proses logout
    public function logout(){
        
        auth()->logout(); //logout
        alert()->success('Logout Berhasil');
        return redirect()->route('login');
        

    }
}
