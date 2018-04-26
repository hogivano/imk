@extends("users.layouts.layout") @section("title") testing @endsection @section("link") @section ("content")
<div class="valign-wrapper" style="height: 100vh; background-color:rgba(255, 255, 255, 0);">
    <h2 class="white-text align-center" style="width: 100%">Selamat Datang <br> {{ Session::get('namaUser') }}</h2>
</div>
@endsection
@section("script")
<script src="/js/dashboard-users.js"></script>
@endsection
