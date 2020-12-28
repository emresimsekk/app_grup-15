<!doctype html>
<html lang="en" class="h-100">

<head>
  <title>Şifremi Unuttum</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/c7f47f9021.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/base.css">
</head>

<body class="h-100">
  <div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">

      <div class="col-lg-5">

        <!-- Form -->
       
          <form action="" id="infoForm" method="POST">
          <p class="h5 mb-5 text-center">ŞİFRE GÜNCELLEME</p>
          <!-- Input fields -->
          <div class="form-group">
            <input type="password" name="password"  required  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,16}" title="Şifre: 1 büyük 1 küçük ve rakam olmak zorunda !" class="form-control " value="<?php echo $_POST['mail'] ?? ''?>"
            placeholder="Şifre">
          
          </div>
          <div class="form-group">
            <input type="password" name="passwordTry"  required  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,16}" title="Şifre: 1 büyük 1 küçük ve rakam olmak zorunda !" class="form-control mb-5 " maxlength="16"
             placeholder="Şifre Onay">
          </div>
          <!-- End input fields -->

          <input class="btn btn-default  btn-block my-4 lg text-light " style="background-color:#4682B4" name="login" id="login"
            value="Güncelle" type="submit"></input>

            </form>
            <?php 
           
           if(!empty( $errors['succes'] ))
           { ?>

            <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <div class="alert alert-success" role="alert">
                            <?php echo $errors['succes'] ?? ''?>  <a  class="h7 mb-5 mb-5" href="/App_Product/signin">Giriş Yap</a>
                          </div>
                      </div>
                </div>
                
            </div>
           
           <?php
           }
           if(!empty( $errors['faild'] ))
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
           }

           ?>

        <!-- Form end -->
      </div>
    </div>
  </div>


  <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
</body>







</html>