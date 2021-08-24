<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ibu;

class AuthApiController extends Controller
{
    //

     public function register(Request $request)
     {
      $ceknohp =User::where('nohp',$request->nohp)->first();

      if ($ceknohp) {
     
        $pesan ="Nomor WA Sudah Digunakan";
  
        return($pesan);

      }else{
     	  $otp = $this->getRandomString();

     	  $phones =$request->input('nohp');
     	  $name =$request->input('name');

        $data = ([
          'name' => $request->name,
          'nohp' => $request->nohp,
          'fcm_token'  =>$request->fcm_token,
          'role' =>'ibu'
        ]);

        $lastid = User::create($data)->id;
         
          $ibu = new Ibu;
          $ibu->nama =$request->name;  
          $ibu->id_user =$lastid;
          $ibu->save();

        // $pesan ="Selamat Anda Berhasil Daftar. Silahkan Login";
  
        // return($pesan);

        // $token = 'AoSElgayeif74igDg48OmauD2dZng31kRAk8VpjYdPQ62ioNO6';
        // $phone = $phones;
        // $message = $otp;
        // $url = 'http://ruangwa.com/v2/api/send-message.php';

        // $curl = curl_init();
        // curl_setopt($curl, CURLOPT_URL, $url);
        // curl_setopt($curl, CURLOPT_HEADER, 0);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($curl, CURLOPT_TIMEOUT,30);
        // curl_setopt($curl, CURLOPT_POST, 1);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, array(
        //     'token'    => $token,
        //     'phone'     => $phone,
        //     'message'   => $message,
        // ));
        // $response = curl_exec($curl);
        // curl_close($curl); 
       return ([$ibu,$data]);
    }
  }

    public function ceknomor(Request $request){
        $nohp=$request->input('nohp');

        if($logins= User::where('nohp', $nohp)->first()){

           $otps = $this->getRandomString();

            // $user = User::where('nohp',$nohp)->first();
          $data = ([
          'otp' => $otps,
        ]);
    
        $logins->update($data);

            $data ="Jaga kerahasiaan kode anda kepada siapapun. Kode verifikasi Posdayandu anda adalah ".$otps."."." Info hubungi 085156903160";

        $token = 'AoSElgayeif74igDg48OmauD2dZng31kRAk8VpjYdPQ62ioNO6';
        $phone = $nohp;
        $message = $data;
        $url = 'http://ruangwa.com/v2/api/send-message.php';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT,30);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, array(
            'token'    => $token,
            'phone'     => $phone,
            'message'   => $message,
        ));
        $response = curl_exec($curl);
        curl_close($curl); 
        

           $pesan ="Nomor WA Ditemukan";
  
         return ([$response,$logins,$pesan]);

        }else{
          $pesan ="Nomor WA Tidak Terdaftar";
  
            return($pesan);
        }
    }

   public function login(Request $request){

      $nohp=$request->input('nohp');
      $otp=$request->input('otp');
      $fcm= $request->input('fcm_token');

      
      if($logins= User::where('nohp', $nohp)->where('otp',$otp)->first()){
      
        $token =([
        'fcm_token'=> $fcm
        ]);
        $logins->update($token);


        $user = User::where('otp', $request->otp)->first();

        $data = ([
          'otp' => '0',
          
        ]);

        $user->update($data);
        
      


          $result["success"] = "1";
          $result["message"] = "Sukses Login";
         
          $result["id"]   = $logins->id;
          $result["name"] = $logins->name;
          $result["nohp"] = $logins->nohp;
          $result["fcm"] = $logins->fcm_token;
          $result["saldo"] = $logins->saldo;

        return response()->json($result);
      	}
      	// if ($user=User::where('otp','0')->where('nohp',$nohp)->first()){

       //  $otps = $this->getRandomString();
      
       //  $user = User::where('nohp',$nohp)->first();
       //    $data = ([
       //    'otp' => $otps,
       //  ]);
    
       //  $user->update($data);

       //  $token = 'AoSElgayeif74igDg48OmauD2dZng31kRAk8VpjYdPQ62ioNO6';
       //  $phone = $nohp;
       //  $message = $otps;
       //  $url = 'http://ruangwa.com/v2/api/send-message.php';

       //  $curl = curl_init();
       //  curl_setopt($curl, CURLOPT_URL, $url);
       //  curl_setopt($curl, CURLOPT_HEADER, 0);
       //  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
       //  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
       //  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
       //  curl_setopt($curl, CURLOPT_TIMEOUT,30);
       //  curl_setopt($curl, CURLOPT_POST, 1);
       //  curl_setopt($curl, CURLOPT_POSTFIELDS, array(
       //      'token'    => $token,
       //      'phone'     => $phone,
       //      'message'   => $message,
       //  ));
       //  $response = curl_exec($curl);
       //  curl_close($curl); 
       //   return ([$response,$user]);

       //  }

      else{

         $result["success"] = "0";
         $result["message"] = "OTP/ No Wa Salah";
          return response()->json($result);
       
     }

  }


     public function getRandomString($panjang = 6){
        $karakter = '0123456789';
        $panjang_karakter = strlen($karakter);
        $randomString = '';
        for ($i = 0; $i < $panjang; $i++) {
            $randomString .= $karakter[rand(0, $panjang_karakter - 1)];
        }
        return $randomString;
    }
}
