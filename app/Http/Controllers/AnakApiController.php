<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anak;
use App\Ibu;
use App\Imunisasi;
use App\Kms_imunisasi;
use Carbon\Carbon;
class AnakApiController extends Controller
{
    //
    public function kms($id){

 	  $ibu =  Ibu::where('id_user',$id)->first();
    $kontrol =  Kms_imunisasi::where('id_ibu',$ibu->id)->where('jenis','kms')->get();
   
         foreach ($kontrol as $datas => $data) {


          $array[]=[
              'id'=> $data->id,
              'namaibu' =>$data->ibu->nama,
              'nama' =>$data->nama_anak,
              'usia'=>$data->umurs->umur,
              'bb' => $data->berat_badan,
              'tinggi'=>$data->tinggi_badan,
              'suhu' =>$data->suhu_badan,
              'lingkar_kepala'=>$data->lingkar_kepala,
              'jadwal' =>$data->tanggal,
             

        ];
    }

        return response()->json($array);

   
    }
        public function imunisasi($id){

 	$ibu =  Ibu::where('id_user',$id)->first();
    $kontrol =  Kms_imunisasi::where('id_ibu',$ibu->id)->where('jenis','imunisasi')->get();
    foreach ($kontrol as $datas => $data) {


    	  $array[]=[
    	      'id'=> $data->id,
    	    
    	      'nama' =>$data->nama_anak,
              'nama_vaksin'=>$data->nama_vaksin,
    	      'jadwal' => $data->tanggal,
    	      'keterangan' => $data->keterangan,
    	     
    	];
    }

    	return response()->json($array);

    }
    
     public function kms_last($id){
         
         $ibu =  Ibu::where('id_user',$id)->first();
         $kontrol =  Kms_imunisasi::where('id_ibu',$ibu->id)->where('jenis','kms')->orWhere('tanggal',Carbon::today())->orderby('id','desc')->first();
     
            $array =[];
    //        foreach ($kontrol as $datas => $data) {


          $array[]=[
               'id'=> $kontrol->id,
              'namaibu' =>$kontrol->ibu->nama,
              'nama' =>$kontrol->nama_anak,
              'usia'=>$kontrol->umurs->umur,
              'bb'=>$kontrol->berat_badan,
              'tb'=>$kontrol->tinggi_badan,
              'suhu'=>$kontrol->suhu_badan,
              'lingkar_kepala' =>$kontrol->lingkar_kepala,
               'jadwal' =>$kontrol->tanggal,
             

        ];
    // }

        return response()->json($array);
    }

      public function imunisasi_last($id){
         
         $ibu =  Ibu::where('id_user',$id)->first();
         $kontrol =  Kms_imunisasi::where('id_ibu',$ibu->id)->where('jenis','imunisasi')->orderby('tanggal','desc')->orderby('id','desc')->first();
     
            $array =[];
    //        foreach ($kontrol as $datas => $data) {


          $array[]=[
               'id'=> $kontrol->id,
              'namaibu' =>$kontrol->ibu->nama,
              'nama' =>$kontrol->nama_anak,
              'vaksin'=>$kontrol->nama_vaksin,
               'jadwal' =>$kontrol->tanggal,
             

        ];
    // }

        return response()->json($array);
    }
    public function scanqrcodekms(Request $request,$id){

     
        // $data = Ibu::where('id_user',$id)->first();
        $kms = Kms_imunisasi::where('id',$id)->first();

        // $input =([
        //     'id_posyandu'=> $request->id_posyandu,

        //   ]);

          // $i =$data->id;
          // $kms=new Kms_imunisasi;

          $inputkms =([
          // 'id_ibu' =>$i
          'berat_badan'=> $request->berat,
           'tinggi_badan' =>$request->tinggi,
           'suhu_badan' =>$request->suhu
          ]);
            // $data->update($input);
            $kms->update($inputkms);

           $berhasil= "Update Data KMS Berhasil";

          return response()->json([$berhasil,$inputkms]);
        }
        
        
        public function Searchkms(Request $request,$id){
      $keyword=$request->input('tanggal');
      $ibu=Ibu::where('id_user',$id)->first();
      $kms= Kms_imunisasi::where('tanggal', 'LIKE','%'.$keyword.'%')->where('jenis','kms')->where('id_ibu',$ibu->id)->get();
     

       if ($keyword=="") {
            $array= 'Maaf Data tidak ditemukan';
          return response()->json($array);
          # code...
        }

        // if ($keyword=$kms) {
          # code...
           $ibu=Ibu::where('id_user',$id)->first();
           $kms= Kms_imunisasi::where('tanggal', 'LIKE','%'.$keyword.'%')->where('jenis','kms')->where('id_ibu',$ibu->id)->get();
     
        $array = [];
        foreach ($kms as $data) {
          $array[] = [
            'id' => $data->id,
            'nama'      =>$data->nama_anak,
            'usia'=>$data->umurs->umur,
            'suhu'=> $data->suhu_badan,
            'tinggi' => $data->tinggi_badan,
            'bb' =>$data->berat_badan,
            'lingkar_kepala'=>$data->lingkar_kepala,
            'jadwal' =>$data->tanggal,
            'jenis' =>$data->jenis,
      
           ];
          }

     return response()->json($array);
        // }else{
        //     $array= 'Maaf Data tidak ditemukan';
        //   return response()->json($array);
         
        // }
  
  }

   public function SearchImunisasi(Request $request,$id){
      $keyword=$request->input('tanggal');
      $ibu=Ibu::where('id_user',$id)->first();
      $imunisasi= Kms_imunisasi::where('tanggal', 'LIKE','%'.$keyword.'%')->where('id_ibu',$ibu->id)->where('jenis','imunisasi')->get();

        if ($keyword=="") {
            $array= 'Maaf Data tidak ditemukan';
          return response()->json($array);
          # code...
        }
 
       $array = [];
    foreach ($imunisasi as $data) {
      $array[] = [
        'id' => $data->id,
        'nama'      =>$data->nama_anak,
        'nama_vaksin'=>$data->nama_vaksin,
        'tanggal' =>$data->tanggal,
        'jenis' =>$data->jenis,
        'keterangan' =>$data->keterangan,
  
      ];
    }

     return response()->json($array);
  
  }

  public function dataanak($id){

      $ibu =  Ibu::where('id_user',$id)->first();
    $anak =  Anak::where('id_ibu',$ibu->id)->get();
    foreach ($anak as $datas => $data) {


        $array[]=[
            'id'=> $data->id,
            'nama' =>$data->nama,
           
      ];
    }

      return response()->json($array);



  }
}
