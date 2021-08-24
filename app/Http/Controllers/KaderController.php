<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Kader;
use App\Ibu;
use App\User;
use App\Posyandu;
use App\Agenda;
use File;
use Auth;




class KaderController extends Controller
{
    //


    public function index(){

        // \QrCode::size(300)
        //     ->format('png')
        //     ->generate( Auth::user()->id_posyandu, public_path('images/qrcode.png'));

            // $qrcode = User::where('id_posyandu',Auth::user()->id_posyandu)->first();



        // \Carbon\Carbon::setWeekStartsAt(\Carbon\Carbon::SUNDAY);
        // \Carbon\Carbon::setWeekEndsAt(\Carbon\Carbon::SATURDAY);
        // $k_rumah=Agenda::whereBetween('waktu', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])->get();
        $foto = Kader::where('id_user',Auth::user()->id)->get();

        $penggunaposyandu = Ibu::where('id_posyandu', Auth::user()->id_posyandu)->count();
        $namaposyandu = Posyandu::where('id',Auth::user()->id_posyandu)->get();
        
        $k_rumah = Agenda::whereDate('waktu','=', date('y-m-d'))
        ->where('id_posyandu', Auth::user()->id_posyandu)
        ->where('jenis','Kunjungan Rumah')
        ->count();
        //dd($k_rumah);

        $k_pos = Agenda::whereDate('waktu','=', date('y-m-d'))
        ->where('id_posyandu', Auth::user()->id_posyandu)
        ->where('jenis','Kunjungan Pos')
        ->count();
        //dd($k_rumah);
         //return print($k_rumah);
        return view('kader/index',compact('k_rumah','k_pos','foto','penggunaposyandu','namaposyandu'));
    }



    public function profil(){
         $foto = Kader::where('id_user',Auth::user()->id)->get();
        
        $cekkader = Kader::where('id_user',Auth::user()->id)->first();
           
        if (($cekkader != null)) {
             $datakader = Kader::where('id_user',Auth::user()->id)->get();
             $namakader = User::where('id',Auth::user()->id)->get();
             return view('kader/profilupdate',compact('datakader','namakader','foto'));
            
        }else{
                $namakader = User::where('id',Auth::user()->id)->get();
             return view('kader/profil',compact('namakader','foto'));
        }
       }



   

     public function addprofil(Request $request){
 
        $kader = new kader();

        $kader->id_user = $request->input('id_user');
        $kader->id_posyandu = $request->input('id_posyandu');
        $kader->nik = $request->input('nik');
        $kader->nama = $request->input('nama');
        $kader->tanggal_aktif = $request->input('tanggal_aktif');

     	
             if($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/fotoprofil/', $filename);
                $kader->image = $filename;

              
            }else{
                echo "Gagal upload gambar";
            }

            $kader->save();
             
            //'image' => $request['image'],

        
         alert()->success('Berhasil','Menambahkan Data Profil');
        return redirect('/kader')->with(['success' => 'isi profil Berhasil']);


	   }



    public function updateprofil(Request $request,$id_user){

        // $ibuhamil = Kontrol_kehamilan::orderby('id','DESC')->with('ibu_hamil')->get();
        // $ibu_hamil = ibu_hamil::all();
      $kader = Kader::where('id_user', $id_user);


            $input =([
            'id_user' => $request->id_user,
            'id_posyandu' => $request->id_posyandu,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tanggal_aktif' => $request->tanggal_aktif,
             
        ]);
            
        $kader->update($input);
       
        alert()->success('Berhasil','Update Profil');
        return redirect('/kader');

    }


    public function updatefoto(Request $request ,$id){

        $fotokader = Kader::find($id);

            File::delete('uploads/fotoprofil/'.$fotokader->image);
            $fotokader->delete();  
       
        if($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/fotoprofil/', $filename);
                $fotokader->image = $filename;
              
            }else{
                echo "Gagal upload gambar";
            }

            $fotokader->save();

         alert()->success('Berhasil','Update Fotoprofil');
        return redirect('/kader');
    }


    public function setting(){
        $foto = Kader::where('id_user',Auth::user()->id)->get();
        $akunkader = User::where('id',Auth::user()->id)->get(); 

        return view('kader/setting',compact('akunkader','foto'));
    }

    public function editpassword(){
         
        $foto = Kader::where('id_user',Auth::user()->id)->get();

        $akunkader = User::where('id',Auth::user()->id)->get(); 

        return view('kader/editpassword',compact('akunkader','foto'));
    }



     public function updateakun(Request $request,$id){

        // $ibuhamil = Kontrol_kehamilan::orderby('id','DESC')->with('ibu_hamil')->get();
        // $ibu_hamil = ibu_hamil::all();
      $kader = User::where('id', $id);


            $input =([
            'email' => $request->email,
            'nohp' => $request->nohp,

           
        ]);


        $kader->update($input);
       
        alert()->success('Berhasil','Update Akun');
        return redirect('/kader');

    }


   public function updatepassword(Request $request,$id){

        // $ibuhamil = Kontrol_kehamilan::orderby('id','DESC')->with('ibu_hamil')->get();
        // $ibu_hamil = ibu_hamil::all();
     

      $kader = User::where('id', $id);
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

            $input =([
             'password' => Hash::make($request['password']),
            
           
        ]);


        $kader->update($input);

       
        alert()->success('Berhasil','Update Password');
        return redirect('/kader');

    }
}
