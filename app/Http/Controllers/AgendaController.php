<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use App\Kader;
use App\Ibu;
use Auth;

class AgendaController extends Controller
{
    //

    public function index(){
		$foto = Kader::where('id_user',Auth::user()->id)->get();
	   	$Dataagenda = Agenda::orderBy('id', 'DESC')
	   	->where('waktu','>', date('y-m-d'))
	   	->where('id_posyandu', Auth::user()->id_posyandu)
	   	->with('ibu')
	   	->paginate(10);
	   	$ibu = Ibu::all();
        return view('agenda/index',compact('Dataagenda','ibu','foto'));

	   }
	   
	   
public function cari(Request $request){

        $cari = $request->cari;
	
	$foto = Kader::where('id_user',Auth::user()->id)->get();
        $Dataagenda = Agenda::where('id_posyandu', Auth::user()->id_posyandu)
        ->where('waktu','>', date('y-m-d'))
        ->where('jenis','like',"%".$cari."%")
        ->with('ibu')
        ->paginate(10);

        $ibu = Ibu::all();
        
        return view('agenda/index' ,compact('Dataagenda','foto'));
    }


     public function caririwayat(Request $request){

        $cari = $request->cari;

	$foto = Kader::where('id_user',Auth::user()->id)->get();
        $Datariwayat = Agenda::where('id_posyandu', Auth::user()->id_posyandu)
        ->where('waktu','<', date('y-m-d'))
        ->where('jenis','like',"%".$cari."%")
        ->with('ibu')
        ->paginate(10);

        $ibu = Ibu::all();
        
        return view('agenda/riwayat' ,compact('Datariwayat','foto'));
    }


	public function riwayatagenda()
    {
	$foto = Kader::where('id_user',Auth::user()->id)->get();
    	$Datariwayat = Agenda::orderBy('id', 'DESC')
    	->where('waktu','<', date('y-m-d'))
        ->where('id_posyandu', Auth::user()->id_posyandu)
        ->with('ibu')
        ->paginate(10);

	   	$ibu = Ibu::all();

        //dd($riwayat);

        return view('agenda/riwayat',compact('Datariwayat','ibu','foto'));
    } 


	public function createagenda(){
	$foto = Kader::where('id_user',Auth::user()->id)->get();
       
        $Dataibu = Ibu::where('id_posyandu',Auth::user()->id_posyandu)->get();
        
        return view('agenda/createagenda',compact('Dataibu','foto'));
	   }


	public function addagenda(Request $request){
 

     		Agenda::create([
           	'id_ibu' => $request->id_ibu,
            'waktu' => $request->waktu,
            'id_posyandu' => $request->id_posyandu,
           	'jenis' => $request->jenis,
            
            
        ]);
            return redirect('/kader-agenda');
	   }

	public function editagenda($id){
	
	
	$foto = Kader::where('id_user',Auth::user()->id)->get();
	$update = Agenda::findOrFail($id); 
        $updatex = Agenda::where('id',$update->id)->get();
        return view('agenda.editagenda',compact('update','updatex','id','foto'));

	       }


	public function updateagenda(Request $request ,$id){

        // $ibuhamil = Kontrol_kehamilan::orderby('id','DESC')->with('ibu_hamil')->get();
        // $ibu_hamil = ibu_hamil::all();
      $updateibu = Agenda::where('id',$id);

   
            $input =([
            'id_ibu' => $request->id_ibu,
            'id_posyandu' => $request->id_posyandu,
            'waktu' => $request->waktu,
            'jenis' => $request->jenis

        ]);


        $updateibu->update($input);
        alert()->success('Berhasil','Update Data');
       return redirect('kader-agenda');

    }



    public function destroy($id)
    {
        //mencari data dari tabel tower
         $Kms_imunisasi = Agenda::findOrFail($id);
         //melakukan aksi delete pada data tower
         $Kms_imunisasi->delete();
         //menampilkan berhasil dengan alert sukses dan menampilkan halaman terakhir di akses.
         //Alert::success("Berhasil");
         alert()->success('Data Berhasil Dihapus');
         return redirect()->back();

    }

}
