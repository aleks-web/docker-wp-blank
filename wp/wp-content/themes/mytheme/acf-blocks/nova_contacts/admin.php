<?php

$title = get_field('title');
$desc = get_field('desc');

outputAcfStart();
    outputAcfTitle('Блок "Контакты"');
    outputAcfLine('Заголовок', $title);
    outputAcfLine('Описание', $desc);
outputAcfEnd();