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
            "date_id" =>$fields["date_id"],   
            "doctor_id" =>$fields["doctor_id"], 
            "dep_id" =>$fields["dep_id"], 
            "hospital_id" =>$fields["hospital_id"], 
            "district_id" =>$fields["district_id"],        
            "city_id" =>$fields["city_id"], 
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
    public function updateApp($fields){
        $str=[
            "user_id" =>$fields['user_id'],
            "id" =>$fields['id'],
          
        ];
        $str=json_encode($str);
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://localhost:3002/api/edit");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch,CURLOPT_POSTFIELDS,$str);
        curl_setopt( $ch, CURLOPT_HTTPHEADER,   ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $result=json_decode(curl_exec($ch),true);
        curl_close($ch);
        return $result;

    }
    public function activeApp($fields){
        $str=[
            "user_id" =>$fields['user_id'],
            "id" =>$fields['id'],
          
        ];
        $str=json_encode($str);
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://localhost:3002/api/active");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch,CURLOPT_POSTFIELDS,$str);
        curl_setopt( $ch, CURLOPT_HTTPHEADER,   ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $result=json_decode(curl_exec($ch),true);
        curl_close($ch);
        return $result;

    }
    public function history($fields){
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
        curl_setopt($ch,CURLOPT_URL,"http://localhost:3002/api/history");
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
