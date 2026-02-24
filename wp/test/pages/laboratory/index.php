<?php include '../../includes/header.php';?>
<?php include '../../includes/modal.php';?>

<!-- Герой-секция -->
  <section class="hero animate-on-scroll section_pt">
    <nav class="breadcrumbs">
      <ol>
        <li><a href="/">Главная</a></li>
        <li><span>Лаборатория</span></li>
      </ol>
    </nav>
    <img class="bg__box_small" src="/css/img/bgSmall.svg" alt="">
    <div class="container">
      <div class="hero__content hero__content_width">
        <h1>Лаборатория</h1>
        <img class="img__lab" src="/css/img/lab.png" alt="lab">
        <p class="lab__title">Возможности и оснащение испытательной лаборатории<br><br>
          <span class="lab__text">Мы проводим испытания продукции для определения показателей пожарной опасности и работаем строго в рамках собственной области аккредитации. Наши возможности охватывают широкий перечень материалов и изделий. Лаборатория оснащена оборудованием для оценки пожарной опасности строительных материалов, средств огнезащиты, электромонтажных изделий, заполнений проёмов противопожарных преград, строительных конструкций и элементов систем противодымной вентиляции. В наличии — полный набор измерительных приборов и вспомогательного оснащения.</span>
        </p>
        <p class="lab__title lab__title_mg">Опыт, квалификация и аккредитация специалистов<br><br>
          <span class="lab__text">Обращаясь к нам, вы получаете услуги напрямую, без посредников. Испытательная лаборатория  обладает технической и документальной базой, необходимой для проведения испытаний в соответствии с аккредитацией.<br><br>
          Наши специалисты имеют более чем пятилетний опыт в сфере пожарных испытаний, регулярно повышают квалификацию, проходят аттестации и следят за всеми актуальными изменениями нормативной базы.<br><br>
          Лаборатория аккредитована в национальной системе аккредитации (запись в реестре ТРПБ.RU.ИН41 от 09.02.2016).</span>
        </p>
      </div>
    </div>
  </section>
<!-- Партнеры -->
  <section class="seo__block animate-on-scroll">
    <div class="container">
      <div class="video__block">
        <h2>Видеоматериалы</h2>
        <div class="image__block_items video__block_items">
          <iframe class="image__block_items_item video__block_items_item" width="720" height="405" src="https://rutube.ru/play/embed/70b464b38f32f781c8f793db3be18c0b/" style="border: none;" allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
          <iframe class="image__block_items_item video__block_items_item" width="720" height="405" src="https://rutube.ru/play/embed/70b464b38f32f781c8f793db3be18c0b/" style="border: none;" allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        </div>
      </div>
      <div class="video__block image__block">
        <h2>Фотоматериалы</h2>
        <div class="image__block_items">
          <a data-fancybox="gallery3" href="/css/img/image1.png">
            <img class="image__block_items_item" src="/css/img/image1.png" alt="" />
          </a>
          <a data-fancybox="gallery3" href="/css/img/image2.png">
            <img class="image__block_items_item" src="/css/img/image2.png" alt="" />
          </a>
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