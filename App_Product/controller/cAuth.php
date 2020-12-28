<?php


class cAuth extends Controller
{
    private $errors=[];
    
  
    

    public function getlogin()
    { 
        $this->view('auth/login');
    }

    public function postLogin()
    {  
        $userModel = $this->model('mUser');

        $fields=[
        'mail' => $_POST['mail'],
        'password' => $_POST['password']
        ];

        
        $userLogin = $userModel->singIn($fields); 
        if(@$userLogin["state"]==1)
        {
            $this->addError("error",$userLogin["msg"]);
           
        }
        else if(@$userLogin["state"]==0)
        {
            $this->addError("error",$userLogin["msg"]);
        }
        else {
            session_start();
            $_SESSION['user']=$userLogin["user"]["id"];
            
            header("Location:homepage");
        }
      
        if(count($this->errors)>0)
        {
            $this->view('auth/login',[
            'errors' => $this->errors
            
            ]);
        }

    }


    public function loginRegex($fields)
    {
        $fildsRegex =[
            'mail'=>'/^[^@]+@[^@]+\.[a-zA-Z]{2,6}$/',
            'password'=>'/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,16}$/',
        ];  

        foreach ($fildsRegex as $key => $value) {
            
            if(!preg_match($fildsRegex[$key],$fields[$key]))
            {
                $this->addError($key,'Bu alan kurallara uygun doldurulmalıdır!'); 

            }

        }
    }

    public function getRegister()
    {
        $this->view('auth/register');
    }
    public function postRegister()
    {


        $fields=[
            'mail'=>!empty($_POST['mail']) ? $_POST['mail'] : '', 
            'ask'=>!empty($_POST['ask']) ? $_POST['ask'] : '', 
            'password' =>!empty($_POST['password'])?$_POST['password']: '', 
            'passwordtry' =>!empty($_POST['passwordtry'])?$_POST['passwordtry']: '', 
            'name' =>!empty($_POST['name'])?$_POST['name']: '', 
            'phone' =>!empty($_POST['phone'])?$_POST['phone']: '', 
            'surname' =>!empty($_POST['surname'])?$_POST['surname']: '', 
            'actives' =>1, 
        ];
        
        

        if($fields['password']==$fields['passwordtry'])
        {
            $this->regex($fields);
            if(count($this->errors)>0)
            {
               $this->view('auth/register',['errors' => $this->errors]);
            }
            else 
            {
              
                $userModel = $this->model('mUser');
                $userSingUp = $userModel->signUp($fields); 
    
                if($userSingUp["state"]==2)
                {
                 header("Location:succes");
         
                }
                else if($userSingUp["state"]==0)
                 {
                      $this->addError("error","Kullanıcı kayıt olurken bizim tarafımızdan bi aksaklık yaşandı!");
                 }
        
            }
        }
        else 
        {
            $this->addError("password","Şifreler uyumşmuyor");
            $this->addError("passwordtry","Şifreler uyumşmuyor");
            $this->view('auth/register',['errors' => $this->errors]);
        }
  
    }  
    private function regex($fields)
    {
        $fildsRegex =[
            'mail'=>'/[^@]+@[^@]+\.[a-zA-Z]{2,6}/',
            'password'=>'/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,16}/',
            'passwordtry'=>'/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,16}/',
            'name'=>'/^[a-zA-Z0-9ğüşöçİĞÜŞÖÇ]+$/',
            'ask'=>'/^[a-zA-Z0-9ğüşöçİĞÜŞÖÇ]+$/',
            'surname'=>'/^[a-zA-Z0-9ğüşöçİĞÜŞÖÇ]+$/',
            'phone'=>'/^(5)([0-9]{2})([0-9]{3})([0-9]{2})([0-9]{2})$/',
        ];

        foreach ($fildsRegex as $key => $value)
        {
            if(!preg_match($fildsRegex[$key],$fields[$key]))
            {
                $this->addError($key,'Bu alan kurallara uygun doldurulmalıdır !');

            }
        }
    }
    public function succes()
    {
        $this->addError("succes","Sisteme kullanıcı başarıyla kaydedilmiştir. Üye giriş sayfasına yönlendiriliyorsunuz lütfen bekleyin !");

        if(count($this->errors)>0)
        {
           $this->view('auth/succes',[
            'errors' => $this->errors
            
        ]);
        }
      
       
    }

    private function addError($key,$val)
    {
        $this->errors[$key] = $val;

    }

}