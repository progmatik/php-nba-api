<?php
error_reporting(E_ALL);
ini_set("display_errors","On");
require_once 'ctrl_equipe.php';
require '../Vue/vue_equipeOuest.php';
class ControlerEquipeWest extends ControlerEquipe{
//overwriting generateView from parent
    // function generateView($nbr,$datepicker){
    //     parent::getControlerEquipe($nbr,$datepicker);
    //     $equipeWest = new VueEquipeWest();
    //     $equipeWest->getVueEquipeWest($this->tabo);
    // }

}
