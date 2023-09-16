<?php
function whatsapp_link( $cell_number, $text ) {
    $number = format_wapp_number($cell_number);
    echo "https://api.whatsapp.com/send?phone={$number}&text={$text}";
}

function format_wapp_number( $cell_number ) {
    return preg_replace( '/[^0-9]/', '', $cell_number );
}

function format_to_phone($phone_number) {
    $ddd = substr($phone_number, 0, 2);
    $prefixo = substr($phone_number, 2, 5);
    $sufixo = substr($phone_number, 7);

    return "$ddd $prefixo-$sufixo";
}