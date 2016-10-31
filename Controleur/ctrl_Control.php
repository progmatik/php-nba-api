<?php
//error_reporting(E_ALL);
//ini_set("display_errors","On");
require 'ctrl_equipeEast.php';
require 'ctrl_equipeWest.php';
require 'ctrl_joueur.php';
require 'ctrl_match.php';
class Controler{

    function initControler($idcontroler){
        if(isset($_POST['datepicker']) && $_POST['datepicker'] != ''){

            $datepicker = $_POST['datepicker'];
           // echo $datepicker . 'dat';
        }
        else{

            $datepicker = date('m/d/Y');
        }


        if($idcontroler==1){

            $controlerequipe = new ControlerEquipeEast();
            $controlerequipe->generateView(4,$datepicker);
        }
        elseif($idcontroler==2){
            $controllerequipewest = new ControlerEquipeWest();
            $controllerequipewest->generateView(5,$datepicker);
        }
        elseif($idcontroler==3){

            $controleurjoueur = new ControlerJoueur();
            $controleurjoueur->generateView();
        }
        else{

            $controlermatch = new ControlerMatch();
            $controlermatch->getView();

        }

    }


}

$controler = new Controler();
$controler->initControler($_POST['idcontroler']);
