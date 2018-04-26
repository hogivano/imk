<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="{{asset('css/materialize.css')}}">
    <link rel="stylesheet" href="{{asset('css/layout.css')}}">
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
                                                <img class="circle responsive-img" width="100vh" src="{{ asset('images/avatar.png') }}">
                                            </div>
                                            <div class="detail">
                                                <p>admin</p>
                                                <p>hogivano@gmail.com</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="collection-item"><a href="{{route('admin.soal')}}">Soal</a></li>
                                <li class="collection-item"><a href="{{route('admin.bentuk')}}">Bentuk</a></li>
                                <li class="collection-item"><a href="{{route('admin.warna')}}">Warna</a></li>
                                <li class="collection-item"><a href="{{route('admin.keluar')}}">Keluar</a></li>
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
<script src="{{asset('js/three.js')}}"></script>
<script src="{{asset('js/jquery-3.2.1.js')}}"></script>
<script src="{{asset('js/materialize.js')}}"></script>
<script src="{{asset('js/layout-admin.js')}}"></script>
@yield("script")

</html>
