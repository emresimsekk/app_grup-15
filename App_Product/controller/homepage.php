<?php


class homepage extends Controller
{


    public function getHomePage()
        {
            session_start();
            
            $appPoint = $this->model('apppointment');
            $user = $this->model('mUser');
            $city = $appPoint->getAllCity(); 

            $fields=[
                'user_id' => $_SESSION['user'],
                ];
            $listAppPoint = $appPoint->listAppPoint($fields); 
            $userInfo = $user->userInfoList($fields); 
        
        
            if(!empty($_SESSION['user']))
            {
                $this->view('homepage',[
                    'city' =>  $city,
                    'appList' =>$listAppPoint,
                    'userInfo'=>$userInfo
                    ]);
            }
            else {
                echo "yetkisiz.";
            }

        }

    public function addApppoint()
    {
        session_start();
        
        $appModel = $this->model('apppointment');
      
        $fields=[
        'user_id' => $_SESSION['user'],
        'hour_id' => $_POST['apppoint'],
        'doctor_id' => $_POST['doctor'],
        'dep_id' => $_POST['dep'],
        'hospital_id' => $_POST['hospital'],
        'district_id' => $_POST['district'],
        'city_id' => $_POST['country'],
        
        ];
        $addApppoint = $appModel->addApp($fields); 

        if($addApppoint["state"]==1)
        {
            $this->addError("succes","Randevunuz başarıyla sisteme kaydedilmiştir. Randevu saatinden önce kimliğiniz ile muayene kapısının önünde bekleyiniz.");
            if(count($this->errors)>0)
            {
               $this->view('appPointSucces',[
                'errors' => $this->errors
                
            ]);
            }

        }
        else {
            //echo "başarısız";
        }
    
    }
    
    private function addError($key,$val)
    {
        $this->errors[$key] = $val;

    }

}