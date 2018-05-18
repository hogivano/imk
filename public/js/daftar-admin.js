var renderer, scene, camera;

var myCanvas = document.getElementById("canvasDaftarAdmin");

renderer = new THREE.WebGLRenderer({
    canvas: myCanvas, antialias: true
});

renderer.setClearColor(0x099999);
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

var particles = new THREE.Geometry();

var cloudMaterial = new THREE.ParticleBasicMaterial({
    color : 0xffffff,
    size : 2,
    map: THREE.ImageUtils.loadTexture(
    "images/dot.png"
  ),
  blending: THREE.AdditiveBlending,
  transparent: true
});

var x, y, z;
for (var i = 0; i < 10000; i++) {
    x = (Math.random() * 800) - 400;
    y = (Math.random() * 800) - 400;
    z = (Math.random() * 800) - 400;

    particles.vertices.push (new THREE.Vector3(x, y, z));
}

var particleSystem = new THREE.ParticleSystem(particles, cloudMaterial);

scene.add(particleSystem);

animate();
setJudul();

function animate(){
    requestAnimationFrame( animate );
	render();
}

function render(){

    for (var i = 0; i < 3; i++) {
        particleSystem.rotation.y += 0.00001 * i;
        particleSystem.rotation.x += 0.00006 * i;
        particleSystem.rotation.z += 0.00011 * i;
    }

    renderer.render(scene, camera);
}
