jQuery(document).ready(function($) {

    $('form.form').each((i, el) => {
       const btnSubmit = $(el).find('[type="submit"]');
       const agreeCheck = $(el).find('[name="agree"]');

       function checkAgree() {
           if (agreeCheck.is(':checked')) {
               btnSubmit.removeClass('disabled');
           } else {
               btnSubmit.addClass('disabled');
           }
       }
        checkAgree();

        agreeCheck.on('change', checkAgree);

        btnSubmit.click((e) => {
            e.preventDefault();
            const formData = new FormData(el);
            formData.append('action', 'send_form');
            $(el).addClass('form_sender');
            $(el).parents('section').addClass('form_sender');

            $.ajax({
                url: ajax_form.ajaxurl,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $(el).removeClass('send');
                    $(el).parents('section').removeClass('form_sender');
                    $(el).html('Сообщение отправлено успешно');

                    setTimeout(() => {
                        $('.popup-fade').fadeOut(300, () => {
                            $('.popup_fade').fadeOut(300);
                            $('.popup_fade.success').fadeIn(300);
                        });
                    }, 2000)
                }
            });

        });

    });

});