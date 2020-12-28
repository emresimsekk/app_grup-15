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
                <div class="col-12 border rounded">
                    <div class="row">
                        <div class="col-6 mt-5 ">
                            <div class="form-group">
                                <label for="title">Mail :</label>
                                <input type="email" class="form-control" name="mail"  value="<?php echo  $userInfo['user'][0]['mail'] ??  $_POST['mail'] ?? ''?>">
                            </div>
                            <span class="error"><?php echo $errors['mail'] ?? ''?></span>
                        </div>
                        <div class="col-6 mt-5 ">
                            <div class="form-group">
                                <label for="title">Ad :</label>
                                <input type="text" class="form-control" name="name"  value="<?php echo  $userInfo['user'][0]['userinfos']['name'] ??  $_POST['name'] ?? ''?>">
                            </div>
                            <span class="error"><?php echo $errors['name'] ?? ''?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mt-3 ">
                            <div class="form-group">
                                <label for="title">Soyad :</label>
                                <input type="text" class="form-control" name="surname"  value="<?php echo  $userInfo['user'][0]['userinfos']['surname'] ??  $_POST['surname'] ?? ''?>" >
                            </div>
                            <span class="error"><?php echo $errors['surname'] ?? ''?></span>
                        </div>
                        <div class="col-6 mt-3 ">
                            <div class="form-group">
                                <label for="title">Telefon :</label>
                                <input type="text" class="form-control" name="phone"  required pattern="(5)([0-9]{2})([0-9]{3})([0-9]{2})([0-9]{2})" max="10" title="Başında sıfır olmadan giriniz. (53********)" value="<?php echo  $userInfo['user'][0]['phone'] ??  $_POST['phone'] ?? ''?>" >
                            </div>
                            <span class="error"><?php echo $errors['phone'] ?? ''?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mt-3 ">
                            <div class="form-group">
                                <label for="title">Güvenlik Sorusu :</label>
                                <input type="text" class="form-control" name="ask"  value="<?php echo  $userInfo['user'][0]['ask'] ??  $_POST['ask'] ?? ''?>" >
                            </div>
                            <span class="error"><?php echo $errors['ask'] ?? ''?></span>
                        </div>
                    </div>
               
                    <div class="row">
                        <div class="col-12 mt-5 ">
                            <div class="form-group">
                                <input class="btn btn-default  btn-block my-4 lg text-light " data-toggle="modal" data-target="#exampleModal" style="background-color:#4682B4" name="update" value="Güncelle" ></input>
                            </div>
                        </div>
                    
                    </div>
                    <div class="row">
                    <div class="col-12 mt-5 ">
                        <?php if(!empty($succes)):?>
                            <div class="alert alert-success" role="alert">
                                Kayıt başarıyla güncellendi.
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($faild)):?>
                            <div class="alert alert-danger" role="alert">
                                Eski şifrenizi hatalı girdiniz. Lütfen tekrar deneyiniz.
                            </div>
                        <?php endif; ?>
                        </div>
                       
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Bilgilerinizi Güncellemek İstediğinize Emin misiniz?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Kapat">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title">Eski Şifre:</label>
                                    <input type="password" name="lastPassword" class="form-control"  >
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                <input class="btn btn-primary  " style="background-color:#4682B4" name="update" value="Güncelle" type="submit" ></input>
                            </div>
                            </div>
                        </div>
                    </div>
           
                </div>
            </form>

            <div class="col-1">&nbsp;</div>



        </div>

    </div>


    </div>


  
</body>

</html>