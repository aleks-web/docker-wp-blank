<?php

$title = get_field('title');
$desc = get_field('desc');
$is_button = get_field('is_button_order');

?>

<section class="hero animate-on-scroll">
    <img class="bg__box_small" src="<?= get_template_directory_uri(); ?>/assets/img/bgSmall.svg" alt="bgSmall">
    <img class="bg__box_big" src="<?= get_template_directory_uri(); ?>/assets/img/bgBig.svg" alt="bgBig">

    <div class="container hero__inner">
        <div class="hero__content">
            <?php if (!empty($title)): ?>
                <h1><?= $title ?></h1>
            <?php endif; ?>

            <?php if (!empty($desc)): ?>
                <p><?= $desc ?></p>
            <?php endif; ?>

            <?php if ($is_button): ?>
                <button class="btn btn--gold btnPopup">ЗАКАЗАТЬ СЕРТИФИКАЦИЮ</button>
            <?php endif; ?>
        </div>

        <div id="webgl-cube" class="hero__image">
            <canvas data-engine="three.js r160" width="431" height="431" style="display: block; width: 480px; height: 480px;"></canvas>
        </div>
    </div>
</section>


<!-- Код куба -->
<!--script type="module">
    import * as THREE from '<?= get_template_directory_uri(); ?>/assets/js/three.module.js';
    import { GLTFLoader } from '<?= get_template_directory_uri(); ?>/assets/js/GLTFLoader.js';
    import { RGBELoader } from '<?= get_template_directory_uri(); ?>/assets/js/RGBELoader.js';

    console.log("здорова я проверка");

    const container = document.getElementById('webgl-cube');

    /* ---------- SCENE ---------- */
    const scene = new THREE.Scene();

    /* ---------- CAMERA ---------- */
    const camera = new THREE.PerspectiveCamera(
        45,
        container.clientWidth / container.clientHeight,
        0.1,
        100
    );
    camera.position.set(0, 0, 5);

    /* ---------- RENDERER ---------- */
    const renderer = new THREE.WebGLRenderer({
        alpha: true,
        antialias: true,
    });
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.outputColorSpace = THREE.SRGBColorSpace;

    renderer.toneMapping = THREE.ACESFilmicToneMapping;
    renderer.toneMappingExposure = 1.25;

    container.appendChild(renderer.domElement);

    /* ---------- ⭐ HDRI ENVIRONMENT ---------- */
    new RGBELoader()
        .load('/models/modern_evening_street_1k.hdr', (texture) => {
            texture.mapping = THREE.EquirectangularReflectionMapping;
            scene.environment = texture;   // 🔥 главное
            scene.background = null;        // фон прозрачный
        });

    /* ---------- LIGHT ---------- */
    /* HDRI делает основную работу, свет — вспомогательный */
    const keyLight = new THREE.DirectionalLight(0xffffff, 3);
    keyLight.position.set(-12, -1, 0);

    const fillLight = new THREE.DirectionalLight(0xffffff, 1.5);
    fillLight.position.set(10, -3, 0);

    const ambient = new THREE.AmbientLight(0x8fa3ff, 0.5);

    scene.add(keyLight, fillLight, ambient);

    /* ---------- MODEL ---------- */
    let cubeModel;
    let modelLoaded = false;
    let initialRotationX = 0;
    let initialRotationY = 0;

    const loader = new GLTFLoader();
    loader.load(
        '/models/cube2.glb',
        (gltf) => {
            cubeModel = gltf.scene;
            cubeModel.scale.set(0.9, 0.9, 0.9);

            // начальный поворот
            cubeModel.rotation.x = THREE.MathUtils.degToRad(16);
            cubeModel.rotation.y = THREE.MathUtils.degToRad(-110);

            initialRotationX = cubeModel.rotation.x;
            initialRotationY = cubeModel.rotation.y;

            // ⭐ усиливаем отражения для всех материалов
            cubeModel.traverse((child) => {
                if (child.isMesh && child.material) {
                    child.material.envMapIntensity = 2.8;
                    child.material.needsUpdate = true;
                }
            });

            scene.add(cubeModel);
            modelLoaded = true;
        },
        undefined,
        (error) => console.error('Ошибка загрузки модели', error)
    );

    /* ---------- MOUSE ---------- */
    let mouseX = 0;
    let mouseY = 0;

    container.addEventListener('mousemove', (e) => {
        const rect = container.getBoundingClientRect();
        mouseX = ((e.clientX - rect.left) / rect.width - 0.5) * 1.5;
        mouseY = ((e.clientY - rect.top) / rect.height - 0.5) * 1.5;
    });

    /* ---------- ANIMATION ---------- */
    let autoRotationTime = 0;
    let mouseInfluenceX = 0;
    let mouseInfluenceY = 0;

    function animate() {
        requestAnimationFrame(animate);

        if (cubeModel && modelLoaded) {
            autoRotationTime += 0.02;

            const autoRange = THREE.MathUtils.degToRad(10);
            const autoRotation = Math.sin(autoRotationTime) * autoRange;

            const mouseSensitivity = 0.3;
            let targetMouseY = mouseX * Math.PI * mouseSensitivity;
            let targetMouseX = mouseY * Math.PI * mouseSensitivity * 0.5;

            const maxMouse = THREE.MathUtils.degToRad(15);
            targetMouseY = THREE.MathUtils.clamp(targetMouseY, -maxMouse, maxMouse);
            targetMouseX = THREE.MathUtils.clamp(targetMouseX, -maxMouse, maxMouse);

            const returnSpeed = 0.03;

            mouseInfluenceX += (targetMouseX - mouseInfluenceX) * 0.1;
            mouseInfluenceX *= (1 - returnSpeed);

            mouseInfluenceY += (targetMouseY - mouseInfluenceY) * 0.1;
            mouseInfluenceY *= (1 - returnSpeed);

            const targetRotationX = initialRotationX + mouseInfluenceX;
            const targetRotationY = initialRotationY + autoRotation + mouseInfluenceY;

            cubeModel.rotation.x += (targetRotationX - cubeModel.rotation.x) * 0.05;
            cubeModel.rotation.y += (targetRotationY - cubeModel.rotation.y) * 0.05;
        }

        renderer.render(scene, camera);
    }

    animate();

    /* ---------- RESIZE ---------- */
    window.addEventListener('resize', () => {
        const width = container.clientWidth;
        const height = container.clientHeight;

        camera.aspect = width / height;
        camera.updateProjectionMatrix();
        renderer.setSize(width, height);
    });

    /* ---------- FALLBACK ---------- */
    if (!renderer.capabilities.isWebGL2) {
        container.innerHTML = `<img src="<?= get_template_directory_uri(); ?>/assets/img/kub.png" alt="Сертификат соответствия" />`;
    }
</script-->