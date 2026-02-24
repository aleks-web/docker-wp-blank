<?php

$title = get_field('title');
$desc = get_field('desc');
$is_button = get_field('is_button_order');
$is_button = $is_button == 1 ? "Да" : "Нет";

outputAcfStart();
    outputAcfTitle('Блок "Главный"');
    outputAcfLine('Заголовок', $title);
    outputAcfLine('Описание', $desc);
    outputAcfLine('Показывать кнопку', $is_button);
outputAcfEnd();