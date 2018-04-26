@extends("users.layouts.layout") @section("title") Soal Baru @endsection @section("link")
<style>
    ul {
        top: 10px !important;
    }
</style>
@endsection @section ("content")
<div class="valign-wrapper" style="height: 100vh">
    <?php
        $warna = "";
        $bentuk = "";
        foreach ($soals as $soal) {
            # code...
            $warna = $soal->warnas->hex;
            $bentuk = $soal->bentuks->bentuk;
    ?>
        <div style="width: 70%; margin: auto; border: 1px solid white; background-color: black; opacity: 0.3; padding:10px 30px; box-shadow: 5px 10px #888888;">
            <h4 style="color:white; margin-bottom: 10px;"><b><?php echo $soal->judul ?></b></h4>
            <div class="formLogin">
                <form class="" action="/users/detailsoal/<?php echo $soal->id_soals ?>" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field ipt col s12">
                            <p class="white-text" style="font-size: 24px">
                                <?php echo $soal->pertanyaan; ?>
                            </p>
                        </div>
                    </div>
                    <input type="text" name="poin" value="<?php echo $soal->poin ?>" hidden="true">
                    <input type="text" name="id_soals" value="<?php echo $soal->id_soals ?>" hidden="true">
                    <input type="text" name="id_users" value="{{ Session::get('idUser') }}" hidden="true">
                    <?php
                    $count = 1;
                    foreach ($soal->jawabans as $jawaban) {
                        # code...
                        ?>
                        <div class="row">
                            <div class="input-field col s12" style="margin-top: 0px">
                                <input id="jawaban<?php echo $count; ?>" class="checkbox" value="<?php echo $jawaban->id_jawabans; ?>" type="checkbox" name="jawaban[]" style="align: left" class="filled-in" />
                                <label style="float:left;" onclick="jawaban<?php echo $count; ?>()" for="myCheckbox">
                                    <b> <?php echo $jawaban->jawaban; ?> </b>
                                </label>
                            </div>
                        </div>
                        <?php
                        $count++;
                    }
                ?>
                            <div class="row">
                                <div class="col s12">
                                    <button type="submit" class="" style="color:white; width: 20%; padding: 5px 0; background-color: transparent; border: 1px solid white" name="button">Simpan</button>
                                </div>
                            </div>
                </form>
            </div>
        </div>
        <?php
    }
    ?>
</div>
@endsection @section("script")
<script>
    var rendererDash, sceneDash, cameraDash;

    var myCanvasDash = document.getElementById("canvasLayoutUsers");

    var meshBentuk;
    var meshBentuk2;

    rendererDash = new THREE.WebGLRenderer({
        canvas: myCanvasDash,
        antialias: true
    });

    var str = "<?php echo $warna ?>";
    hex = str.replace("#", "0x");

    rendererDash.setClearColor(parseInt(hex));
    rendererDash.setPixelRatio(window.devicePixelRatio);
    rendererDash.setSize(window.innerWidth, window.innerHeight);

    cameraDash = new THREE.PerspectiveCamera(35, window.innerWidth / window.innerHeight, 0.1, 3000);

    sceneDash = new THREE.Scene();

    var bentuk = "<?php echo $bentuk ?>";
    if (bentuk.includes("lingkaran")){
        meshBentuk = addLingkaran(-30, -10, -7);
        meshBentuk2 = addLingkaran(-30, 17, 7);
    } else if(bentuk.includes("kubus")){
        meshBentuk = addKubus(-170, -60, -40);
        meshBentuk2 = addKubus(-170, 100, 40);
    } else if (bentuk.includes("bola")){
        meshBentuk = addBola(-700, -250, -150);
        meshBentuk2 = addBola(-700, 400, 150);
    } else if (bentuk.includes("tabung")){
        meshBentuk = addTabung(-40, -15, -7);
        meshBentuk2 = addTabung(-40, 25, 7);
    }
    sceneDash.add(meshBentuk);
    sceneDash.add(meshBentuk2);

    var particlesDash = new THREE.Geometry();

    var cloudMaterialDash = new THREE.ParticleBasicMaterial({
        color: 0xffffff,
        size: 1,
        map: THREE.ImageUtils.loadTexture(
            "{{ asset('/images/dot.png')}}"
        ),
        blending: THREE.AdditiveBlending,
        transparent: true
    });

    var xx, yy, zz;

    for (var j = 0; j < 30000; j++) {
        xx = (Math.random() * 800) - 400;
        yy = (Math.random() * 800) - 400;
        zz = (Math.random() * 800) - 400;

        particlesDash.vertices.push(new THREE.Vector3(xx, yy, zz));
    }

    var particleSystemDash = new THREE.ParticleSystem(particlesDash, cloudMaterialDash);

    sceneDash.add(particleSystemDash);

    animate();

    function animate() {
        requestAnimationFrame(animate);
        render();
    }

    function render() {
        for (var i = 0; i < 3; i++) {
            particleSystemDash.rotation.y += 0.00001 * i;
            particleSystemDash.rotation.x += 0.00006 * i;
            particleSystemDash.rotation.z += 0.00011 * i;

            meshBentuk.rotation.y += 0.0005 * i;
            meshBentuk.rotation.x += 0.001 * i;
            meshBentuk.rotation.z += 0.0002 * i;

            meshBentuk2.rotation.y += 0.0004 * i;
            meshBentuk2.rotation.z += 0.001 * i;
            meshBentuk2.rotation.x += 0.0004 * i;
        }
        rendererDash.render(sceneDash, cameraDash);
    }


    function addKubus(x, y, z) {
        var geometry = new THREE.BoxGeometry(32, 32, 32);
        var material = new THREE.MeshBasicMaterial({
            color: 0xffffff,
            wireframe: true,
            wireframeLinewidth: 2,
            wireframeLinejoin: "round"
        });
        var kubus = new THREE.Mesh(geometry, material);
        kubus.position.z = x;
        kubus.position.x = y;
        kubus.position.y = z;

        return kubus;
    }

    function addPersegi() {

    }

    function addSegitiga() {

    }

    function addLingkaran(x, y, z) {
        var geometry = new THREE.CircleGeometry(5, 32);
        var material = new THREE.MeshBasicMaterial({
            color: 0xffffff,
            wireframe: true,
            wireframeLinewidth: 2,
            wireframeLinejoin: "round"
        });
        var circle = new THREE.Mesh(geometry, material);
        circle.position.z = x;
        circle.position.x = y;
        circle.position.y = z;

        return circle;
    }

    function addTabung(x, y ,z) {
        var geometry = new THREE.CylinderGeometry(3, 3, 10, 10);
        var material = new THREE.MeshBasicMaterial({
            color: 0xffffff,
            wireframe: true,
            wireframeLinewidth: 2,
            wireframeLinejoin: "round"
        });
        var tabung = new THREE.Mesh(geometry, material);
        tabung.position.z = x;
        tabung.position.x = y;
        tabung.position.y = z;

        return tabung;
    }

    function addBola(x, y, z) {
        var plane = new THREE.OctahedronGeometry(100, 2);
        var material = new THREE.MeshBasicMaterial({
            color: 0xffffff,
            wireframe: true,
            wireframeLinewidth: 2,
            wireframeLinejoin: "round"
        });
        var planeMesh = new THREE.Mesh(plane, material);
        planeMesh.position.z = x;
        planeMesh.position.x = y;
        planeMesh.position.y = z;

        return planeMesh;
    }
</script>
<script type="text/javascript">
    // $('.filled-in').prop('checked', true);
    $('#selectWarna').material_select();
    $('#selectBentuk').material_select();
    $('#isAgeSelected').on('click', function() {
        console.log('aksa');
        $('.filled-in').prop('checked', true);
        // $(this).attr('checked', 'checked');
    });

    function jawaban1() {
        $('.checkbox').prop('checked', false);
        $('#jawaban1').prop('checked', true);
    }

    function jawaban2() {
        $('.checkbox').prop('checked', false);
        $('#jawaban2').prop('checked', true);
    }

    function jawaban3() {
        $('.checkbox').prop('checked', false);
        $('#jawaban3').prop('checked', true);
    }

    function jawaban4() {
        $('.checkbox').prop('checked', false);
        $('#jawaban4').prop('checked', true);
    }
</script>
@endsection
