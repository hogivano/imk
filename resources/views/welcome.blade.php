<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Try Theree Dimensional</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/materialize.css">
    <link rel="stylesheet" href="/css/layout.css">
    <link rel="stylesheet" href="/css/home.css">
    <meta name="_token" content="{{ csrf_token() }}" />
    <!-- Styles -->
    <style>
        .clickme {
            width: 150px !important;
            height: 150px !important;
            font-size: 20px !important;
        }
    </style>
</head>

<body>
    <?php
        if (isset($msg)){
            ?>
            <script>
                var msg = "<?php echo $msg ?>";
                console.log(msg);
                var snacbar = document.getElementById('snacbar');
                // $("#snackbar").append(msg);
            </script>
            <?php
        }
    ?>
    <div class="home">
        <div class="content">
            <div class="content valign-wrapper">
                <!-- <div class="center-align" style="width: 100%">
                        <button type="button" class="clickme btn-floating btn-large
                        waves-effect waves-light  indigo lighten-2 center-align"
                        name="button">Start</button>
                    </div> -->
                <h2 id="judul" class="center-align" style="color:white; margin: auto">kini kami hadir</h1>
                    <!-- <div class="center-align" style="width: 100%">
                        <button type="button" class="clickme btn-floating btn-large
                        waves-effect waves-light  indigo lighten-2 center-align"
                        name="button">Masuk</button>
                    </div>
                    <div class="center-align" style="width: 100%">
                        <button type="button" class="clickme btn-floating btn-large
                        waves-effect waves-light  indigo lighten-2 center-align"
                        name="button">Daftar</button>
                    </div> -->
            </div>
            <div id="btn-menu" class="content valign-wrapper" style="display:none">
                <div class="center-align" style="width:100%; margin-top: 100px">
                    <button id="btnMasuk" class="btn-flat" style="color:white">Masuk</button>
                    <a href="#" id="btnDaftar" class="btn-flat" style="color:white">Daftar</a>
                </div>
            </div>
            <div class="left-align" style="position:absolute; bottom:0; margin-left: 2%; margin-bottom: 2%">
                <a id="tentang" class="waves-effect btn btn-floating">+</a>
                <div class="tap-target" data-activates="tentang" data-target="tentang" style="background-color: white; opacity: 0.7">
                    <div class="tap-target-content">
                        <h5>Apa itu MathOlimpic?</h5>
                        <p>Latihan pengerjaan bangun-bangun ruang untuk anak-anak yang competitive. <a href="#">Petunjuk >></a></p>
                    </div>
                </div>
            </div>
            <canvas id="canvas"></canvas>
        </div>
    </div>
    <div class="login" style="display:none">
        <div class="content">
            <div id="masuk" class="content valign-wrapper">
                <div style="margin: auto; width: 40%;border: 1px solid white; background-color: black; opacity: 0.3; padding:80px 30px; box-shadow: 5px 10px #888888;">
                    <h3 style="color:white; margin-bottom: 50px;"><b>Masuk</b></h3>
                    <div class="formLogin">
                        <form class="" action="/" method="post">

                            <div class="row">
                                <div class="input-field ipt col s12">
                                    <input id="emailLogin" pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*" title="contact's email (format: example@host.com)" name="email" type="text" class="validate">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 5px">
                                <div class="input-field ipt col s12">
                                    <input id="passwordLogin" name="password" type="password" class="validate">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 left-align">
                                    <span>Belum memiliki akun ? <a id="aDaftar" href="#">Daftar</a></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <button id="btnLogin" type="button" class="" style="color:white; width: 20%; padding: 5px 0; background-color: transparent; border: 1px solid white" name="button">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="daftar" class="content valign-wrapper" style="top: 100%">
                <div style="margin: auto; width: 40%;border: 1px solid white; background-color: black; opacity: 0.3; padding:10px 30px;">
                    <h3 style="color:white; margin-bottom: 50px;"><b>Daftar</b></h3>
                    <div class="formLogin">
                        <form class="" action="/daftar" method="post">
                            {{ csrf_field() }}
                            <div class="row" style="margin-bottom: 5px">
                                <div class="input-field ipt col s12">
                                    <input id="nama" name="nama_lengkap" type="text" class="validate">
                                    <label for="nama">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 5px">
                                <div class="input-field ipt col s12">
                                    <input id="email" name="email" type="text" pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*" title="contact's email (format: example@host.com)" class="validate">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div id="divPass" class="row" style="margin-bottom: 5px">
                                <div class="input-field ipt col s12">
                                    <input id="password" name="password" type="password" class="validate">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div id="divRePass" class="row" style="margin-bottom: 5px">
                                <div class="input-field ipt col s12">
                                    <input id="rePassword" name="rePassword" min="8" type="password" class="validate">
                                    <label for="password">Re-password</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 left-align">
                                    <span>Sudah memiliki akun ? <a id="aMasuk" href="#">Masuk</a></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <button id="btnSignUp" type="button" class="" style="color:white; width: 20%; padding: 5px 0; background-color: transparent; border: 1px solid white" name="button">Daftar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="left-align" style="position:absolute; bottom:0; margin-left: 2%; margin-bottom: 2%">
                <a id="keluar" class="waves-effect btn btn-floating">x</a>
            </div>
            <canvas id="canvasLogin"></canvas>
        </div>
    </div>
    <div id="snackbar">msg</div>
    <script src="/js/three.js"></script>
    <script src="/js/tween.min.js"></script>
    <script src="/js/jquery-3.2.1.js"></script>
    <script src="/js/materialize.js"></script>
    <script src="/js/coba.js"> </script>
    <script>
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        });

        $("#btnLogin").on("click", function(e){
            e.preventDefault(e);

            var formData = {
                _token : $("input[name=_token]").val(),
                email : $("#emailLogin").val(),
                password : $("#passwordLogin").val()
            };

            $.ajax({
                type : "post",
                url : "{{ url('/') }}",
                data : formData,
                success : function (data) {
                    if ((data.errors)){
                        // alert("data error");
                        $("#snackbar").html("email atau password anda salah");
                        var x = document.getElementById("snackbar");

                        // Add the "show" class to DIV
                        x.className = "show";

                        // After 3 seconds, remove the show class from DIV
                        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                        console.log(data);
                    } else {
                        if (data == 'users'){
                            window.location.replace("{{ url('/users/dashboard') }}");
                        } else {
                            window.location.replace("{{ url('/admin/dashboard') }}");
                        }
                    }
                },
                error : function (data) {
                    console.log("Error", data);
                    console.log(formData);
                },
            });
        });

        $("#btnSignUp").on("click", function(e){
            e.preventDefault(e);
            console.log("masuk btn daftar");
            var formData = {
                _token : $("input[name=_token]").val(),
                nama_lengkap : $("#nama").val(),
                email : $("#email").val(),
                password : $("#password").val(),
                rePassword : $("#rePassword").val()
            };

            $.ajax({
                type : "post",
                url : "{{ url('/daftar') }}",
                data : formData,
                success : function (data) {
                    if ((data.errors)){
                        // alert("data error");
                        $("#snackbar").html("akun gagal, silahkan cek kembali");
                        var x = document.getElementById("snackbar");

                        // Add the "show" class to DIV
                        x.className = "show";

                        // After 3 seconds, remove the show class from DIV
                        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                        console.log(data);
                    } else {
                        console.log(data);
                        if (data == 'berhasil'){
                            $('#daftar').animate({
                                top: '100%'
                            }, 1000);

                            $('#masuk').animate({
                                top: '0'
                            }, 1000);

                            new TWEEN.Tween(rendererMenu.setClearColor(0x009699)).to(rendererMenu.setClearColor(0x009668))
                        					.easing( TWEEN.Easing.Elastic.Out).start();

                            $("#snackbar").html("silahkan login");
                            var x = document.getElementById("snackbar");

                            // Add the "show" class to DIV
                            x.className = "show";

                            // After 3 seconds, remove the show class from DIV
                            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                        } else {
                            $("#snackbar").html("password dan rePassword harus sama");
                            var x = document.getElementById("snackbar");

                            // Add the "show" class to DIV
                            x.className = "show";

                            // After 3 seconds, remove the show class from DIV
                            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                        }
                        // if (data == 'users'){
                        //     window.location.replace("{{ url('/users/dashboard') }}");
                        // } else {
                        //     window.location.replace("{{ url('/admin/dashboard') }}");
                        // }
                    }
                },
                error : function (data) {
                    console.log("Error", data);
                    console.log(formData);
                },
            });
        });

        $("#divRePass").on('keyup', function(){
            if ($("#password").val() != $("#rePassword")){
                $("#divRePass").addClass("has-error");
            } else {
                $("#divRePass").removeClass("has-error");
            }
        });


        // function myFunction() {
    // Get the snackbar DIV
            // var x = document.getElementById("snackbar");
            //
            // // Add the "show" class to DIV
            // x.className = "show";
            //
            // // After 3 seconds, remove the show class from DIV
            // setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        // }
    </script>
</body>
</html>
