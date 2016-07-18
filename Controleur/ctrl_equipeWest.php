<?php
error_reporting(E_ALL);
ini_set("display_errors","On");
require_once 'ctrl_equipe.php';
class ControlerEquipeWest extends ControlerEquipe{
    private $idteam;
    private $nom;
    private $nbrMatchJoue;
    private $nbrMatchGagne;
    private $nbrMatchPerdu;
    private $pourcentageVictoire;
    private $resultatMatchDom;
    private $resultatMatchExt;
    
    function getIdTeam(){return $this->idteam;}
    function setIdTeam($pIdTeam){$this->idteam = $pIdTeam;}
    
    function getNom(){return $this->nom;}
    function setNom($pNom){$this->nom = $pNom;}
    
    function getNbrMatchJoue(){return $this->nbrMatchJoue;}
    function setNbrMatchJoue($pNbrMatchJoue){$this->nbrMatchJoue = $pNbrMatchJoue;}
    
    function getNbrMatchGagne(){return $this->nbrMatchGagne;}
    function setNbrMatchGagne($pNbrMacthGagne){$this->nbrMatchGagne = $pNbrMacthGagne;}
    
    function getNbrMatchPerdu(){return $this->nbrMatchPerdu;}
    function setNbrMacthPerdu($pNbrMatchPerdu){$this->nbrMatchPerdu = $pNbrMatchPerdu;}
    
    function getPourcentVictoire(){return $this->pourcentageVictoire;}
    function setPourcentVictoire($pPourcentVictoire){$this->pourcentageVictoire = $pPourcentVictoire;}
    
    function getResultMatchDom(){return $this->resultatMatchDom;}
    function setRestultMatchDom($pResultMatchDom){$this->resultatMatchDom = $pResultMatchDom;}
    
    function getResultMatchExt(){return $this->resultatMatchExt;}
    function setResultMatchExt($pResultMatchExt){$this->resultatMatchExt = $pResultMatchExt;} 
    
    function generateView($datepicker){
        $this->getControlerEquipe(5,$datepicker);
        require '../Vue/vue_equipeOuest.php';
        $equipeWest = new VueEquipeWest();
        $equipeWest->getVueEquipeWest($this->getArrObj());
    }

}
        
        