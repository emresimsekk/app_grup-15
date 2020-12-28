<?php


class profile extends Controller
{

    private $errors=[];
    
    public function index()
    {
        session_start();
        $user = $this->model('mUser');
        $fields=[
            'user_id' => $_SESSION['user'],
            ];
            $userInfo = $user->userInfoList($fields); 
       
            if(!empty($_SESSION['user']))
            {
                $this->view('profile',['userInfo'=>$userInfo]);
            }
            else {
                echo "yetkisiz.";
            }
    }
    public function update()
    {
        if(!empty($_POST["update"]))
        {
            session_start();
            $user = $this->model('mUser');
            $fields=[
                'user_id' => $_SESSION['user'],
                ];
                $userInfo = $user->userInfoList($fields);

            $data=[
                'mail'=>!empty($_POST['mail']) ? $_POST['mail'] : '', 
                'name' =>!empty($_POST['name'])?$_POST['name']: '', 
                'surname' =>!empty($_POST['surname'])?$_POST['surname']: '', 
                'phone' =>!empty($_POST['phone'])?$_POST['phone']: '', 
                'ask'=>!empty($_POST['ask']) ? $_POST['ask'] : '', 
                
            ];
           
                $this->regex($data);

                if(count($this->errors)>0)
                {
                   
                   $this->view('profile',['errors' => $this->errors, 'userInfo'=>$userInfo]);
                }
                else 
                {   $lastPassword=$_POST['lastPassword'];
                    $user_id=$_SESSION['user'];
                    $update = $user->update($data,$user_id,$lastPassword); 
                    if($update['state']==0)
                    {   $succes=2;
                        $userInfo = $user->userInfoList($fields);
                        $this->view('profile',['succes' => $succes, 'userInfo'=>$userInfo]);
                    }
                    else {
                        $faild=1;
                        $userInfo = $user->userInfoList($fields);
                        $this->view('profile',['faild' => $faild, 'userInfo'=>$userInfo]);
                    }
                   
                }



           
        }
    }
    private function regex($data)
    {
        $fildsRegex =[
            'mail'=>'/[^@]+@[^@]+\.[a-zA-Z]{2,6}/',
            'name'=>'/^[a-zA-Z0-9ğüşöçİĞÜŞÖÇ]+$/',
            'surname'=>'/^[a-zA-Z0-9ğüşöçİĞÜŞÖÇ]+$/',
            'phone'=>'/^(5)([0-9]{2})([0-9]{3})([0-9]{2})([0-9]{2})$/',
            'ask'=>'/^[a-zA-Z0-9ğüşöçİĞÜŞÖÇ]+$/',        
        ];

        foreach ($fildsRegex as $key => $value)
        {
            if(!preg_match($fildsRegex[$key],$data[$key]))
            {
                $this->addError($key,'Bu alan kurallara uygun doldurulmalıdır !');

            }
        }
    }
    private function addError($key,$val)
    {
        $this->errors[$key] = $val;

    }

}

?>