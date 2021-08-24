<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ibu_hamil;
use App\Ibu;
use App\Kontrol_kehamilan;
use App\Kader;
use app\User;
use Auth;
use Alert;



class IbuController extends Controller
{
    //

    public function carikontrol(Request $request){
        $foto = Kader::where('id_user',Auth::user()->id)->get();

        $keyword = $request->cari; 
        $dataibu=Ibu::where('nama','LIKE','%'.$keyword.'%')->first();
        if ($keyword=$dataibu) {
            $hamil=ibu_hamil::where('id_ibu','LIKE','%'.$dataibu->id.'%')->first();
            $ibuhamil= Kontrol_kehamilan::where('id_ibuhamil', 'LIKE','%'.$hamil->id.'%')->paginate(10);
            $ibu_hamil = Ibu_hamil::all();
        }else{
            $hamil=ibu_hamil::where('id_ibu','LIKE','%'.'0'.'%')->first();
            $ibuhamil= Kontrol_kehamilan::where('id_ibuhamil', 'LIKE','%'.'0'.'%')->paginate(10);
            $ibu_hamil = Ibu_hamil::all();
        }


        return view('ibu/index',compact('ibuhamil','ibu_hamil','hamil','dataibu','foto'));
        }


    //masuk ke halaman agenda
    public function daftarpengguna(){
        $foto = Kader::where('id_user',Auth::user()->id)->get();

    	$Dataibu = Ibu::where('id_posyandu', Auth::user()->id_posyandu)->paginate(10);
	   	
        return view('daftar-pengguna/index',compact('Dataibu','foto'));
    }



    public function cari(Request $request){
        $foto = Kader::where('id_user',Auth::user()->id)->get();
        $cari = $request->cari;


        $Dataibu = Ibu::where('id_posyandu', Auth::user()->id_posyandu)
        ->where('nama','like',"%".$cari."%")
        ->paginate();
        
        return view('daftar-pengguna/index',compact('Dataibu','foto'));
    }



    public function daftaribu(){
        $foto = Kader::where('id_user',Auth::user()->id)->get();
        $Dataibuhamil = ibu_hamil::where('id_posyandu', Auth::user()->id_posyandu)
        ->with('ibus')
        ->get();
        $dataibu=Ibu::all();
        
        return view('ibu/daftaribuhamil',compact('Dataibuhamil','foto'));
    }




    public function editpengguna($id){
        $foto = Kader::where('id_user',Auth::user()->id)->get();
        $update = Ibu::findOrFail($id);
       //  $Datakontrolupdate = Kontrol_kehamilan::find($id);

        $updatex = Ibu::where('id',$update->id)->get();
        // dd($Datakontrolupdate);
        
        return view('daftar-pengguna.edit',compact('update','updatex','id','foto'));

       }



    public function updatedaftarpengguna(Request $request ,$id){

        // $ibuhamil = Kontrol_kehamilan::orderby('id','DESC')->with('ibu_hamil')->get();
        // $ibu_hamil = ibu_hamil::all();
      $updateibu = Ibu::where('id',$id);

   
            $input =([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'status' => $request->status,
            'jumlah_anak' => $request->jumlah_anak

        ]);


        $updateibu->update($input);
        alert()->success('Berhasil','Update Data');
       return redirect('kader-daftar_pengguna');

    }



    //mengambil data kontrol ibu hamil untuk ditampilkan ke halaman indek ibu
    public function getkontrolibu(){
        $foto = Kader::where('id_user',Auth::user()->id)->get();
	   	$ibuhamil = Kontrol_kehamilan::orderby('id','DESC')->with('ibu_hamil')->where('id_posyandu', Auth::user()->id_posyandu)->paginate(10);
	   	$ibu_hamil = Ibu_hamil::all();
        $hamil = Ibu_hamil::orderby('id','DESC')->with('ibus')->get();
        $dataibu=Ibu::all();
        // $id = User::where('id',Auth::user()->id)->first();
        // $kader = Kader::where('id_user',Auth::user()->id)->get();
        // dd($kader);
        return view('ibu/index',compact('ibuhamil','ibu_hamil','hamil','dataibu','foto'));

	   }

    

    //halaman menambahkan ibu hamil
	public function getcreateibu(){
        $foto = Kader::where('id_user',Auth::user()->id)->get();
        $kaderposyandu = User::where('id_posyandu', Auth::user()->id_posyandu)->first();
        $Dataibu = Ibu::where('id_posyandu',Auth::user()->id_posyandu)->get();
        //dd($ibu);
        return view('ibu/createibu',compact('Dataibu','foto'));

	   }


   //menambhakan data kontrol ibu hamil
	public function getcreatekontrol(){
        $foto = Kader::where('id_user',Auth::user()->id)->get();
	   	$Dataibu = Ibu_hamil::where('id_posyandu',Auth::user()->id_posyandu)->get();
	   	
        return view('ibu/createkontrol',compact('Dataibu','foto'));

	   }

    //masuk halaman edit data kontrol ibu hamil
    public function editkontrol($id){
        $foto = Kader::where('id_user',Auth::user()->id)->get();
        $update = Kontrol_kehamilan::findOrFail($id);
       //  $Datakontrolupdate = Kontrol_kehamilan::find($id);

        $updatex = Kontrol_kehamilan::where('id',$update->id)->with('ibu_hamil')->get();
        // dd($Datakontrolupdate);
        $ibu_hamil = ibu_hamil::all();
        return view('ibu.edit',compact('update','updatex','id','foto'));

       }


    public function updatekontrol(Request $request ,$id){

        // $ibuhamil = Kontrol_kehamilan::orderby('id','DESC')->with('ibu_hamil')->get();
        // $ibu_hamil = ibu_hamil::all();
      $kh = Kontrol_kehamilan::where('id',$id);

   
            $input =([
            'id' =>$id,
            'tanggal' => $request->tanggal,
            'keluhan' => $request->keluhan,
            'tekanan_darah' => $request->tekanan_darah,
            'berat_badan' => $request->berat_badan,
            'umur_kehamilan' => $request->umur_kehamilan,
            'tinggi_fundus' => $request->tinggi_fundus,
            'letak_janin' => $request->letak_janin,
            'denyut_jantung_janin' => $request->denyut_jantung_janin,
            'kaki_bengkak' => $request->kaki_bengkak,
            'hasil_lab' => $request->hasil_lab,
            'tindakan' => $request->tindakan,
            'nasihat' => $request->nasihat,
            'keterangan' => $request->keterangan,
            'waktu_kembali' => $request->waktu_kembali

        ]);


        $kh->update($input);
        alert()->success('Berhasil','Update Data');
       return redirect('ibu-entriibu');

    }



    //masuk halaman detail kontrol hamil ibu dan menampilkan data sesuai id
	public function detail($id){
        $foto = Kader::where('id_user',Auth::user()->id)->get();
	   	$kontrolhamil = Kontrol_kehamilan::where('id',$id)->with('ibu_hamil')->get();

        $identitas_ibu = Kontrol_kehamilan::join('ibu_hamil','kontrol_kehamilan.id_ibuhamil', '=', 'ibu_hamil.id')
        ->where('kontrol_kehamilan.id', '=' ,$id)
       
        ->get();
        
        $ibu_hamil = Ibu_hamil::orderby('id','DESC')->with('ibus')->get();
        $ibus=Ibu::all();
        //$ibu_hamil = ibu_hamil::all();
	   	
        return view('ibu/detail',compact('kontrolhamil','identitas_ibu','ibu_hamil','ibus','foto'));

	   }


       //fungsi menambahkan data ibu hamil
    public function addibu(Request $request){

     	ibu_hamil::create([
           	'id_ibu' => $request->id_ibu,
            'hpht' => $request->hpht,
            'htp' => $request->htp,
            'lingkar_lengan' => $request->lingkar_lengan,
            'kek' => $request->kek,
            'tinggi_badan' => $request->tinggi_badan,
            'gol_darah' => $request->gol_darah,
            'kontrasepsi' => $request->kontrasepsi,
            'riwayat_penyakit' => $request->riwayat_penyakit,
            'riwayat_alergi' => $request->riwayat_alergi,
            'hamil_ke' => $request->hamil_ke,
            'jumlah_persalinan' => $request->jumlah_persalinan,
            'jumlah_keguguran' => $request->jumlah_keguguran,
            'jumlah_anak_hidup' => $request->jumlah_anak_hidup,
            'jumlah_lahir_mati' => $request->jumlah_lahir_mati,
            'jarak_kehamilan' => $request->jarak_kehamilan,
            'status_imunisasi_terakhir' => $request->status_imunisasi_terakhir,
            'penolong_persalinan' => $request->penolong_persalinan,
            'id_posyandu' => $request->id_posyandu,
           
        ]);
        
         alert()->success('Data Ibu Hamil Berhasil DItambahkan','Berhasil !');
        return redirect('/ibu-entriibu')->with(['success' => 'isi profil Berhasil']);


	   }


    //fungsi untuk menambahkan data kontrol kehamilan
	public function addkontrolibu(Request $request){
 

     	kontrol_kehamilan::create([
           	'id_ibuhamil' => $request->id_ibuhamil,
            'tanggal' => $request->tanggal,
            'keluhan' => $request->keluhan,
            'tekanan_darah' => $request->tekanan_darah,
            'berat_badan' => $request->berat_badan,
            'umur_kehamilan' => $request->umur_kehamilan,
            'tinggi_fundus' => $request->tinggi_fundus,
            'letak_janin' => $request->letak_janin,
            'denyut_jantung_janin' => $request->denyut_jantung_janin,
            'kaki_bengkak' => $request->kaki_bengkak,
            'hasil_lab' => $request->hasil_lab,
            'tindakan' => $request->tindakan,
            'nasihat' => $request->nasihat,
            'keterangan' => $request->keterangan,
            'waktu_kembali' => $request->waktu_kembali,
            'id_posyandu' => $request->id_posyandu
            
           
        ]);
        
        return redirect('/ibu-entriibu')->with(['success' => 'isi profil Berhasil']);


	   }

//menghapus data kontol kehamilan yang dipilih sesuai id
    public function destroy($id)
    {
        //mencari data dari tabel tower
         $Kontrol_kehamilan = Kontrol_kehamilan::findOrFail($id);
         //melakukan aksi delete pada data tower
         $Kontrol_kehamilan->delete();
         //menampilkan berhasil dengan alert sukses dan menampilkan halaman terakhir di akses.
         //Alert::success("Berhasil");
         alert()->success('Data Berhasil Dihapus');
         return redirect()->back();

    }
}
