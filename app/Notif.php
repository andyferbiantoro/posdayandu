<?php
namespace App;


class Notif
{
   

    public function topup($token, $title, $isi, $status,$saldoakhir)
    {
        $ch = curl_init();
        $array = array("to" => $token, "data" => ["body" => $isi, "title" => $title, "key_1" => $status,"key_2"=>$saldoakhir]);
        $field = json_encode($array);
        curl_setopt_array($ch, array(
                CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS =>$field,
                CURLOPT_HTTPHEADER => array(
                  "Content-Type: application/json",
                  "Authorization: key=AAAAt0nzc2s:APA91bFQUPMwYCCWCbJN659MkHoP6Q3Im8egXHDf51PixuRaGUPyJNQAm4SCQiu9bT55K4eNZObVutp9HIDsffdWsi-_zxG4yVARB72xTKo1zAnXOHAGYT0jja3UOOoeI865bINznLT1"
                ),
              ));
        $result = curl_exec($ch);
        return $result;
    }
    
    public function pending($token, $title, $isi, $status)
    {
        $ch = curl_init();
        $array = array("to" => $token, "data" => ["body" => $isi, "title" => $title, "key_1" => $status]);
        $field = json_encode($array);
        curl_setopt_array($ch, array(
                CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS =>$field,
                CURLOPT_HTTPHEADER => array(
                  "Content-Type: application/json",
                  "Authorization: key=AAAAt0nzc2s:APA91bFQUPMwYCCWCbJN659MkHoP6Q3Im8egXHDf51PixuRaGUPyJNQAm4SCQiu9bT55K4eNZObVutp9HIDsffdWsi-_zxG4yVARB72xTKo1zAnXOHAGYT0jja3UOOoeI865bINznLT1"
                ),
              ));
        $result = curl_exec($ch);
        return $result;
    }


    
}
