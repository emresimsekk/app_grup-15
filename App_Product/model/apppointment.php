<?php

class apppointment extends Model {

    
    public function getAllCity(){
       
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://localhost:3002/api/city");
        curl_setopt( $ch, CURLOPT_HTTPHEADER,   ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $result=json_decode(curl_exec($ch),true);
        curl_close($ch);
        return $result;

    }
    public function addApp($fields){
        $str=[
            "user_id" =>$fields['user_id'],
            "hour_id" =>$fields["hour_id"],            
        ];
        $str=json_encode($str);
        
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://localhost:3002/api/apppoint");
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$str);
        curl_setopt( $ch, CURLOPT_HTTPHEADER,   ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $result=json_decode(curl_exec($ch),true);
        curl_close($ch);
        return $result;

    }
    public function listAppPoint($fields){
        $str=[
            "user_id" =>$fields['user_id'],
            // "hoursName" =>$fields["hours"]["hourName"],            
            // "doctorsName" =>$fields["doctors"]["doctorName"], 
            // "departmentsName" =>$fields["departments"]["depName"], 
            // "hospitalsName" =>$fields["hospitals"]["hospitalName"],     
            // "districtsName" =>$fields["districts"]["districtName"],  
            // "citysName" =>$fields["citys"]["cityName"],  
        ];
        $str=json_encode($str);
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://localhost:3002/api/apppointall");
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$str);
        curl_setopt( $ch, CURLOPT_HTTPHEADER,   ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $result=json_decode(curl_exec($ch),true);
        curl_close($ch);
        return $result;

    }
   

}
