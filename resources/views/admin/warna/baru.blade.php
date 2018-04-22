@extends("admin.layouts.layout") @section("title") warna baru @endsection @section("link") @section ("content")
<div class="valign-wrapper" style="height: 100vh">
    <div style="margin: auto; width: 40%;border: 1px solid white; background-color: black; opacity: 0.3; padding:80px 30px; box-shadow: 5px 10px #888888;">
        <h3 style="color:white; margin-bottom: 50px;"><b>Warna Baru</b></h3>
        <div class="formLogin">
            <form class="" action="{{ route('admin.warna.create') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field ipt col s12">
                        <input id="warna" required name="warna" type="text" class="validate">
                        <label for="warna">Warna</label>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 5px">
                    <div class="input-field ipt col s12">
                        <input id="hex" required name="hex" type="text" class="validate">
                        <label for="hex">Hex</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <button type="submit" class="" style="color:white; width: 20%; padding: 5px 0; background-color: transparent; border: 1px solid white" name="button">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section("script")
@endsection
