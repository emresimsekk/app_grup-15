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
 
        <div class="row">
            <div class="col-1">&nbsp;</div>
            <div class="col-2" style="background:pink">menü</div>
            <div class="col-8" style="background:red">
                <div class="row">
                    <div class="col-6" style="background:aqua">
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
                            <div class="form-group" id="radio">
                                <label for="title">Randevu Saati :</label><br>
                                <select name="apppoint" id="apppoint" class="form-control" style="width:350px">
                                    <option value="0" style="font-size:14px">Seçiniz</option>
                                </select>

                            </div>

                            <div class="form-group">
                                <input class="btn btn-default  btn-block my-4 lg text-light "
                                    style="background-color:#4682B4" name="addApp" id="addApp" value="Randevu Ekle"
                                    type="submit"></input>
                            </div>
                        </form>


                    </div>
                    <div class="col-6" style="background:pink">

                    <div class="row">
                                  
                  <div class="col-6">
                  
                        <div class="col-3"><?php echo  $appList[0]["citys"]["cityName"] ?></div>
                        <div class="col-3"><?php echo  $appList[0]["districts"]["districtName"] ?></div>

                        <div class="col-12"><?php echo  $appList[0]["hospitals"]["hospitalName"] ?></div>
                        <div class="col-12"><?php echo  $appList[0]["departments"]["depName"] ?></div>
                        <div class="col-12"><?php echo  $appList[0]["doctors"]["doctorName"] ?></div>
                        <div class="col-12"><?php echo  $appList[0]["hours"]["hourName"] ?></div>
                        
                        </div>
                    
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
        $("#apppoint").prop("disabled", true);
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


                            $.each(resp, function (key, value) {

                                $("#district").append('<option value="' + value.id + '">' +
                                    value.districtName + '</option>');
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

                            $.each(resp, function (key, value) {

                                $("#hospital").append('<option value="' + value.id + '">' +
                                    value.hospitalName + '</option>');
                            });

                        } else {
                            $("#hospital").empty();
                            $("#hospital").append('<option>Seçiniz</option>');

                            $("#dep").empty();
                            $("#dep").append('<option>Seçiniz</option>');

                            $("#doctor").empty();
                            $("#doctor").append('<option>Seçiniz</option>');

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

            }
        });
        $('#doctor').change(function () {
            var doctorID = $(this).val();

            if (doctorID) {

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "http://localhost:3002/api/hour?doctor_id=" + doctorID,

                    dataType: "json",
                    success: function (resp) {
                        console.log(resp);
                        if (resp) {

                            $("#apppoint").prop("disabled", false);
                            $("#apppoint").empty();
                            $("#apppoint").append('<option>Seçiniz</option>');

                            $.each(resp, function (key, value) {

                                $("#apppoint").append('<option value="' + value.id + '">' +
                                    value.hourName + '</option>');
                            });;

                        } else {
                            //$("#doctor").empty();
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            } else {


            }
        });
    </script>
</body>

</html>