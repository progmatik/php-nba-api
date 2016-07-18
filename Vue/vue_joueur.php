<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
class VueJoueur{
 public function __construct(){
     
     
 }
    
function getVueJoueur($ptableauobjet){

$renderhtml =
'<table id="joueur" style="width:75%;border-collapse:collapse;border:0px ;">'.
        '<tr class="menuequipe">'.
        '<td style="width:20%;text-align:center" onmouseover="this.style.backgroundColor=\'#aaaaaa\'" onmouseout="this.style.backgroundColor=\''.$color.'\'" onclick="recoi_equipe('.$_POST['idequipe'].')">Joueurs</td>'.
        '<td style="width:20%;text-align:center" onmouseover="this.style.backgroundColor=\'#aaaaaa\'" onmouseout="this.style.backgroundColor=\''.$color.'\'" onclick="listematch(\''.$_POST['idequipe'].'\')" >Matchs</td>'.
        '<td style="width:20%;text-align:center" onmouseover="this.style.backgroundColor=\'#aaaaaa\'" onmouseout="this.style.backgroundColor=\''.$color.'\'" onclick="listematchd('.$_POST['idequipe'].')" >Domicile</td>'.
        '<td style="width:20%;text-align:center" onmouseover="this.style.backgroundColor=\'#aaaaaa\'" onmouseout="this.style.backgroundColor=\''.$color.'\'" onclick="listematchex('.$_POST['idequipe'].')">Exterieur</td>'.
        '</tr></table>';

 $renderhtml .= '<table id="headjoueur1" style="width:75%;border-collapse:collapse;border:0px">
                <tr id="headjoueur">
                
                <td style="width:20%;text-align: center">Numéro</td>
                <td  style="width:20%;text-align: center">Joueurs</td>
                <td style="width:20%;text-align: center">Age</td>
                <td style="width:20%;text-align: center">Position</td>
                
                
                
            </tr></table>'; 
        
      $renderhtml .=  '<table id="info2" style="width:75%;border-collapse:collapse;border:0px">';
      $i = 1;
 foreach($ptableauobjet as $article) 
{ 

    if($i%2 == 0){
        $style = "background-color: white";
        
    }else{
        
      $style = "background-color: #ddd";
  

    }

$renderhtml .= '<tr onclick="alert('.$article->getIdJoueur().')" style="'.$style.'">'.
        '<td style="border:none;width:20%;text-align: center">'.$article->getNumero().'</td>'.//numero joueur
           '<td style="border:none;width:20%;text-align: center">'.$article->getNom().'</td>'. // nom joueur
           '<td style="border:none;width:20%;text-align: center">'.$article->getAge().'</td>'.//age
           '<td style="border:none;width:20%;text-align: center">'.$article->getPosition().'</td>'.//position
        '</tr>';
$i++;
}
$renderhtml .= '</table>';
echo $renderhtml;
}

    }


