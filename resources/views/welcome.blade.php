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
            <div id="btn-menu" class="content valign-wrapper" style="opacity: 0">
                <div class="center-align" style="width:100%; margin-top: 100px">
                    <a href="#" class="btn-flat" style="color:white">Masuk</a>
                    <a href="#" class="btn-flat" style="color:white">Daftar</a>
                </div>
            </div>
            <div class="left-align" style="position:absolute; bottom:0; margin-left: 2%; margin-bottom: 2%">
                <a id="tentang" class="waves-effect btn btn-floating">+</a>
                <div class="tap-target" data-activates="tentang" data-target="tentang" style="background-color: white; opacity: 0.7">
                    <div class="tap-target-content">
                        <h5>Apa itu MathOlimpic?</h5>
                        <p>Latihan pengerjaan bangun-bangun ruang untuk anak-anak yang competitive</p>
                    </div>
                </div>
            </div>
            <canvas id="canvas"></canvas>
        </div>
    </div>
    <div class="login hide">
        <div class="content">
            <div class="content valign-wrapper">
                <div style="margin: auto; width: 40%;border: 1px solid white; background-color: black; opacity: 0.3; padding:80px 30px">
                    <h3 style="color:white; margin-bottom: 50px;"><b>LOGIN</b></h3>
                    <div class="formLogin">
                        <form class="" action="index.html" method="post">
                            <div class="row">
                                <div class="input-field ipt col s12">
                                    <input id="email" type="email" class="validate">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field ipt col s12">
                                    <input id="password" type="password" class="validate">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <button type="button" class="btn-flat" style="color:white; width: 30%" name="button">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <canvas id="canvasLogin"></canvas>
    </div>
        <script src="/js/three.js"></script>
        <script src="/js/jquery-3.2.1.js"></script>
        <script src="/js/materialize.js"></script>
        <script src="/js/coba.js"> </script>
</body>
</html>
