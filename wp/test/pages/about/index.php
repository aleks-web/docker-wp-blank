<?php include '../../includes/header.php';?>
<?php include '../../includes/modal.php';?>

<!-- Герой-секция -->
  <section class="hero animate-on-scroll section_pt">
    <nav class="breadcrumbs">
      <ol>
        <li><a href="/">Главная</a></li>
        <li><span>О компании</span></li>
      </ol>
    </nav>
    <img class="bg__box_small" src="/css/img/bgSmall.svg" alt="">
    <div class="container hero__inner">
      <div class="hero__content">
        <h1>О компании</h1>
        <p>НОВА — ваш профессиональный партнёр в оформлении всех видов разрешительной и сертификационной документации. 
            Получите нужный документ для бизнеса в минимальные сроки, официально, с гарантией легитимности<br><br>
            НОВА — ваш профессиональный партнёр в оформлении всех видов разрешительной и сертификационной документации. 
            Получите нужный документ для бизнеса в минимальные сроки, официально, с гарантией легитимности<br><br>
            НОВА — ваш профессиональный партнёр в оформлении всех видов разрешительной и сертификационной документации. 
            Получите нужный документ для бизнеса в минимальные сроки, официально, с гарантией легитимности
        </p>
        <!-- <button class="btn btn--gold">ЗАКАЗАТЬ СЕРТИФИКАЦИЮ</button> -->
      </div>
      <div class="hero__image">
        <img src="/css/img/kub.png" alt="Сертификат соответствия" />
      </div>
    </div>
  </section>
<!-- Партнеры -->
  <section class="seo__block animate-on-scroll">
    <div class="container">
      <div class="container__seo">
        <div class="container__seo_text">
          <h2>Заголовок SEO блока</h2>
          <p>Компания НОВА предоставляет услуги по различным категориям сертификации, включая пожарную, техническую и промышленную. Мы сопровождаем подготовку документов, проводим экспертизы и обеспечиваем быстрое получение сертификатов, полностью поддерживая бизнес на каждом этапе.</p>
        </div>
      </div>
    </div>
  </section>
<!-- Форма заявки -->
  <section class="cta-form animate-on-scroll">
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

<?php include '../../includes/footer.php';?>