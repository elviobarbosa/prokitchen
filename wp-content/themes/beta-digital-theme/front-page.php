<?php
get_header();
include 'vendor/autoload.php';

$parser = new \Smalot\PdfParser\Parser();
$PDFfile = get_template_directory() . '/garbage/Profile.pdf';
$PDF = $parser->parseFile($PDFfile);
$PDFContent = $PDF->getText();
echo $PDFContent;
$data = $PDF->getPages()[0]->getDataTm();
// echo '<pre>';
// var_dump($data);
// echo '</pre>';


get_footer();
?>