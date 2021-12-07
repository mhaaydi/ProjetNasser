<?php
	include '../DAO/fileDAO.php'
	?>
	
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<ul>
  <li><a class="active" href="/projetNasser/main.html">Ajouter file</a></li>
  <li><a href="/projetNasser/search/search.php">Chercher mot</a></li>
  <li><a href="/projetNasser/TagCloud/listeFile.php">Nuage de mot</a></li>
</ul>
 <style>
	table {
	  font-family: arial, sans-serif;
	  border-collapse: collapse;
	  width: 100%;
	}

	td, th {
	  border: 1px solid #dddddd;
	  text-align: left;
	  padding: 8px;
	}

	tr:nth-child(even) {
	  background-color: #dddddd;
	}
</style>
	  <table border="1"  cellspacing="0" cellpadding="2">
			<tr>
				<td>document</td>
				<td>Nuage de mot</td>
			</tr>
			
</br></br>
<?php
$file = selectFile();
  while ($Result =$file->fetch_assoc()) {    
  
       ?>
		<tr>
		  <td><?php echo $Result['document']; ?></td>
		  <form action="/projetNasser/TagCloud/Tagcloud.php" method="post">
			<td><button name="id" type="submit" value="<?php echo $Result['id']; ?>">Afficher</button><td>
		</form>
		  
	   </tr>
  
   <?php
}
?>
 </table>
	
</body>
</html>