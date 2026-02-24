<?php

$title = get_field('title');
$advantages = get_field('advantages');

outputAcfStart();
    outputAcfTitle('Блок "Наши преимущества"');
    outputAcfLine('Заголовок', $title);
    outputAcfLine('Количество элементов', count($advantages));
outputAcfEnd();