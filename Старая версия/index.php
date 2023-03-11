<?php
require_once('./scripts/Exeptions.inc.php');
require_once('./scripts/Page.class.php');
require_once('./seo.php');

$page = new Page;
$page->SetPageTemplate('evo');
$page->SetSeoData($seo);
$page->SetEncoding("UTF-8");
$page->SetDefaultModule('simplehtml')
?>
