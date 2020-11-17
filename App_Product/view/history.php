<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container-fluid">
        <!-- Image and text -->
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">

                ONLINE RANDEVU SİSTEMİ
            </a>
        </nav>
        <br><br>
        <div class="row">
            <div class="col-1">&nbsp;</div>
            <div class="col-2">
                <ul class="list-group">
                    <li class="list-group-item active pb-4 pt-4"><?php echo  $userInfo['user'][0]['userinfos']['name'].'  '; echo  $userInfo['user'][0]['userinfos']['surname'] ?> </li>
                    <li class="list-group-item pb-4 pt-4"><a href="homepage">Randevu Al</a></li>
                    <li class="list-group-item pb-4 pt-4"><a href="profile">Profilim</a></li>
                    <li class="list-group-item pb-4 pt-4"><a href="history">Geçmiş randevular</a></li>
                    <li class="list-group-item pb-4 pt-4">Çıkış</li>
                
                </ul>
            </div>
            <div class="col-1">&nbsp;</div>

            <div class="col-7 border rounded">
                <div class="row">
                 
                    <div class="col-6   pb-5">

                        <div class="row">
                            <?php  ?>
                            <div class="col-12">

                                <?php for($i=0;$i<=(count($appList)-1);$i++)
                            {?>
                                <div class="col-12 border rounded mt-5">
                                    <div class="row">
                                        <div class="col-12 pt-3 pb-3" style="font-size:16px">
                                            <?php echo  $appList[$i]["hospitals"]["hospitalName"] ?></div>
                                    </div>

                                    <div class="row pt-1 pb-1">
                                        <div class="col-6 " style="font-size:13px">
                                            <?php echo $appList[$i]["citys"]["cityName"] ?>/<?php echo  $appList[$i]["districts"]["districtName"] ?>
                                        </div>
                                        <div class="col-6" style="font-size:13px">
                                            <?php echo  $appList[$i]["departments"]["depName"]  ?></div>
                                    </div>
                                    <div class="row pt-1 pb-3">
                                        <div class="col-6">
                                            <?php echo  $appList[$i]["doctors"]["doctorName"] ?>
                                        </div>
                                        <div class="col-6">
                                            <?php echo  $appList[$i]["hours"]["hourName"] ?></div>
                                    </div>
                                    <div class="row pt-1 pb-3">
                                        <div class="col-12">
                                            <?php 
                                        if($appList[$i]["actives"]==0)
                                        {
                                            ?>
                                            <span style="color:red">Geçmiş Randevu</span>

                                            <?php
                                        }
                                        
                                        
                                        
                                        ?>
                                        </div>

                                    </div>

                                </div>
                                <?php 
                            }
                            ?>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

            <div class="col-1">&nbsp;</div>



        </div>

    </div>


    </div>


</body>

</html>