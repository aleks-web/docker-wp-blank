<?php
    add_action('wp_ajax_send_form', 'send_form_handler');
    add_action('wp_ajax_nopriv_send_form', 'send_form_handler');

function send_form_handler() {
        $tg_token = get_field('telegram_token', 'option');
        $tg_chats = explode(',', get_field('telegram_chat', 'option'));


        $email = get_field('frontend_email', 'option');
        if (!$email) { return; }

        $to = $email;
        $headers = array(
            'From: Me Myself <'. $to .'>',
            'content-type: text/html'
        );
        ob_start();
    ?>
        <div>
            <?php if (isset($_POST['form_name'])): ?>
                <div>
                    <strong>Название формы: </strong>
                    <span><?= $_POST['form_name'] ?></span>
                </div>
            <?php endif; ?>

            <?php if (isset($_POST['tel'])): ?>
                <div>
                    <strong>Телефон: </strong>
                    <span><?= $_POST['tel'] ?></span>
                </div>
            <?php endif; ?>

            <?php if (isset($_POST['email'])): ?>
                <div>
                    <strong>Email: </strong>
                    <span><?= $_POST['email'] ?></span>
                </div>
            <?php endif; ?>
        </div>
<?php
    $message = ob_get_clean();
    wp_mail( $to, 'Письмо с сайта "Нова"', $message, $headers );

    $message = '<b>Сообщение с сайта "Нова"</b>:' . "\n\n";

    if ($_POST['form_name']) {
        $message .= '<b>Название формы:</b> ' . $_POST['form_name'] . "\n";
    }

    if ($_POST['page_link']) {
        $message .= '<b>Страница с которой была отправлена форма:</b> ' . $_POST['page_link'] . "\n";
    }

    if ($_POST['tel']) {
        $message .= '<b>Телефон:</b> <a href="tel:'. clearPhone($_POST['tel']) .'">' . $_POST['tel'] . "</a>\n";
    }

    if ($_POST['email']) {
        $message .= '<b>Email:</b> ' . $_POST['email'] . "\n";
    }

    foreach ($tg_chats as $chat) {
        $data = [
                'chat_id' => $chat,
                'text' => $message,
                'parse_mode' => 'HTML'
        ];
        $query = http_build_query($data);

        $url = "https://api.telegram.org/bot{$tg_token}/sendMessage?{$query}";
        file_get_contents($url);

        sleep(0.3);
    }

    wp_die();
}
?>