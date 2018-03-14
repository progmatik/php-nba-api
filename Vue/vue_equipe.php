<?php
error_reporting(E_ALL);
ini_set("display_errors","On");
class VueEquipe { 
  function getVueEquipe($ptableauobjet) {
    $i = 0;  
    $renderhtml = '<table id="equipe1" style="width:100%;border-collapse:collapse;border:1px solid black">        
    <tr class="headclassement">            
      <td class="equipe" style="text-align: center;width:5%" ></td>
      <td style="width:5%;text-align: center "></td>
      <td class="nomequipe" style="text-align: center;width:10%">Equipes</td>
      <td style="text-align: center;width:10%">Match Joués</td>
      <td style="text-align: center;width:10%">Match Gagné</td>
      <td style="text-align: center;width:10%">Match Perdu</td>
      <td style="text-align: center;width:10%">% de victoire</td>
      <td style="text-align: center;width:10%">Domicile</td>
      <td style="text-align: center;width:10%">Exterieur</td>
    </tr>
    </table><table id="donnequi1" >';
    foreach($ptableauobjet as $article) {  
      $ext = '.jpg';
      if ($i % 2 == 0) {
        $style = "background-color: #ddd";
        $color = "#ddd";
      } else {
        $style = "background-color: white";
        $color = "";
      }
      $idteam = $article->getIdTeam(); //id de la team
      $classement = $i + 1;
      $logo = $this->gestionLogo($article);
      $couleurclass = $this->couleurclass($classement);
      $renderhtml .= '<tr draggable="true" class="testcla"  onclick="recoi_equipe(' . $idteam . ')" style="' . $style . '">' .
      '<td style="border:none;width:5%">' . $classement . '</td>' .
      '<td style="width:5%" class="logoeq"><img src="../logo/' . $logo . $ext.'" alt="" style="height:20px;"/></td>' .
      '<td class="posclass" style="width:10%;color:' . $couleurclass . '">' . $article->getNom() . '</td>' . // nom de l'equipe
      '<td style="width:10%">' . $article->getNbrMatchJoue() . '</td>' . //Nombre de matchs joué
      '<td style="width:10%">' . $article->getNbrMatchGagne() . '</td>' . //Nombre de matchs gagné
      '<td style="width:10%">' . $article->getNbrMatchPerdu() . '</td>' . //Nombre de matchs perdu
      '<td style="width:10%">' . $article->getPourcentVictoire() . '</td>' . //Pourcentage de victoire
      '<td style="width:10%">' . $article->getResultMatchDom() . '</td>' . //Résultats Match à domicile
      '<td style="width:10%">' . $article->getResultMatchExt() . '</td>' . //Résultats Matchs Exterieur
      '</tr>'; // nombre match joué      
       $i++;
     }
     $renderhtml .='</table>';
     echo $renderhtml;
  }
  function gestionLogo($object){      
    if ($object->getNom() == "New York") {
      $logo = "New_York";
    } else {
      $logo = $object->getNom();
    }        
    return $logo;
  }
  function couleurclass($pclassement){
    if ($pclassement <= 8) {
      $couleurclass = '#DAA520';
    } else {
      $couleurclass = '';
    }        
    return $couleurclass;
  }
}
