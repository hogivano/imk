var renderer, scene, camera;

var myCanvas = document.getElementById("canvasLayoutUsers");

renderer = new THREE.WebGLRenderer({
    canvas: myCanvas, antialias: true
});

renderer.setClearColor(0x7d5fff);
renderer.setPixelRatio(window.devicePixelRatio);
renderer.setSize(window.innerWidth, window.innerHeight);

camera = new THREE.PerspectiveCamera(35, window.innerWidth / window.innerHeight, 0.1, 3000);

scene = new THREE.Scene();

var light = new THREE.AmbientLight(0xffffff, 0.5);

scene.add(light);

var light2 = new THREE.PointLight(0xffffff, 0.5);
scene.add(light2);

var geometry = new THREE.BoxGeometry(100, 100, 100);
var material = new THREE.MeshBasicMaterial({
    color: 0xffffff,
    wireframe : true,
    wireframeLinewidth : 2,
    wireframeLinejoin : "round"
});

var mesh = new THREE.Mesh(geometry, material);
mesh.position.z = -600;
mesh.position.x = -250;
mesh.position.y = 100;

scene.add(mesh);

var box = new THREE.BoxGeometry(100, 100, 100);
var mesh2 = new THREE.Mesh(box, material);
mesh2.position.z = -600;
mesh2.position.x = 400;
mesh2.position.y = -100;

scene.add(mesh2);

// var kotak = new THREE.PlaneGeometry(100, 100);
// var mesh3 = new THREE.Mesh(kotak, material);
// mesh3.position.z = -1500;
// mesh3.position.x = 350;
// mesh3.position.y = 200;
// scene.add(mesh3);
//
// var bulat = new THREE.RingGeometry(50,80,3);
// var mesh4 = new THREE.Mesh(bulat, material);
// mesh4.position.z = -1500;
// mesh4.position.x = -400;
// mesh4.position.y = -250;
// scene.add(mesh4);
//
// var plane = new THREE.OctahedronGeometry(100, 2);
// var planeMesh = new THREE.Mesh(plane, material);
// planeMesh.position.z = -1500;
// planeMesh.position.x = 300;
// planeMesh.position.y = 200;
// scene.add(planeMesh);

var particles = new THREE.Geometry();

var cloudMaterial = new THREE.ParticleBasicMaterial({
    color : 0xffffff,
    size : 2,
    map: THREE.ImageUtils.loadTexture(
    "../images/dot.png"
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

scene.add(particleSystem);

animate();

function animate(){
    requestAnimationFrame( animate );
	render();
}

function render(){
    mesh.rotation.x += 0.01;
    mesh.rotation.y += 0.001;

    mesh2.rotation.x += 0.01;
    mesh2.rotation.y += 0.001;

    // mesh3.rotation.z += 0.001;
    // mesh3.rotation.y += 0.008;
    //
    // mesh4.rotation.z += 0.001;
    // mesh4.rotation.y += 0.008;
    //
    // planeMesh.rotation.x += 0.001;
    // planeMesh.rotation.y += 0.001;

    for (var i = 0; i < 3; i++) {
        particleSystem.rotation.y += 0.00001 * i;
        particleSystem.rotation.x += 0.00006 * i;
        particleSystem.rotation.z += 0.00011 * i;
    }

    renderer.render(scene, camera);
}
