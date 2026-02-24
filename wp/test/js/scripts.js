// слайдер на главной
$(document).ready(function() {
  $('.slider').not('.slick-initialized').slick({
    infinite: true,
    slidesToShow: 4, // 👈 Начинаем с 4 блоков на десктопе
    slidesToScroll: 1,
    autoplay: false, // отключаем автопрокрутку, если не нужно
    autoplaySpeed: 5000,
    variableWidth: true, // фиксированная ширина
    centerMode: false,
    centerPadding: '0',
    arrows: true,
    dots: false,
    prevArrow: '<div class="btn_left btn_slider"></div>',
    nextArrow: '<div class="btn_right btn_slider"></div>',
    responsive: [
      {
        breakpoint: 1380,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          centerMode: true,
        }
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          centerMode: true,
        }
      },
      {
        breakpoint: 551,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: false,
          centerMode: true,
        }
      }
    ]
  });

  // Подключаем ваши кнопки к Slick
  $(document).on('click', '.documents__controler_buttons .button_cont:first-child', function() {
    $('.slider').slick('slickPrev');
  });

  $(document).on('click', '.documents__controler_buttons .button_cont:last-child', function() {
    $('.slider').slick('slickNext');
  });
});

// слайдер на главной
$(document).ready(function() {
  $('.sliderTwo').not('.slick-initialized').slick({
    infinite: true,
    slidesToShow: 4, // 👈 Начинаем с 4 блоков на десктопе
    slidesToScroll: 1,
    autoplay: false, // отключаем автопрокрутку, если не нужно
    autoplaySpeed: 5000,
    variableWidth: true, // фиксированная ширина
    centerMode: false,
    centerPadding: '0',
    arrows: true,
    dots: false,
    prevArrow: '<div class="btn_left btn_slider"></div>',
    nextArrow: '<div class="btn_right btn_slider"></div>',
    responsive: [
      {
        breakpoint: 1380,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          centerMode: true,
        }
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          centerMode: true,
        }
      },
      {
        breakpoint: 551,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: false,
          centerMode: true,
        }
      }
    ]
  });

  // Подключаем ваши кнопки к Slick
  $(document).on('click', '.documents__controler_buttons .why_button:first-child', function() {
    $('.sliderTwo').slick('slickPrev');
  });

  $(document).on('click', '.documents__controler_buttons .why_button:last-child', function() {
    $('.sliderTwo').slick('slickNext');
  });
});

// слайдер на главной
$(document).ready(function() {
  $('.sliderThree').not('.slick-initialized').slick({
    infinite: true,
    slidesToShow: 2, // 👈 Начинаем с 4 блоков на десктопе
    slidesToScroll: 1,
    autoplay: false, // отключаем автопрокрутку, если не нужно
    autoplaySpeed: 5000,
    variableWidth: true, // фиксированная ширина
    centerMode: false,
    centerPadding: '0',
    arrows: true,
    dots: false,
    prevArrow: '<div class="btn_left btn_slider"></div>',
    nextArrow: '<div class="btn_right btn_slider"></div>',
    responsive: [
      {
        breakpoint: 1380,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          centerMode: true,
        }
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          centerMode: true,
        }
      },
      {
        breakpoint: 551,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: false,
          centerMode: true,
        }
      }
    ]
  });

  // Подключаем ваши кнопки к Slick
  $(document).on('click', '.documents__controler_buttons .licenses_button:first-child', function() {
    $('.sliderThree').slick('slickPrev');
  });

  $(document).on('click', '.documents__controler_buttons .licenses_button:last-child', function() {
    $('.sliderThree').slick('slickNext');
  });
});

// слайдер на главной
$(document).ready(function() {
  $('.sliderFour').not('.slick-initialized').slick({
    infinite: true,
    slidesToShow: 4, // 👈 Начинаем с 4 блоков на десктопе
    slidesToScroll: 1,
    autoplay: false, // отключаем автопрокрутку, если не нужно
    autoplaySpeed: 5000,
    variableWidth: true, // фиксированная ширина
    centerMode: false,
    centerPadding: '0',
    arrows: true,
    dots: false,
    prevArrow: '<div class="btn_left btn_slider"></div>',
    nextArrow: '<div class="btn_right btn_slider"></div>',
    responsive: [
      {
        breakpoint: 1380,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          centerMode: true,
        }
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          centerMode: true,
        }
      },
      {
        breakpoint: 551,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: false,
          centerMode: true,
        }
      }
    ]
  });

  // Подключаем ваши кнопки к Slick
  $(document).on('click', '.documents__controler_buttons .service_button:first-child', function() {
    $('.sliderFour').slick('slickPrev');
  });

  $(document).on('click', '.documents__controler_buttons .service_button:last-child', function() {
    $('.sliderFour').slick('slickNext');
  });
});



// инпут телефон
document.addEventListener('DOMContentLoaded', function() {
  // Найдём все нужные поля по id
  const phoneInputs = [
    document.getElementById('phone'),
    document.getElementById('phoneMain'),
    document.getElementById('phoneModal'),
  ];

  // Фильтруем, чтобы исключить null (если элемента нет)
  phoneInputs.filter(input => input).forEach(input => {
    // Создаём label
    const label = document.createElement('label');
    label.htmlFor = input.id;
    label.innerHTML = 'Телефон<span class="required">*</span>';

    // Вставляем label перед input
    input.parentNode.insertBefore(label, input);

    // Очищаем placeholder
    input.placeholder = '';
  });
});


document.addEventListener('DOMContentLoaded', function() {
  // Найдём все нужные поля по id
  const phoneInputs = [
    document.getElementById('phone'),
    document.getElementById('phoneMain'),
    document.getElementById('phoneModal'),
  ];

  // Фильтруем, чтобы исключить null (если элемента нет)
  phoneInputs.filter(input => input).forEach(input => {
    const label = input.previousElementSibling;

    if (label && label.tagName === 'LABEL') {
      // При фокусе — скрываем label
      input.addEventListener('focus', function() {
        label.style.opacity = '0';
        label.style.visibility = 'hidden';
      });

      // При потере фокуса — показываем label, если поле пустое
      input.addEventListener('blur', function() {
        if (!input.value) {
          label.style.opacity = '1';
          label.style.visibility = 'visible';
        }
      });
    }
  });
});



// модалки функция закрыть на пустое место
let modalVacancies = document.getElementsByClassName("popup-fade")[0];

window.onclick = function(event) {
    if (event.target == modalVacancies) {
        $('.popup-fade').fadeOut();
    }
}

// модалки функция открыть
function openModal (clickClass, openClass) {
  $(clickClass).click(function() {
    $(openClass).fadeIn();
    return false;
  });
}
openModal('.btnPopup','.popup-fade');

// модалки функция закрыть
function closeModal (clickClass, openClass) {
  $(clickClass).click(function() {
    $(this).parents(openClass).fadeOut();
    return false;
  });
}
closeModal('.popup-close','.popup-fade');

// модалки функция закрыть на esc
$(document).keydown(function(e) {
  if (e.keyCode === 27) {
    e.stopPropagation();
    $('.popup-fade,').fadeOut();
  }
});




// стили для шапки при скроле
$(window).scroll(function() {
  var height = $(window).scrollTop();
  
  /*Если сделали скролл на 1px задаём новый класс для header*/
  if(height > 1){
  $('.header').addClass('header_filter');
  } else{
  /*Если меньше 1px удаляем класс для header*/
  $('.header').removeClass('header_filter');
  }
  
  });
  

// маска для телефонов
$("#phone").mask("+7 (999) 99-99-999");
$("#phoneMain").mask("+7 (999) 99-99-999");
$("#phoneModal").mask("+7 (999) 99-99-999");

// галерея
$('[data-fancybox="gallery1"]').fancybox({
});
$('[data-fancybox="gallery2"]').fancybox({
});
$('[data-fancybox="gallery3"]').fancybox({
});



// мобильное меню
document.addEventListener('DOMContentLoaded', function() {
  const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
  const mobileMenuClose = document.querySelector('.mobile-menu-close');
  const mobileMenu = document.querySelector('.mobile-menu');
  const mobileNavToggles = document.querySelectorAll('.mobile-nav__toggle');

  // Открытие меню
  if (mobileMenuToggle) {
    mobileMenuToggle.addEventListener('click', function() {
      mobileMenu.classList.add('active');
      document.body.style.overflow = 'hidden'; // Блокируем прокрутку страницы
    });
  }

  // Закрытие меню
  if (mobileMenuClose) {
    mobileMenuClose.addEventListener('click', function() {
      mobileMenu.classList.remove('active');
      document.body.style.overflow = ''; // Возвращаем прокрутку
    });
  }

  // Закрытие по клику вне меню
  // document.addEventListener('click', function(e) {
  //   if (e.target.closest('.mobile-menu') || e.target.closest('.mobile-menu-toggle')) return;
  //   mobileMenu.classList.remove('active');
  //   document.body.style.overflow = '';
  // });

  // Переключение подменю
  mobileNavToggles.forEach(toggle => {
    toggle.addEventListener('click', function() {
      const submenu = this.nextElementSibling;
      const isExpanded = this.getAttribute('aria-expanded') === 'true';

      // Закрываем все другие подменю
      document.querySelectorAll('.mobile-submenu').forEach(sm => {
        if (sm !== submenu) sm.classList.remove('active');
      });

      // Переключаем текущее
      if (submenu) {
        submenu.classList.toggle('active');
        this.setAttribute('aria-expanded', !isExpanded);
      }
    });
  });
});



// анимация
document.addEventListener('DOMContentLoaded', function() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('active');
      }
    });
  }, {
    threshold: 0.1 // 10% элемента должно быть видно
  });

  document.querySelectorAll('.animate-on-scroll').forEach(block => {
    observer.observe(block);
  });
});
