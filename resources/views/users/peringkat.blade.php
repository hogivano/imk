@extends("users.layouts.layout") @section("title") Peringkat @endsection @section("link") @section ("content")
<div class="">
    <div class="row">
        <div class="">
            <p class="white-text center">Anda sekarang diposisi ke :</p>
            <h2 class="white-text center" style="margin-bottom: 40px; margin-top: 10px" id="posisiku"></h2>
        </div>
        <table class="centered" style="color:white; ">
            <thead style="border-top: 1px solid white;">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Poin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                foreach ($poinUser as $i) {
                    # code...
                    if ($count < 8){
                        ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $i->users->nama_lengkap ?></td>
                            <td><?php echo $i->users->email ?></td>
                            <td><?php echo $i->poin_users ?></td>
                        </tr>
                        <?php
                    }
                    if ($i->id_users == $idUser){
                        $pos = $count . ". " . $namaUser;
                    }
                    $count++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
@endsection @section("script")
<script>
    var renderer, scene, camera;
    var rendererDash, sceneDash, cameraDash;

    var myCanvasDash = document.getElementById("canvasLayoutUsers");


    rendererDash = new THREE.WebGLRenderer({
        canvas: myCanvasDash,
        antialias: true
    });

    rendererDash.setClearColor(0x7d5fff);
    rendererDash.setPixelRatio(window.devicePixelRatio);
    rendererDash.setSize(window.innerWidth, window.innerHeight);

    cameraDash = new THREE.PerspectiveCamera(35, window.innerWidth / window.innerHeight, 0.1, 3000);

    sceneDash = new THREE.Scene();

    var material = new THREE.MeshBasicMaterial({
        color: 0xffffff,
        wireframe : true,
        wireframeLinewidth : 2,
        wireframeLinejoin : "round"
    });

    var box = new THREE.BoxGeometry(100, 100, 100);
    var mesh2 = new THREE.Mesh(box, material);
    mesh2.position.z = -600;
    mesh2.position.x = 400;
    mesh2.position.y = -100;

    sceneDash.add(mesh2);

    var kotak = new THREE.PlaneGeometry(100, 100);
    var mesh3 = new THREE.Mesh(kotak, material);
    mesh3.position.z = -1500;
    mesh3.position.x = 700;
    mesh3.position.y = 380;
    sceneDash.add(mesh3);

    var bulat = new THREE.RingGeometry(50,80,3);
    var mesh4 = new THREE.Mesh(bulat, material);
    mesh4.position.z = -1500;
    mesh4.position.x = -600;
    mesh4.position.y = -400;
    sceneDash.add(mesh4);

    var plane = new THREE.OctahedronGeometry(100, 2);
    var planeMesh = new THREE.Mesh(plane, material);
    planeMesh.position.z = -1500;
    planeMesh.position.x = 10;
    planeMesh.position.y = 100;
    sceneDash.add(planeMesh);

    var particles = new THREE.Geometry();

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
    for (var i = 0; i < 20000; i++) {
        x = (Math.random() * 800) - 400;
        y = (Math.random() * 800) - 400;
        z = (Math.random() * 800) - 400;

        particles.vertices.push (new THREE.Vector3(x, y, z));
    }

    var particleSystem = new THREE.ParticleSystem(particles, cloudMaterial);

    sceneDash.add(particleSystem);

    animateLayout();

    function animateLayout() {
        requestAnimationFrame(animateLayout);
        renderLayout();
    }

    function renderLayout() {

        for (var i = 0; i < 3; i++) {
            particleSystem.rotation.y += 0.00001 * i;
            particleSystem.rotation.x += 0.00006 * i;
            particleSystem.rotation.z += 0.00011 * i;

            mesh2.rotation.x += 0.01;
            mesh2.rotation.y += 0.001;

            mesh3.rotation.z += 0.001;
            mesh3.rotation.y += 0.008;

            mesh4.rotation.z += 0.001;
            mesh4.rotation.y += 0.008;

            planeMesh.rotation.x += 0.001;
            planeMesh.rotation.y += 0.001;

            // meshTabung.rotation.x += 0.0001 * i;
            // meshTabung.rotation.y += 0.0001 * i;
            // meshTabung.rotation.z += 0.0001 * i;
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
        tabung.position.z = x;
        tabung.position.x = y;
        tabung.position.y = z;

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
        tabung.position.z = x;
        tabung.position.x = y;
        tabung.position.y = z;

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
        var planeMesh = new THREE.Mesh(plane, material);
        tabung.position.z = x;
        tabung.position.x = y;
        tabung.position.y = z;

        return planeMesh;
    }

    $("#posisiku").text("<?php echo $pos ?>");
</script>
@endsection
