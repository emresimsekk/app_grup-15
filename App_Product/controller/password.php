<?php


class password extends Controller
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
                $this->view('password',['userInfo'=>$userInfo]);
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
            if($_POST['newPassword']==$_POST['newPasswordTry'])
            {
                $data=[
                    'lastPassword'=>!empty($_POST['lastPassword']) ? $_POST['lastPassword'] : '', 
                    'newPassword'=>!empty($_POST['newPassword']) ? $_POST['newPassword'] : '', 
                    'newPasswordTry'=>!empty($_POST['newPasswordTry']) ? $_POST['newPasswordTry'] : '', 
                ];
                $this->regex($data);
                if(count($this->errors)>0)
                {
                 
                   $this->view('password',['errors' => $this->errors, 'userInfo'=>$userInfo]);
                }
                else 
                {
                    $userUpdate = $user->passwordUpdate($fields['user_id'],$data['lastPassword'],$data['newPassword']);
                    if($userUpdate["state"]==0)
                    {
                        $this->addError("succes",$userUpdate["msg"]);
                        $this->view('password',['errors' => $this->errors, 'userInfo'=>$userInfo]);
                    }
                    else {
                        $this->addError("faild",$userUpdate["msg"]);
                        $this->view('password',['errors' => $this->errors, 'userInfo'=>$userInfo]);
                    }
                  
                }

            }
            else {
                $this->addError("newPassword","Şifreler uyuşmadı !");
                $this->addError("newPasswordTry","Şifreler uyuşmadı !");
                $this->view('password',['errors' => $this->errors, 'userInfo'=>$userInfo]);
            }
          

        }

            
    }

    private function regex($data)
    {
        $fildsRegex =[
            'lastPassword'=>'/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,16}/',
            'newPassword'=>'/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,16}/',
            'newPasswordTry'=>'/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,16}/',
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