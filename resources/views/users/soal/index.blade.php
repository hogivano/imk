@extends("users.layouts.layout") @section("title") Soal @endsection @section("link") @section ("content")
<div class="">
    <div class="row">
        <h4 class="white-text" style="margin-bottom: 20px">Ayo Kerjakan Semua Soal dan <br> Jadilah Yang Terbaik!!!</h4>
<?php
    $bentukSoals = array();
    foreach ($soals as $i) {
        # code...
        $cekSelesai = false;
        foreach ($soalSelesai as $j) {
            # code...
            if ($i->id_soals == $j->id_soals){
                $cekSelesai = true;
                break;
            }
        }

        if ($cekSelesai){
?>
        <div class="col s3">
            <div class="card">
                <div class="card-image div-warna waves-effect waves-block waves-light">
                    <canvas id="canvas_<?php echo $i->bentuks->bentuk; ?>" class="bentukCanvas"></canvas>
                    <img src="{{ asset('images/selesai.png')}}" style=" padding: 3px; right: 0; bottom: 0; height: 50px; width: 50px; position: absolute !important; z-index: 999" alt="">
                </div>
                <div class="card-content" style="padding: 10px">
                    <span class="card-title activator grey-text text-darken-4"><?php echo $i->judul; ?></span>
                    <p style="text-align: right; margin-top: 10px"> <span><?php echo $i->poin ?> poin</span></p>
                </div>
                <div class="card-reveal">
                    <p><?php echo $i->pertanyaan; ?></p>
                    <span class="card-title grey-text text-darken-4"><i>&times;</i></span>
                </div>
            </div>
        </div>
<?php
        } else {
?>
        <div class="col s3">
            <div class="card">
                <div class="card-image div-warna waves-effect waves-block waves-light">
                    <canvas id="canvas_<?php echo $i->bentuks->bentuk; ?>" class="bentukCanvas"></canvas>
                    <!-- <img src="{{ asset('images/selesai.png')}}" style=" padding: 3px; right: 0; bottom: 0; height: 50px; width: 50px; position: absolute !important; z-index: 999" alt=""> -->
                </div>
                <div class="card-content" style="padding: 10px">
                    <span class="card-title activator grey-text text-darken-4">
                        <u>
                            <a style="color:black" href="/users/detailsoal/<?php echo $i->id_soals ?>"><?php echo $i->judul; ?></a>
                        </u>
                    </span>
                    <p style="text-align: right; margin-top: 10px"> <span><?php echo $i->poin ?> poin</span></p>
                </div>
            </div>
        </div>
<?php
        }
    }
?>
    </div>
</div>
@endsection
@section("script")
<script>
var rendererDash, sceneDash, cameraDash;

var myCanvasDash = document.getElementById("canvasLayoutUsers");


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

    var rendererSoal = [], cameraSoal = [], sceneSoal= [];
    var myCanvas =  [], idCanvas = [];
    var particlesSoal = [], particleSystemSoal = [];
    var mesh = [];
    var warna = [];
    var count = 0;
    var hex = "";

    <?php
        foreach ($soals as $soal) {
            # code...
            ?>
                myCanvas[count] = document.getElementById("canvas_<?php echo $soal->bentuks->bentuk; ?>");
                idCanvas[count] = "canvas_<?php echo $soal->bentuks->bentuk ?>";

                var str = "<?php echo $soal->warnas->hex ?>";
                hex = str.replace("#", "0x");
                warna[count] = hex;
                count++;
            <?php
        }
    ?>

    var cloudMaterial = new THREE.ParticleBasicMaterial({
        color : 0xffffff,
        size : 2,
        map: THREE.ImageUtils.loadTexture(
        "{{ asset('/images/dot.png')}}"
      ),
      blending: THREE.AdditiveBlending,
      transparent: true
    });

    var x, y, z;

    for (var i = 0; i < count; i++) {
        rendererSoal[i] = new THREE.WebGLRenderer({
            canvas: myCanvas[i], antialias: true
        });

        rendererSoal[i].setClearColor(parseInt(warna[i]));
        rendererSoal[i].setPixelRatio(window.devicePixelRatio);
        rendererSoal[i].setSize($('.card-image').width() , $('.card-image').height());

        cameraSoal[i] = new THREE.PerspectiveCamera(35, $('.card-image').width() / $('.card-image').height(), 0.1, 3000);

        sceneSoal[i] = new THREE.Scene();

        particlesSoal[i] = new THREE.Geometry();

        for (var j = 0; j < 20000; j++) {
            x = (Math.random() * 800) - 400;
            y = (Math.random() * 800) - 400;
            z = (Math.random() * 800) - 400;

            particlesSoal[i].vertices.push (new THREE.Vector3(x, y, z));
        }

        particleSystemSoal[i] = new THREE.ParticleSystem(particlesSoal[i], cloudMaterial);

        if (idCanvas[i].includes("lingkaran")){
            mesh[i] = addLingkaran();
        } else if(idCanvas[i].includes("kubus")){
            mesh[i] = addKubus();
            // console.log(myCanvas[i]);
        } else if (idCanvas[i].includes("bola")){
            mesh[i] = addBola();
        } else if (idCanvas[i].includes("tabung")){
            mesh[i] = addTabung();
        }

        sceneSoal[i].add(particleSystemSoal[i]);
        sceneSoal[i].add(mesh[i]);


        if (i == count-1){
            animate();
        }
    }

    function animate(){
        requestAnimationFrame( animate );
    	render();
    }

    function render(){
        for (var i = 0; i < 3; i++) {
            for (var j = 0; j < count; j++) {
                particleSystemSoal[j].rotation.y += 0.00001 * i;
                particleSystemSoal[j].rotation.x += 0.00006 * i;
                particleSystemSoal[j].rotation.z += 0.00011 * i;

                mesh[j].rotation.y += 0.001 * i+j*0.001;
                mesh[j].rotation.x += 0.001 * i+j*0.001;
            }
        }
        for (var k = 0; k < count; k++) {
            rendererSoal[k].render(sceneSoal[k], cameraSoal[k]);
        }

        for (var i = 0; i < 3; i++) {
            particleSystemDash.rotation.y += 0.00001 * i;
            particleSystemDash.rotation.x += 0.00006 * i;
            particleSystemDash.rotation.z += 0.00011 * i;
        }
        rendererDash.render(sceneDash, cameraDash);
    }
    console.log(count);

    function addKubus(){
        var geometry = new THREE.BoxGeometry( 32, 32, 32 );
        var material = new THREE.MeshBasicMaterial({
            color: 0xffffff,
            wireframe : true,
            wireframeLinewidth : 2,
            wireframeLinejoin : "round"
        });
        var kubus = new THREE.Mesh( geometry, material );
        kubus.position.z = -100;
        kubus.position.x = 0;
        kubus.position.y = 0;

        return kubus;
    }

    function addPersegi(){

    }

    function addSegitiga(){

    }

    function addLingkaran(){
        var geometry = new THREE.CircleGeometry( 5, 32 );
        var material = new THREE.MeshBasicMaterial({
            color: 0xffffff,
            wireframe : true,
            wireframeLinewidth : 2,
            wireframeLinejoin : "round"
        });
        var circle = new THREE.Mesh( geometry, material );
        circle.position.z = -20;
        circle.position.x = 0;
        circle.position.y = 0;

        return circle;
    }

    function addTabung(){
        var geometry = new THREE.CylinderGeometry(3 , 3, 10, 10);
        var material = new THREE.MeshBasicMaterial({
            color: 0xffffff,
            wireframe : true,
            wireframeLinewidth : 2,
            wireframeLinejoin : "round"
        });
        var tabung = new THREE.Mesh( geometry, material );
        tabung.position.z = -20;
        tabung.position.x = 0;
        tabung.position.y = 0;

        return tabung;
    }

    function addBola(){
        var plane = new THREE.OctahedronGeometry(100, 2);
        var material = new THREE.MeshBasicMaterial({
            color: 0xffffff,
            wireframe : true,
            wireframeLinewidth : 2,
            wireframeLinejoin : "round"
        });
        var planeMesh = new THREE.Mesh(plane, material);
        planeMesh.position.z = -380;
        planeMesh.position.x = 3;
        planeMesh.position.y = 5;

        return planeMesh;
    }
</script>
@endsection
