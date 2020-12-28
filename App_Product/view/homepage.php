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
                    <li class="list-group-item pb-4 pt-4"><a href="newpassword">Şifre Güncelleme</a></li>
                    <li class="list-group-item pb-4 pt-4"><a href="history">Geçmiş randevular</a></li>
                    <li class="list-group-item pb-4 pt-4"><a href="signin">Çıkış</a></li>
                
                </ul>
            </div>
            <div class="col-1">&nbsp;</div>

            <div class="col-7 border rounded">
                <div class="row">
                    <div class="col-6 mt-5 mb-5">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="title">Şehir :</label>
                                <select name="country" id="country" class="form-control" style="width:350px">
                                    <option value="0" style="font-size:14px">Seçiniz</option>

                                    <?php foreach ($city as $citys): ?>

                                    <option style="font-size:13px" value="<?= $citys['id'] ?>">
                                        <?= $citys['cityName'] ?>
                                    </option>
                                    <?php endforeach; ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">İlçe :</label>
                                <select name="district" id="district" class="form-control" style="width:350px">
                                    <option value="0" style="font-size:14px">Seçiniz</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Hastane :</label>
                                <select name="hospital" id="hospital" class="form-control" style="width:350px">
                                    <option value="0" style="font-size:14px">Seçiniz</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Bölüm :</label>
                                <select name="dep" id="dep" class="form-control" style="width:350px">
                                    <option value="0" style="font-size:14px">Seçiniz</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Doktor :</label>
                                <select name="doctor" id="doctor" class="form-control" style="width:350px">
                                    <option value="0" style="font-size:14px">Seçiniz</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Randevu Günü :</label>
                                <select name="date" id="date" class="form-control" style="width:350px">
                                    <option value="0" style="font-size:14px">Seçiniz</option>
                                </select>
                            </div>
                            <div class="form-group" id="radio">
                                <label for="title">Randevu Saati :</label><br>
                                <select name="time" id="time" class="form-control" style="width:350px">
                                    <option value="0" style="font-size:14px">Seçiniz</option>
                                </select>
                            </div>

                            <div class="form-group mt-5">
                                <input class="btn btn-default  btn-block my-4 lg text-light "
                                    style="background-color:#4682B4" name="addApp" id="addApp" value="Randevu Ekle"
                                    type="submit"></input>
                            </div>
                        </form>


                    </div>
                    <div class="col-6 border  border-top-0 border-bottom-0 border-right-0">

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
                                        if($appList[$i]["actives"]==1)
                                        {
                                            ?>
                                            <form action="" method="POST">
                                            <input type="text" name="appID" hidden value=" <?php echo  $appList[$i]["id"] ?>">
                                                <input class="btn btn-danger  btn-block  my-4 lg text-light "
                                                name="iptal" id="iptal" value="İptal Et"
                                                type="submit"></input>
                                           
                                            </form>
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


    <script>
        $("#district").prop("disabled", true);
        $("#hospital").prop("disabled", true);
        $("#dep").prop("disabled", true);
        $("#doctor").prop("disabled", true);
        $("#date").prop("disabled", true);
        $("#time").prop("disabled", true);
        $("#addApp").prop("disabled", true);
        
        $('#country').change(function () {
            var countryID = $(this).val();

            if (countryID) {

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "http://localhost:3002/api/district?city_id=" + countryID,

                    dataType: "json",
                    success: function (resp) {

                        if (resp) {
                            $("#district").prop("disabled", false);

                            $("#district").empty();
                            $("#district").append('<option>Seçiniz</option>');


                            $("#hospital").empty();
                            $("#hospital").append('<option>Seçiniz</option>');


                            $("#dep").empty();
                            $("#dep").append('<option>Seçiniz</option>');

                            $("#doctor").empty();
                            $("#doctor").append('<option>Seçiniz</option>');
                            $("#date").empty();
                            $("#date").append('<option>Seçiniz</option>');

                            $("#time").empty();
                            $("#time").append('<option>Seçiniz</option>');


                            $.each(resp, function (key, value) {

                                $("#district").append('<option value="' + value.id + '">' +
                                    value.districtName + '</option>');
                            });

                        } else {


                            $("#district").empty();
                            

                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            } else {
                $("#district").empty();
                $("#district").append('<option>Seçiniz</option>');


                $("#hospital").empty();
                $("#hospital").append('<option>Seçiniz</option>');


                $("#dep").empty();
                $("#dep").append('<option>Seçiniz</option>');


                $("#doctor").empty();
                $("#doctor").append('<option>Seçiniz</option>');

                $("#date").empty();
                $("#date").append('<option>Seçiniz</option>');

                $("#time").empty();
                $("#time").append('<option>Seçiniz</option>');
            }
        });

        $('#district').change(function () {
            var districtID = $(this).val();

            if (districtID) {

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "http://localhost:3002/api/hospital?district_id=" + districtID,

                    dataType: "json",
                    success: function (resp) {

                        if (resp) {

                            $("#hospital").prop("disabled", false);

                            $("#hospital").empty();
                            $("#hospital").append('<option>Seçiniz</option>');

                            $("#dep").empty();
                            $("#dep").append('<option>Seçiniz</option>');

                            $("#doctor").empty();
                            $("#doctor").append('<option>Seçiniz</option>');

                            $("#date").empty();
                            $("#date").append('<option>Seçiniz</option>');
                            $("#time").empty();
                            $("#time").append('<option>Seçiniz</option>');
                            $.each(resp, function (key, value) {

                                $("#hospital").append('<option value="' + value.id + '">' +
                                    value.hospitalName + '</option>');
                            });

                        } else {
                            $("#hospital").empty();
                            
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            } else {

                $("#hospital").empty();
                $("#hospital").append('<option>Seçiniz</option>');

                $("#dep").empty();
                $("#dep").append('<option>Seçiniz</option>');

                $("#doctor").empty();
                $("#doctor").append('<option>Seçiniz</option>');
                $("#date").empty();
                $("#date").append('<option>Seçiniz</option>');
                $("#time").empty();
                $("#time").append('<option>Seçiniz</option>');
            }
        });
        $('#hospital').change(function () {
            var hospitalID = $(this).val();

            if (hospitalID) {

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "http://localhost:3002/api/department?hospital_id=" + hospitalID,

                    dataType: "json",
                    success: function (resp) {

                        if (resp) {

                            $("#dep").prop("disabled", false);
                            $("#dep").empty();
                            $("#dep").append('<option>Seçiniz</option>');

                            $("#doctor").empty();
                            $("#doctor").append('<option>Seçiniz</option>');
                            $("#date").empty();
                            $("#date").append('<option>Seçiniz</option>');
                            $("#time").empty();
                            $("#time").append('<option>Seçiniz</option>');
                            $.each(resp, function (key, value) {

                                $("#dep").append('<option value="' + value.id + '">' + value
                                    .depName + '</option>');
                            });

                        } else {
                            $("#dep").empty();
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            } else {
                $("#dep").empty();
                $("#dep").append('<option>Seçiniz</option>');

                $("#doctor").empty();
                $("#doctor").append('<option>Seçiniz</option>');
                $("#date").empty();
                $("#date").append('<option>Seçiniz</option>');
                $("#time").empty();
                $("#time").append('<option>Seçiniz</option>');
            }
        });
        $('#dep').change(function () {
            var departmentID = $(this).val();

            if (departmentID) {

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "http://localhost:3002/api/doctor?dep_id=" + departmentID,

                    dataType: "json",
                    success: function (resp) {

                        if (resp) {



                            $("#doctor").prop("disabled", false);
                            $("#doctor").empty();
                            $("#doctor").append('<option>Seçiniz</option>');
                            $("#date").empty();
                            $("#date").append('<option>Seçiniz</option>');
                            $("#time").empty();
                            $("#time").append('<option>Seçiniz</option>');
                            
                            $.each(resp, function (key, value) {

                                $("#doctor").append('<option value="' + value.id + '">' +
                                    value.doctorName + '</option>');
                            });

                        } else {
                            $("#doctor").empty();
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            } else {
                $("#doctor").empty();
                $("#doctor").append('<option>Seçiniz</option>');
                $("#date").empty();
                $("#date").append('<option>Seçiniz</option>');
                $("#time").empty();
                $("#time").append('<option>Seçiniz</option>');
            }
        });
        $('#doctor').change(function () {
            var doctorID = $(this).val();

            if (doctorID) {

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "http://localhost:3002/api/date?doctor_id=" + doctorID,

                    dataType: "json",
                    success: function (resp) {
                        console.log(resp);
                        if (resp) {

                            $("#date").prop("disabled", false);
                            $("#date").empty();
                            $("#date").append('<option>Seçiniz</option>');

                            $.each(resp, function (key, value) {

                                $("#date").append('<option value="' + value.id + '">' +
                                    value.dateName + '</option>');
                            });;

                        } else {
                            $("#date").empty();
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            } else {

                $("#time").empty();
                $("#time").append('<option>Seçiniz</option>');
            }
        });
        $('#date').change(function () {
            var dateID = $(this).val();

            if (dateID) {
               
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "http://localhost:3002/api/hour?date_id=" + dateID,

                    dataType: "json",
                    success: function (resp) {
                        console.log(resp);
                        if (resp) {

                            $("#time").prop("disabled", false);

                            $("#time").empty();
                            $("#time").append('<option>Seçiniz</option>');

                            $.each(resp, function (key, value) {

                                $("#time").append('<option value="' + value.id + '">' +
                                    value.hourName + '</option>');
                            });;

                        } else {
                            //$("#time").empty();
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            } else {

             
            }
        });
        $('#time').change(function () {
            var timeID = $(this).val();

            if (timeID) {
                $("#addApp").prop("disabled", false);
              
            } else {

             
            }
        });
     
    </script>
</body>

</html>