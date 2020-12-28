<?php


class history extends Controller
{ 
    public function index()
    {
        session_start();
        $user = $this->model('mUser');

        $appPoint = $this->model('apppointment');
        
      
        $fields=[
            'user_id' => $_SESSION['user'],
            ];

        $userInfo = $user->userInfoList($fields); 
        $listAppPoint = $appPoint->history($fields); 
    
        if(!empty($_SESSION['user']))
        {
            $this->view('history',[
                
                'userInfo'=>$userInfo,
                'appList' =>$listAppPoint,
                ]);
        }
        else {
            header("Location:signin");
        }
    
        // if(isset($_POST['againApp']))
        // {
        //     echo 'DSADasdsa';
           
        // //  $fields=[
        // //      'user_id' => $_SESSION['user'],
        // //      'id' => $_POST['appID'],
        // //  ];
 
        // //  $updateApp = $appModel->activeApp($fields);
        // //  header("Location:homepage");
            

        // }
    
    }

    
}

?>