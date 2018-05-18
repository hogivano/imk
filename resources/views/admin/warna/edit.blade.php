@extends("admin.layouts.layout") @section("title") warna baru @endsection @section("link") @section ("content")
<div class="valign-wrapper" style="height: 100vh">
    <div style="margin: auto; width: 40%;border: 1px solid white; background-color: black; opacity: 0.3; padding:80px 30px; box-shadow: 5px 10px #888888;" class="center">
        <h3 style="color:white; margin-bottom: 50px; center"><b>Warna Baru</b></h3>
        <div class="formLogin">
            <form class="" action="{{ url('admin/warna/update') }}" method="post">
                {{ csrf_field() }}
                <?php
                foreach ($warna as $i) {
                    # code...
                ?>
                <input type="text" hidden="true" name="id_warnas" value="<?php echo $i->id_warnas ?>">
                <div class="row">
                    <div class="input-field ipt col s12">
                        <input id="warna" required name="warna" type="text" value="<?php echo $i->warna ?>" class="validate">
                        <label for="warna">Warna</label>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 5px">
                    <div class="input-field ipt col s12">
                        <input id="hex" required name="hex" value="<?php echo $i->hex ?>" type="text" class="validate">
                        <label for="hex">Hex</label>
                    </div>
                </div>
                <?php
                }
                ?>
                <div class="row">
                    <div class="col s12 center">
                        <button type="submit" class="" style="color:white; width: 20%; padding: 5px 0; background-color: transparent; border: 1px solid white" name="button">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section("script")
<script>
var rendererDash, sceneDash, cameraDash;

var myCanvasDash = document.getElementById("canvasDash");

rendererDash = new THREE.WebGLRenderer({
    canvas: myCanvasDash, antialias: true
});

rendererDash.setClearColor(0x009668);
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
