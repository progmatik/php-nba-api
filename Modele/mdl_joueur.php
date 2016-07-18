<?php

class Joueur {

    public function __construct() {
        $this->idequipe = $_POST['idequipe'];
    }

    // Nous déclarons une méthode dont le seul but est d'afficher un texte.
    public function getJoueur() {
        header("Access-Control-Allow-Origin: *");

        $url1 = "http://stats.nba.com/stats/commonteamroster?LeagueID=00&Season=2015-16&TeamID=" . $this->idequipe;

        $ch1 = curl_init($url1);
        curl_setopt($ch1, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86');
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $resultat = curl_exec($ch1);
//echo $resultat;
        curl_close($ch1);
        $tabjoueur = json_decode($resultat, true);
        return $tabjoueur;
    }

}
