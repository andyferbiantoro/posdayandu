<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ibu_hamil;
use App\Ibu;
use App\Kontrol_kehamilan;


class IbuController extends Controller
{
    //

    public function daftaragenda(){

    	$Dataibu = Ibu::all();
	   	
        return view('daftar-pengguna/index',compact('Dataibu'));
    	
    }


    public function getkontrolibu(){

	   	$ibuhamil = Kontrol_kehamilan::orderby('id','DESC')->with('ibu_hamil')->get();
	   	$ibu_hamil = ibu_hamil::all();
        return view('ibu/index',compact('ibuhamil','ibu_hamil'));

	   }

	public function getcreateibu(){

	   	$Namaibu = Ibu::all();
	   	
        return view('ibu/edit',compact('Namaibu'));

	   }


   
	public function getcreatekontrol(){

	   	$Namaibu = ibu_hamil::all();
	   	
        return view('ibu/createkontrol',compact('Namaibu'));

	   }


    public function editkontrol($id){
       
        $Datakontrolupdate = Kontrol_kehamilan::where('id',$id)->with('ibu_hamil')->get();
        // dd($Datakontrolupdate);
        $ibu_hamil = ibu_hamil::all();
        return view('ibu/edit',compact('Datakontrolupdate','ibu_hamil'));

       }


    public function updatekontrol(Request $request){

            $update = Kontrol_kehamilan::where('id', $request->id)
            ->update([
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
            'waktu_kembali' => $request->waktu_kembali

        ]);

        
       return redirect('/ibu-entriibu');

    }



	public function detail($id){

	   	$kontrolhamil = Kontrol_kehamilan::where('id',$id)->with('ibu_hamil')->get();

        $identitas_ibu = Kontrol_kehamilan::join('ibu_hamil','Kontrol_kehamilan.id_ibuhamil', '=', 'ibu_hamil.id')
        ->where('Kontrol_kehamilan.id','=',$id)
        ->get();
        //dd($identitas_ibu);

        $ibu_hamil = ibu_hamil::all();
	   	
        return view('ibu/detail',compact('kontrolhamil','identitas_ibu'));

	   }


    public function addibu(Request $request){

     	ibu_hamil::create([
           	'nama_ibu' => $request->nama_ibu,
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
           
        ]);
        
        return redirect('/ibu-entriibu')->with(['success' => 'isi profil Berhasil']);


	   }


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
            'waktu_kembali' => $request->waktu_kembali
            
           
        ]);
        
        return redirect('/ibu-entriibu')->with(['success' => 'isi profil Berhasil']);


	   }

    public function destroy($id)
    {
        //mencari data dari tabel tower
         $Kontrol_kehamilan = Kontrol_kehamilan::findOrFail($id);
         //melakukan aksi delete pada data tower
         $Kontrol_kehamilan->delete();
         //menampilkan berhasil dengan alert sukses dan menampilkan halaman terakhir di akses.
         //Alert::success("Berhasil");
         return redirect()->back();

    }
}
