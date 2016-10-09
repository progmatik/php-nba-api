<?php
set_time_limit(0);
class Match {

    public function __construct() {
        $this->idequipe = $_POST['idequipe2'];
    }
    
    /**
     * Get match
     * @return Array
     */
    function getMatch() {
        //ob_clean();
        $idequipe = $_POST['idequipe2'];
        $url = "http://stats.nba.com/stats/teamgamelog?LeagueID=00&Season=2016-17&SeasonType=Regular+Season&TeamID=" . $this->idequipe;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86');
       
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultat = curl_exec($ch);
        //echo $resultat;

        $tabmatch = json_decode($resultat, true);
        curl_close($ch);
        return $tabmatch;
    }
    
//    function getTableauPoint($gameid){
// 
//$url = "http://stats.nba.com/stats/boxscoresummaryv2?GameID=" . $gameid;
////echo $url;
//$ch2 = curl_init($url);
//curl_setopt($ch2, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86');
//curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
//
//$resultat2 = curl_exec($ch2);
//$tabscore = json_decode($resultat2, true); 
//curl_close($ch2); 
//return $tabscore;
//    }
    function getTableauPoint($tabo){
       
        $multihandler = curl_multi_init();
        $handlers = $result = array();
        $i=0;
        foreach ($tabo as $value){
        
            $handlers[$i] = curl_init("http://stats.nba.com/stats/boxscoresummaryv2?GameID=".$value->getIdGame());
            curl_setopt($handlers[$i], CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86');
            curl_setopt($handlers[$i], CURLOPT_RETURNTRANSFER, true);
            //2prochaine ligne permet dattendre pas plus de 10sec avant de renvoyer les scores
            curl_setopt($handlers[$i], CURLOPT_CONNECTTIMEOUT, 5); 
            curl_setopt($handlers[$i], CURLOPT_TIMEOUT, 5);
            curl_multi_add_handle($multihandler, $handlers[$i]);
            $i++;
        
        }
  
        do{
            curl_multi_exec($multihandler, $pendingConnex);
            usleep(10000);
        }
        while ($pendingConnex > 0);

        $j=0;
        foreach ($tabo as $value){
            $result[] = json_decode(curl_multi_getcontent($handlers[$j]),true);
            $j++;
        }
        curl_multi_close($multihandler);
        
        
        return $result;
    }
        

    
    
    
    
}
