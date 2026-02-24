<?php

$title = get_field('title');
$steps = get_field('steps');

outputAcfStart();
    outputAcfTitle('Блок "Шаги"');
    outputAcfLine('Заголовок', $title);
    outputAcfLine('Количество шагов', count($steps));
outputAcfEnd();