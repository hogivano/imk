@extends("admin.layouts.layout") @section("title") Warna @endsection
@section("link")
@section ("content")
<div class="">
    <a href="{{route('admin.warna.baru')}}" class="btn-flat btnBaru">Warna Baru</a>
    <div class="row">
<?php
    foreach ($warna as $i) {
        # code...
?>
        <div class="col s3">
            <div class="card">
                <div class="card-image div-warna waves-effect waves-block waves-light" style="background-color: <?php echo $i->hex ?>">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4"><?php echo $i->warna; ?></span>
                    <p class="link"><a href="/admin/warna/edit/<?php echo $i->id_warnas; ?>" class="left">Edit</a> <a href="" class="right">Hapus</a></p>
                </div>
            </div>
        </div>
<?php
    }
?>
    </div>
</div>
@endsection @section("script")
@endsection
