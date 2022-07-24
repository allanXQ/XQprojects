<?php
session_start();

include('nav.php');
if (empty($_SESSION["username"])) {
    header('location:/freelance/ecommerce/php/login.php');
}

// Load XML file
$xml = new DOMDocument;
$xml->load('../database/products.xml');

// Load XSL file
$xsl = new DOMDocument;
$xsl->load('../xslt/products.xsl');

// Configure the transformer
$proc = new XSLTProcessor;

// Attach the xsl rules
$proc->importStyleSheet($xsl);

echo $proc->transformToXML($xml);

?> 