<?php
$theme_dir = get_template_directory();
$scan_dir = $theme_dir . '/app/cpt/';

require_once($scan_dir . 'products.php');
require_once($scan_dir . 'partners.php');
require_once($scan_dir . 'clients.php');