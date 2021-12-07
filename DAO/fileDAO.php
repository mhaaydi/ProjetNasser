<?php
 include 'dbConfig.php';

 
 function selectLike($mot)
 {
   /*$db->query("INSERT INTO table_name (document, titre, description)VALUES  ('".$fileName."','".$titre."','".$description."')");
   $db->query("INSERT INTO mot (mot)VALUES  ('".$mot."')");
   
   $id_document = $db->query("SELECT max(id) FROM document");
   $id_mot = $db->query("SELECT max(id) FROM mot");
   
   $db->query("INSERT INTO document_mot(id_document, id_mot, poids) VALUES  ('".$id_document."','".$id_mot."','".$poids."')");
*/
	$db = database();
	$idMot = null;
	$idMot = $db->query("SELECT id FROM mot WHERE mot LIKE ('".$mot."')");
		while ($row = $idMot->fetch_assoc()) {
			return $row['id'];
		}
		
 }
 function insertMot($mot, $poids){
	 $db = database();
	 /*$
		$db->query("INSERT INTO mot (mot)VALUES  ('".$mot."')");*/
		//id_document = $db->query("SELECT max(id) FROM document");
		$motExist = selectLike($mot);
		if ($motExist == null)
		{
			$db->query("INSERT INTO mot (mot)VALUES  ('".$mot."')");
			$motExist = selectLike($mot);
		}
		
		$id_document = $db->query("SELECT max(id) FROM document");
		$row = mysqli_fetch_row($id_document);	   
		$db->query("INSERT INTO document_mot (id_document, id_mot, poids)VALUES  ('".$row[0]."', '".$motExist."', '".$poids."')");
 }
 
function insertDocument($fileName,$titre, $description){
			$db = database();
			$db->query("INSERT INTO document (document, titre, description) VALUES  ('".$fileName."','".$titre."','".$description."')");
}
// insertDocument('java','D�couvrez les meilleures ressources en fran�ais pour apprendre le d�veloppement web. Cha�nes YouTube, formations, podcasts, sites internet, le contenu sam�liore gr�ce � vos contributions.', 'dz');

function searchMot($mot){
			$db = database();
			return $db->query("SELECT mot FROM mot WHERE mot LIKE ('".$mot."')");
}
function searchMotFile($mot){
			$db = database();
			return $db->query("SELECT document.document, mot.mot, document.description,document.id
								FROM ((document_mot
								INNER JOIN document ON document_mot.id_document = document.id)
								INNER JOIN mot ON document_mot.id_mot = mot.id)
								where mot.mot like ('".$mot."')"
							);
}
function MotCloud($id){
			$db = database();
			return $db->query("SELECT  mot.mot, document_mot.poids
								FROM ((document_mot
								INNER JOIN document ON document_mot.id_document = document.id)
								INNER JOIN mot ON document_mot.id_mot = mot.id)
								where document.id like ('".$id."')"
							);
}
function selectFile(){
	$db = database();
			return $db->query("SELECT document.id,document.document FROM document");
}
function sizeFile($id){
	$db = database();
			return $db->query("SELECT  count(mot.mot) as size
								FROM ((document_mot
								INNER JOIN document ON document_mot.id_document = document.id)
								INNER JOIN mot ON document_mot.id_mot = mot.id)
								where document.id like ('".$id."')");
}
function get_mot($term){ 
$db = database();
		return $db->query("SELECT mot FROM mot WHERE mot LIKE '%".$term."%' ORDER BY mot LIMIT 5");
}
?>