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
       
        if($userLogin["state"]==1)
        {
            $this->addError("error",$userLogin["msg"]);
           
        }
        else if($userLogin["state"]==0)
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

        $userModel = $this->model('mUser');
    
        $fields=[
        'mail' => $_POST['mail'],
        'password' => $_POST['password'],
        'name' => $_POST['name'],
        'surname' => $_POST['surname'],
        'actives' => 1,
       ];
       $userSingUp = $userModel->signUp($fields); 
      
       if($userSingUp["state"]==2)
       {
        header("Location:succes");

       }
       else if($userSingUp["state"]==0)
        {
             $this->addError("error","Kullanıcı kayıt olurken bizim tarafımızdan bi aksaklık yaşandı!");
        }

        if(count($this->errors)>0)
        {
           $this->view('auth/register',[
            'errors' => $this->errors
            
        ]);
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