<?php
session_start();

include('nav.php');
if (empty($_SESSION["adminusername"])) {
    header('location:/freelance/ecommerce/php/login.php');
}

// Load XML file
$xml = new DOMDocument;
$xml->load('../../database/orders.xml');
$markers=$xml->getElementsByTagName('username');
// Load XSL file
$xsl = new DOMDocument;
$xsl->load('../../xslt/orders.xsl');

// Configure the transformer
$proc = new XSLTProcessor;

// Attach the xsl rules
$proc->importStyleSheet($xsl);

echo $proc->transformToXML($xml);
?> 