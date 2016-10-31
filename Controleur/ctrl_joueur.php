<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
class ControlerJoueur{
  // private $joueur_AA = array();

  private $idjoueur;
  private $numero;
  private $nom;
  private $age;
  private $position;
  private $tabo;
  //private $arraylength;
  private function setArrObj(array $p_arrObjEquipe){
    $this->tabo = $p_arrObjEquipe;
  }

  public function getArrObj(){
    return $this->tabo;
  }

  public function __construct() {

    //  $this->joueur_AA = $pjoueur_AA;

  }

  function getNom(){


    return $this->nom;

  }
  function setNom($lnom){

    $this->nom = $lnom;
  }

  function getIdJoueur(){

    return $this->idjoueur;
  }

  function getNumero(){

    return $this->numero;
  }

  function getAge(){

    return $this->age;
  }

  function getPosition(){

    return $this->position;
  }


  function setNumero($pnumero){

    $this->numero = $pnumero;
  }

  function setAge($page){

    $this->age = $page;
  }

  function setPosition($pposition){

    $this->position = $pposition;

  }

  function setIdJoueur($pidjoueur){

    $this->idjoueur = $pidjoueur;

  }


  function getControlerJoueur(){
    require '../Modele/mdl_joueur.php';

    //Appel le Modele JOueur
    $tableauobjet =array();
    $joueur = new Joueur();
    $tab = $joueur->getJoueur();
    $nombrejoueur = count($tab['resultSets'][0]['rowSet']);//nombre de joueur dans l'equipe
    $joueur_AA = array();
    for ($i=0;$i<$nombrejoueur;$i++){
      //Insere les joueurs dans le tableau des joueurs

      $joueur_AA[$i] = $tab['resultSets'][0]['rowSet'][$i];
      // $nbrligne = count($joueur_AA);

      //$controljoueur = new ControlerJoueur($joueur_AA[$i][4],$joueur_AA[$i][3],$joueur_AA[$i][9],$joueur_AA[$i][5],$joueur_AA[$i][12],$nbrligne);
      $controljoueur = new ControlerJoueur();

      $controljoueur->setNumero($joueur_AA[$i][4]);
      $controljoueur->setNom($joueur_AA[$i][3]);
      $controljoueur->setAge($joueur_AA[$i][9]);
      $controljoueur->setPosition($joueur_AA[$i][5]);
      $controljoueur->setIdJoueur($joueur_AA[$i][12]);
      $tableauobjet[$i]=$controljoueur;


    }
    $this->setArrObj($tableauobjet);

    //return $this->getArrObj();

    //return $tableauobjet;

  }
  function generateView(){
    $this->getControlerJoueur();
    require '../Vue/vue_joueur.php';
    $vuejoueur = new VueJoueur();
    $vuejoueur->getVueJoueur($this->getArrObj());
  }

}


//$controljoueur->getControlerJoueur($tableauobjet);
