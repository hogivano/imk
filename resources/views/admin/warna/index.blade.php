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
<script>
var rendererDash, sceneDash, cameraDash;

var myCanvasDash = document.getElementById("canvasDash");


rendererDash = new THREE.WebGLRenderer({
    canvas: myCanvasDash, antialias: true
});

rendererDash.setClearColor(0x009658);
rendererDash.setPixelRatio(window.devicePixelRatio);
rendererDash.setSize(window.innerWidth, window.innerHeight);

cameraDash = new THREE.PerspectiveCamera(35, window.innerWidth / window.innerHeight, 0.1, 3000);

sceneDash = new THREE.Scene();

var particlesDash = new THREE.Geometry();

var cloudMaterialDash = new THREE.ParticleBasicMaterial({
    color : 0xffffff,
    size : 1,
    map: THREE.ImageUtils.loadTexture(
    "{{ asset('/images/dot.png')}}"
  ),
  blending: THREE.AdditiveBlending,
  transparent: true
});

var xx, yy, zz;

for (var j = 0; j < 30000; j++) {
    xx = (Math.random() * 600) - 400;
    yy = (Math.random() * 600) - 400;
    zz = (Math.random() * 600) - 400;

    particlesDash.vertices.push (new THREE.Vector3(xx, yy, zz));
}

var particleSystemDash = new THREE.ParticleSystem(particlesDash, cloudMaterialDash);

sceneDash.add(particleSystemDash);

animate();
function animate(){
    requestAnimationFrame( animate );
    render();
}

function render(){
    for (var i = 0; i < 3; i++) {
        particleSystemDash.rotation.y += 0.00001 * i;
        particleSystemDash.rotation.x += 0.00006 * i;
        particleSystemDash.rotation.z += 0.00011 * i;
    }
    rendererDash.render(sceneDash, cameraDash);
}
</script>
@endsection
