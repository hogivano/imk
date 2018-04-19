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
            </div>
            <canvas id="canvas"></canvas>
        </div>
        <div class="login hide">
            <div class="content">
                <div class="content valign-wrapper">
                    <!-- <div class="center-align" style="width: 100%">
                        <button type="button" class="clickme btn-floating btn-large
                        waves-effect waves-light  indigo lighten-2 center-align"
                        name="button">Start</button>
                    </div> -->
                    <h2 id="judulLogin" class="center-align" style="color:white; margin: auto">Login</h1>
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
                        <a href="#!" class="btn-flat" style="color:white">Masuk</a>
                        <a href="#" class="btn-flat" style="color:white">Daftar</a>
                    </div>
                </div>
            </div>
            <canvas id="canvasLogin"></canvas>
        </div>
        <script src="/js/three.js"></script>
        <script src="/js/jquery-3.2.1.js"></script>
        <script src="/js/coba.js"> </script>
    </body>
</html>
