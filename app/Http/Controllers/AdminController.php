<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Posyandu;
use App\Video;
use File;


class AdminController extends Controller
{
    //
     public function index(){

    	$Datakader = User::where('role', 'kader')->where('status','pending')->with('posyandu')->orderby('id','DESC')->get();
    	$DatakaderVerifi = User::where('role', 'kader')->where('status','terverifikasi')->with('posyandu')->orderby('id','DESC')->get();
    	$posyandu = Posyandu::all();	   	
        return view('admin/index',compact('Datakader','posyandu','DatakaderVerifi'));
    }


    public function editstatus($id){
    	$Datakader = User::where('role', 'kader')->where('id',$id)->with('posyandu')->get();
    	$posyandu = Posyandu::all();	   	
        return view('admin/updatestatus',compact('Datakader','posyandu'));

    }


    public function updatestatus(Request $request,$id){

        // $ibuhamil = Kontrol_kehamilan::orderby('id','DESC')->with('ibu_hamil')->get();
        // $ibu_hamil = ibu_hamil::all();
      $updatestatus = User::where('id',$id);

            $input =([
            'status' => $request->status,
        ]);

        $updatestatus->update($input);
        
        alert()->success('Berhasil','Terverifikasi');
       return redirect('/admin');

    }
    
    public function carivideo(Request $request){

        $cari = $request->cari;


        $video = Video::orderby('id','DESC')
        ->where('judul','like',"%".$cari."%")
        ->paginate();
        
        return view('admin/managevideo',compact('video'));
    }

    public function uploadvideo(){

        return view('admin/uploadvideo');
    }

     public function managevideo(){

        $video = Video::orderby('id','DESC')->get();

        return view('admin/managevideo',compact('video'));
    }


    public function prosesupload(Request $request){

            $video = new Video();

                if($request->hasFile('nama_video')){
                $file = $request->file('nama_video');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/video/', $filename);
                $video->nama_video   = $filename;

              
            }else{
                echo "Gagal upload gambar";
            }

            $video->judul = $request->input('judul');
            $video->deskripsi = $request->input('deskripsi');
            $video->kategori = $request->input('kategori');
            $video->pemeran = $request->input('pemeran');

        
            
            $video->save();
             
        alert()->success('Berhasil','Berhasil Diupload');
         return redirect('admin-managevideo');
    }


     public function destroyvideo($id)
    {
        
         $video = Video::findOrFail($id);
            File::delete('uploads/video/'.$video->nama_video);
         $video->delete();
         
         alert()->success('Data Berhasil Dihapus');
         return redirect()->back();

    }
}
