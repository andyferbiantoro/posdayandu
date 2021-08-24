<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ibu;
use App\ibu_hamil;
use App\Kontrol_kehamilan;
use App\User;
use App\Video;
class IbuApiController extends Controller
{
    //


    public function kontrolkehamilan($id){
 	$ibu =  Ibu::where('id_user',$id)->first();
  $hamil = ibu_hamil::where('id_ibu',$ibu->id)->first();
  $kontrol =  Kontrol_kehamilan::where('id_ibuhamil',$hamil->id)->get();
    foreach ($kontrol as $datas => $data) {


    	  $array[]=[
    	     'id' =>$data->id,
           'nama' =>$data->ibu_hamil->ibus->nama,
    	      'kondisi_kehamilan' => $data->umur_kehamilan,
    	      'jadwal'=> $data->waktu_kembali,
    	     

    	];
    }

    	return response()->json($array);

    }
    
     public function kontrolkehamilan_last($id){
        $ibu =  Ibu::where('id_user',$id)->first();
      $hamil = ibu_hamil::where('id_ibu',$ibu->id)->first();
      $data =  Kontrol_kehamilan::where('id_ibuhamil',$hamil->id)->orderby('id','DESC')->first();

        $array[]=[
           'id' =>$data->id,
           'nama' =>$data->ibu_hamil->ibus->nama,
            'kondisi_kehamilan' => $data->umur_kehamilan,
            'jadwal'=> $data->waktu_kembali,
           

      ];

      return response()->json($array);
    }


    public function updatedata_ibu(Request $request,$id){


  			$data =  	Ibu::where('id_user',$id)->first();
        
          $input =([
            'nama'=> $request->name,
            'nik'=> $request->nik,
            'status'=> $request->status,
            'jumlah_anak'=>$request->jumlah_anak,
            
          ]);
  		  $i =$data->id_user;
          $user=User::findOrFail($i);

          $input2 =([
          'name'=> $request->name,

          ]);

          $user->update($input2);
          $data->update($input);
          return response()->json($data);

      }

    public function showdata_ibu($id){
     	$data =  Ibu::where('id_user',$id)->first();
      	$array[]=[
           'id'=> $data->id,
      		'name'=> $data->user->name,
            'status'=> $data->status,
             'jumlah_anak'=>$data->jumlah_anak,
             'nik'=> $data->nik,
           
      
    	];


   		 return response()->json($array);
    }

    public function scanqrcode(Request $request,$id){

     
        $data = Ibu::where('id_user',$id)->first();

        $input =([
            'id_posyandu'=> $request->id_posyandu,

          ]);

          $i =$data->id_user;
          $user=User::findOrFail($i);

          $input2 =([
          'id_posyandu'=> $request->id_posyandu,

          ]);
            $data->update($input);
            $user->update($input2);

           $berhasil= "Scan QR Posyandu Berhasil";

          return response()->json([$berhasil,$input]);

    }
    
     public function SearchKK(Request $request,$id){
             $keyword=$request->input('tanggal');
             $ibu =  Ibu::where('id_user',$id)->first();
              $hamil = ibu_hamil::where('id_ibu',$ibu->id)->first();
        // $nama=Ibu::where('tanggal','LIKE','%'.$keyword.'%')->where('id_user',$id)->first();

    

        if ($keyword=="") {
            $array= 'Maaf Data tidak ditemukan';
          return response()->json($array);
          # code...
        }

        // if ($keyword=$nama) {
         
        // $hamil=ibu_hamil::where('id_ibu','LIKE','%'.$nama->id.'%')->first();
        $kontrol= Kontrol_kehamilan::where('waktu_kembali', 'LIKE','%'.$keyword.'%')->where('id_ibuhamil',$hamil->id)->get();
        $array = [];
    
        foreach ($kontrol as $data) {
          $array[] = [
            'id' => $data->id,
            'nama'      =>$data->ibu_hamil->ibus->nama,
            'kondisi_kehamilan' => $data->umur_kehamilan,
            'jadwal'=> $data->waktu_kembali,
             // 'dibuat'=> $data->tanggal,

        
           ];

        }

     return response()->json($array);
        // }else{
        //     $array= 'Maaf Data tidak ditemukan';
        //   return response()->json($array);
         
        // }
     
  
  }
    
      public function index(){
    	$video = Video::all();
    	return response()->json($video);
    }
    
    
     public function searchvideo(Request $request){

    	$keyword=$request->input('judul');
    	 if ($keyword=="") {
            $array= 'Maaf Data tidak ditemukan';
          return response()->json($array);
          # code...
        }
        $video=Video::where('judul','LIKE','%'.$keyword.'%')->orWhere('pemeran','LIKE','%'.$keyword.'%')->get();
          $array = [];
        foreach ($video as $data) {
          $array[] = [
            'id' => $data->id,
            'judul'      =>$data->judul,
              'nama_video'=>$data->nama_video,
            'judul'      =>$data->judul,
            'deskripsi'=>$data->deskripsi,
            'kategori'=>$data->kategori,
            'pemeran' =>$data->pemeran
      
        
           ];

        }

     return response()->json($array);



       
     }

}