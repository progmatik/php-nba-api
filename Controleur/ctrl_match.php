<?php
error_reporting(E_ALL);
ini_set("display_errors","On");
class ControlerMatch{
    //id date equipe g/p point
    
    private $idgame;
    private $date;
    private $equipe;
    private $win_loose;
    private $point;
    private $tabo;
    
    private function setArrObj(array $p_arrObjMatch){
		$this->tabo = $p_arrObjMatch;
	}
	
	public function getArrObj(){
		return $this->tabo;
	}
    
    function getIdGame(){return $this->idgame;}
    function setIdGame($pidgame){$this->idgame = $pidgame;}
    
    function getDate(){return $this->date;}
    function setDate($pdate){$this->date = $pdate;}
    
    function getEquipe(){return $this->equipe;}
    function setEquipe($pequipe){$this->equipe = $pequipe;}
    
    function getWinLoose(){return $this->win_loose;}
    function setWinLoose($pwinloose){$this->win_loose = $pwinloose;}
    
    function getPoint(){return $this->point;}
    function setPoint($ppoint){$this->point = $ppoint;}
    
    
    function getControlerMatch(){
        
    require_once '../Modele/mdl_match.php'; 
    $tableauobjet = array();
    $matchobjet = new Match();
    $tab = $matchobjet->getMatch();
    $matchs_AA = array();
    $count = count($tab['resultSets'][0]['rowSet']);

    for ($i = 0; $i < $count; $i++) {
        $matchs_AA[$i] = $tab['resultSets'][0]['rowSet'][$i];
        $controleurmatch = new ControlerMatch();
        $controleurmatch->setIdGame($matchs_AA[$i][1]);
        $controleurmatch->setDate($matchs_AA[$i][2]);
        $controleurmatch->setEquipe($matchs_AA[$i][3]);
        $controleurmatch->setWinLoose($matchs_AA[$i][4]);
        $tableauobjet[] = $controleurmatch;
    }
    
   $this->setArrObj($tableauobjet);

   if (isset($_POST['valchrech']) && $_POST['valchrech'] != "") {
        
       $this->gestionFiltre($this->getArrObj());
    }
        //recoi la liste des points a partir
        //de la liste des matchs et ajoute lobjet point au tableau des objet match
       $this->getTableauScore($this->getArrObj());

}
/***
 * FUNCTION QUI RETOURNE UN TABLEAU QUI FILTRE LE TABLEAU DES OBJETS
 */
function gestionFiltre($tableaufiltrer){
    
    $compequi = array();
    $blaseequi = array(
    'CLE' => 'cleveland cavaliers',
    'TOR' => 'toronto raptors',
    'ATL' => 'atlanta',
    'BOS' => 'boston celtics',
    'CHA' => 'charlotte hornets',
    'MIA' => 'miami heat',
    'IND' => 'indiana pacers',
    'DET' => 'detroit pistons',
    'CHI' => 'chicago bulls',
    'WAS' => 'washington wizards',
    'MIL' => 'milwaukee bucks',
    'ORL' => 'orlando magic',
    'NYK' => 'new york knicks',
    'BKN' => 'brooklyn nets',
    'PHI' => 'philadelphia 76ers',
    'GSW' => 'golden state warriors',
    'SAS' => 'san antonio spurs',
    'OKC' => 'oklahoma city thunders',
    'LAC' => 'los angeles clippers',
    'MEM' => 'memphis grizzlies',
    'POR' => 'portland trail blazers',
    'DAL' => 'dallas mavericks',
    'UTA' => 'utah jazz',
    'HOU' => 'houston rockets',
    'DEN' => 'denver nuggets',
    'SAC' => 'sacramento kings',
    'NOP' => 'new orleans pelicans',
    'MIN' => 'minnesota timberwolves',
    'PHX' => 'phoenix suns',
    'LAL' => 'los angeles lakers',
);
    
    $valrech = $_POST['valchrech'];
    $longvaleur = strlen($_POST['valchrech']);
    $k=0;
    foreach($tableaufiltrer as $key=>$value) {
      $bequipe = $value->getEquipe();
      
      foreach ($blaseequi as $cle => $valeur) {
//
           if (strtolower($_POST['valchrech']) == substr($valeur, 0, $longvaleur)){
//              
                if(strlen($bequipe) == 11){// si vs
                    $compequi[$k] = substr($bequipe,8,10);
                    
                    if($cle != $compequi[$k]){
                        unset($tableaufiltrer[$key]);
                    }
                    else{
                  //  $compequi = array_values($compequi);
                    }
                }
                    else{//si @
                        $compequi[$k] = substr($bequipe,6,8);//creer tableau pour ajouter nom dequipe a trier
                   
                            if($cle != $compequi[$k]){
                                unset($tableaufiltrer[$key]);
                
                            }
                            else{
                    
                            }
     
                    }
 
            }
            else{
              
     
            }

            
        }
        $k++;
    }
  
    $tableaufiltrer = array_values($tableaufiltrer);
    //$this->setArrObj($tableaufiltrer);
   // return $tableaufiltrer;
    $this->setArrObj($tableaufiltrer);
}

function getTableauScore($ptableau){
    $i=0;
    $matchobjet1 = new Match();
  $tabscore = $matchobjet1->getTableauPoint($this->getArrObj());//recup données POINTS a partir du modele
  //check if all data are there :
  for($k=0;$k<count($tabscore);$k++){
      
      
      if($tabscore[$k]['resultSets'][5]['rowSet'][0][22] ==''){
          
    $tabscore = $matchobjet1->getTableauPoint($this->getArrObj());//recup données POINTS a partir du modele

      }
      
  }
  
  //+++++++++++++++++++++++++++++
    foreach ($ptableau as $value){

   if(substr($value->getEquipe(),0,3) == $tabscore[$i]['resultSets'][5]['rowSet'][0][4]){
       
       $value->setPoint($tabscore[$i]['resultSets'][5]['rowSet'][0][22].'-'.$tabscore[$i]['resultSets'][5]['rowSet'][1][22]);//infomatch.resultSets[5].rowSet[1][22]

        }else{
            
       $value->setPoint($tabscore[$i]['resultSets'][5]['rowSet'][1][22].'-'.$tabscore[$i]['resultSets'][5]['rowSet'][0][22]);//infomatch.resultSets[5].rowSet[1][22]

        }

  $i++;
   }
}

function getView(){
$this->getControlerMatch(); // recoi la liste des match
require_once '../Vue/vue_match.php';
$getvuematch = new VueMatch();
$getvuematch->getVueMatch($this->getArrObj());
}
}

