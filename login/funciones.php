<?php

function generar_pass($fecha) {
    //https://stackoverflow.com/questions/12270273/php-get-the-year-from-the-variable

    $year= (int) explode('-', $fecha)[0];
    $month= (int) explode('-', $fecha)[1];
    $day= (int) explode('-', $fecha)[2];

    $password = $year * $month + $day;
    return $password;
}

