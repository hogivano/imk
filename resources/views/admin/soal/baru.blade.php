@extends("admin.layouts.layout") @section("title") Soal Baru @endsection
@section("link")
<style media="screen">
    ul {
        top: 10px !important;
    }
</style>
@endsection
@section ("content")
<div class="valign-wrapper" style="height: 100vh">
    <div style="width: 70%; margin: auto; border: 1px solid white; background-color: black; opacity: 0.3; padding:10px 30px; box-shadow: 5px 10px #888888;">
        <h3 style="color:white; margin-bottom: 10px;"><b>Soal Baru</b></h3>
        <div class="formLogin">
            <form class="" action="{{ route('admin.bentuk.create') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field ipt col s12">
                        <textarea id="pertanyaan" style="color:white; height: 100px; padding: 10px " placeholder="pertanyaan" required name="pertanyaan" type="text" class="validate"></textarea>
                        <!-- <label for="pertanyaan">Pertanyaan</label> -->
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px">
                  <div class="col s6">
                      <div class="row" style="margin-bottom: 0px">
                          <div class="input-field col s12">
                              <select id="selectBentuk">
                                  <option value="" disabled selected>Pilih bentuk</option>
                                  <?php
                                    foreach ($bentuk as $i) {
                                        # code...
                                        ?>
                                         <option value="<?php echo $i->id ?>"><?php echo $i->bentuk; ?></option>
                                        <?php
                                    }
                                  ?>
                              </select>
                              <label>Bentuk</label>
                          </div>
                      </div>
                  </div>
                  <div class="col s6">
                      <div class="row" style="margin-bottom: 0px">
                          <div class="input-field col s12">
                              <select id="selectWarna">
                                  <option value="" disabled selected>Pilih warna</option>
                                  <?php
                                    foreach ($warna as $i) {
                                        # code...
                                        ?>
                                         <option value="<?php echo $i->id ?>"><?php echo $i->warna; ?></option>
                                        <?php
                                    }
                                  ?>
                              </select>
                              <label>Warna</label>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="row white-text" style="margin-bottom: 5px">
                    Jawaban
                </div>
                <div class="row" style="width: 48%">
                    <div class="col s6">
                        <div class="row">
                            <div class="input-field col s12" style="margin-top: 0px">
                                <input type="checkbox" name="check[]" style="align: left" class="filled-in" />
                                <label style="float:left;"  for="myCheckbox">
                                    <input id="jawaban" style="height: 1rem" required type="text" name="jawaban0" class="validate">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12" style="margin-top: 0px">
                                <input type="checkbox" name="check[]" style="align: left" class="filled-in" />
                                <label style="float:left;"  for="myCheckbox">
                                    <input id="jawaban" style="height: 1rem" required type="text" name="jawaban1" class="validate">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col s6" style="width: 48%">
                        <div class="row">
                            <div class="input-field col s12" style="margin-top: 0px">
                                <input type="checkbox" name="check[]" style="align: left" class="filled-in" />
                                <label style="float:left;"  for="myCheckbox">
                                    <input id="jawaban" style="height: 1rem" required type="text" name="jawaban2" class="validate">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12" style="margin-top: 0px; padding: 0">
                                <div class="row">
                                    <div class="col s6" style="margin: 0">
                                        <input type="checkbox" id="jawaban4"/>
                                        <label style="float:left;"  for="myCheckbox" onclick="jawaban4()">
                                        </label>
                                    </div>
                                    <div class="col s6" style="padding: 0; margin: auto">
                                        <input id="jawaban" style="height: 1rem; margin-bottom: 5px" required type="text" name="jawaban3" class="validate">
                                    </div>
                                </div>
                            </div>
                        </div>
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
<script>
var rendererDash, sceneDash, cameraDash;

var myCanvasDash = document.getElementById("canvasDash");


rendererDash = new THREE.WebGLRenderer({
    canvas: myCanvasDash, antialias: true
});

rendererDash.setClearColor(0x009688);
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
<script type="text/javascript">
    // $('.filled-in').prop('checked', true);
    $('#selectWarna').material_select();
    $('#selectBentuk').material_select();
    $('#isAgeSelected').on('click', function(){
        console.log('aksa');
        $('.filled-in').prop('checked', true);
        // $(this).attr('checked', 'checked');
    });
    function jawaban4(){
        $('#jawaban4').prop('checked', true);
    }
</script>
@endsection
