<?php
/**
 * Limita caracteres do Excerpet
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function theme_slug_excerpt_length( $length ) {
    if ( is_admin() ) {
            return $length;
    }
    return 50;
}
add_filter( 'excerpt_length', 'theme_slug_excerpt_length', 999 );