<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ibu;
use App\User;
use App\Pesan;
use Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class PesanController extends Controller
{
    //
   	 public function index()
    {
       
    	 $users = DB::select("select users.id, users.name,  count(dibaca) as unread 
        from users LEFT  JOIN pesan ON users.id = pesan.id_pengirim and dibaca = 0 and pesan.id_penerima = " . Auth::id() . "
        where users.id_posyandu = ".Auth::user()->id_posyandu." and users.role = 'ibu' " . "group by users.id, users.name");

        // $users =User::join('users','pesan.id_pengirim', '=', 'users.id')->where('role','ibu')->where('id'!=Auth::id())->get();


       // return view('pesan.index',compact('users'));
        return view('home',compact('users'));
        // return $users;
    }

    public function getMessage($user_id)
    {
        $my_id = Auth::id();

        // Make read all unread message
        Pesan::where(['id_pengirim' => $user_id, 'id_penerima' => $my_id])->update(['dibaca' => 1]);

        // Get all message from selected user
        $messages = Pesan::where(function ($query) use ($user_id, $my_id) {
            $query->where('id_pengirim', $user_id)->where('id_penerima', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('id_pengirim', $my_id)->where('id_penerima', $user_id);
        })->get();

        // $messages = where('from',$user_id)->where('to',$my_id)
        //return $messages;
        //return view('pesan/index', compact('messages'));
         return view('pesan/indexs', compact('messages'));
    }

    public function sendMessage(Request $request)
    {
        $from = Auth::id();
        $id_posyandu = Auth::user()->id_posyandu;
        $to = $request->receiver_id;
        $message = $request->message;

        $data = new Pesan();
        $data->id_pengirim = $from;
        $data->id_penerima = $to;
        $data->pesan = $message;
        $data->dibaca = 0;
        
         // message will be unread when sending message
        $data->save();

        // pusher
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['id_pengirim' => $from, 'id_penerima' => $to]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
    }



      public function kirimpesan(Request $request,$id){

      	  $ibu = User::where('role','ibu')->where('id',$id)->first();
          $kader = User::where('id_posyandu',$ibu->id_posyandu)->where('role','kader')->first();


      		$input_pesan=$request->input('pesan');
      		$ke = $kader->id;

      		$pesans= new Pesan;
      		$pesans->id_pengirim = $ibu->id;
      		$pesans->id_penerima = $request->id_penerima;
      		$pesans->pesan = $input_pesan;
      		$pesans->dibaca =0;
      		$pesans->save();




    	return($pesans);
    }
    
       public function kirimpesanadmin(Request $request,$id){

      		$kader = User::where('role','kader')->where('id_posyandu',$id)->first();

      		$input_pesan=$request->input('pesan');
      		$pengirim = $kader->id_posyandu;

      		$pesans= new Pesan;
      		$pesans->id_pengirim = $pengirim;
      		$pesans->id_penerima = 34;
      		$pesans->isi_pesan = $input_pesan;
      		$pesans->dibaca =0;
      		$pesans->save();



    	return($pesans);
    }
    
    
     public function pesanallkader($id_user){


      $ibu = User::where('id',$id_user)->where('role','ibu')->first();



         $pesan = DB::select("select users.id, users.name,  count(dibaca) as unread 
        from users LEFT  JOIN pesan ON users.id = pesan.id_pengirim and dibaca = 0 and pesan.id_penerima = " . $id_user . "
        where users.id_posyandu = ".$ibu->id_posyandu." and users.role = 'kader' " . "group by users.id, users.name");
  

      return($pesan);
    }
    
          public function pesanallforuser($id_user){

        // $kaders= $request->input('id_kader');


      // $ibu = User::where('id',$id_user)->where('role','ibu')->first();
      // $kader = User::where('id_posyandu',$ibu->id_posyandu)->where('role','kader')->first();


        //  $pesan = DB::select("select users.id, users.name,  count(dibaca) as unread 
        // from users LEFT  JOIN pesan ON users.id = pesan.id_pengirim and dibaca = 0 and pesan.id_penerima = " . $id_user . "
        // where users.id_posyandu = ".$ibu->id_posyandu." and users.role = 'kader' " . "group by users.id, users.name");


      $pesan = Pesan::where('id_penerima',$id_user)->get();
       // $pesan = Pesan::where('id_pengirim',$kader->id)->where('id_penerima',$id_user)->update(['dibaca' => 1]);

       //  $pesan = Pesan::where(function ($query) use ($id_user) {
       //      $query->where('id_pengirim', $id_user)->orWhere('id_penerima', $id_user);
       //  })->get();

       return($pesan);
    }

    
    
      public function pesanallgetread($id_pengirimkader, $id_user){

      // $id_pengirimkader = $request->input('id_pengirim');


      $ibu = User::where('id',$id_user)->first();
       // $kader = User::where('id_posyandu',$ibu->id_posyandu)->where('role','kader')->first();


       $pesan = Pesan::where('id_pengirim',$id_pengirimkader)->where('id_penerima',$id_user)->update(['dibaca' => 1]);

        $pesan = Pesan::where(function ($query) use ($id_user) {
            $query->where('id_pengirim', $id_user)->orWhere('id_penerima', $id_user);
        })->get();
      
      return($pesan);
    
    }
    
   public function pesankader($id_user){

      $ibu = User::where('id',$id_user)->first();
      $kader = User::where('id_posyandu',$ibu->id_posyandu)->where('role','kader')->first();
      
      $array[]=[
               'id'=> $kader->id,    

        ];

        return($array);

    
    }



}
