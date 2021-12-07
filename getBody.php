<?php
    header('Content-Type:text/html; charset=UTF-8');

$file =  "test2.html";
function body($html){
	//$html = file_get_contents($html);


	libxml_use_internal_errors(true); //Prevents Warnings, remove if desired
	$dom = new DOMDocument();
	$dom->loadHTML($html);
	$body = "";
	foreach($dom->getElementsByTagName("body")->item(0)->childNodes as $child) {
		$body .= $dom->saveHTML($child);
	}
	return iconv(mb_detect_encoding(strip_tags($body), mb_detect_order(), true), "UTF-8", strip_tags($body));
}
function remove_script($texte){
	$html = file_get_contents($texte);


	libxml_use_internal_errors(true); //Prevents Warnings, remove if desired
	$dom = new DOMDocument();
	$dom->loadHTML($html);

	$script = $dom->getElementsByTagName('script');
	$header= $dom->getElementsByTagName('header');
	$style= $dom->getElementsByTagName('style');

	$remove = [];
	foreach($script as $item)
	{
	  $remove[] = $item;
	}
	
	$remove1 = [];
	foreach($header as $itemH)
	{
	  $remove1[] = $itemH;
	}
	
	$remove2 = [];
	foreach($style as $itemS)
	{
	  $remove2[] = $itemS;
	}

	foreach ($remove as $item)
	{
	  $item->parentNode->removeChild($item); 
	}
	foreach ($remove1 as $itemH)
	{
	  $itemH->parentNode->removeChild($itemH); 
	}
	foreach ($remove2 as $itemS)
	{
	  $itemS->parentNode->removeChild($itemS); 
	}

	return $html = $dom->saveHTML();
}

//echo body($file);
//echo body(remove_script($file));
?>