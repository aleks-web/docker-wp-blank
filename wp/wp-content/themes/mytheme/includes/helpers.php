<?php

function dd($dd) {
    echo '<pre style="color: black; background-color: white;z-index: 1000000;">';
    print_r($dd);
    echo '</pre>';
}

function clearPhone($phone) {
    return preg_replace('/[^0-9]/', '', $phone);
}

function outputAcfStart() {
    echo '<div class="acf-block">';
    echo '<img class="acf-block__bg-img" src="' . get_template_directory_uri() . '/assets/img/bgSmall.svg" alt="bgSmall">';
}

function outputAcfEnd() {
    echo '</div>';
}

function outputAcfTitle($title) {
    echo '<h2 class="acf-block__title">'. $title .'</h2>';
}

function outputAcfLine($label, $value) {
    echo '<div class="acf-block__line">';
        echo '<strong>' . $label . '</strong>: ' . str_ireplace(['<p>', '</p>', '<br>', '<br />', '<br/>'], '', $value);
    echo '</div>';
}