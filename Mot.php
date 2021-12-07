
<?php
    header('Content-Type:text/html; charset=UTF-8');


include 'getBody.php';
//include 'upload.php';

/*$texte =  "test.html";

$fileHtml  =  strip_tags($texte);

$texte = body(remove_script($fileHtml));

 $texte = stripcslashes($texte);
$separateurs = " ,!.'’():";

$texte = strtolower($texte);

$tab_mots = explode_bis ($separateurs, $texte);
$tab_mots_occurrences = array_count_values( $tab_mots );
print_tab($tab_mots_occurrences);
*/
function explode_bis($separateurs, $texte)
{
    $tok = strtok($texte, $separateurs);
    if(strlen($tok)>2) $tab_mots[] = $tok;
    while ($tok !== false)
    {
        $tok = strtok($separateurs);
        if(strlen($tok)>2) $tab_mots[] = $tok;
    }
    return  diffrenceMot($tab_mots);
}
function calcule_poids($tab_mots, $tab_titre)
{		
		$mot_titre = $tab_titre * 1.5;
		$poids = $mot_poid + $mot_titre;
		return $poids;
}
function diffrenceMot($tab_mots)
{
	$tab_banni =
		array(
		"mais","ou","et","donc","or","ni","car","//www","copyright",
		"je","il","lui","ils","elle","elles","nous","vous",
		"vos","votre","mes","mien","mien","tien","tiens",
		"tout","toute","toutes",
		"a","b","c","d","e","f","g","h","i","j","l","m","n","o","p","q",
		"r","s","t","u","v","w","x","y","z",
		"le","la","les","nos",
		"alors","au","aucuns","aussi","autre","avant","avec","avoir","bon","car","ce",
		"cela","ces","ceux","chaque","ci","comme","comment","dans","des","du","dedans",
		"dehors","depuis","deux","devrait","doit","donc","dos","droite","début","elle",
		"elles","en","encore","essai","est","et","eu","fait","faites","fois","font",
		"force","haut","hors","ici","il","ils","je juste","la","le","les","leur","là",
		"ma","maintenant","mais","mes","mine","moins","mon","mot","même","ni","nommés",
		"notre","nous","nouveaux","ou","où","par","parce","parole","pas","personnes",
		"peut","peu","pièce","plupart","pour","pourquoi","quand","que","quel","quelle",
		"quelles","quels","qui","sa","sans","ses","seulement","si","sien","son",
		"sont","sous","soyez sujet","sur","ta","tandis","tellement","tels","tes","ton",
		"tous","tout","trop","très","tu","valeur","voie","voient","vont","votre","vous",
		"vu","ça","étaient","état","étions","été","être",
		"un","deux","trois","quatre","cinq","six","sept","huit","neuf","dix",
		"0","1","2","3","4","5","6","7","8","9","10",
		"avec","chez","par","dans","des","en","de","une","votre","meilleurs","entre",
		"entres","depuis","alors","ne","pas","du","meme",
		"ou","nom","seuls","acceptes","ayant",
		"vos","votre","mes","mien","mien","tien","tiens","tout","toute","toutes",
		"que","quoi","qui","comment","peu","peut","pis","puis","pas",
		"chaque","chacun","chacune",
		"son","ses","au","aux","se","sur","ce","ceux","cette","ca","ci","ceci","cela",
		"aussi","pour","petit","grand","moyen","large","haut","bas","milieu","droite",
		"gauche","centre","dit","etre","leur","leurs","plus","moin","moins",
		"es","est","sont","son","va","suis","ai","viens"
						   );
		return  array_diff($tab_mots,$tab_banni);				   
}
function print_tab($tab_mots)
{
   echo '<table border="1" width="400" cellspacing="0" cellpadding="2">';
		foreach ($tab_mots as $indice => $valeur) {
				echo '<tr>';
					echo '<td>';
						echo $indice;
					echo '</td>';
					
					echo '<td>';
						echo $valeur;
					echo '</td>';
				echo '</tr>';
				
			}
	echo '</table>';
}

?>
<?php
//$texte =  'test.txt';
//$fileHtml ="test.html";
//$text = html_entity_decode($fileHtml);

//file_put_contents($texte, $text);
//$texte =  file_get_contents("test.html");

//$separateurs = " ,!.'’()<>=-©"	;
//$texte =  strip_tags($texte);
//$texte = body(remove_script($fileHtml));
//$texte = strtolower($texte);



//$tab_mots = explode_bis ($separateurs, $texte);

//print_tab($tab_mots);

//calcule le nombre d'occurences de chacune des entrées
//du tableau (mots) et retourne un tableau associatif ( [mot]=nombre )
/*$tab_mots_occurrences = array_count_values( $tab_mots );

print_tab($tab_mots_occurrences);

function explode_bis($separateurs, $texte)
{
    $tok = strtok($texte, $separateurs);
    if(strlen($tok)>2) $tab_mots[] = $tok;
    while ($tok !== false)
    {
        $tok = strtok($separateurs);
        if(strlen($tok)>2) $tab_mots[] = $tok;
    }
    return $tab_mots;
}

function print_tab($tab_mots)
{
	echo '<table border="1" width="400" cellspacing="0" cellpadding="2">';
		foreach ($tab_mots as $indice => $valeur) {
				echo '<tr>';
					echo '<td>';
						echo $indice;
					echo '</td>';
					
					echo '<td>';
						echo $valeur;
					echo '</td>';
				echo '</tr>';
				
			}
	echo '</table>';
}
?>
</body></html> */
