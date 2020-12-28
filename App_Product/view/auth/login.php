<!doctype html>
<html lang="en" class="h-100">

<head>
  <title>Kullanıcı Girişi</title>
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
          <p class="h5 mb-5 text-center">HASTA GİRİŞİ</p>
          <!-- Input fields -->
          <div class="form-group">
            <input type="text" name="mail"  class="form-control " required   title="Mail veya telefon adresi girilmelidir."  value="<?php echo $_POST['mail'] ?? ''?>"
            placeholder="Mail & Telefon ">
          
          </div>
          <div class="form-group">
            <input type="password" name="password" required  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,16}" title="Şifre: 1 büyük 1 küçük ve rakam olmak zorunda !"  class="form-control mb-5 " maxlength="16"
             placeholder="Şifre">
          </div>
          <!-- End input fields -->

          <input class="btn btn-default  btn-block my-4 lg text-light "   style="background-color:#4682B4" name="login" id="login"
            value="Giriş Yap" type="submit"></input>

            </form>
            <?php 
           
           if(!empty( $errors['error'] ))
           { ?>

            <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <div class="alert alert-danger" role="alert">
                          <?php echo $errors['error'] ?? ''?>
                        </div>
                      </div>
                </div>
            </div>
           
           <?php
           }

           ?>
          <div class="row">
           
                <div class="col-md-8">
                  <div class="form-group">
                    <a  class="h7 mb-5 mb-5" href="signup">Kayıt Ol</a>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <a  class="h7 mb-5 mb-5" href="forgot">Şifremi Unuttum </a>
                  </div>
                </div>
            
          </div>
         
          
         
      
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