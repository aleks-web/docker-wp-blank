<?php

$title = get_field('form_title');
$desc = get_field('form_desc');
$image = get_field('form_image') ? get_field('form_image') : get_template_directory_uri() . '/assets/img/mainForm.png';


outputAcfStart();
    outputAcfTitle('Блок "Форма"');
    outputAcfLine('Заголовок', $title);
    outputAcfLine('Описание', $desc);
    outputAcfLine('Изображение', $image);
outputAcfEnd();