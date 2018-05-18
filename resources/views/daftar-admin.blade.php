<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Daftar Admin</title>
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
    <div class="daftaradmin">
        <div class="content">
            <div class="left-align" style="position:absolute; bottom:0; margin-left: 2%; margin-bottom: 2%">
                <a id="tentang" class="waves-effect btn btn-floating">&times;</a>
                <div class="tap-target" data-activates="tentang" data-target="tentang" style="background-color: white; opacity: 0.7">
                    <div class="tap-target-content">
                        <h5>Apa itu MathOlimpic?</h5>
                        <p>Latihan pengerjaan bangun-bangun ruang untuk anak-anak yang competitive. <a href="#">Petunjuk >></a></p>
                    </div>
                </div>
            </div>
            <div class="content valign-wrapper">
                <div id="daftar" class="content valign-wrapper">
                    <div style="margin: auto; width: 40%;border: 1px solid white; background-color: black; opacity: 0.3; padding:10px 30px;">
                        <h3 style="color:white; margin-bottom: 50px;"><b>Daftar Admin</b></h3>
                        <div class="formLogin">
                            <form class="" action="/daftaradmin" method="post">
                                {{ csrf_field() }}
                                <div class="row" style="margin-bottom: 2px">
                                    <div class="input-field ipt col s12">
                                        <input id="nama" name="nama_lengkap" type="text" class="validate">
                                        <label for="nama">Nama Lengkap</label>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 2px">
                                    <div class="input-field ipt col s12">
                                        <input id="email" name="email" type="email" class="validate">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 2px">
                                    <div class="input-field ipt col s12">
                                        <input id="token" name="token" type="text" class="validate">
                                        <label for="token">Token</label>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 2px">
                                    <div class="input-field ipt col s12">
                                        <input id="password" name="password" type="password" class="validate">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 2px">
                                    <div class="input-field ipt col s12">
                                        <input id="rePassword" name="rePassword" type="password" class="validate">
                                        <label for="password">Re-password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <button type="submit" class="" style="color:white; width: 20%; padding: 5px 0; background-color: transparent; border: 1px solid white" name="button">Daftar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <canvas id="canvasDaftarAdmin"></canvas>
        </div>
    </div>
    <script src="/js/three.js"></script>
    <script src="/js/tween.min.js"></script>
    <script src="/js/jquery-3.2.1.js"></script>
    <script src="/js/materialize.js"></script>
    <script src="/js/daftar-admin.js"> </script>
</body>
</html>
