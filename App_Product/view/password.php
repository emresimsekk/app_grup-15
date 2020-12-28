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
    <link rel="stylesheet" href="css/base.css">
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
                    <li class="list-group-item pb-4 pt-4"><a href="newpassword">Şifre Güncelleme</a></li>
                    <li class="list-group-item pb-4 pt-4"><a href="history">Geçmiş randevular</a></li>
                    <li class="list-group-item pb-4 pt-4"><a href="signin">Çıkış</a></li>
                
                </ul>
            </div>
            <div class="col-1">&nbsp;</div>
            <form method="POST" class="col-7 " >
                <div class="col-6 border rounded">
                    <div class="row">
                        <div class="col-12 mt-5 ">
                            <div class="form-group">
                                <label for="title">Eski Şifre :</label>
                                <input type="password" class="form-control" name="lastPassword"  >
                            </div>
                            <span class="error"><?php echo $errors['lastPassword'] ?? ''?></span>
                        </div>
                     
                    </div>
                    <div class="row">
                        <div class="col-12 mt-5 ">
                            <div class="form-group">
                                <label for="title">Yeni Şifre :</label>
                                <input type="password" class="form-control" name="newPassword" >
                            </div>
                            <span class="error"><?php echo $errors['newPassword'] ?? ''?></span>
                        </div>
                     
                    </div>
                    <div class="row">
                        <div class="col-12 mt-5 ">
                            <div class="form-group">
                                <label for="title">Yeni Şifre Onay :</label>
                                <input type="password" class="form-control" name="newPasswordTry"  >
                            </div>
                            <span class="error"><?php echo $errors['newPasswordTry'] ?? ''?></span>
                        </div>
                     
                    </div>
                   
                    <div class="row">
                        <div class="col-12 mt-5 ">
                            <div class="form-group">
                                <input class="btn btn-default  btn-block my-4 lg text-light "  type="submit"  style="background-color:#4682B4" name="update" value="Güncelle" ></input>
                            </div>
                        </div>
                    
                    </div>
                  
             
            </form>
          

            <div class="col-1">&nbsp;</div>

            <div class="row">
                <div class="col-md-12">
                    <?php if(!empty( $errors['succes'] ))
                    { ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="alert alert-success" role="alert">
                                        <?php echo $errors['succes'] ?? ''?> 
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    
                    <?php
                    }?>
                </div>
                                    
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php if(!empty( $errors['faild'] ))
                    { ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $errors['faild'] ?? ''?> 
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    
                    <?php
                    }?>
                </div>
                                    
            </div>

        </div>
     

    </div>


    </div>


  
</body>

</html>