<?php

class ControlerEquipe {

    private $idteam;
    private $nom;
    private $nbrMatchJoue;
    private $nbrMatchGagne;
    private $nbrMatchPerdu;
    private $pourcentageVictoire;
    private $resultatMatchDom;
    private $resultatMatchExt;
    protected $tabo;
    
    public function __construct() {
        
    }
    private function setArrObj(array $p_arrObjEquipe){
		$this->tabo = $p_arrObjEquipe;
	}
	
	public function getArrObj(){
		return $this->tabo;
	}
    function getIdTeam() {
        return $this->idteam;
    }

    function setIdTeam($pIdTeam) {
        $this->idteam = $pIdTeam;
    }

    function getNom() {
        return $this->nom;
    }

    function setNom($pNom) {
        $this->nom = $pNom;
    }

    function getNbrMatchJoue() {
        return $this->nbrMatchJoue;
    }

    function setNbrMatchJoue($pNbrMatchJoue) {
        $this->nbrMatchJoue = $pNbrMatchJoue;
    }

    function getNbrMatchGagne() {
        return $this->nbrMatchGagne;
    }

    function setNbrMatchGagne($pNbrMacthGagne) {
        $this->nbrMatchGagne = $pNbrMacthGagne;
    }

    function getNbrMatchPerdu() {
        return $this->nbrMatchPerdu;
    }

    function setNbrMacthPerdu($pNbrMatchPerdu) {
        $this->nbrMatchPerdu = $pNbrMatchPerdu;
    }

    function getPourcentVictoire() {
        return $this->pourcentageVictoire;
    }

    function setPourcentVictoire($pPourcentVictoire) {
        $this->pourcentageVictoire = $pPourcentVictoire;
    }

    function getResultMatchDom() {
        return $this->resultatMatchDom;
    }

    function setRestultMatchDom($pResultMatchDom) {
        $this->resultatMatchDom = $pResultMatchDom;
    }

    function getResultMatchExt() {
        return $this->resultatMatchExt;
    }

    function setResultMatchExt($pResultMatchExt) {
        $this->resultatMatchExt = $pResultMatchExt;
    }
        /***
         * FUNCTION QUI PERMET DE RECUP LES DONNEES A PARTIR DU MODEL ET DHYDRATER LES OBJET 
         * LE PARAMETRE $NBR PERMET DE DIFFERENCIER LEQUIPE DE LEST(4) ET LEQUIPE DE L'OUEST(5)
        ***/
    function getControlerEquipe($nbr,$datepicker) {
        

        require_once '../Modele/mdl_equipe.php';
        $equipe = new Equipe();
        $tab = $equipe->getEquipe($datepicker);//passer la date en parametre
        $count = count($tab['resultSets'][$nbr]['rowSet']); //Compte le nombre dequipe dans la conference est
        $equipe_AA = array();
        for ($i = 0; $i < $count; $i++) {
        $controlerequipe = new ControlerEquipe();

            $equipe_AA[$i] = $tab['resultSets'][$nbr]['rowSet'][$i]; //recupere dans un tableau les donnée de chaque equipe de la conférence est
            
            $controlerequipe->setIdTeam($equipe_AA[$i][0]);
            $controlerequipe->setNom($equipe_AA[$i][5]);
            $controlerequipe->setNbrMatchJoue($equipe_AA[$i][6]);
            $controlerequipe->setNbrMatchGagne($equipe_AA[$i][7]);
            $controlerequipe->setNbrMacthPerdu($equipe_AA[$i][8]);
            $controlerequipe->setPourcentVictoire($equipe_AA[$i][9]);
            $controlerequipe->setRestultMatchDom($equipe_AA[$i][10]);
            $controlerequipe->setResultMatchExt($equipe_AA[$i][11]);
            $tableauobjet[] = $controlerequipe;
        }
        $this->setArrObj($tableauobjet);
        //return $this->getArrObj();
    }

    function generateView($datepicker) {

        require_once'../Vue/vue_equipe.php'; //Appel de la vue
        $this->getControlerEquipe(4,$datepicker);
        $vueequipe = new VueEquipe();
        $vueequipe->getVueEquipe($this->getArrObj());
    }

}

//Instanciation + appel de la fonction controlleur Equipe

//$controlerequipe->getControlerEquipe($tableauobjet);

