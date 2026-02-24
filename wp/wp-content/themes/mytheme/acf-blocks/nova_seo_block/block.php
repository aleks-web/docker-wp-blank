<?php

if ( is_admin() ) {
    require_once __DIR__ . '/admin.php';
} else {
    require_once __DIR__ . '/front.php';
}