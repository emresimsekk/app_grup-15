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
                    <div class="col-6 mt-5 mb-5">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="title">Mail :</label>
                                <input type="email" class="form-control"  value="<?php echo  $userInfo['user'][0]['mail'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="title">Ad :</label>
                                <input type="text" class="form-control" value="<?php echo  $userInfo['user'][0]['userinfos']['name']?>">
                            </div>
                            <div class="form-group">
                                <label for="title">Soyad :</label>
                                <input type="text" class="form-control" value="<?php echo  $userInfo['user'][0]['userinfos']['surname']?>" >
                            </div>
                            
                           

                            <div class="form-group mt-5">
                                <input class="btn btn-default  btn-block my-4 lg text-light "
                                    style="background-color:#4682B4" name="addApp" id="addApp" value="Güncelle"
                                    type="submit"></input>
                            </div>
                        </form>


                    </div>
                  

                </div>

            </div>

            <div class="col-1">&nbsp;</div>



        </div>

    </div>


    </div>


  
</body>

</html>