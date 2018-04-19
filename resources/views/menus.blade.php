<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Menus</title>
    <link rel="stylesheet" href="/css/materialize.css">
    <link rel="stylesheet" href="/css/layout.css">
    <link rel="stylesheet" href="/css/menus.css">
</head>

<body>
    <div class="">
        <div class="content">
            <div class="content valign-wrapper">
                <div style="margin: auto; width: 40%;border: 1px solid white; padding:80px 30px">
                    <h3 style="color:white; margin-bottom: 50px"><b>LOGIN</b></h3>
                    <div class="formLogin">
                        <form class="" action="index.html" method="post">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="email" type="email" class="validate">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
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
        <canvas id="canvas"></canvas>
    </div>
</body>
<script src="/js/three.js"></script>
<script src="/js/jquery-3.2.1.js"></script>
<script src="/js/menus.js"></script>

</html>
