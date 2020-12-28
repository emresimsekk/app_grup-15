<!doctype html>
<html lang="en" class="h-100">

<head>
  <title>Üye Ol </title>
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
   
      <div class="col-lg-7">

        <!-- Form -->
        <form class="border border-light p-5 justify-content-center shadow-lg p-3 mb-5 bg-white rounded" action="" method="POST">

          <p class="h5 mb-5 text-center">HASTA KAYIT</p>

          <!-- Input fields -->
            
          <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                    
                        <input type="email" name="mail" required class="form-control  " value="<?php echo $fields['mail'] ??  $_POST['mail'] ?? ''?>" maxlength="80" minlength="12"
                        placeholder="E-mail">
                        <span class="error"><?php echo $errors['mail'] ?? ''?></span>
                    </div>
                </div>

             
          </div>
          
          <div class="row">
                
                <div class="col-md-12 mb-3">
                    <div class="form-group">
               
                        <input type="text" name="phone" required class="form-control "  value="<?php echo $fields['phone']  ??  $_POST['phone'] ?? ''?>" maxlength="50" minlength="2"
                       placeholder="Telefon">
                        <span class="error"> <?php echo $errors['phone'] ?? ''?></span>
                    </div>
                </div>
                  
              
               
          </div>
          <div class="row">
                
              <div class="col-md-12 mb-3">
                        <div class="form-group">
                      
                            <input type="text" name="ask" required class="form-control  " value="<?php echo $fields['ask'] ?? $_POST['ask'] ?? ''?>" maxlength="50" minlength="2"
                          placeholder="Anne Kızlık Soyadı ">
                            <span class="error"> <?php echo $errors['ask'] ?? ''?></span>
                        </div>
              </div>
          </div>
          <div class="row">
                
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <input type="text" name="name" required class="form-control " required   max="30" min="3" value="<?php echo $fields['name'] ??  $_POST['name'] ?? ''?>" maxlength="50" minlength="2"
                        placeholder="Ad">
                        <span class="error"> <?php echo $errors['name'] ?? ''?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="surname" required class="form-control  " required   max="30" min="3"  value="<?php echo $fields['surname'] ??  $_POST['surname'] ?? ''?>" maxlength="50" minlength="2"
                       placeholder="Soyad">
                        <span class="error"><?php echo $errors['surname'] ?? ''?></span>
                    </div>
                </div>
          </div>
  

        

          <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <input type="password" name="password"  required  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,16}" title="Şifre: 1 büyük 1 küçük ve rakam olmak zorunda !" class="form-control  "  maxlength="16"
                        minlength="8" placeholder="Şifre">
                        <span class="error"><?php echo $errors['password'] ?? ''?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="password" name="passwordtry" required  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,16}" title="Şifre: 1 büyük 1 küçük ve rakam olmak zorunda Max:16 Min:8 !" required class="form-control  " maxlength="16"
                        minlength="8"  placeholder="Şifre Tekrarı">
                        <span class="error"><?php echo $errors['passwordtry'] ?? ''?></span>
                    </div>
                </div>
          </div>
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

        
         

     
          <!-- End input fields -->


          <input class="btn btn-default  btn-block my-4 lg text-light " style="background-color:#4682B4" name="register"
            value="Kayıt Ol" type="submit"></input>

            <a  class="h7 mb-5 mb-5" href="signin">Giriş Yap</a>
           

        </form>
        <!-- Form end -->
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</body>

</html>