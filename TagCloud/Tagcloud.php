<?php    
	include '../DAO/fileDAO.php';
  $id = $_POST['id'];
  $mot = MotCloud($id);
  $size = sizeFile($id);
  $motspoids=[];
  while ($Result =$mot->fetch_assoc()) {    
	$motspoids += [$Result['mot']=>$Result['poids']];
  }
  
  function genererNuage( $data = array() , $minFontSize = 10, $maxFontSize = 36 )
{
    $tab_colors=array("#3087F8", "#7F814E", "#EC1E85","#708090","#A52A2A", "#9EA414");
       
    $minimumCount = min( array_values( $data ) );
    $maximumCount = max( array_values( $data ) );
    $spread = $maximumCount - $minimumCount;
    $cloudHTML = '';
    $cloudTags = array();
     
    $spread == 0 && $spread = 1;
    //Mélanger un tableau de manière aléatoire
    srand((float)microtime()*1000000);
    $mots = array_keys($data);
    shuffle($mots);
    
    foreach( $mots as $tag )
    {   
        $count = $data[$tag];
       
        //La couleur aléatoire
        $color=rand(0,count($tab_colors)-1);
           
        $size = $minFontSize + ( $count - $minimumCount )
            * ( $maxFontSize - $minFontSize ) / $spread;
        $cloudTags[] ='<a style="font-size: '.
            floor( $size +5) .
            'px' .
            '; color:' .
            $tab_colors[$color].
            '; " title="Rechercher le tag ' .
            $tag .
            '" href="rechercher.php?q=' .
            urlencode($tag) .
            '">' .
            $tag .
            '</a>';
    }
    return join( "\n", $cloudTags ) . "\n";
}   

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
     
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <link rel="stylesheet" href="../css/main.css">
<ul>
  <li><a class="active" href="/projetNasser/main.html">Ajouter file</a></li>
  <li><a href="/projetNasser/search/search.php">Chercher mot</a></li>
  <li><a href="/projetNasser/TagCloud/listeFile.php">Nuage de mot</a></li>
</ul>
 
<title>Nouage de mot</title>
        <style type="text/css">
            #tagcloud {
                width: 500px;
                background:#333;
                color:#0066FF;
                padding: 20px;
                border: 1px solid #559DFF;
                text-align:center;
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                border-radius: 50px;
            }
        </style>
</head>
     
<body>

<h1>Taille du fichier : <?php
	 while ($Result =$size->fetch_assoc()) {    
		echo $Result["size"] ; }
	 ?>
 </h1>
 
 
<h1>Nuage de mot:</h1>

<div id="tagcloud" style="margin: 0 auto; ">
<?php echo genererNuage( $motspoids ) ?>
</div>

</body>
</html>