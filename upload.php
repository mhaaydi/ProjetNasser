<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/main.css">
</head>
 
<body>

<ul>
  <li><a class="active" href="/projetNasser/main.html">Ajouter file</a></li>
  <li><a href="/projetNasser/search/search.php">Chercher mot</a></li>
  <li><a href="/projetNasser/TagCloud/listeFile.php">Nuage de mot</a></li>
</ul>
</br></br>
</body>
</html>
<?php  
	include 'Mot.php';
	include 'getHead.php';
	include 'DAO/fileDAO.php';


	
	$uploads_dir = 'C:/wamp64/www/projetNasser/file';
	
	if (is_uploaded_file($_FILES['userfile']['tmp_name'])){
		$fileData = $_FILES['userfile']['tmp_name'];
		$name = basename($_FILES["userfile"]["name"]);
		$path = $uploads_dir . "/" .  $name;
		move_uploaded_file($fileData, $path);
		//echo $path ;
    } else {
        print "Upload failed!";
    }
	function main($file){
		
		
		$titre = page_title($file);
		$fileHtml  =  strip_tags($file);
		
		$description = page_dicription($file);
		$texte = body(remove_script($fileHtml));
		
		$texte = stripcslashes($texte);
		$titre = stripcslashes($titre);
		
		$separateurs = " ,!.?'’():[]";
		$texte = strtolower($texte);
		$titre  = strtolower($titre );
		//$texte = mb_strtolower($texte,'UTF-8');
		
		$tab_mots = explode_bis ($separateurs, $texte);
		$tab_titre = explode_bis ($separateurs, $titre);
		
		$tab_mots_occurrences = array_count_values($tab_mots);
		$tab_titre_occurrences = array_count_values($tab_titre);
	
		
		insertDocument($file, $titre, $description);
	    save($tab_mots_occurrences,$tab_titre_occurrences);
		
		echo 'Fichier ajouter avec succes';
		//print_tab($tab_titre_occurrences );
		//print_tab($tab_mots_occurrences);
		//echo calcule_poids($tab_mots_occurrences,$tab_titre_occurrences);
	}
	main($path);
	function save($tab_mots,$tab_titre){
		foreach ($tab_titre as $indiceTitre => $valeurTitre) {
			$titre = null;
			$valeur = 0;
			foreach ($tab_mots as $indiceMot => $valeurMot) {

				if( $indiceMot == $indiceTitre)
				{
					$titre = $indiceTitre;
					$valeur = $valeurTitre;
					$poids = $valeurMot + ($valeurTitre * 1.5);
					//echo $indiceMot;
					insertMot($indiceMot, $poids);
				}
				
			}
			if(($indiceTitre != $titre)){
				$valeur =  $valeurTitre * 1.5;
				//echo iconv(mb_detect_encoding($indiceTitre, mb_detect_order(), true), "UTF-8", $indiceTitre);

				insertMot($indiceTitre, $valeur);
				//echo $indiceTitre;
			}
		}			

	foreach ($tab_mots as $indiceMot => $valeurMot) {
			$titre = null;
			$valeur = 0;
			foreach ($tab_titre as $indiceTitre => $valeurTitre) {
				if( $indiceMot == $indiceTitre)
				{
					$titre = $indiceTitre;
					
				}
				
			}
			if($indiceMot != $titre)
			{	

				//echo $indiceMot;
				insertMot($indiceMot,  $valeurMot);
			}
			
		}			
		
	}
	//$uploaddir = 'C:/wamp64/www/projetNasser/file/';
//$uploadfile = $uploaddir . basename($_FILES['userfile']['tmp_name']);
	//echo $fileData;
	//$target_path = "C:\wamp64/www/projetNasser/file";  
	//$target_path = $target_path.basename( $_FILES['fileToUpload']['name']);   
	//function uploadFile()
	//{
	//	$file = $_FILES['fileToUpload']['tmp_name'];
	//	if($file) {  
	//		return file_get_contents($file);
	//		echo "File uploaded successfully!";  
	//	}
	//	else
	//	{  
	//		echo "Sorry, file not uploaded, please try again!";  
	//	}  
	//}

?>  