var renderer, scene, camera;
var rendererDash, sceneDash, cameraDash;

var myCanvas = document.getElementById("imgCanvas");
var myCanvasDash = document.getElementById("canvasDash");

renderer = new THREE.WebGLRenderer({
    canvas: myCanvas, antialias: true
});

rendererDash = new THREE.WebGLRenderer({
    canvas: myCanvasDash, antialias: true
});

renderer.setClearColor(0x009688);
renderer.setPixelRatio(window.devicePixelRatio);
renderer.setSize($(".card-image").width(), $(".card-image").width() - 100);

rendererDash.setClearColor(0x000000);
rendererDash.setPixelRatio(window.devicePixelRatio);
rendererDash.setSize(window.innerWidth, window.innerHeight);


camera = new THREE.PerspectiveCamera(35, ($(".card-image").width()) / ($(".card-image").width() - 100), 0.1, 3000);
cameraDash = new THREE.PerspectiveCamera(35, window.innerWidth / window.innerHeight, 0.1, 3000);

scene = new THREE.Scene();
sceneDash = new THREE.Scene();

var geometry = new THREE.BoxGeometry(100, 100, 100);
var material = new THREE.MeshBasicMaterial({
    color: 0xffffff,
    wireframe : true,
    wireframeLinewidth : 2,
    wireframeLinejoin : "round"
});

var mesh = new THREE.Mesh(geometry, material);
mesh.position.z = -300;
mesh.position.x = 0;
mesh.position.y = 0;

scene.add(mesh);

var particles = new THREE.Geometry();
var particlesDash = new THREE.Geometry();

var cloudMaterial = new THREE.ParticleBasicMaterial({
    color : 0xffffff,
    size : 1,
    map: THREE.ImageUtils.loadTexture(
    "../images/dot.png"
  ),
  blending: THREE.AdditiveBlending,
  transparent: true
});

var x, y, z;
for (var i = 0; i < 5000; i++) {
    x = (Math.random() * 1000) - 400;
    y = (Math.random() * 1000) - 400;
    z = (Math.random() * 1000) - 400;

    particles.vertices.push (new THREE.Vector3(x, y, z));
}

for (var j = 0; j < 20000; j++) {
    x = (Math.random() * 800) - 400;
    y = (Math.random() * 800) - 400;
    z = (Math.random() * 800) - 400;

    particlesDash.vertices.push (new THREE.Vector3(x, y, z));
}

var particleSystem = new THREE.ParticleSystem(particles, cloudMaterial);
var particleSystemDash = new THREE.ParticleSystem(particlesDash, cloudMaterial);

scene.add(particleSystem);
sceneDash.add(particleSystemDash);

animate();

function animate(){
    requestAnimationFrame( animate );
	render();
}

function render(){
    mesh.rotation.x += 0.01;
    mesh.rotation.y += 0.001;

    for (var i = 0; i < 3; i++) {
        particleSystem.rotation.y += 0.00001 * i;
        particleSystem.rotation.x += 0.00006 * i;
        particleSystem.rotation.z += 0.00011 * i;

        particleSystemDash.rotation.y += 0.00001 * i;
        particleSystemDash.rotation.x += 0.00006 * i;
        particleSystemDash.rotation.z += 0.00011 * i;
    }

    renderer.render(scene, camera);
    rendererDash.render(sceneDash, cameraDash);
}
