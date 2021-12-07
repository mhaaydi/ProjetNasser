<?php
    header('Content-Type:text/html; charset=UTF-8');

	//$texte =  "test.html";
    function page_title($txt) {
		$fileHtml = file_get_contents($txt);

       // $fileHtml = file_get_contents($txt);
        if (!$fileHtml) 
            return null;

        $res = preg_match("/<title>(.*)<\/title>/siU", $fileHtml, $title_matches);
        if (!$res) 
            return null; 

        // Clean up title: remove EOL's and excessive whitespace.
        $title = preg_replace('/\s+/', ' ', $title_matches[1]);
        $title = trim($title);
        return iconv(mb_detect_encoding($title, mb_detect_order(), true), "UTF-8", $title);
    }
	function page_dicription($txt) {
		$tags = get_meta_tags($txt);
		//foreach($tags as $vale)
		//	echo $vale;
		//if( is_object( $tags[name=description] ){
			//echo 'kkkkk';
		if(!empty($tags['description'])){
			return  iconv(mb_detect_encoding($tags['description'], mb_detect_order(), true), "UTF-8", $tags['description']);  
		}
		return null;
    }

	//echo page_title($texte). '</br>';
	//  page_dicription($texte);
?>