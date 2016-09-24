<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>

    </head>
    <body id="corp" style="margin-left: 20%;margin-right: 20%;background:url(../logo/basket.jpg),url(../logo/basket2.jpg);background-repeat: repeat-x, repeat" >
        <input type="date" name="anniversaire" onchange="testtima(this.value)">
        <div id="equipe">
        <table id="equipe" style="width:100%;border-collapse:collapse;border:0px">
            
            
        </table>
        </div>
        <br>

        <table id="equipew" style="width:100%;border-collapse:collapse;border:0px">
            
            <tr class="headclassement">
                
                <td class="equipe" ></td>
                <td></td>
                <td class="nomequipe" style="text-align: left">Equipes</td>
                <td style="text-align: left">Match Joués</td>
                <td style="text-align: left">Match Gagné</td>
                <td style="text-align: left;">Match Perdu</td>
                <td style="text-align: left">% de victoire</td>
                <td style="text-align: center">Domicile</td>
                <td style="text-align: center">Exterieur</td>
                
            </tr>
        </table>
        
        <br>
        <div id="infoequipe" align="center">
            
            </div>
        
        <?php
 
        ?>
        <script>
          var interv;


function testtima(value){
    
    //alert(value);
    document.getElementById('equipe').innerHTML = '';
    document.getElementById('infoequipe').innerHTML = '';
    recoi_classement(value);
    
}
           
            corp.onload = function(){
                
                recoi_classement();
                recoi_classementw();
                
                
            };
        
            
           
           
       
        function recoi_classement(datepicker) {
           // alert(1);
           
           if (typeof(datepicker) != 'undefined'){
               var vars = "idcontroler=" + 1 + "&datepicker=" + datepicker;
               //alert(datepicker);
           }
           else{
                //alert(datepicker);

               vars = "idcontroler=" + 1;
           }
            var equipes = [];
            
    var req = new XMLHttpRequest();
    req.open('POST', '../Controleur/ctrl_Control.php', true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            if (req.status == 200) {
                var msg = (req.responseText);
          equipes = req.responseText.split(',');
               // alert(msg);

                //+++affichage resultat
                document.getElementById('equipe').innerHTML = msg;
                //+++gestion onmouseover + onmouseout
                var testcl1 = document.getElementsByClassName("testcla");
                
       var x = document.getElementsByClassName('testcla').length; 
       for(var i=0;i<x;i++){
           
             testcl1[i].onmouseover =  function(){
              
    this.style.backgroundColor = "#aaaaaa";
    
    
    
    };
    
    if(i%2==0){
                 
                 testcl1[i].onmouseout =  function(){
                     
                     this.style.backgroundColor = "#ddd";
                     
                 };
             }else{
                 testcl1[i].onmouseout =  function(){
                     
                     this.style.backgroundColor = "white";
                     
                 };
                 
             }
         
       }
           
         
                
            }
        }
        else {
           //console.log('impossible de charger le message');
        }
    };

    req.send(vars);
}




function recoi_classementw() {
           // alert(1);
            var equipesw = [];
    var vars = "idcontroler=" + 2;

    var req = new XMLHttpRequest();
    req.open('POST', '../Controleur/ctrl_Control.php', true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            if (req.status == 200) {
                var msg = (req.responseText);
          equipesw = req.responseText.split(',');
               // alert(msg);

                
                document.getElementById('equipew').innerHTML += msg;
                
                
            }
        }
        else {
           //console.log('impossible de charger le message');
        }
    };
    req.send(vars);
}

var idequipe;

function recoi_equipe(idequipe){
    
    // alert(idequipe);
     var vars = "idequipe=" + idequipe + "&idcontroler=" + 3;
    var req = new XMLHttpRequest();
    req.open('POST', '../Controleur/ctrl_Control.php', true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            if (req.status == 200) {
                var listejoueurs = (req.responseText);
                document.getElementById('infoequipe').innerHTML = listejoueurs;
                joueur.scrollIntoView();
                
            }
        }
        else {
        }
    };
    if (document.getElementById('info2')!== null){
                         // joueur.scrollIntoView();

           document.getElementById('info2').innerHTML = '<div class="loader"></div>';

    }else{}
    req.send(vars);
    
}

function listematch(idequipe){
    var cara;
    var vars;

        
        vars = "idequipe2=" + idequipe + "&idcontroler=" + 4;
    
   // alert(idequipe);
     
    var req = new XMLHttpRequest();
    req.open('POST', '../Controleur/ctrl_Control.php', true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            if (req.status == 200) {
                var listematch = (req.responseText);
         // equipesw = req.responseText.split(',');
               // alert(msg);
                document.getElementById('infoequipe').innerHTML = listematch;
                infoequipe.scrollIntoView();

                
               // matchs.scrollIntoView();
                
            }
        }
        else {
           //console.log('impossible de charger le message');
        }
        
        
        
    };
   document.getElementById('info2').innerHTML = '<div class="loader"></div>';


    req.send(vars);
   // matchs.scrollIntoView();
 
}
        function listematchd(idequipe){
    
    //var equipesw = [];
     alert(idequipe);
     var vars = "idequipe2=" + idequipe;
    var req = new XMLHttpRequest();
    req.open('POST', 'domicile.php', true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            if (req.status == 200) {
                var listematch = (req.responseText);
         // equipesw = req.responseText.split(',');
               // alert(msg);
                document.getElementById('infoequipe').innerHTML = listematch;
              
                
               
               // matchsd.scrollIntoView();
                
            }
        }
        else {
           //console.log('impossible de charger le message');
        }
    };
    req.send(vars);
}
        
     function listematchex(idequipe){
    
    //var equipesw = [];
     alert(idequipe);
     var vars = "idequipe2=" + idequipe;
    var req = new XMLHttpRequest();
    req.open('POST', 'exterieur.php', true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            if (req.status == 200) {
                var listematch = (req.responseText);
         // equipesw = req.responseText.split(',');
               // alert(msg);
                document.getElementById('infoequipe').innerHTML = listematch;
              
                
               
              //  matchse.scrollIntoView();
                
            }
        }
        else {
           //console.log('impossible de charger le message');
        }
    };
    req.send(vars);
}
        

    
        //plignem = id <tr>
        function getinfomatch(plignem,idmatch,equipe, pelementd){
            var elementd = pelementd;
            var vars = "idmatch=" + idmatch + "&nequipe=" + equipe ;
    var req = new XMLHttpRequest();
    req.open('POST', 'score.php', true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            if (req.status == 200) {
             //   var listescore = req.responseText;
                
               var infomatch = JSON.parse(req.responseText);
             

               if(equipe == infomatch.resultSets[6].rowSet[0][11]){
                   
        equipe = infomatch.resultSets[6].rowSet[0][11];
        nomcomplet = infomatch.resultSets[6].rowSet[0][9] + ' ' + infomatch.resultSets[6].rowSet[0][10];
        points = infomatch.resultSets[5].rowSet[1][22];
        nequipe2 = infomatch.resultSets[6].rowSet[0][6];
        nomcomplet2 = infomatch.resultSets[6].rowSet[0][4] + ' ' + infomatch.resultSets[6].rowSet[0][5];
        points2 = infomatch.resultSets[5].rowSet[0][22]; 
        conf = '@';          
                   
               }  else
    {
        
        points = infomatch.resultSets[5].rowSet[0][22];
        equipe = infomatch.resultSets[6].rowSet[0][6];
        nomcomplet = infomatch.resultSets[6].rowSet[0][4] + ' ' + infomatch.resultSets[6].rowSet[0][5];
        points2 = infomatch.resultSets[5].rowSet[1][22];
        nequipe2 = infomatch.resultSets[6].rowSet[0][11];
        nomcomplet2 = infomatch.resultSets[6].rowSet[0][9] + ' '+ infomatch.resultSets[6].rowSet[0][10];
        conf = 'VS';
    }

    document.getElementById(elementd).innerHTML = points +'-'+points2;
    document.getElementById('texttest').innerHTML =  points +'-'+points2;
    document.getElementById('confrontation').innerHTML = nomcomplet + ' ' + conf + ' ' +nomcomplet2;
   
        }}
    
    
    };
        document.getElementById('texttest').innerHTML = 'Chargement...';
        req.send(vars);
            
            
            
        //ouvre la fenetre modale
        window.location = document.getElementById(plignem).getAttribute('href');
        return false;
        
    }
    
    
    //Functionquiinitialise les données a la fermeture de la fenetre modale
    function rafraichmod(){
        
        document.getElementById('texttest').innerHTML = '';
        document.getElementById('confrontation').innerHTML = '';
        clearInterval(interv);
        
    }
    
    //+++++++++++++++++++++++++++++++++++++++++++++++++

        function chargementsc(plignem,idmatch,equipe, pelementd){
            alert(idmatch);
            getinfomatch(plignem,idmatch,equipe, pelementd);
      interv = setInterval(function(){ getinfomatch(plignem,idmatch,equipe,pelementd); }, 10000);
            
    }
    

   

    function filtrer(val,idequipe){
   
 vars = "idequipe2=" + idequipe + "&valchrech=" + val + "&idcontroler=" + 4;
   

    var req = new XMLHttpRequest();
    
    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            if (req.status == 200) {
                var listematch = req.responseText;
               // alert(listematch);
               
                document.getElementById('infoequipe').innerHTML = listematch;
                   
                          document.getElementById('rechequi').value = val;

                     document.getElementById('rechequi').focus();                      // e.preventDefault();
                    infoequipe.scrollIntoView();
                    
            }
            
        } 

    };
    req.open('POST', '../Controleur/ctrl_Control.php', true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       document.getElementById('info2').innerHTML = '<div class="loader"></div>';

        req.send(vars);

    }
    
    function foo(idElementGame, gameDate, gameTeam, gamePoint){
        
        alert(idElementGame + ' ' + gameDate + ' ' + gameTeam + ' ' + gamePoint);
        document.getElementById('confrontation').innerHTML = gameTeam;
        document.getElementById('texttest').innerHTML = gamePoint;
        window.location = document.getElementById(idElementGame).getAttribute('href');
    }
    
        </script>
    </body>
</html>
