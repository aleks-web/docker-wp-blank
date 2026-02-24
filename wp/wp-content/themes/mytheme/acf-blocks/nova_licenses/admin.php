<?php

$title = get_field('title');
$desc = get_field('desc');
$page = get_field('page_load_docs');
$docs = get_field('docs', $page->ID);

outputAcfStart();
    outputAcfTitle('Блок "Лицензии"');
    outputAcfLine('Заголовок', $title);
    outputAcfLine('Описание', $desc);
    outputAcfLine('Загрузка документов со страницы', $page->post_title);
    outputAcfLine('Количество загруженных документов', count($docs));
outputAcfEnd();