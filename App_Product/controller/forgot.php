<?php


class forgot extends Controller
{
    private $errors=[];

    public function index()
    { 
        $this->view('auth/forgot');
    }
    public function mail()
    {
        $fields=[
            'mail'=>$_POST['mail'],
            'ask'=>$_POST['ask']
        ];
        $userModel = $this->model('mUser');
        $userMail = $userModel->forgotMail($fields); 
        if($userMail['state']==0){
            
            $this->addError("succes",$userMail["msg"]);
        }
        if($userMail['state']==1){
            
            $this->addError("faild",$userMail["msg"]);
        }
        
        if(count($this->errors)>0)
        {
            $this->view('auth/forgot',['errors' => $this->errors]);
        }

    }
    private function addError($key,$val)
    {
        $this->errors[$key] = $val;

    }

  
    
}