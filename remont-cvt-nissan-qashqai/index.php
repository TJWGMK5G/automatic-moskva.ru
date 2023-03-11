<?php
function lazyload_img($buffer) {

	return preg_replace("#<img([^>]*) src=['\"](.*?)['\"]([^>]*)>#", '<img$1 data-src="$2"$3><noscript><img$1 src="$2"$3></noscript>', $buffer);
	
} 

ob_start("lazyload_img");
require_once('./scripts/Exeptions.inc.php');
require_once('./scripts/Page.class.php');
require_once('./seo.php');

$page = new Page;
$page->SetPageTemplate('evo');
$page->SetSeoData($seo);
$page->SetEncoding("UTF-8");
$page->SetDefaultModule('simplehtml')
?>
