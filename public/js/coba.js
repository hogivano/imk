var renderer, scene, camera;
var rendererMenu, sceneMenu, cameraMenu;

var myCanvas = document.getElementById("canvas");
var canvasMenu = document.getElementById("canvasLogin");

renderer = new THREE.WebGLRenderer({
    canvas: myCanvas, antialias: true
});

rendererMenu = new THREE.WebGLRenderer({
    canvas: canvasMenu, antialias : true, alpha: true
});

renderer.setClearColor(0x7d5fff);
renderer.setPixelRatio(window.devicePixelRatio);
renderer.setSize(window.innerWidth, window.innerHeight);

rendererMenu.setClearColor(0x009688);
rendererMenu.setPixelRatio(window.devicePixelRatio);
rendererMenu.setSize(window.innerWidth, window.innerHeight);

camera = new THREE.PerspectiveCamera(35, window.innerWidth / window.innerHeight, 0.1, 3000);
cameraMenu = new THREE.PerspectiveCamera(35, window.innerWidth / window.innerHeight, 0.1, 3000);

scene = new THREE.Scene();
sceneMenu = new THREE.Scene();

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
mesh.position.x = -400;
mesh.position.y = 100;

scene.add(mesh);

var box = new THREE.BoxGeometry(100, 100, 100);
var mesh2 = new THREE.Mesh(box, material);
mesh2.position.z = -600;
mesh2.position.x = 400;
mesh2.position.y = -100;

scene.add(mesh2);

var kotak = new THREE.PlaneGeometry(100, 100);
var mesh3 = new THREE.Mesh(kotak, material);
mesh3.position.z = -1500;
mesh3.position.x = 350;
mesh3.position.y = 200;
scene.add(mesh3);

var bulat = new THREE.RingGeometry(50,80,3);
var mesh4 = new THREE.Mesh(bulat, material);
mesh4.position.z = -1500;
mesh4.position.x = -400;
mesh4.position.y = -250;
scene.add(mesh4);

var circle = new THREE.CircleGeometry(100, 100,100);
var circleMesh = new THREE.Group(circle, material);
circleMesh.position.z = -1500;
circleMesh.position.x = 300;
circleMesh.position.y = 200;
sceneMenu.add(circleMesh);

var particles = new THREE.Geometry();
var particlesMenu = new THREE.Geometry();

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
for (var i = 0; i < 20000; i++) {
    x = (Math.random() * 800) - 400;
    y = (Math.random() * 800) - 400;
    z = (Math.random() * 800) - 400;

    particles.vertices.push (new THREE.Vector3(x, y, z));
}

for (var j = 0; j < 5000; j++) {
    x = (Math.random() * 800) - 400;
    y = (Math.random() * 800) - 400;
    z = (Math.random() * 800) - 400;

    particlesMenu.vertices.push (new THREE.Vector3(x, y, z));
}

var particleSystem = new THREE.ParticleSystem(particles, cloudMaterial);
var particleSystemMenu = new THREE.ParticleSystem(particlesMenu, cloudMaterial);

scene.add(particleSystem);
sceneMenu.add(particleSystemMenu);

animate();
setJudul();

function animate(){
    requestAnimationFrame( animate );
	render();
}

function render(){
    mesh.rotation.x += 0.01;
    mesh.rotation.y += 0.001;

    mesh2.rotation.x += 0.01;
    mesh2.rotation.y += 0.001;

    mesh3.rotation.z += 0.001;
    mesh3.rotation.y += 0.008;

    mesh4.rotation.z += 0.001;
    mesh4.rotation.y += 0.008;

    for (var i = 0; i < 3; i++) {
        particleSystem.rotation.y += 0.00001 * i;
        particleSystem.rotation.x += 0.00006 * i;
        particleSystem.rotation.z += 0.00011 * i;

        particleSystemMenu.rotation.y += 0.00001 * i;
        particleSystemMenu.rotation.x += 0.00006 * i;
        particleSystemMenu.rotation.z += 0.00011 * i;
    }

    TWEEN.update();

    renderer.render(scene, camera);
    rendererMenu.render(sceneMenu, cameraMenu);
}

function setJudul(){
    $('#judul').delay(20).animate({'opacity' : 1}, function(){
        $('#judul').animate({'opacity': 0}, 20, function(){
            $(this).text("asah kemampuanmu").animate({opacity:1},function(){
                $(this).delay(30).animate({opacity:0},function(){
                    $(this).text("untuk menjadi yang terhebat").animate({opacity:1},function(){
                        $(this).delay(30).animate({opacity:0},function(){
                            $(this).text("di").animate({opacity:1},function(){
                                $(this).delay(30).animate({opacity:0},function(){
                                    $(this).text("MathOlimpic").animate({opacity:1},function(){
                                        showButton();
                                    });
                                });
                            });
                        });
                    });
                });
            });
        });
    });
}

function showButton(){
    $('#btn-menu').fadeIn(3000);
}

$('#tentang').on('click', function(){
    $('.tap-target').tapTarget('open');
});

$('#keluar').on('click', function(){
    $('.login').fadeOut();
    $('.home').fadeIn();
});

$('#btnMasuk').on('click', function(){
    $('#masuk').css('top', '0');
    $('#daftar').css('top', '100%');

    $('.home').fadeOut();
    $('.login').fadeIn();
    // $('.home').addClass('hide');
    // $('.login').removeClass('hide');
});
$('#btnDaftar').on('click', function(){
    $('#masuk').css('top', '-100%');
    $('#daftar').css('top', '0');
    $('.home').fadeOut();
    $('.login').fadeIn();
    // $('.home').addClass('hide');
    // $('.login').removeClass('hide');
});

$('#aDaftar').on('click', function(){
    $('#masuk').animate({
        top: '-100%'
    }, 1000);
    $('#daftar').animate({
        top: '0'
    }, 1000);

    new TWEEN.Tween(rendererMenu.setClearColor(0x009688)).to(rendererMenu.setClearColor(0x000000))
					.easing( TWEEN.Easing.Elastic.Out).start();
});

$('#aMasuk').on('click', function(){
    $('#daftar').animate({
        top: '100%'
    }, 1000);

    $('#masuk').animate({
        top: '0'
    }, 1000);
});
