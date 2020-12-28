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
          <p class="h5 mb-5 text-center">ŞİFREMİ UNUTTUM</p>
          <!-- Input fields -->
          <div class="form-group">
            <input type="mail" name="mail" required  class="form-control  " value="<?php echo $_POST['mail'] ?? ''?>"
            placeholder="E-Mail">
          
          </div>
          <div class="form-group">
            <input type="text" name="ask" required  class="form-control mb-5 "  value="<?php echo $_POST['ask'] ?? ''?>" maxlength="16"
             placeholder="Anne Kızlık Soyadı">
          </div>
          <!-- End input fields -->

          <input class="btn btn-default  btn-block my-4 lg text-light " style="background-color:#4682B4" name="login" id="login"
            value="Gönder" type="submit"></input>

            </form>
            <?php 
           
           if(!empty( $errors['succes'] ))
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
          <div class="row">
           
                <div class="col-md-9">
                  <div class="form-group">
                  <a  class="h7 mb-5 mb-5" href="signin">Giriş Yap</a>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                  <a  class="h7 mb-5 mb-5" href="signup">Kayıt Ol</a>
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