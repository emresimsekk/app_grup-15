<?php


class profile extends Controller
{
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
                $this->view('profile',[
                  
                    'userInfo'=>$userInfo
                    ]);
            }
            else {
                echo "yetkisiz.";
            }
    }

}

?>