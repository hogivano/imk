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
    <div class="" style="height: 100vh; width: 16.6666666667%; background-color: white; position: fixed; z-index: 9999">
        <ul class="collection with-header" style="margin: 0;">
            <li class="collection-header">
                <div class="user-view">
                    <div class="">
                        <div class="center">
                            <img class="circle responsive-img" width="100vh" src="{{ asset('images/avatar.png') }}">
                        </div>
                        <div class="detail center">
                            <p>{{ Session::get('namaAdmin') }}</p>
                            <p style="align: center">{{ Session::get('emailAdmin') }}</p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="collection-item center"><a href="{{route('admin.soal')}}">Soal</a></li>
            <li class="collection-item center"><a href="{{route('admin.bentuk')}}">Bentuk</a></li>
            <li class="collection-item center"><a href="{{route('admin.warna')}}">Warna</a></li>
            <li class="collection-item center"><a href="{{route('admin.keluar')}}">Keluar</a></li>
        </ul>
    </div>
    <div class="main" style="width: 100%; position: absolute; z-index: 9998">
        <div class="row">
            <div class="col s10 offset-s2" style="padding: 0;">
                @yield("content")
            </div>
        </div>
    </div>
    <canvas style="position: fixed" id="canvasDash"></canvas>
</body>
<script src="{{asset('js/three.js')}}"></script>
<script src="{{asset('js/jquery-3.2.1.js')}}"></script>
<script src="{{asset('js/materialize.js')}}"></script>
<script src="{{asset('js/layout-admin.js')}}"></script>
@yield("script")

</html>
