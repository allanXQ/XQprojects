<?php
session_start();

include('nav.php');
if (empty($_SESSION["adminusername"])) {
    header('location:/freelance/ecommerce/php/admin/login.php');
}

// Load XML file
$xml = new DOMDocument;
$xml->load('../../database/users.xml');
$markers=$xml->getElementsByTagName('username');
// Load XSL file
$xsl = new DOMDocument;
$xsl->load('../../xslt/user.xsl');

// Configure the transformer
$proc = new XSLTProcessor;

// Attach the xsl rules
$proc->importStyleSheet($xsl);

echo $proc->transformToXML($xml);
?> 