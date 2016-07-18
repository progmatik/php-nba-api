<?php

// Nous créons une classe « Equipe ».
class Equipe {

    // Nous déclarons une méthode dont le seul but est d'afficher un texte.
    public function getEquipe($date) {
       // $jour = date('m/d/Y');
        //echo $jour;
        //echo $date;
        
        $url = "http://stats.nba.com/stats/scoreboard?DayOffset=0&LeagueID=00&gameDate=" . $date;
        //echo $url;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_REFERER, 'http://stats.nba.com/scores');
        $resultat = curl_exec($ch);

        curl_close($ch);
        $tabequipe = json_decode($resultat, true);
       // print_r($tabequipe);
        return $tabequipe;

    }

}

