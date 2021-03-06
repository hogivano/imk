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
        <h3 style="color:white; margin-bottom: 30px;" class="center"><b>Soal Baru</b></h3>
        <div class="formLogin">
            <form class="" action="{{ route('admin.soal.create') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field ipt col s6" style="padding-right: 30px">
                        <span class="white-text" style="font-size: 15px">Judul</span>
                        <input id="judul" style="color:white; padding: 0 10px; margin: 0 auto 5px auto; width: 95%" maxlength="20" placeholder="judul" required name="judul" type="text" class="validate">
                        <!-- <label for="pertanyaan">Pertanyaan</label> -->
                    </div>
                    <div class="input-field ipt col s6" style="padding-right: 30px">
                        <span class="white-text" style="font-size: 15px">Poin</span>
                        <input id="poin" style="color:white; padding: 0 10px; margin: 0 auto 5px auto; width: 95%" placeholder="poin" required name="poin" type="number" class="validate">
                        <!-- <input id="judul" style="color:white; width: 30%; margin: auto" maxlength="20" placeholder="poin" required name="poin" type="text" class="validate align-center center center-block"> -->
                        <!-- <label for="pertanyaan">Pertanyaan</label> -->
                    </div>
                </div>
                <div class="row">
                    <div class="input-field ipt col s12">
                        <span class="white-text" style="font-size: 15px;">Pertanyaan</span>
                        <textarea id="pertanyaan" style="color:white; height: 100px; padding: 10px; margin-top: 10px " placeholder="pertanyaan" required name="pertanyaan" type="text" class="validate"></textarea>
                        <!-- <label for="pertanyaan">Pertanyaan</label> -->
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px">
                  <div class="col s6">
                      <div class="row" style="margin-bottom: 0px">
                          <div class="input-field col s12">
                              <select required id="selectBentuk" name="selectBentuk">
                                  <option value="0" disabled selected>Pilih bentuk</option>
                                  <?php
                                    foreach ($bentuk as $i) {
                                        # code...
                                        ?>
                                         <option value="<?php echo $i->id_bentuks ?>"><?php echo $i->bentuk; ?></option>
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
                              <select id="selectWarna" required name="selectWarna">
                                  <option value="0" disabled selected>Pilih warna</option>
                                  <?php
                                    foreach ($warna as $i) {
                                        # code...
                                        ?>
                                         <option value="<?php echo $i->id_warnas ?>"><?php echo $i->warna; ?></option>
                                        <?php
                                    }
                                  ?>
                              </select>
                              <label>Warna</label>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="row white-text center" style="margin-bottom: 5px">
                    Jawaban
                </div>
                <div class="row" style="width: 48%">
                    <div class="col s6">
                        <div class="row">
                            <div class="input-field col s12" style="margin-top: 0px">
                                <input id="jawaban1" type="checkbox" name="check[]" style="align: left" class="filled-in checkJawaban" value="1" />
                                <label style="float:left;"  for="myCheckbox" onclick="jawaban1()">
                                </label>
                                <input style="height: 40px; position:absolute; width: 70%; margin-left: 10px" required type="text" name="jawaban1" class="validate">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12" style="margin-top: 0px">
                                <input id="jawaban2" type="checkbox" name="check[]" style="align: left" class="filled-in checkJawaban" value="2" />
                                <label style="float:left;"  for="myCheckbox" onclick="jawaban2()">
                                </label>
                                <input style="height: 40px; position:absolute; width: 70%; margin-left: 10px" required type="text" name="jawaban2" class="validate">
                            </div>
                        </div>
                    </div>
                    <div class="col s6" style="width: 48%">
                        <div class="row">
                            <div class="input-field col s12" style="margin-top: 0px">
                                <input id="jawaban3" type="checkbox" name="check[]" style="align: left" class="filled-in checkJawaban" value="3" />
                                <label style="float:left;"  for="myCheckbox" onclick="jawaban3()">
                                </label>
                                <input style="height: 40px; position:absolute; width: 70%; margin-left: 10px" required type="text" name="jawaban3" class="validate">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12" style="margin-top: 0px; padding: 0">
                                <div class="row">
                                    <div class="input-field col s12" style="margin-top: 0px">
                                        <input id="jawaban4" type="checkbox" name="check[]" style="align: left" class="filled-in checkJawaban" value="4" />
                                        <label style="float:left;"  for="myCheckbox" onclick="jawaban4()">
                                        </label>
                                        <input style="height: 40px; position:absolute; width: 70%; margin-left: 10px" required type="text" name="jawaban4" class="validate">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    function jawaban1(){
        $('label').removeClass('active');
        if($('#jawaban1').prop('checked')){
            $('#jawaban1').prop('checked', false);
        } else {
            $('.checkJawaban').prop('checked', false);
            $('#jawaban1').prop('checked', true);
        }
    }

    function jawaban2(){
        $('label').removeClass('active');
        if($('#jawaban2').prop('checked')){
            $('#jawaban2').prop('checked', false);
        } else {
            $('.checkJawaban').prop('checked', false);
            $('#jawaban2').prop('checked', true);
        }
    }

    function jawaban3(){
        $('label').removeClass('active');
        if($('#jawaban3').prop('checked')){
            $('#jawaban3').prop('checked', false);
        } else {
            $('.checkJawaban').prop('checked', false);
            $('#jawaban3').prop('checked', true);
        }
    }

    function jawaban4(){
        $('label').removeClass('active');
        if($('#jawaban4').prop('checked')){
            $('#jawaban4').prop('checked', false);
        } else {
            $('.checkJawaban').prop('checked', false);
            $('#jawaban4').prop('checked', true);
        }
    }

    $('input').on('focus', function(){
        $('label').removeClass('active');
    });

    $('input').on('input', function(){
        $('label').removeClass('active');
    });

    $('input').on('blur', function(){
        $('label').removeClass('active');
    });
</script>
@endsection
