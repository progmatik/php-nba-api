<?php
//error_reporting(E_ALL);
//ini_set("display_errors","On");
  class VueEquipeWest{

      
      function getVueEquipeWest($ptableauobjet){
$renderhtml='';
 $i = 0;  
 
 foreach($ptableauobjet as $article) 
{ 
   // $this->style($i,$style,$color);
     if($i%2 == 0){
        
        $style = "background-color: #ddd";
        $color = "#ddd";
        
    }else{
        
        $style = "background-color: white";
        $color = "white";
    }
    
        $idteam = $article->getIdTeam(); //id de la team

        $classement = $i + 1; 
//$idclassement = "eqw" . $classement;
   //$idchangecouleur = "yellowThing";
   $renderhtml.= '<tr class="testcl" onmouseover="this.style.backgroundColor=\'#aaaaaa\'" onmouseout="this.style.backgroundColor=\''.$color.'\'" onclick="recoi_equipe('.$idteam.');" style="'.$style.'">'.'<td style="border:none;text-align: center">'.$classement.'</td>'.
           '<td></td>'.
           '<td style="border:none;text-align: left">'.$article->getNom().'</td>'. // nom de l'equipe
           '<td style="border:none;text-align: left">'.$article->getNbrMatchJoue().'</td>'.//Nombre de matchs joué
           '<td style="border:none;text-align: left">'.$article->getNbrMatchGagne().'</td>'.//Nombre de matchs gagné
           '<td style="border:none;text-align: left">'.$article->getNbrMatchPerdu().'</td>'. //Nombre de matchs perdu
           '<td style="border:none;text-align: left">'.$article->getPourcentVictoire().'</td>'. //Pourcentage de victoire
           '<td style="border:none;text-align: center">'.$article->getResultMatchDom().'</td>'. //Résultats Match à domicile
           '<td style="border:none;text-align: center">'.$article->getResultMatchExt().'</td>'. //Résultats Matchs Exterieur
           '</tr>'; // nombre match joué
    //echo $equipe_AA[$i][5] . ',';//Renvoi le nom de l'equipe + le nombre de match joué
    
    $i++;
}
 
    echo $renderhtml;
  }

    }
    

