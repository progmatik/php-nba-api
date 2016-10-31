<?php

class VueMatch{

    function getVueMatch($ptableauobjet){

$renderhtml = '<table id="matchs" style="width:75%;border-collapse:collapse;border:0px;">' .
 '<tr class="menuequipe">' .
 '<td style="width:20%;text-align:center" onmouseover="this.style.backgroundColor=\'#aaaaaa\'" onmouseout="this.style.backgroundColor=\'' . $color . '\'" onclick="recoi_equipe(' . $_POST['idequipe2'] . ')">Joueurs</td>' .
 '<td style="width:20%;text-align:center" onmouseover="this.style.backgroundColor=\'#aaaaaa\'" onmouseout="this.style.backgroundColor=\'' . $color . '\'" onclick="listematch(\'' . $_POST['idequipe2'] . '\')">Matchs</td>' .
 '<td style="width:10%;text-align:center" onmouseover="this.style.backgroundColor=\'#aaaaaa\'" onmouseout="this.style.backgroundColor=\'' . $color . '\'" onclick="listematchd(' . $_POST['idequipe2'] . ')">Domicile</td>' .
 '<td style="width:20%;text-align:center" onmouseover="this.style.backgroundColor=\'#aaaaaa\'" onmouseout="this.style.backgroundColor=\'' . $color . '\'" onclick="listematchex(' . $_POST['idequipe2'] . ')">Exterieur</td>' .
 '</tr></table>' .
 '<table style="width:75%;border-collapse:collapse;border:0px;"><tr id="headmatch">' .
 '<td style="text-align: center;width:20%">Date</td>' .
 '<td style="text-align: center;width:20%">Equipes</td>' .
 '<td style="text-align: center;width:10%">G/P</td>' .
 '<td style="text-align: center;width:20%">Points</td>' .
 '</tr>' .
 '<tr id="filtre">' .
 '<td style="text-align: center;width:20%"></td>' .
 '<td style="text-align: center;width:20%"><input type="text" size="13" id="rechequi" onkeyup="filtrer2(this.value,\'' . $_POST['idequipe2'] . '\')"/></td>' .
 '<td style="text-align: center;width:10%"></td>' .
 '<td style="text-align: center;width:20%"></td>' .
 '</tr></table>';
$i = 1;
//$count2 = count($tableau);
$renderhtml .= '<table id="info2" style="width:75%;border-collapse:collapse;border:0px">';
foreach($ptableauobjet as $match)
{
    $idgame = $match->getIdGame();

    if ($i % 2 == 0) {

        $style = "background-color: white";
        $color = "white";


    } else {

        $style = "background-color: #ddd";
        $color = "#ddd";
    }

    if ($match->getWinLoose() == "W") {

        $couleur = "rgba(38,252,156,0.7)";
        //$couleur = "yellow";
    } else {

        $couleur = "rgba(252,38,63,0.7)";

       // $couleur = "red";
    }

    $lignem = 'lignem' . $i;
    $element = 'celscore' . $i;
    $prog = 'getinfomatch';
    $renderhtml .= '<tr href="#oModal" onclick="foo(\'' . $lignem . '\',\'' . $match->getDate() . '\',\'' . $match->getEquipe() . '\',\'' . $match->getPoint() . '\')" id="' . $lignem . '" href="#oModal" onmouseover="this.style.backgroundColor=\'#aaaaaa\'" onmouseout="this.style.backgroundColor=\'' . $color . '\'" style="' . $style . '" >' .
    '<td style="width:20%;text-align:center">' . $match->getDate() . '</td>' . //date
    '<td style="width:20%;text-align:center">' . $match->getEquipe() . '</td>' . //equipes
    '<td style="width:10%;text-align:center;background-color:' . $couleur . '">' . $match->getWinLoose() . '</td>' . //G/P
    '<td id="' . $element . '" style="width:20%;text-align:center">' . $match->getPoint() . '</td>' . //Points
    '</tr>';


    $renderhtml .= '<tr><div id="oModal" class="cModal" >
  <div id="ttmodal">
    <header>
      <h2>Nba Game</h2>
    </header>
    <p id="confrontation"></p>
    <p id="texttest"></p>

    <footer class="cf">
      <a onclick="rafraichmod()" href="#fermer" class="btn">Fermer</a>
    </footer>
  </div>
</div></tr>';
    $i++;
}
$renderhtml .= '</table>';
echo $renderhtml;
}

    }
