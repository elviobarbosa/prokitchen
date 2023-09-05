<?php
get_header();
include 'vendor/autoload.php';

$parser = new \Smalot\PdfParser\Parser();
$PDFfile = 'garbage/Profile.pdf';
$PDF = $parser->parseFile($PDFfile);
$PDFContent = $PDF->getText();
echonl2br($PDFContent);



get_footer();
?>