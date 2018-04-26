@extends("admin.layouts.layout") @section("title") Bentuk @endsection
@section("link")
@section ("content")
<div class="">
    <a href="{{route('admin.bentuk.baru')}}" class="btn-flat btnBaru">Bentuk Baru</a>
    <div class="row">
<?php
    foreach ($bentuk as $i) {
        # code...
?>
        <div class="col s3">
            <div class="card">
                <div class="card-image div-warna waves-effect waves-block waves-light">
                    <canvas id="canvas_<?php echo $i->bentuk; ?>" class="bentukCanvas"></canvas>
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4"><?php echo $i->bentuk; ?></span>
                    <p class="link"><a href="/admin/bentuk/edit/<?php echo $i->id_bentuks; ?>" class="left">Edit</a> <a href="" class="right">Hapus</a></p>
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

rendererDash.setClearColor(0x009699);
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

    var rendererBentuk = [], cameraBentuk = [], sceneBentuk= [];
    var myCanvas =  [], idCanvas = [];
    var particlesBentuk = [], particleSystemBentuk = [];
    var mesh = [];
    var count = 0;

    <?php
        foreach ($bentuk as $bt) {
            # code...
            ?>
                myCanvas[count] = document.getElementById("canvas_<?php echo $bt->bentuk; ?>");
                idCanvas[count] = "canvas_<?php echo $bt->bentuk ?>";
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
        rendererBentuk[i] = new THREE.WebGLRenderer({
            canvas: myCanvas[i], antialias: true
        });

        rendererBentuk[i].setClearColor(0x009668);
        rendererBentuk[i].setPixelRatio(window.devicePixelRatio);
        rendererBentuk[i].setSize($('.card-image').width() , $('.card-image').height());

        cameraBentuk[i] = new THREE.PerspectiveCamera(35, $('.card-image').width() / $('.card-image').height(), 0.1, 3000);

        sceneBentuk[i] = new THREE.Scene();

        particlesBentuk[i] = new THREE.Geometry();

        for (var j = 0; j < 20000; j++) {
            x = (Math.random() * 800) - 400;
            y = (Math.random() * 800) - 400;
            z = (Math.random() * 800) - 400;

            particlesBentuk[i].vertices.push (new THREE.Vector3(x, y, z));
        }

        particleSystemBentuk[i] = new THREE.ParticleSystem(particlesBentuk[i], cloudMaterial);

        if (idCanvas[i].includes("lingkaran")){
            mesh[i] = addLingkaran();
        } else if(idCanvas[i].includes("kubus")){
            mesh[i] = addKubus();
            // console.log(myCanvas[i]);
        } else if (idCanvas[i].includes("bola")){
            mesh[i] = addBola();
        } else {
            mesh[i] = addTabung();
        }

        sceneBentuk[i].add(particleSystemBentuk[i]);
        sceneBentuk[i].add(mesh[i]);


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
                particleSystemBentuk[j].rotation.y += 0.00001 * i;
                particleSystemBentuk[j].rotation.x += 0.00006 * i;
                particleSystemBentuk[j].rotation.z += 0.00011 * i;

                mesh[j].rotation.y += 0.001 * i+j*0.001;
                mesh[j].rotation.x += 0.001 * i+j*0.001;
            }

            particleSystemDash.rotation.y += 0.00001 * i;
            particleSystemDash.rotation.x += 0.00006 * i;
            particleSystemDash.rotation.z += 0.00011 * i;
        }
        for (var k = 0; k < count; k++) {
            rendererBentuk[k].render(sceneBentuk[k], cameraBentuk[k]);
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
        planeMesh.position.z = -500;
        planeMesh.position.x = 5;
        planeMesh.position.y = 10;

        return planeMesh;
    }
</script>
@endsection
