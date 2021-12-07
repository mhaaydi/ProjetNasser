<!DOCTYPE html>
<html>
<head>
   <title>Live Search using AJAX</title>
   <link rel="stylesheet" href="../css/main.css">
   <link rel="stylesheet" href="../css/input.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
   <script type="text/javascript" src="../script/scripts.js"></script>

</head>
<body>
<ul>
  <li><a class="active" href="/projetNasser/main.html">Ajouter file</a></li>
  <li><a href="/projetNasser/search/search.php">Chercher mot</a></li>
  <li><a href="/projetNasser/TagCloud/listeFile.php">Nuage de mot</a></li>
</ul>
</br></br>
<!-- Search box. -->
<div class="autocomplete" style="width:300px;">
   <input type="text" name="search" id="search" placeholder="Search" />
  </div> 
   <!-- Suggestions will be displayed in below div. -->
   <div id="display"></div>

 <script >
  $(function() {
     $( "#search" ).autocomplete({
       source: 'ajax-city-search.php',
     });
  });
</script>
</body>
</html>