<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kader;
use App\Anak;
use App\Ibu;
use App\Vaksin;
use App\Umur;
use App\Imunisasi;
use App\Kms_imunisasi;
use Auth;
use Alert;




class AnakController extends Controller
{
    //
    public function index(){

    $foto = Kader::where('id_user',Auth::user()->id)->get();    
    $Dataanak = Kms_imunisasi::orderBy('id', 'DESC')->where('id_posyandu', Auth::user()->id_posyandu)->paginate(10);
        // dd($Dataanak);
        return view('anak/index',compact('Dataanak','foto'));

       }
       
     public function cari(Request $request){

        $cari = $request->cari;
	$foto = Kader::where('id_user',Auth::user()->id)->get();

        $Dataanak = Kms_imunisasi::where('id_posyandu', Auth::user()->id_posyandu)
        ->where('nama_anak','like',"%".$cari."%")
        ->orderBy('id', 'DESC')
        ->paginate(10);
        
        return view('anak/index',compact('Dataanak','foto'));
    }

    public function vaksin(Request $request){
        $vaksin = Vaksin::where('id_umur',$request->id)->get();
        return response()->json($vaksin);
       }  

    public function anak(Request $request){
        //menampilkan tabel desa dengan dari id kecamatan.
        $anak = Anak::where('id_ibu',$request->id)->get();

        //mengembalikan data dalam bentuk json.
        return response()->json($anak);
    }

    public function create(){
	
	$foto = Kader::where('id_user',Auth::user()->id)->get();
        $Dataibu = Ibu::where('id_posyandu', Auth::user()->id_posyandu)->get();
        
        return view('anak/createanak',compact('Dataibu','foto'));

       }

    public function imunisasi(){
	
	$foto = Kader::where('id_user',Auth::user()->id)->get();
        $Dataibu = Ibu::where('id_posyandu', Auth::user()->id_posyandu)->get();
        $Dataanak = Anak::all();
        $Datavaksin = Vaksin::all();
        $Dataumur = Umur::whereBetween('id',['1','12'])->get();
        
        return view('anak/imunisasi',compact('Dataibu','Dataanak','Datavaksin','Dataumur','foto'));

       }

    public function kms(){

	$foto = Kader::where('id_user',Auth::user()->id)->get();
        $Dataibukms = Ibu::where('id_posyandu', Auth::user()->id_posyandu)->get();
        $Dataibu = Ibu::all();
        $Dataanak = Anak::all();
       $Dataumur = Umur::all();
        
        return view('anak/kms',compact('Dataanak','Dataibukms','Dataumur','foto'));

       }


     public function addanak(Request $request){
        

            Anak::create([
            'nama' => $request->nama,
            'id_ibu' => $request->id_ibu,
            'ttl'=>$request->ttl,
           
        ]);
        
        return redirect('/anak-entri');

       }   

    public function addimunisasi(Request $request){
 

            Kms_imunisasi::create([
            'nama_anak' => $request->nama_anak,
            'id_ibu' => $request->id_ibu,
            'id_posyandu' => $request->id_posyandu,
            'id_umur' => $request->id_umur,
            'nama_vaksin' => $request->nama_vaksin,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'jenis' => $request['jenis']="imunisasi",
            
        ]);
            return redirect('/anak-entri');
       }


    public function addkms(Request $request){
 

            Kms_imunisasi::create([
            'nama_anak' => $request->nama_anak,
            'id_ibu' => $request->id_ibu,
            'id_posyandu' => $request->id_posyandu,
            'id_umur' => $request->id_umur,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'suhu_badan' => $request->suhu_badan,
            'lingkar_kepala' => $request->lingkar_kepala,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'jenis' => $request['jenis']="kms",
            
        ]);
        
        return redirect('/anak-entri');


       }

    public function edit($id){
       
         //untuk cek jenis
        $jenis = Kms_imunisasi::where('jenis','kms')->where('id',$id)->first();
         
        if (($update = $jenis)) {
        $foto = Kader::where('id_user',Auth::user()->id)->get();
                $update = Kms_imunisasi::findOrFail($id);
                $Dataibukms = Ibu::where('id_posyandu', Auth::user()->id_posyandu)->get();
                $Dataibu = Ibu::all();
                $Dataanak = Kms_imunisasi::where('id',$update->id)->get();
                $Dataumur = Umur::all();
             return view('anak/editkms',compact('update','Dataibukms','Dataanak','Dataumur','foto'));
        }else{
        $foto = Kader::where('id_user',Auth::user()->id)->get();
              $update = Kms_imunisasi::where('id',$id)->get();
                $update = Kms_imunisasi::findOrFail($id);
                $Dataibukms = Ibu::where('id_posyandu', Auth::user()->id_posyandu)->get();
                $Dataibu = Ibu::all();
                $Datavaksin = Vaksin::all();
                $Dataanak = Kms_imunisasi::where('id',$update->id)->get();
                $Dataumur = Umur::whereBetween('id',['1','12'])->get();
             return view('anak/editimunisasi',compact('update','Dataibukms','Dataanak','Datavaksin','Dataumur','foto'));
        }
    }
       


    public function updatekms(Request $request ,$id){

        // $ibuhamil = Kontrol_kehamilan::orderby('id','DESC')->with('ibu_hamil')->get();
        // $ibu_hamil = ibu_hamil::all();
      $kh = Kms_imunisasi::where('id',$id);

   
            $input =([
           
           'nama_anak' => $request->nama_anak,
            'id_ibu' => $request->id_ibu,
            'id_posyandu' => $request->id_posyandu,
            'id_umur' => $request->id_umur,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'suhu_badan' => $request->suhu_badan,
            'lingkar_kepala' => $request->lingkar_kepala,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'jenis' => $request['jenis']="kms",

        ]);


        $kh->update($input);

        alert()->success('Berhasil','Update Data');
       return redirect('anak-entri');

    }

    public function updateimunisasi(Request $request ,$id){

        // $ibuhamil = Kontrol_kehamilan::orderby('id','DESC')->with('ibu_hamil')->get();
        // $ibu_hamil = ibu_hamil::all();
      $kh = Kms_imunisasi::where('id',$id);

   
            $input =([
           
            'nama_anak' => $request->nama_anak,
            'id_ibu' => $request->id_ibu,
            'id_posyandu' => $request->id_posyandu,
            'id_umur' => $request->id_umur,
            'nama_vaksin' => $request->nama_vaksin,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'jenis' => $request['jenis']="imunisasi"

        ]);


        $kh->update($input);

        alert()->success('Berhasil','Update Data');
       return redirect('anak-entri');

    }





    public function detail($id){

        //untuk cek jenis
        $jenis = Kms_imunisasi::where('jenis','kms')->where('id',$id)->first();
         
        if (($detail = $jenis)) {
        	$foto = Kader::where('id_user',Auth::user()->id)->get();
             $detail = Kms_imunisasi::where('id',$id)->with('umurs')->get();
             $umurs = Umur::all();
             return view('anak/kmsdetail',compact('detail','umurs','foto'));
        }else{
        	$foto = Kader::where('id_user',Auth::user()->id)->get();
             $detail = Kms_imunisasi::where('id',$id)->with('umurs')->get();
              $umurs = Umur::all();
            return view('anak/imunisasidetail',compact('detail','umurs','foto'));
        }
       

       }


       // public function alldetail($nama_anak){

       //  //untuk cek jenis
       //  $jenis = Kms_imunisasi::where('jenis','kms')->where('id',$id)->first();
         
       //  if (($detail = $jenis)) {
       //       $detail = Kms_imunisasi::where('nama_anak',$nama_anak)->get();
       //       return view('anak/kmsdetail',compact('detail'));
       //  }else{
       //       $detail = Kms_imunisasi::where('nama_anak',$nama_anak)->get();
       //      return view('anak/imunisasidetail',compact('detail'));
       //  }
       

       // }




     public function destroy($id)
    {
        //mencari data dari tabel tower
         $Kms_imunisasi = Kms_imunisasi::findOrFail($id);
         //melakukan aksi delete pada data tower
         $Kms_imunisasi->delete();
         //menampilkan berhasil dengan alert sukses dan menampilkan halaman terakhir di akses.
         //Alert::success("Berhasil");
         alert()->success('Data Berhasil Dihapus');
         return redirect()->back();

    }

       }


