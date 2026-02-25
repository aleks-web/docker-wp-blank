<?php
$root_server = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <?php wp_head(); ?>

    <link rel="icon" href="<?= get_template_directory_uri() ?>/assets/img/favicon-48.svg" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri() ?>/assets/img/favicon-180.svg" />
</head>


<body <?php body_class(); ?>>

<?php include_once(__DIR__ . '/template-parts/modals.php'); ?>

<!-- Шапка -->
<header class="header">
    <div class="container header__inner">

        <a href="<?= get_home_url(); ?>" class="logo">
            <img class="logo_desktop" src="<?= get_template_directory_uri() ?>/assets/img/logo.svg" alt="НОВА" />
            <img class="logo_mobile" src="<?= get_template_directory_uri() ?>/assets/img/logomob.svg" alt="НОВА" />
        </a>

        <?php wp_nav_menu([
                'theme_location' => 'header_menu',
                'container' => 'nav',
                'container_class' => 'nav',
                'menu_class' => 'nav__list',
        ]); ?>

        <button class="btn btn--primary btnPopup btnPopupMg">ОБРАТНЫЙ ЗВОНОК</button>


        <!-- Кнопка открытия меню (в шапке) -->
        <button class="mobile-menu-toggle" aria-label="Открыть меню">
            <svg width="25" height="17" viewBox="0 0 25 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 8.5H23.5M1 1H23.5M8.5 16H23.5" stroke="#184C43" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>

    </div>
</header>

<!-- Мобильное меню -->
<div class="mobile-menu">
    <div class="mobile-menu__header">
        <a href="/" class="logo">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/logomob.svg" alt="НОВА" />
        </a>
        <button class="mobile-menu-close" aria-label="Закрыть меню">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 1L1 16M1 1L16 16" stroke="#184C43" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>

    <nav class="mobile-nav">
        <ul class="mobile-nav__list">
            <li>
                <a href="/pages/about/">О компании</a>
            </li>
            <li>
                <button class="mobile-nav__toggle" aria-expanded="false">Услуги</button>
                <div class="mobile-submenu">
                    <ul>
                        <li>
                            <a href="/pages/pagecategories/">Сертификат пожарной безопасности
                                <svg class="flex_mg_mobile" width="24" height="24" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.5 12.5L6.5 6.5L0.5 0.5" stroke="#252525" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="/pages/pagecategories/">Кабельные изделия
                                <svg class="flex_mg_mobile" width="24" height="24" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.5 12.5L6.5 6.5L0.5 0.5" stroke="#252525" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="/pages/pagecategories/">Строительные и отделочные материалы
                                <svg class="flex_mg_mobile" width="24" height="24" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.5 12.5L6.5 6.5L0.5 0.5" stroke="#252525" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="/pages/pagecategories/">Огнестойкие строительные конструкции и их заполнения
                                <svg class="flex_mg_mobile" width="24" height="24" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.5 12.5L6.5 6.5L0.5 0.5" stroke="#252525" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="/pages/pagecategories/">Инженерное оборудование систем противодымной защиты
                                <svg class="flex_mg_mobile" width="24" height="24" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.5 12.5L6.5 6.5L0.5 0.5" stroke="#252525" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="/pages/pagecategories/">Средства огнезащиты
                                <svg class="flex_mg_mobile" width="24" height="24" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.5 12.5L6.5 6.5L0.5 0.5" stroke="#252525" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="/pages/pagecategories/">Сертификат соответствия ТР ЕАЭС 043/2017
                                <svg class="flex_mg_mobile" width="24" height="24" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.5 12.5L6.5 6.5L0.5 0.5" stroke="#252525" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="/pages/laboratory/">Лаборатория</a>
            </li>
            <li>
                <a href="/pages/clients/">Клиенты</a>
            </li>
            <li>
                <a href="/pages/licenses/">Лицензии</a>
            </li>
            <li>
                <a href="/pages/contacts/">Контакты</a>
            </li>
        </ul>
    </nav>

    <div class="mobile-menu__footer">
        <div class="contact-item">
      <span><svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M15.14 5.66667C16.2795 5.88899 17.3268 6.4463 18.1477 7.26726C18.9687 8.08822 19.526 9.13548 19.7483 10.275M15.14 1C17.5075 1.26301 19.7152 2.3232 21.4006 4.00651C23.086 5.68981 24.149 7.89618 24.415 10.2633M10.6798 14.8402C9.27794 13.4384 8.17102 11.8533 7.35902 10.1621C7.28918 10.0166 7.25425 9.94389 7.22742 9.85185C7.13208 9.52478 7.20056 9.12314 7.39891 8.84614C7.45473 8.76819 7.52141 8.70151 7.65477 8.56814C8.06265 8.16027 8.26658 7.95633 8.39992 7.75126C8.90274 6.97789 8.90274 5.98088 8.39992 5.2075C8.26658 5.00243 8.06265 4.79849 7.65477 4.39062L7.42742 4.16327C6.80741 3.54325 6.4974 3.23325 6.16446 3.06484C5.5023 2.72993 4.72033 2.72993 4.05817 3.06485C3.72523 3.23325 3.41522 3.54325 2.7952 4.16327L2.61129 4.34718C1.9934 4.96507 1.68445 5.27402 1.4485 5.69406C1.18667 6.16015 0.998419 6.88405 1.00001 7.41865C1.00144 7.90042 1.0949 8.22968 1.28181 8.8882C2.28627 12.4272 4.18149 15.7666 6.96747 18.5526C9.75344 21.3385 13.0929 23.2338 16.6318 24.2382C17.2903 24.4251 17.6196 24.5186 18.1014 24.52C18.636 24.5216 19.3599 24.3334 19.826 24.0715C20.246 23.8356 20.555 23.5266 21.1728 22.9087L21.3568 22.7248C21.9768 22.1048 22.2868 21.7948 22.4552 21.4619C22.7901 20.7997 22.7901 20.0177 22.4552 19.3556C22.2868 19.0226 21.9768 18.7126 21.3568 18.0926L21.1294 17.8653C20.7215 17.4574 20.5176 17.2534 20.3125 17.1201C19.5391 16.6173 18.5421 16.6173 17.7688 17.1201C17.5637 17.2534 17.3598 17.4574 16.9519 17.8653C16.8185 17.9986 16.7518 18.0653 16.6739 18.1211C16.3969 18.3195 15.9952 18.3879 15.6682 18.2926C15.5761 18.2658 15.5034 18.2309 15.3579 18.161C13.6667 17.349 12.0816 16.2421 10.6798 14.8402Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      </svg></span>
            <a href="tel:+7XXX XXX XX XX">+7 (XXX) XXX-XX-XX</a>
        </div>
        <div class="contact-item">
      <span><svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M14.7018 1.8729L23.4845 7.58165C23.7948 7.78337 23.95 7.88423 24.0624 8.01877C24.1619 8.13786 24.2367 8.27561 24.2823 8.42396C24.3338 8.59154 24.3338 8.77661 24.3338 9.14675V17.7004C24.3338 19.6606 24.3338 20.6407 23.9523 21.3894C23.6168 22.0479 23.0814 22.5834 22.4228 22.9189C21.6741 23.3004 20.694 23.3004 18.7338 23.3004H6.60049C4.6403 23.3004 3.66021 23.3004 2.91152 22.9189C2.25295 22.5834 1.71752 22.0479 1.38197 21.3894C1.00049 20.6407 1.00049 19.6606 1.00049 17.7004V9.14675C1.00049 8.77661 1.00049 8.59154 1.05202 8.42396C1.09764 8.27561 1.17239 8.13786 1.27191 8.01877C1.38433 7.88423 1.5395 7.78337 1.84984 7.58165L10.6325 1.87291M14.7018 1.8729C13.9653 1.39421 13.5971 1.15486 13.2004 1.06174C12.8497 0.979421 12.4847 0.979421 12.134 1.06174C11.7372 1.15486 11.369 1.39421 10.6325 1.87291M14.7018 1.8729L21.926 6.56864C22.7285 7.09026 23.1297 7.35107 23.2687 7.68181C23.3901 7.97085 23.3901 8.29661 23.2687 8.58566C23.1297 8.9164 22.7285 9.17721 21.926 9.69883L14.7018 14.3946C13.9653 14.8733 13.5971 15.1126 13.2004 15.2057C12.8497 15.288 12.4847 15.288 12.134 15.2057C11.7372 15.1126 11.369 14.8733 10.6325 14.3946L3.40833 9.69883C2.60584 9.17721 2.20459 8.9164 2.06562 8.58566C1.94418 8.29661 1.94418 7.97085 2.06562 7.68181C2.20459 7.35107 2.60584 7.09026 3.40833 6.56864L10.6325 1.87291M23.7505 20.9671L16.0005 13.9671M9.33378 13.9671L1.58382 20.9671" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      </svg></span>
            <a href="mailto:info@nova-cert.ru">info@nova-cert.ru</a>
        </div>
        <button class="btn btn--gold">ОБРАТНЫЙ ЗВОНОК</button>
    </div>
</div>