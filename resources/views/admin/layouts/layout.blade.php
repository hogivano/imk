<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="/css/materialize.css">
    <link rel="stylesheet" href="/css/layout.css">
    <style>
        .collection.with-header .collection-item {
            padding-left: 10px
        }

        .user-view{
            padding: 20px;
        }

        .detail {
            margin-top: 15px;
        }

        .detail p {
            margin: 0;
            color: #009688;
        }
    </style>
     @yield("link")
</head>

<body>
    <div class="main">
        <div class="content">
            <div class="content">
                <div class="row">
                    <div class="col s2" style="padding: 0;">
                        <div class="" style="height: 100vh; background-color: white">
                            <ul class="collection with-header" style="margin: 0;">
                                <li class="collection-header">
                                    <div class="user-view">
                                        <div class="">
                                            <div>
                                                <img class="circle responsive-img" width="100vh" src="images/avatar.png">
                                            </div>
                                            <div class="detail">
                                                <p>1000</p>
                                                <p>Hendriyan Ogivano</p>
                                                <p>hogivano@gmail.com</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="collection-item"><a href="#">Semua Soal</a></li>
                                <li class="collection-item">Soal </li>
                                <li class="collection-item">Alvin</li>
                                <li class="collection-item">Keluar</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col s10" style="padding: 0;">
                        @yield("content")
                    </div>
                </div>
            </div>
            <canvas id="canvasDash"></canvas>
        </div>
    </div>
</body>
<script src="/js/three.js"></script>
<script src="/js/jquery-3.2.1.js"></script>
<script src="/js/materialize.js"></script>
<script src="/js/dashboard.js"></script>
@yield("script")

</html>
