<?php include './includes/header.php';?>
<?php include './includes/modal.php';?>



<!-- Герой-секция -->
  <section class="hero animate-on-scroll">
    <img class="bg__box_small" src="/css/img/bgSmall.svg" alt="">
    <img class="bg__box_big" src="/css/img/bgBig.svg" alt="">
    <div class="container hero__inner">
      <div class="hero__content">
        <h1>От сертификации — <br>к доверию и партнёрству</h1>
        <p>В то время как другие сосредоточены на чём-то одном, «НОВА» видит картину целиком: мы — ваш единый центр компетенций для всех видов сертификации и декларирования, от пожарной безопасности до добровольных стандартов, с собственной лабораторией и доверием лидеров рынка, ведь большее доверие начинается с правильного выбора партнёра.</p>
        <button class="btn btn--gold btnPopup">ЗАКАЗАТЬ СЕРТИФИКАЦИЮ</button>
      </div>
      <!-- Блок Куба -->
      <div id="webgl-cube" class="hero__image">
        <!-- <img src="/css/img/kub.png" alt="Сертификат соответствия" /> -->
      </div>
    </div>
  </section>






<!-- Код куба -->
<script type="module">
 import * as THREE from '/js/three.module.js';
  import { GLTFLoader } from '/js/GLTFLoader.js';
  


  console.log("здорова я проверка");




  const container = document.getElementById('webgl-cube');

  const scene = new THREE.Scene();

  const camera = new THREE.PerspectiveCamera(
    45,
    container.clientWidth / container.clientHeight,
    0.1,
    100
  );
  
	let modelLoaded = false;
	let initialRotationY = 0;
	let initialRotationX = 0; // Для начального поворота по X
  
  camera.position.set(0, 0, 5);

  const renderer = new THREE.WebGLRenderer({
    alpha: true,
    antialias: true,
  });
  renderer.setSize(container.clientWidth, container.clientHeight);
  renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
  renderer.outputColorSpace = THREE.SRGBColorSpace;
  
  renderer.toneMapping = THREE.ACESFilmicToneMapping; // Придает "киношный" вид
	// Можно регулировать интенсивность эффекта (по умолчанию 1.0)
	renderer.toneMappingExposure = 1.5;
  
  container.appendChild(renderer.domElement);

  const keyLight = new THREE.DirectionalLight(0xffffff, 12);
  keyLight.position.set(-12, -1,0); 
 const fillLight = new THREE.DirectionalLight(0xffffff, 7);
  fillLight.position.set(10, -3, 0); 
  const ambient = new THREE.AmbientLight(0x8fa3ff, 2);
  ambient.position.set(2, 15,-10);
  
  scene.add(keyLight, fillLight, ambient);    

  let cubeModel;
  const loader = new GLTFLoader();
loader.load(
  '/models/cube2.glb',
  (gltf) => {
    cubeModel = gltf.scene;
    cubeModel.scale.set(0.9, 0.9, 0.9);
    
    // НАЧАЛЬНЫЙ ПОВОРОТ (в радианах)
    const initialRotationXDeg = 16; // 30° по X
    const initialRotationYDeg = -110; // -90° по Y
    
    cubeModel.rotation.x = initialRotationXDeg * (Math.PI / 180);
    cubeModel.rotation.y = initialRotationYDeg * (Math.PI / 180);
    
    // Запоминаем начальные положения
    initialRotationX = cubeModel.rotation.x;
    initialRotationY = cubeModel.rotation.y;
		
    modelLoaded = true;
    scene.add(cubeModel);
    
    console.log('Начальные углы:', {
      x: initialRotationX * (180/Math.PI) + '°',
      y: initialRotationY * (180/Math.PI) + '°'
    });
  },
  undefined,
  (error) => { console.error('Ошибка загрузки модели', error); }
); 

  let mouseX = 0;
  let mouseY = 0;
  container.addEventListener('mousemove', (e) => {
    const rect = container.getBoundingClientRect();
    mouseX = ((e.clientX - rect.left) / rect.width - 0.5) * 1.5;
    mouseY = ((e.clientY - rect.top) / rect.height - 0.5) * 1.5;
  });





let autoRotationTime = 0;
let mouseInfluenceX = 0; // Отдельная переменная для влияния мыши по X
let mouseInfluenceY = 0; // Для плавного возврата по Y тоже

function animate() {
  requestAnimationFrame(animate);
  
  if (cubeModel && modelLoaded) {
    // 1. АВТОКОЛЕБАНИЯ по Y
    autoRotationTime += 0.02;
    const autoRange = 10 * (Math.PI / 180);
    const autoRotation = Math.sin(autoRotationTime) * autoRange;
    
    // 2. Получаем влияние мыши
    const mouseSensitivity = 0.3;
    let targetMouseY = mouseX * Math.PI * mouseSensitivity;
    let targetMouseX = mouseY * Math.PI * mouseSensitivity * 0.5;
    
    // 3. Ограничиваем влияние мыши
    const maxMouseInfluence = 15 * (Math.PI / 180);
    targetMouseY = Math.max(-maxMouseInfluence, Math.min(maxMouseInfluence, targetMouseY));
    targetMouseX = Math.max(-maxMouseInfluence, Math.min(maxMouseInfluence, targetMouseX));
    
    // 4. ПЛАВНЫЙ ВОЗВРАТ влияния мыши к нулю (когда мышку убрали)
    const returnSpeed = 0.03; // Скорость возврата (0.01 = медленно, 0.1 = быстро)
    
    // По X: возвращаем к 0 (начальное положение по X = initialRotationX)
    mouseInfluenceX += (targetMouseX - mouseInfluenceX) * 0.1; // Плавное следование за мышью
    mouseInfluenceX *= (1 - returnSpeed); // Постепенное уменьшение к 0
    
    // По Y: возвращаем к 0 (но автовращение остаётся)
    mouseInfluenceY += (targetMouseY - mouseInfluenceY) * 0.1;
    mouseInfluenceY *= (1 - returnSpeed);
    
    // 5. ФИНАЛЬНЫЕ УГЛЫ
    // По X: начальный + остаточное влияние мыши (которое само вернётся к 0)
    let targetRotationX = initialRotationX + mouseInfluenceX;
    
    // По Y: начальный + автоколебания + остаточное влияние мыши
    let targetRotationY = initialRotationY + autoRotation + mouseInfluenceY;
    
    // 6. Ограничения (если нужны)
    const totalMaxRotation = 90 * (Math.PI / 180);
    targetRotationY = Math.max(
      initialRotationY - totalMaxRotation,
      Math.min(initialRotationY + totalMaxRotation, targetRotationY)
    );
    
    // 7. Плавная интерполяция модели к целевым углам
    cubeModel.rotation.x += (targetRotationX - cubeModel.rotation.x) * 0.05;
    cubeModel.rotation.y += (targetRotationY - cubeModel.rotation.y) * 0.05;
  }
  
  renderer.render(scene, camera);
} 







  animate();

  window.addEventListener('resize', () => {
    const width = container.clientWidth;
    const height = container.clientHeight;
    camera.aspect = width / height;
    camera.updateProjectionMatrix();
    renderer.setSize(width, height);
  });

  if (!renderer.capabilities.isWebGL2) {
    container.innerHTML = `<img src="/css/img/kub.png" alt="Сертификат соответствия" />`;
  }
</script> 

  <!-- Партнеры -->
  <section class="partners animate-on-scroll">
    <div class="container">
      <div class="container__partners">
        <div class="container__partners_text">
          <h2>Наши партнеры — <br>наша особая гордость.</h2>
          <p>Мы не просто работаем с крупными российскими и международными компаниями — мы ценим и дорожим сотрудничеством с каждой из них. Их высокие стандарты делают нас лучше, а наша надёжность помогает им расти. Это партнёрство, которым можно гордиться.</p>
        </div>
        <div class="partners__grid">
          <!-- Пример логотипов -->
          <div class="partner-logo"><img src="/css/img/part1.png" alt="IEK" /></div>
          <div class="partner-logo"><img src="/css/img/part2.png" alt="IEK" /></div>
          <div class="partner-logo"><img src="/css/img/part3.png" alt="IEK" /></div>
          <div class="partner-logo"><img src="/css/img/part4.png" alt="IEK" /></div>
          <div class="partner-logo"><img src="/css/img/part5.png" alt="IEK" /></div>
          <div class="partner-logo"><img src="/css/img/part6.png" alt="IEK" /></div>
          <div class="partner-logo"><img src="/css/img/part7.png" alt="IEK" /></div>
          <div class="partner-logo"><img src="/css/img/part8.png" alt="IEK" /></div>
          <div class="partner-logo"><img src="/css/img/part9.png" alt="IEK" /></div>
          <div class="partner-logo"><img src="/css/img/part10.png" alt="IEK" /></div>
          <div class="partner-logo"><img src="/css/img/part11.png" alt="IEK" /></div>
          <div class="partner-logo"><img src="/css/img/part12.png" alt="IEK" /></div>
          <div class="partner-logo"><img src="/css/img/part13.png" alt="IEK" /></div>
          <div class="partner-logo"><img src="/css/img/part14.png" alt="IEK" /></div>
          <div class="partner-logo"><img src="/css/img/part15.png" alt="IEK" /></div>
          <div class="partner-logo"><img src="/css/img/part16.png" alt="IEK" /></div>
          <div class="partner-logo"><img src="/css/img/part17.png" alt="IEK" /></div>
          <div class="partner-logo"><img src="/css/img/part18.png" alt="IEK" /></div>
          <div class="partner-logo"><img src="/css/img/part19.png" alt="IEK" /></div>
          <div class="partner-logo"><img src="/css/img/part20.png" alt="IEK" /></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Решаем проблемы -->
  <section class="solutions animate-on-scroll">
    <img class="bg__box_small" src="/css/img/bgSmall.svg" alt="">
    <img class="bg__box_big" src="/css/img/bgBig.svg" alt="">
    <div class="container">
      <h2>Мы не создаем проблемы, мы их решаем</h2>
      <p>Получите не просто документ, а надежного партнера, который берет на себя все сложности.</p>
      <div class="solutions__grid">
        <div class="solution-card">
          <img src="/css/img/Rectangle 7.png" alt="Скорость и вовлеченность" />
          <h3>Скорость и вовлеченность</h3>
          <p><span>Быстрые ответы и полное погружение в задачу.</span><br><br> Мы не просто исполнители. Мы — ваши заинтересованные представители, которые действуют оперативно и нацелены исключительно на ваш результат.</p>
        </div>
        <div class="solution-card">
          <img src="/css/img/Rectangle 8.png" alt="Документы «под ключ»" />
          <h3>Документы «под ключ»</h3>
          <p><span>Сбор, подготовка и разработка всей необходимой документации.</span><br><br> От технических условий и регламентов до внутренних стандартов предприятия. Мы создаем полный, безупречный пакет документов с нуля.</p>
        </div>
        <div class="solution-card">
          <img src="/css/img/Rectangle 9.png" alt="Проактивный мониторинг" />
          <h3>Проактивный мониторинг</h3>
          <p><span>Мы следим за рынком, а вы — в тренде.</span><br><br> Наши эксперты круглосуточно отслеживают изменения законодательства, стандартов и тенденций. Вы получаете актуальные решения и защиту от неожиданных нововведений.</p>
        </div>
        <div class="solution-card">
          <img src="/css/img/Rectangle 10.png" alt="Работаем на ваше время" />
          <h3>Работаем на ваше время</h3>
          <p><span>Круглосуточный процесс и ускоренные сроки.</span><br><br> Наши лаборатории и офисы работают в интенсивном режиме. Мы ценим ваше время и делаем всё, чтобы сроки выпуска документов были минимальными.</p>
        </div>
        <div class="solution-card">
          <img src="/css/img/Rectangle 11.png" alt="Полный логистический сервис" />
          <h3>Полный логистический сервис</h3>
          <p><span>Забудьте о сложной отправке образцов.</span><br><br> Мы организуем и берем на себя всю логистику: от корректного отбора проб до их безопасной и своевременной доставки в аккредитованные лаборатории.</p>
        </div>
        <div class="solution-card solution-card--highlight">
          <div class="solution-card__badge">
            <img src="/css/img/logo.svg" alt="НОВА" />
          </div>
          <h3>Мы решаем<br>всё это за вас</h3>
          <button class="btn btn--gold btnPopup">ЗАКАЗАТЬ СЕРТИФИКАЦИЮ</button>
        </div>
      </div>
    </div>
  </section>

  <!-- Этапы сертификации -->
  <section class="steps animate-on-scroll">
    <div class="container">
      <h2>Этапы сертификации с НОВА</h2>
      <div class="steps__grid">
        <div class="step-card">
          <h3>Заявка</h3>
          <span class="number number__one">1</span>
          <p>оставляете данные на сайте<br> (контакты + характеристики продукции/услуг)</p>
          <button class="btn btn--outline btnPopup">ОСТАВИТЬ ЗАЯВКУ</button>
          <svg class="icon__position_one" width="14" height="26" viewBox="0 0 14 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 25L13 13L1 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>
        <div class="step-card">
          <h3>Подача в сертификационный орган / лабораторию</h3>
          <span class="number">2</span>
          <p>передаем всё официально и отслеживаем процесс</p>
          <svg class="icon__position" width="14" height="26" viewBox="0 0 14 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 25L13 13L1 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>
        <div class="step-card">
          <h3>Консультация и подбор схемы</h3>
          <span class="number">3</span>
          <p>мы анализируем вашу ситуацию и подбираем нужный документ</p>
          <svg class="icon__position" width="14" height="26" viewBox="0 0 14 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 25L13 13L1 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>
        <div class="step-card">
          <h3>Поддержка<br> и сопровождение</h3>
          <span class="number">4</span>
          <p>помощь при проверках, продление, перевыпуск, консультации</p>
          <svg class="icon__position" width="14" height="26" viewBox="0 0 14 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 25L13 13L1 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>
        <div class="step-card">
          <h3>Подготовка пакета документов</h3>
          <span class="number">5</span>
          <p>оформление макета, сбор данных, протоколов, ТУ/ГОСТов, сведений о товаре</p>
          <svg class="icon__position" width="14" height="26" viewBox="0 0 14 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 25L13 13L1 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>
        <div class="step-card">
          <h3>Получение и передача документа</h3>
          <span class="number">6</span>
          <p>вы получаете готовый сертификат / декларацию / свидетельство</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Документы и услуги -->
  <section class="documents animate-on-scroll">
    <img class="bg__box_small" src="/css/img/bgSmall.svg" alt="">
    <img class="bg__box_big" src="/css/img/bgBig.svg" alt="">
    <div class="container">
      <h2>Все виды документов и услуг</h2>
      <p>Мы оформляем:</p>
      <div class="documents__grid slider">
        <div class="document-card">
          <a data-fancybox="gallery1" href="/css/img/doc1Big.jpg">
            <img src="/css/img/doc1.png" alt="Декларация Таможенного союза" />
          </a>
          <h3>Декларация Таможенного союза (ЕАЭС)</h3>
        </div>
        <div class="document-card">
          <a data-fancybox="gallery1" href="/css/img/doc1Big.jpg">
            <img src="/css/img/doc1.png" alt="Декларация Таможенного союза" />
          </a>
          <h3>Сертификат таможенного союза</h3>
        </div>
        <div class="document-card">
          <a data-fancybox="gallery1" href="/css/img/doc1Big.jpg">
            <img src="/css/img/doc1.png" alt="Декларация Таможенного союза" />
          </a>
          <h3>Сертификат соответствия ГОСТ Р</h3>
        </div>
        <div class="document-card">
          <a data-fancybox="gallery1" href="/css/img/doc1Big.jpg">
            <img src="/css/img/doc1.png" alt="Декларация Таможенного союза" />
          </a>
          <h3>Паспорт на изделие</h3>
        </div>
        <div class="document-card">
          <a data-fancybox="gallery1" href="/css/img/doc1Big.jpg">
            <img src="/css/img/doc1.png" alt="Декларация Таможенного союза" />
          </a>
          <h3>Паспорт на изделие</h3>
        </div>
      </div>
      <div class="documents__controler">
        <button class="btn btn--gold btn--gold_width btnPopup">ЗАКАЗАТЬ ОФОРМЛЕНИЕ ДОКУМЕНТА</button>
        <div class="documents__controler_buttons">
          <div class="button_cont left"><svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7 13L1 7L7 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg></div>
          <div class="button_cont right"><svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 13L7 7L1 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Преимущества -->
  <section class="advantages animate-on-scroll">
    <div class="container">
      <h2>Наши преимущества</h2>
      <div class="advantages__grid">
        <div class="advantage-card">
          <div class="advantage-icon">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M28 22H16M20 30H16M32 14H16M40 20V13.6C40 10.2397 40 8.55953 39.346 7.27606C38.7708 6.14708 37.8529 5.2292 36.7239 4.65396C35.4405 4 33.7603 4 30.4 4H17.6C14.2397 4 12.5595 4 11.2761 4.65396C10.1471 5.2292 9.2292 6.14708 8.65396 7.27606C8 8.55953 8 10.2397 8 13.6V34.4C8 37.7603 8 39.4405 8.65396 40.7239C9.2292 41.8529 10.1471 42.7708 11.2761 43.346C12.5595 44 14.2397 44 17.6 44H25M36 42C36 42 42 39.1402 42 34.8505V29.8458L37.6248 28.2824C36.5736 27.9059 35.424 27.9059 34.3728 28.2824L30 29.8458V34.8505C30 39.1402 36 42 36 42Z" stroke="#184C43" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <h3>Официальность и легитимность</h3>
          <p>документы, принимаемые надзорными органами и партнёрами</p>
        </div>
        <div class="advantage-card">
          <div class="advantage-icon">
            <svg width="48" height="48" viewBox="0 0 42 31" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M29.4853 6.65685C34.1716 11.3431 34.1716 18.9411 29.4853 23.6274M12.5147 23.6273C7.82843 18.9411 7.82843 11.3431 12.5147 6.65678M6.85786 29.2843C-0.952621 21.4738 -0.952621 8.81049 6.85786 1M35.1421 1.00009C42.9526 8.81058 42.9526 21.4739 35.1421 29.2844M25 15.1421C25 17.3513 23.2091 19.1421 21 19.1421C18.7909 19.1421 17 17.3513 17 15.1421C17 12.933 18.7909 11.1421 21 11.1421C23.2091 11.1421 25 12.933 25 15.1421Z" stroke="#184C43" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <h3>Широкий спектр услуг</h3>
          <p>от деклараций и сертификатов до государственной регистрации, ТУ, экологических и пожарных заключений</p>
        </div>
        <div class="advantage-card">
          <div class="advantage-icon">
            <svg width="48" height="48" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M26 35L30 39L39 30M40.9703 22.0998C40.99 21.7357 41 21.369 41 21C41 9.9543 32.0457 1 21 1C9.9543 1 1 9.9543 1 21C1 31.8708 9.67302 40.716 20.477 40.9933M21 9V21L28.4767 24.7384" stroke="#184C43" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <h3>Быстро и надёжно</h3>
          <p>минимальные сроки оформления без потери качества</p>
        </div>
        <div class="advantage-card">
          <div class="advantage-icon">
            <svg width="48" height="48" viewBox="0 0 42 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M41 1L25.2627 16.7373C24.4707 17.5293 24.0747 17.9253 23.618 18.0737C23.2163 18.2042 22.7837 18.2042 22.382 18.0737C21.9253 17.9253 21.5293 17.5293 20.7373 16.7373L15.2627 11.2627C14.4707 10.4707 14.0747 10.0747 13.618 9.92631C13.2163 9.7958 12.7837 9.7958 12.382 9.92631C11.9253 10.0747 11.5293 10.4707 10.7373 11.2627L1 21M41 1H27M41 1V15" stroke="#184C43" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <h3>Полное сопровождение</h3>
          <p>от первого звонка до получения и передачи документов</p>
        </div>
        <div class="advantage-card">
          <div class="advantage-icon">
            <svg width="48" height="48" viewBox="0 0 41 42" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M11 41V19M1 23V37C1 39.2091 2.79086 41 5 41H31.8525C34.8139 41 37.3324 38.8393 37.7827 35.9123L39.9366 21.9123C40.4957 18.2778 37.6836 15 34.0063 15H27C25.8954 15 25 14.1046 25 13V5.93168C25 3.20799 22.792 1 20.0683 1C19.4187 1 18.83 1.38259 18.5661 1.97625L11.5279 17.8123C11.2069 18.5345 10.4906 19 9.70025 19H5C2.79086 19 1 20.7909 1 23Z" stroke="#184C43" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <h3>Индивидуальный подход</h3>
          <p>подбираем схему под ваш товар/услугу, учитываем особенности бизнеса</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Форма заявки -->
  <section class="cta-form animate-on-scroll">
    <img class="bg__box_small" src="/css/img/bgSmall.svg" alt="">
    <img class="bg__box_big" src="/css/img/bgBig.svg" alt="">
    <div class="container">
      <div class="cta-form__inner">
        <div class="cta-form__content">
          <h2>Оставьте заявку прямо сейчас</h2>
          <p>мы свяжемся с вами и рассчитаем стоимость</p>
          <form class="form">
            <input type="tel" id="phone" placeholder="Телефон*" required />
            <div class="checkbox">
              <input type="checkbox" required />
              <div>Нажимая на кнопку, вы соглашаетесь с политикой конфиденциальности и даёте своё согласие на обработку <a href="/pages/policy/persinfo/" class="pers__link">персональных данных</a></div>
            </div>
            <button type="submit" class="btn btn--gold btn--gold_submit">ОТПРАВИТЬ</button>
          </form>
        </div>
        <div class="cta-form__image">
          <img src="/css/img/mainForm.png" alt="Сертификат в руках" />
        </div>
      </div>
    </div>
  </section>

  <!-- Лицензии и аккредитация -->
  <section class="licenses animate-on-scroll">
    <div class="container">
      <div class="licenses__container">
        <div class="licenses_block">
          <h2>Лицензии <br>и аккредитация</h2>
          <p>Мы обладаем всеми необходимыми лицензиями, свидетельствами и ресурсами для выпуска абсолютно легитимных и качественных документов, а область аккредитации наших собственных лабораторий постоянно расширяется, следуя за новейшими тенденциями рынка.</p>
          <button class="btn btn--gold btn--gold_licenses btnPopup">ЗАКАЗАТЬ ОФОРМЛЕНИЕ ДОКУМЕНТА</button>
        </div>
        <!-- <div class="sliderThree"> -->
          <div class="licenses__slider sliderThree">
            <div class="license-item">
              <a data-fancybox="gallery2" href="/css/img/doc1Big.jpg">
                <img src="/css/img/doc1.png" alt="Декларация Таможенного союза" />
              </a>
              <p>Сертификат соответствия ГОСТ Р</p>
            </div>
            <div class="license-item">
              <a data-fancybox="gallery2" href="/css/img/doc1Big.jpg">
                <img src="/css/img/doc1.png" alt="Декларация Таможенного союза" />
              </a>
              <p>Паспорт на изделие</p>
            </div>
            <div class="license-item">
              <a data-fancybox="gallery2" href="/css/img/doc1Big.jpg">
                <img src="/css/img/doc1.png" alt="Декларация Таможенного союза" />
              </a>
              <p>Паспорт на изделие</p>
            </div>
          </div>
        <!-- </div> -->
        <div class="documents__controler licenses_control">
          <div class="documents__controler_buttons">
            <div class="button_cont licenses_button"><svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M7 13L1 7L7 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg></div>
            <div class="button_cont licenses_button"><svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1 13L7 7L1 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Категории услуг -->
  <section class="services animate-on-scroll">
    <img class="bg__box_small" src="/css/img/bgSmall.svg" alt="">
    <img class="bg__box_big" src="/css/img/bgBig.svg" alt="">
    <div class="container">
      <h2>Категории услуг</h2>
      <p>Мы работаем со следующими категориями:</p>
      <div class="services__grid sliderFour">
        <div class="service-card_item">
          <div class="service-card">
            <div class="service-icon">
              <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <mask id="mask0_137_418" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="4" y="4" width="40" height="40">
                  <path d="M43 43V5H5V43H43Z" fill="white" stroke="white" stroke-width="2" />
                </mask>
                <g mask="url(#mask0_137_418)">
                  <path d="M7.906 29.5469H40.0936C41.8123 29.5469 43.2185 30.9531 43.2185 32.6719H4.78101C4.78101 30.9531 6.18725 29.5469 7.906 29.5469Z" stroke="#184C43" stroke-width="2" stroke-miterlimit="22.926" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M6.42163 33.0625C6.42163 37.2219 8.62373 40.7158 11.7695 43.2188H36.2301C39.3757 40.7158 41.5778 37.2219 41.5778 33.0625" stroke="#184C43" stroke-width="2" stroke-miterlimit="22.926" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M33.9429 23.584V16.5706M14.057 16.5706V23.584M36.6253 11.6191L39.6249 17.1388L33.9656 20.6759M14.0358 20.6768L8.375 17.1388L12.8516 8.90129C13.2885 8.09739 13.6219 7.67887 14.4411 7.267L19.3836 4.78107H28.6163L33.5588 7.267C33.9416 7.45942 34.2182 7.65341 34.4491 7.88731" stroke="#184C43" stroke-width="2" stroke-miterlimit="2.613" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M19.3835 4.82161C19.3835 7.17512 21.4503 9.08301 23.9999 9.08301C26.5495 9.08301 28.6163 7.17512 28.6163 4.82161" stroke="#184C43" stroke-width="2" stroke-miterlimit="2.613" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M8.11429 29.499C7.97621 29.1406 7.90559 28.7597 7.90601 28.3755C7.90601 26.6493 9.30538 25.2501 11.0315 25.2501C11.5526 25.2493 12.0656 25.3794 12.5233 25.6284C13.2038 24.0869 14.7456 23.0108 16.5389 23.0108C17.3644 23.0108 18.1366 23.239 18.7961 23.6354C19.6642 21.6212 21.6672 20.211 23.9998 20.211C27.128 20.211 29.6639 22.7469 29.6639 25.875C29.6639 27.2655 29.1625 28.5387 28.3311 29.5244" stroke="#184C43" stroke-width="2" stroke-miterlimit="22.926" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M39.8936 29.4766C40.0263 29.1244 40.094 28.751 40.0937 28.3747C40.0937 26.6485 38.6943 25.2492 36.9682 25.2492C36.4471 25.2485 35.9342 25.3785 35.4764 25.6275C34.7959 24.086 33.2541 23.01 31.4608 23.01C30.6761 23.01 29.9396 23.2161 29.3022 23.577" stroke="#184C43" stroke-width="2" stroke-miterlimit="22.926" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M35.5859 13.6133C35.8369 12.6766 36.33 11.8225 37.0157 11.1368C37.7014 10.4511 38.5555 9.9579 39.4922 9.70689C38.5555 9.4559 37.7014 8.96277 37.0157 8.27707C36.33 7.59137 35.8369 6.73725 35.5859 5.80057C35.3349 6.73724 34.8418 7.59135 34.1561 8.27705C33.4705 8.96275 32.6164 9.45588 31.6797 9.70689C32.6164 9.95792 33.4704 10.4511 34.1561 11.1368C34.8418 11.8225 35.3349 12.6766 35.5859 13.6133Z" stroke="#184C43" stroke-width="2" stroke-miterlimit="22.926" stroke-linecap="round" stroke-linejoin="round" />
                </g>
              </svg>
            </div>
            <p>Производители бытовых товаров и химии</p>
          </div>
          <div class="service-card">
            <div class="service-icon">
              <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M35.9999 31.6738C38.9117 33.1365 41.4082 35.4839 43.2304 38.4193C43.5913 39.0005 43.7717 39.2912 43.8341 39.6937C43.9608 40.5115 43.4015 41.5171 42.6398 41.8407C42.2649 42 41.8433 42 40.9999 42M31.9999 23.0645C34.9634 21.5918 36.9999 18.5337 36.9999 15C36.9999 11.4663 34.9634 8.40822 31.9999 6.93552M27.9999 15C27.9999 19.9706 23.9705 24 18.9999 24C14.0294 24 9.99992 19.9706 9.99992 15C9.99992 10.0294 14.0294 6 18.9999 6C23.9705 6 27.9999 10.0294 27.9999 15ZM5.11838 37.8767C8.30699 33.0891 13.3387 30 18.9999 30C24.6612 30 29.6928 33.0891 32.8815 37.8767C33.58 38.9255 33.9293 39.4499 33.8891 40.1198C33.8577 40.6414 33.5158 41.28 33.099 41.5952C32.5638 42 31.8276 42 30.3552 42H7.64463C6.17226 42 5.43607 42 4.9008 41.5952C4.48401 41.28 4.14209 40.6414 4.11079 40.1198C4.07057 39.4499 4.41984 38.9255 5.11838 37.8767Z" stroke="#184C43" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
            <p>Предприниматели, реализующие товары в розницу и онлайн-магазины</p>
          </div>
        </div>

        <div class="service-card_item">
          <div class="service-card">
            <div class="service-icon">
              <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.0593 34.0658C16.0593 34.2521 16.1333 34.4308 16.2651 34.5625C16.3968 34.6943 16.5755 34.7683 16.7618 34.7683H38.0762C39.2262 34.7683 40.1619 33.8325 40.1619 32.6824V15.331C40.1619 14.1809 39.2263 13.2451 38.0762 13.2451H9.92415C8.77412 13.2451 7.83838 14.1809 7.83838 15.331V32.6825C7.83838 33.8326 8.77403 34.7684 9.92415 34.7684H13.7683C14.1563 34.7684 14.4707 34.4539 14.4707 34.0659C14.4707 33.678 14.1563 33.3635 13.7683 33.3635H9.92415C9.54867 33.3635 9.24325 33.058 9.24325 32.6825V15.331C9.24325 14.9555 9.54867 14.65 9.92415 14.65H38.0762C38.4516 14.65 38.7571 14.9555 38.7571 15.331V32.6825C38.7571 33.058 38.4516 33.3635 38.0762 33.3635H16.7618C16.6695 33.3635 16.5782 33.3816 16.493 33.4169C16.4077 33.4522 16.3303 33.504 16.2651 33.5692C16.1999 33.6344 16.1481 33.7118 16.1128 33.797C16.0775 33.8823 16.0593 33.9736 16.0593 34.0658Z" fill="#184C43" />
                <path d="M24.4786 16.283C24.2727 16.2246 24.0528 16.2419 23.8586 16.3318C23.6644 16.4218 23.5089 16.5783 23.4203 16.7731L20.0007 24.219C19.9252 24.3824 19.8921 24.5621 19.9047 24.7416C19.9173 24.9211 19.975 25.0946 20.0725 25.2458C20.1693 25.3975 20.3028 25.5223 20.4607 25.6086C20.6186 25.6949 20.7957 25.7399 20.9757 25.7395H22.4454L21.7269 30.6019C21.6912 30.8376 21.7411 31.0782 21.8675 31.2803C21.9939 31.4823 22.1885 31.6324 22.416 31.7034C22.5172 31.7355 22.6197 31.7507 22.7208 31.7507C23.0905 31.7507 23.4386 31.5452 23.6129 31.1982L27.6229 23.2204C27.7057 23.0571 27.7451 22.8751 27.7372 22.6921C27.7292 22.5091 27.6743 22.3312 27.5776 22.1756C27.482 22.0193 27.3478 21.8903 27.1878 21.801C27.0279 21.7117 26.8476 21.6651 26.6644 21.6658H24.6196L25.1289 17.2508C25.1543 17.0384 25.1026 16.8239 24.9832 16.6463C24.8639 16.4687 24.6849 16.3398 24.4786 16.283ZM26.1259 23.0708L23.483 28.3288L23.9542 25.1399C23.9689 25.04 23.9619 24.9382 23.9338 24.8413C23.9056 24.7444 23.8569 24.6547 23.791 24.5783C23.725 24.5019 23.6434 24.4406 23.5516 24.3985C23.4599 24.3565 23.3602 24.3347 23.2592 24.3347H21.4934L23.3685 20.2518L23.1337 22.2879C23.1224 22.3863 23.1319 22.486 23.1618 22.5804C23.1917 22.6749 23.2412 22.7619 23.3071 22.8359C23.373 22.9098 23.4538 22.969 23.5442 23.0095C23.6346 23.05 23.7325 23.0709 23.8316 23.0709H26.1259V23.0708ZM34.2321 44.3223C34.0458 44.3223 33.8671 44.3963 33.7354 44.5281C33.6036 44.6598 33.5296 44.8385 33.5296 45.0248V47.2977C33.5296 47.6856 33.844 48.0001 34.2321 48.0001C34.6201 48.0001 34.9345 47.6856 34.9345 47.2977V45.0247C34.9345 44.8384 34.8605 44.6597 34.7287 44.528C34.597 44.3963 34.4183 44.3223 34.2321 44.3223Z" fill="#184C43" />
                <path d="M42.2691 18.3479C42.4554 18.3479 42.6341 18.2739 42.7658 18.1421C42.8976 18.0104 42.9716 17.8317 42.9716 17.6454V15.3307C42.9716 12.6312 40.7755 10.4351 38.076 10.4351H35.7038V9.01134C35.7038 8.45398 35.3924 7.96808 34.9344 7.71829V0.702438C34.9344 0.314505 34.62 0 34.2319 0C33.8439 0 33.5295 0.314505 33.5295 0.702438V7.5395H32.1784V0.702438C32.1784 0.314505 31.864 0 31.4759 0C31.0879 0 30.7735 0.314505 30.7735 0.702438V7.71829C30.3155 7.96808 30.0041 8.45398 30.0041 9.01134V10.4351H26.8498V9.01134C26.8498 8.45398 26.5384 7.96808 26.0804 7.71829V0.702438C26.0804 0.314505 25.766 0 25.3779 0C24.9899 0 24.6755 0.314505 24.6755 0.702438V7.5395H23.3244V0.702438C23.3244 0.314505 23.01 0 22.6219 0C22.2339 0 21.9195 0.314505 21.9195 0.702438V7.71829C21.4615 7.96808 21.1501 8.45398 21.1501 9.01134V10.4351H17.9958V9.01134C17.9958 8.45398 17.6844 7.96808 17.2264 7.71829V0.702438C17.2264 0.314505 16.912 0 16.5239 0C16.1359 0 15.8215 0.314505 15.8215 0.702438V7.5395H14.4704V0.702438C14.4704 0.314505 14.156 0 13.768 0C13.3799 0 13.0655 0.314505 13.0655 0.702438V7.71829C12.6075 7.96808 12.2961 8.45398 12.2961 9.01134V10.4351H9.92384C7.22452 10.4351 5.02832 12.6312 5.02832 15.3307V32.6822C5.02832 35.3816 7.22442 37.5777 9.92384 37.5777H12.2961V38.9887C12.2961 39.546 12.6075 40.0319 13.0655 40.2817V47.2976C13.0655 47.6855 13.3799 48 13.768 48C14.156 48 14.4704 47.6855 14.4704 47.2976V40.4605H15.8215V47.2976C15.8215 47.6855 16.1359 48 16.5239 48C16.912 48 17.2264 47.6855 17.2264 47.2976V40.2817C17.6844 40.0319 17.9958 39.546 17.9958 38.9887V37.5777H21.1501V38.9887C21.1501 39.546 21.4615 40.0319 21.9195 40.2817V47.2976C21.9195 47.6855 22.2339 48 22.6219 48C23.01 48 23.3244 47.6855 23.3244 47.2976V40.4605H24.6755V47.2976C24.6755 47.6855 24.9899 48 25.3779 48C25.766 48 26.0804 47.6855 26.0804 47.2976V40.2817C26.5384 40.0319 26.8498 39.546 26.8498 38.9887V37.5777H30.0041V38.9887C30.0041 39.546 30.3155 40.0319 30.7735 40.2817V47.2976C30.7735 47.6855 31.0879 48 31.4759 48C31.864 48 32.1784 47.6855 32.1784 47.2976V40.4605H33.5295V42.0311C33.5295 42.419 33.8439 42.7335 34.2319 42.7335C34.62 42.7335 34.9344 42.419 34.9344 42.0311V40.2818C35.3924 40.032 35.7038 39.5461 35.7038 38.9888V37.5778H38.076C40.7754 37.5778 42.9716 35.3817 42.9716 32.6823V20.6389C42.9716 20.251 42.6572 19.9365 42.2691 19.9365C41.8811 19.9365 41.5667 20.251 41.5667 20.6389V32.6821C41.5667 34.6069 40.0008 36.1727 38.076 36.1727H9.92403C7.99926 36.1727 6.43338 34.6069 6.43338 32.6821V15.3307C6.43338 13.4059 7.99926 11.84 9.92403 11.84H38.076C40.0008 11.84 41.5667 13.4059 41.5667 15.3307V17.6454C41.5667 17.8317 41.6407 18.0104 41.7724 18.1421C41.9042 18.2739 42.0828 18.3479 42.2691 18.3479ZM16.5911 38.9887C16.5911 39.0256 16.5611 39.0556 16.5241 39.0556H13.7681C13.7504 39.0556 13.7334 39.0486 13.7208 39.036C13.7082 39.0235 13.7012 39.0064 13.7012 38.9887V37.5777H16.591L16.5911 38.9887ZM25.445 38.9887C25.445 39.0256 25.415 39.0556 25.378 39.0556H22.622C22.6043 39.0556 22.5872 39.0486 22.5747 39.036C22.5621 39.0235 22.5551 39.0064 22.5551 38.9887V37.5777H25.4449V38.9887H25.445ZM34.2989 38.9887C34.2989 39.0256 34.2689 39.0556 34.2319 39.0556H31.4759C31.4582 39.0556 31.4411 39.0486 31.4286 39.036C31.416 39.0235 31.409 39.0064 31.409 38.9887V37.5777H34.2988V38.9887H34.2989ZM31.4091 9.01134C31.4091 8.97444 31.439 8.94437 31.476 8.94437H34.232C34.269 8.94437 34.299 8.97444 34.299 9.01134V10.4351H31.4092V9.01134H31.4091ZM22.5552 9.01134C22.5552 8.97444 22.5851 8.94437 22.6221 8.94437H25.3781C25.4151 8.94437 25.4451 8.97444 25.4451 9.01134V10.4351H22.5553V9.01134H22.5552ZM13.7013 9.01134C13.7013 8.97444 13.7312 8.94437 13.7682 8.94437H16.5242C16.5612 8.94437 16.5912 8.97444 16.5912 9.01134V10.4351H13.7014L13.7013 9.01134Z" fill="#184C43" />
              </svg>
            </div>
            <p>Средства индивидуальной защиты, спецодежда, электрооборудование</p>
          </div>
          <div class="service-card">
            <div class="service-icon">
              <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M30 42V31.2C30 30.0799 30 29.5198 29.782 29.092C29.5903 28.7157 29.2843 28.4097 28.908 28.218C28.4802 28 27.9201 28 26.8 28H21.2C20.0799 28 19.5198 28 19.092 28.218C18.7157 28.4097 18.4097 28.7157 18.218 29.092C18 29.5198 18 30.0799 18 31.2V42M6 14C6 17.3137 8.68629 20 12 20C15.3137 20 18 17.3137 18 14C18 17.3137 20.6863 20 24 20C27.3137 20 30 17.3137 30 14C30 17.3137 32.6863 20 36 20C39.3137 20 42 17.3137 42 14M12.4 42H35.6C37.8402 42 38.9603 42 39.816 41.564C40.5686 41.1805 41.1805 40.5686 41.564 39.816C42 38.9603 42 37.8402 42 35.6V12.4C42 10.1598 42 9.03968 41.564 8.18404C41.1805 7.43139 40.5686 6.81947 39.816 6.43597C38.9603 6 37.8402 6 35.6 6H12.4C10.1598 6 9.03968 6 8.18404 6.43597C7.43139 6.81947 6.81947 7.43139 6.43597 8.18404C6 9.03968 6 10.1598 6 12.4V35.6C6 37.8402 6 38.9603 6.43597 39.816C6.81947 40.5686 7.43139 41.1805 8.18404 41.564C9.03968 42 10.1598 42 12.4 42Z" stroke="#184C43" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
            <p>Предприятия лёгкой, тяжёлой промышленности, машиностроения</p>
          </div>
        </div>

        <div class="service-card_item">
          <div class="service-card">
            <div class="service-icon">
              <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M42.5846 4.08103C37.4622 5.7885 34.0071 10.5822 34.0071 15.9818V18.377M36.8663 1.03125L34.2815 13.3683" stroke="#184C43" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M8.40416 17.0125C8.3176 16.519 8.27419 16.019 8.27441 15.518C8.27441 10.7807 12.1147 6.94043 16.852 6.94043C19.5869 6.94043 22.0229 8.22049 23.5936 10.2142" stroke="#184C43" stroke-width="2" stroke-miterlimit="10" stroke-linejoin="round" />
                <path d="M16.8521 6.94024V4.08105" stroke="#184C43" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M36.8663 32.6727L39.7255 15.5176L34.0072 18.3768L28.2888 15.5176L22.5704 18.3768L16.852 15.5176L11.1337 18.3768L5.41528 15.5176L8.27447 32.6727L5.50603 43.3924C5.44566 43.6266 5.4152 43.8676 5.41538 44.1095C5.41538 45.6886 6.69544 46.9686 8.27456 46.9686H36.8665C38.4457 46.9686 39.7255 45.6886 39.7255 44.1095C39.7255 43.8618 39.694 43.6216 39.6349 43.3924L36.8663 32.6727Z" stroke="#184C43" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M22.5703 18.377C22.5703 10.4816 25.1305 4.08105 28.2887 4.08105C31.4468 4.08105 34.0071 10.4816 34.0071 18.377" stroke="#184C43" stroke-width="2" stroke-miterlimit="10" stroke-linejoin="round" />
                <path d="M13.9929 32.6729H31.148" stroke="#184C43" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
            <p>Продукты питания, косметика, детские товары</p>
          </div>
          <div class="service-card">
            <div class="service-icon">
              <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M30 9.2C30 8.0799 30 7.51984 29.782 7.09202C29.5903 6.71569 29.2843 6.40973 28.908 6.21799C28.4802 6 27.9201 6 26.8 6H21.2C20.0799 6 19.5198 6 19.092 6.21799C18.7157 6.40973 18.4097 6.71569 18.218 7.09202C18 7.51984 18 8.07989 18 9.2V14.8C18 15.9201 18 16.4802 17.782 16.908C17.5903 17.2843 17.2843 17.5903 16.908 17.782C16.4802 18 15.9201 18 14.8 18H9.2C8.0799 18 7.51984 18 7.09202 18.218C6.71569 18.4097 6.40973 18.7157 6.21799 19.092C6 19.5198 6 20.0799 6 21.2V26.8C6 27.9201 6 28.4802 6.21799 28.908C6.40973 29.2843 6.71569 29.5903 7.09202 29.782C7.51984 30 8.07989 30 9.2 30H14.8C15.9201 30 16.4802 30 16.908 30.218C17.2843 30.4097 17.5903 30.7157 17.782 31.092C18 31.5198 18 32.0799 18 33.2V38.8C18 39.9201 18 40.4802 18.218 40.908C18.4097 41.2843 18.7157 41.5903 19.092 41.782C19.5198 42 20.0799 42 21.2 42H26.8C27.9201 42 28.4802 42 28.908 41.782C29.2843 41.5903 29.5903 41.2843 29.782 40.908C30 40.4802 30 39.9201 30 38.8V33.2C30 32.0799 30 31.5198 30.218 31.092C30.4097 30.7157 30.7157 30.4097 31.092 30.218C31.5198 30 32.0799 30 33.2 30H38.8C39.9201 30 40.4802 30 40.908 29.782C41.2843 29.5903 41.5903 29.2843 41.782 28.908C42 28.4802 42 27.9201 42 26.8V21.2C42 20.0799 42 19.5198 41.782 19.092C41.5903 18.7157 41.2843 18.4097 40.908 18.218C40.4802 18 39.9201 18 38.8 18L33.2 18C32.0799 18 31.5198 18 31.092 17.782C30.7157 17.5903 30.4097 17.2843 30.218 16.908C30 16.4802 30 15.9201 30 14.8V9.2Z" stroke="#184C43" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
            <p>Медицинские изделия и оборудование</p>
          </div>
        </div>

        <div class="service-card_item">
          <div class="service-card">
            <div class="service-icon">
              <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 34H40M40 34L32 26M40 34L32 42M40 14H8M8 14L16 6M8 14L16 22" stroke="#184C43" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
            <p>Импортёры и экспортёры товаров и оборудования</p>
          </div>
          <div class="service-card">
            <div class="service-icon">
              <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M28 22H16M20 30H16M32 14H16M40 20V13.6C40 10.2397 40 8.55953 39.346 7.27606C38.7708 6.14708 37.8529 5.2292 36.7239 4.65396C35.4405 4 33.7603 4 30.4 4H17.6C14.2397 4 12.5595 4 11.2761 4.65396C10.1471 5.2292 9.2292 6.14708 8.65396 7.27606C8 8.55953 8 10.2397 8 13.6V34.4C8 37.7603 8 39.4405 8.65396 40.7239C9.2292 41.8529 10.1471 42.7708 11.2761 43.346C12.5595 44 14.2397 44 17.6 44H25M36 42C36 42 42 39.1402 42 34.8505V29.8458L37.6248 28.2824C36.5736 27.9059 35.424 27.9059 34.3728 28.2824L30 29.8458V34.8505C30 39.1402 36 42 36 42Z" stroke="#184C43" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
            <p>Услуги, требующие лицензий / сертификации</p>
          </div>
        </div>

        <div class="service-card_item">
          <div class="service-card">
            <div class="service-icon">
              <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 34H40M40 34L32 26M40 34L32 42M40 14H8M8 14L16 6M8 14L16 22" stroke="#184C43" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
            <p>Импортёры и экспортёры товаров и оборудования</p>
          </div>
          <div class="service-card">
            <div class="service-icon">
              <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M28 22H16M20 30H16M32 14H16M40 20V13.6C40 10.2397 40 8.55953 39.346 7.27606C38.7708 6.14708 37.8529 5.2292 36.7239 4.65396C35.4405 4 33.7603 4 30.4 4H17.6C14.2397 4 12.5595 4 11.2761 4.65396C10.1471 5.2292 9.2292 6.14708 8.65396 7.27606C8 8.55953 8 10.2397 8 13.6V34.4C8 37.7603 8 39.4405 8.65396 40.7239C9.2292 41.8529 10.1471 42.7708 11.2761 43.346C12.5595 44 14.2397 44 17.6 44H25M36 42C36 42 42 39.1402 42 34.8505V29.8458L37.6248 28.2824C36.5736 27.9059 35.424 27.9059 34.3728 28.2824L30 29.8458V34.8505C30 39.1402 36 42 36 42Z" stroke="#184C43" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
            <p>Услуги, требующие лицензий / сертификации</p>
          </div>
        </div>

      </div>
      <!-- <button class="btn btn--gold btn--gold_service">ЗАКАЗАТЬ ОФОРМЛЕНИЕ ДОКУМЕНТА</button> -->
      <div class="documents__controler">
        <button class="btn btn--gold btn--gold_width btnPopup">ЗАКАЗАТЬ ОФОРМЛЕНИЕ ДОКУМЕНТА</button>
        <div class="documents__controler_buttons">
          <div class="button_cont service_button"><svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7 13L1 7L7 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg></div>
          <div class="button_cont service_button"><svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 13L7 7L1 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Почему Вас здесь нет? -->
  <section class="why-not animate-on-scroll">
    <div class="container">
      <h2>Почему Вас здесь нет?</h2>
      <div class="why-not__slider sliderTwo">
        <div class="client-card">
          <a data-fancybox="gallery3" href="/css/img/doc1Big.jpg">
            <img src="/css/img/doc1.png" alt="Декларация Таможенного союза" />
          </a>
          <p><span>ООО "Ромашка"</span><br>Выдан сертификат соответствия</p>
        </div>
        <div class="client-card">
          <a data-fancybox="gallery3" href="/css/img/doc1Big.jpg">
            <img src="/css/img/doc1.png" alt="Декларация Таможенного союза" />
          </a>
          <p><span>ООО "Ромашка"</span><br>Выдан сертификат соответствия</p>
        </div>
        <div class="client-card">
          <a data-fancybox="gallery3" href="/css/img/doc1Big.jpg">
            <img src="/css/img/doc1.png" alt="Декларация Таможенного союза" />
          </a>
          <p><span>ООО "Ромашка"</span><br>Выдан сертификат соответствия</p>
        </div>
        <div class="client-card">
          <a data-fancybox="gallery3" href="/css/img/doc1Big.jpg">
            <img src="/css/img/doc1.png" alt="Декларация Таможенного союза" />
          </a>
          <p><span>ООО "Ромашка"</span><br>Выдан сертификат соответствия</p>
        </div>
        <div class="client-card">
          <a data-fancybox="gallery3" href="/css/img/doc1Big.jpg">
            <img src="/css/img/doc1.png" alt="Декларация Таможенного союза" />
          </a>
          <p><span>ООО "Ромашка"</span><br>Выдан сертификат соответствия</p>
        </div>
      </div>
      <div class="documents__controler">
        <button class="btn btn--gold btn--gold_width btnPopup">ЗАКАЗАТЬ ОФОРМЛЕНИЕ ДОКУМЕНТА</button>
        <div class="documents__controler_buttons">
          <div class="button_cont why_button"><svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7 13L1 7L7 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg></div>
          <div class="button_cont why_button"><svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 13L7 7L1 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Контакты -->
  <section class="contacts animate-on-scroll">
    <img class="bg__box_small" src="/css/img/bgSmall.svg" alt="">
    <div class="container">
      <div class="container__contacts">
        <div class="container__contacts_text">
          <h2>Контакты</h2>
          <p>НОВА — оперативная поддержка и оформление сертификации по всей России</p>
        </div>
        <div class="contacts__info">
          <div class="contact-item">
            <span>
              <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M28.0993 12C30.0528 12.3811 31.8481 13.3365 33.2555 14.7439C34.6628 16.1512 35.6182 17.9465 35.9993 19.9M28.0993 4C32.1579 4.45087 35.9425 6.26835 38.8318 9.15402C41.7211 12.0397 43.5433 15.822 43.9993 19.88M20.4533 27.7261C18.0501 25.323 16.1525 22.6057 14.7606 19.7065C14.6408 19.4571 14.581 19.3324 14.535 19.1746C14.3715 18.6139 14.4889 17.9254 14.8289 17.4505C14.9246 17.3169 15.0389 17.2026 15.2676 16.974C15.9668 16.2747 16.3164 15.9251 16.5449 15.5736C17.4069 14.2478 17.4069 12.5386 16.5449 11.2129C16.3164 10.8613 15.9668 10.5117 15.2676 9.81249L14.8778 9.42275C13.8149 8.35986 13.2835 7.82842 12.7127 7.53973C11.5776 6.96559 10.2371 6.96559 9.10195 7.53973C8.53119 7.82842 7.99975 8.35987 6.93686 9.42275L6.62159 9.73802C5.56235 10.7973 5.03273 11.3269 4.62823 12.047C4.17939 12.846 3.85666 14.0869 3.85939 15.0034C3.86185 15.8293 4.02206 16.3937 4.34247 17.5226C6.06441 23.5894 9.31336 29.3141 14.0893 34.0901C18.8653 38.8661 24.59 42.115 30.6568 43.8369C31.7857 44.1574 32.3501 44.3176 33.176 44.32C34.0925 44.3228 35.3335 44 36.1325 43.5512C36.8525 43.1467 37.3822 42.6171 38.4414 41.5578L38.7567 41.2426C39.8196 40.1797 40.351 39.6482 40.6397 39.0775C41.2138 37.9423 41.2138 36.6018 40.6397 35.4667C40.351 34.8959 39.8196 34.3645 38.7567 33.3016L38.3669 32.9119C37.6677 32.2127 37.3181 31.863 36.9666 31.6345C35.6408 30.7725 33.9316 30.7725 32.6058 31.6345C32.2543 31.863 31.9047 32.2127 31.2055 32.9119C30.9768 33.1405 30.8625 33.2548 30.7289 33.3505C30.254 33.6905 29.5655 33.8079 29.0048 33.6445C28.847 33.5985 28.7223 33.5386 28.473 33.4189C25.5737 32.0269 22.8564 30.1293 20.4533 27.7261Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </span>
            <a href="tel:+7XXX XXX XX XX">+7 (XXX) XXX-XX-XX</a>
          </div>
          <div class="contact-item">
            <span>
              <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.4879 5.26789L42.544 15.0543C43.076 15.4001 43.342 15.573 43.5347 15.8037C43.7053 16.0078 43.8335 16.244 43.9117 16.4983C44 16.7856 44 17.1028 44 17.7373V32.4007C44 35.7611 44 37.4412 43.346 38.7247C42.7708 39.8537 41.8529 40.7715 40.7239 41.3468C39.4405 42.0007 37.7603 42.0007 34.4 42.0007H13.6C10.2397 42.0007 8.55953 42.0007 7.27606 41.3468C6.14708 40.7715 5.2292 39.8537 4.65396 38.7247C4 37.4412 4 35.7611 4 32.4007V17.7373C4 17.1028 4 16.7856 4.08834 16.4983C4.16654 16.244 4.29469 16.0078 4.4653 15.8037C4.65802 15.573 4.92403 15.4001 5.45604 15.0543L20.5121 5.26789M27.4879 5.26789C26.2254 4.44727 25.5942 4.03697 24.9141 3.87732C24.3129 3.73621 23.6871 3.73621 23.0859 3.87732C22.4058 4.03697 21.7746 4.44728 20.5121 5.26789M27.4879 5.26789L39.8723 13.3177C41.248 14.2119 41.9358 14.659 42.1741 15.226C42.3822 15.7215 42.3822 16.28 42.1741 16.7755C41.9358 17.3425 41.248 17.7896 39.8723 18.6838L27.4879 26.7336C26.2255 27.5542 25.5942 27.9645 24.9141 28.1242C24.3129 28.2653 23.6871 28.2653 23.0859 28.1242C22.4058 27.9645 21.7746 27.5542 20.5121 26.7336L8.12772 18.6838C6.75203 17.7896 6.06418 17.3425 5.82595 16.7755C5.61776 16.28 5.61776 15.7215 5.82595 15.226C6.06418 14.659 6.75203 14.2119 8.12772 13.3177L20.5121 5.26789M43 38.0007L29.7144 26.0007M18.2856 26.0007L5 38.0007" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </span>
            <a href="mailto:info@nova-cert.ru">info@nova-cert.ru</a>
          </div>
        </div>
      </div> 
    </div>
  </section>

  <!-- Призыв к действию внизу -->
  <section class="cta-final animate-on-scroll">
    <div class="container">
      <div class="cta-final__inner">
        <div class="cta-final__content">
          <h2>Не откладывайте — начните оформление документов сегодня!</h2>
          <p>Заполните форму или позвоните — и получите официальную сертификацию с гарантией надёжности и юридической чистоты.</p>
          <p>НОВА — ваш надёжный партнёр в сертификации и сопровождении бизнеса.</p>
          <form class="form">
            <input type="tel" id="phoneMain" placeholder="Телефон*" required />
            <!-- <label class="checkbox">
              <input type="checkbox" required />
              Нажимая на кнопку, вы соглашаетесь с политикой конфиденциальности и даёте своё согласие на обработку персональных данных
            </label> -->
            <div class="checkbox">
              <input name="input" type="checkbox" required />
              <div>Нажимая на кнопку, вы соглашаетесь с политикой конфиденциальности и даёте своё согласие на обработку <a href="#" class="pers__link">персональных данных</a></div>
            </div>
            <button type="submit" class="btn btn--gold btn--gold_submit">ОТПРАВИТЬ</button>
          </form>
        </div>
        <div class="cta-final__image">
          <img src="/css/img/mainForm.png" alt="Сертификат в руках" />
        </div>
      </div>
    </div>
  </section>

<?php include './includes/footer.php';?>
