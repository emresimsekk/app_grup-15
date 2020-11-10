<?php

class mUser extends Model {

    public function singIn($fields)
    {
        $str=[
            "mail"=>$fields["mail"],
            "password"=>$fields["password"],
        ];
        $str=json_encode($str);
      
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://localhost:3002/api/signin");
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
    
    public function  signUp($fields)
    {
        
        $str=[
            "mail"=>$fields["mail"],
            "password"=>$fields["password"],
            "name"=>$fields["name"],
            "surname"=>$fields["surname"],
            "actives"=>$fields["actives"],
        ];
        $str=json_encode($str);
        
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://localhost:3002/api/signUp");
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