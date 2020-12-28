<?php

class mUser extends Model {

    public function singIn($fields)
    {
        $str=[
            "username"=>$fields["mail"],
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
            "phone"=>$fields["phone"],
            "ask"=>$fields["ask"],
            "actives"=>$fields["actives"],
        ];

        $str=json_encode($str);
        
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://localhost:3002/api/signUp");
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$str);
        curl_setopt( $ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $result=json_decode(curl_exec($ch),true);
        curl_close($ch);
        return $result;

    }

    public function userInfoList($fields)
    {
        $str=[
            "user_id"=>$fields["user_id"],
        ];
        
        $str=json_encode($str);
      
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://localhost:3002/api/userInfo");
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
    public function  update($fields,$user_id,$lastPassword)
    {
        
        $str=[
            "user_id"=>$user_id,
            'lastPassword'=>$lastPassword,
            "mail"=>$fields["mail"],
            "name"=>$fields["name"],
            "surname"=>$fields["surname"],
            "phone"=>$fields["phone"],
            "ask"=>$fields["ask"],
        ];

        $str=json_encode($str);
        
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://localhost:3002/api/userupdate");
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$str);
        curl_setopt( $ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $result=json_decode(curl_exec($ch),true);
        curl_close($ch);
        return $result;

    }
    public function forgotMail($fields){
        $str=[
            "mail" =>$fields['mail'],
            "ask" =>$fields["ask"],   
           
        ];
        $str=json_encode($str);
        
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://localhost:3002/api/forgot");
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
    public function forgotUpdate($fields){
        $str=[
            'password'=>$fields['password'],
            'random'=>$fields['random'],
            'id'=>$fields['id'],
        ];
     
      
        $str=json_encode($str);
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://localhost:3002/api/forgot");
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
    public function  passwordUpdate($user_id,$lastPassword,$newPassword)
    {
        
        $str=[
            "user_id"=>$user_id,
            'lastPassword'=>$lastPassword,
            "newPassword"=>$newPassword,
            
        ];

        $str=json_encode($str);
        
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://localhost:3002/api/userPassword");
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$str);
        curl_setopt( $ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $result=json_decode(curl_exec($ch),true);
        curl_close($ch);
        return $result;

    }
  

}