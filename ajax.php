<?php

	include 'DAO/fileDAO.php';
if (isset($_POST['search'])) {

   $mot = $_POST['search'];
    
   $ExecQuery =searchMotFile($mot);
   ?>
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
				<td>mot</td>
				<td>document</td>
				<td>description</td>
			</tr>
<?php

   while ($Result =$ExecQuery->fetch_assoc()) {    
  
       ?>

   <div onclick='fill("<?php echo $Result['mot']; ?>")'></div>
   <a>
		<tr>
		  <td><?php echo $Result['mot']; ?></td>
		  <td><?php echo $Result['document']; ?></td>
		  <td><?php echo $Result['description']; ?></td>
	   </tr>
   </a>
   </table>
   <?php
}}
?>
</ul>