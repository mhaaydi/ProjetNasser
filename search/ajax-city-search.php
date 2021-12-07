<?php
	include '../DAO/fileDAO.php';
	
if (isset($_GET['term'])) {
	 $getMot = get_mot($_GET['term']);
	 $motList = array();
	 foreach($getMot as $mot){
	 $motList[] = $mot['mot'];
 }
 echo json_encode($motList);
}
?>