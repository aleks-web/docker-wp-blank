<section class="popup-fade">
    <div class="loader-wrap">
        <div style="display: flex; align-items: center; justify-content: center; flex-direction: column; gap: 10px;">
            <span class="loader"></span>
            <span style="color: white;z-index: 10;">Отправка...</span>
        </div>
    </div>

    <div class="popup">

        <svg class="popup-close" width="18" height="18" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M25 1L1 25M1 1L25 25" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>

        <div class="modal_container">
            <div class="cta-form__content">
                <h2 class="text__stile">Оставьте заявку прямо сейчас</h2>
                <p class="text__stile">мы свяжемся с вами и рассчитаем стоимость</p>

                <form class="form">
                    <input type="hidden" name="form_name" value="Оставьте заявку прямо сейчас (попап)" />
                    <input type="hidden" name="page_link" value="<?= get_the_permalink(); ?>" />

                    <input class="input_style" type="tel" id="phoneModal" name="tel" placeholder="Телефон *" required />
                    <div class="checkbox">
                        <input type="checkbox" name="agree" required />
                        <div class="text__stile">Нажимая на кнопку, вы соглашаетесь с политикой конфиденциальности и даёте своё согласие на обработку <a href="<?= get_permalink(84); ?>" class="pers__link">персональных данных</a></div>
                    </div>
                    <button type="submit" class="btn btn--gold btn--gold_submit">ОТПРАВИТЬ</button>
                </form>
            </div>

            <div class="cta-form__image cta-form__image_modal">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/mainForm2.png" alt="Сертификат в руках" />
            </div>
        </div>

    </div>
</section>


<div class="popup_fade success">
    <div class="popup popup_style">
        <svg class="popup-close" width="18" height="18" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M25 1L1 25M1 1L25 25" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <div class="cta-form__content">
            <h2 class="text__stile">Спасибо! Ваша заявка принята</h2>
            <p class="text__stile">А пока можете ознакомиться с нашими услугами</p>
            <a href="http://localhost/services/all/" class="btn btn--gold btn--gold_submit">УСЛУГИ</a>
        </div>

    </div>
</div>