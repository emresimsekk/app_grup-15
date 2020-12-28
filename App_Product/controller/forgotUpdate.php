<?php


class forgotUpdate extends Controller
{
    private $errors=[];

    public function index()
    { 
        //echo $number.' '.$mail;
        $this->view('auth/forgotUpdate');
    }

    public function update($number = null,$id = null)
    {
        if($_POST['password']==$_POST['passwordTry'])
        {
            $fields=[
                'password'=>$_POST['password'],
                'random'=>$number,
                'id'=>$id
            ];
           
            $userModel = $this->model('mUser');
            $userPasswordUpdate = $userModel->forgotUpdate($fields); 
            if($userPasswordUpdate['state']==0)
            {
            
                $this->addError("succes",$userPasswordUpdate["msg"]);
                

            }
            else if($userPasswordUpdate['state']==1) 
            {
               
                $this->addError("faild",$userPasswordUpdate["msg"]);
                
            }
            if(count($this->errors)>0)
            {
                $this->view('auth/forgotUpdate',['errors' => $this->errors]);
            }
        }
        else 
        {
            $this->addError("faild","Şifreler uyumsuz !");
            $this->view('auth/forgotUpdate',['errors' => $this->errors]);
        }
   

    }
    private function addError($key,$val)
    {
        $this->errors[$key] = $val;

    }

  
    
}