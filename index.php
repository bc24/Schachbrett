<?php
   
    session_start ();
    $Dateiname = "spielverlauf.txt";

    
    $figuren = array(   array('','','','','','','','','',''),
                        array('','turmw','pferdw','laeuferw','koenigw','damew','laeuferw','pferdw','turmw',''),
                        array('','bauerw','bauerw','bauerw','bauerw','bauerw','bauerw','bauerw','bauerw',''),
                        array('','leer','leer','leer','leer','leer','leer','leer','leer',''),
                        array('','leer','leer','leer','leer','leer','leer','leer','leer',''),
                        array('','leer','leer','leer','leer','leer','leer','leer','leer',''),
                        array('','leer','leer','leer','leer','leer','leer','leer','leer',''),
                        array('','bauer','bauer','bauer','bauer','bauer','bauer','bauer','bauer',''),
                        array('','turm','pferd','laeufer','koenig','dame','laeufer','pferd','turm',''),
                        array('','','','','','','','','',''),
                    );
                    
        ini_set("auto_detect_line_endings",true);    
            if (file_exists('spielverlauf.txt')){
                if (filesize('spielverlauf.txt') > 0){
                $lines = file('spielverlauf.txt');
                $lineCount = count($lines)-1;
                $Spielstand = $lines[$lineCount];
                $figuren = unserialize($Spielstand);
                }
                else {
                    echo "Datei ohne Inhalt";
                }
            }
            else {
                echo "Datei nicht gefunden";
            }
                    
        if(isset($_GET['vonspalte'])){
        $von_zeile = $_GET ['vonzeile'];
        $von_spalte = $_GET ['vonspalte'];
        $nach_zeile = $_GET ['nachzeile'];
        $nach_spalte = $_GET ['nachspalte'];
        
        /*if (zug_ok($figuren,$von_zeile,$von_spalte,$nach_zeile,$nach_spalte)){
                    
        }*/
        
        $figuren[$nach_zeile][$nach_spalte] = $figuren[$von_zeile][$von_spalte];
        $figuren[$von_zeile][$von_spalte] = 'leer';
        
        /*function zug_ok ($figuren,$von_zeile,$von_spalte,$nach_zeile,$nach_spalte){
        switch ($figuren[$von_zeile][$von_spalte])
        return True;
        
        return False;
        }*/
        }

        $Dateizeiger = fopen('spielverlauf.txt', 'a+');
        fputs ($Dateizeiger, serialize($figuren));
        fputs ($Dateizeiger, "\r");
        fclose($Dateizeiger);
            
?>
	<!DOCTYPE html>
	<html>

        <head>
        
            <meta charset="utf-8">
            
            <link href="./stylemaster.css" type="text/css" rel="stylesheet">
            <style type="text/css">
            body {
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position:bottom right;
            background-color: #1A030B;
            background-image: url(hintergrund.jpg);
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            
            
        
            a:link {
            color: #FFFFFF;
            }
.glas {
}
        
            a:visited {
            color: #FFFFFF;
            }
    
            a:hover {
            color: #F0FF00´;
            }
        
            a:active {
            color: #FFFFFF;
            }	
            
            }
            
            td {
            width: 20px; height: 20px; border:1px thin solid #FFFFFF;
            }
            
            table { border:3px solid #0073ED; }
            table tr td { width:20px;height:50px; }
            td { width: 50px; height: 50px; border: thin solid; }
            tr:nth-child(odd) td:nth-child(odd) {background: red;}
            tr:nth-child(even) td:nth-child(even) {background: red;}
			table th {background: red;}
			
    		tr:nth-child(1) td:nth-child(n),tr:last-child td:nth-child(n),
			tr:nth-child(n) td:nth-child(1),tr:nth-child(n) td:last-child
			{
				background-color: #CBC5C5;
			}
				
            
            body,td,th {
			color: #FFFFFF;
			font-family: Arial;
			font-weight: 300;
			height: 50%;
			}
			
			.glas{
			-moz-box-shadow: inset 0 0 15px 5px #DDD;
			-webkit-box-shadow: inset 0 0 15px 5px #DDDDE5;
			box-shadow: inset 0 0 15px 5px #DDD;
			border-radius: 40px;
			-moz-border-radius: 40px;
			-webkit-border-radius: 40px;
			width: 500px; height: 360px;
			}
			
			a{
			color:#FFFFFF;
			text-decoration:none;
			}
			a:visited{
			color:#FFFFFF;
			text-decoration: none;	
			}
			 a:active{
			color:#FFFFFF;
			text-decoration: none;	
			}
			a:hover{
			color:#CC5200;
			text-decoration:underline;	
			}
			 a:focus{
				color:#CC5200;
			text-decoration: none;	
			}
			
            </style>
        <title>Franks Schach</title>
        
        <script type="text/javascript">
		function taste (t) {
		if (!t)
		  t = window.event;
		  if ((t.type && t.type == "contextmenu") || 
			(t.button && t.button == 2) || (t.which && t.which == 3)) {
			if (window.opera)
			  window.alert("Speichern nicht erlaubt.");
			  return false;
		  }
		}
		if (document.layers)
		  document.captureEvents(Event.MOUSEDOWN);
		  document.onmousedown = taste;
		  document.oncontextmenu = taste;
	   </script>
        
        </head>
        <div class="glas" border-radius>
<div class="uhr"><center>
  <h1><span style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif">Franks Schachbrett</span><br>
    Heute ist der <?php $aktuellesDatum=date('d.m.Y') ;$aktuelleUhrzeit=date('H:i'); echo $aktuellesDatum,"&nbsp;um&nbsp;",$aktuelleUhrzeit; ?> Uhr</h1></center></div>
        
    
    <div><center><audio controls loop >
      <source src="Sunny.mp3" type="audio/mp3">
    </audio></center></div>
        
        <center><?php

            include "userbefragung.php";
            include "spielfeld.php";
            
            userbefragung ();
			
			if (! isset($_SESSION['zaehler']))
   			 $_SESSION['zaehler'] = 0; 
            
            if(isset($_GET['transportfeld'])){
                $zaehler = $_GET['transportfeld'];
                $_SESSION['zaehler'] = ++$zaehler;
                echo 'Session zaehler = '.$_SESSION['zaehler'].', zaehler = '.$zaehler." <br>";
                if($zaehler > 100){
                    session_destroy();
                    $zaehler = 0;
                }
            }
            else{
                $zaehler = 0;
            }
            
            $spieler = $zaehler % 2;
                if( $spieler == 0 ){
                    $farbe = 'weiss';
                }
                else {
                    $farbe = 'schwarz';
                }
            echo "<br>Dies ist Ihr $zaehler. Zug und es ist $farbe dran!";
			echo '<br>2016 by. <a href="http://frank-panzer.de" title="Frank Panzer" target="_blank" id="copy">Frank Panzer</a>';

        ?>

			<form name="zaehler" action='' method='Get' >
        
            <input type='submit' value='Zug ausführen'>
            <input type='hidden' name='transportfeld' value="<?php echo $_SESSION['zaehler'] ?>" >
        
       		</form>
        </center>
</div>
    <div id="spielfeld">
            <?php
                $zahl = -1;
                $horizontal = -1;
                echo '<table id="brett" class="field" cellspacing="0" align="left">';
                foreach($feld as $zeile) {                                
                    $zahl++;
                    $horizontal++;
                    $vertikal=0;
                    echo '<tr>';
                        foreach($zeile as $spalte) {                    
                            if($spalte == 0){
                                echo '<td class="field_'.$spalte.'"></td>';
                            }
                            elseif($spalte == 3){
                                for($buchstabe=65;$buchstabe<73;$buchstabe++)
                                echo '<td class="field_'.$spalte.'">'.chr($buchstabe).'</td>';
                            }
                            elseif($spalte == 4){
                                echo '<td class="field_'.$spalte.'">'.$zahl.'</td>';
                            }
                            elseif($spalte == 5){
                            }
                            else{
                                $vertikal++;
                                echo '<td class="field_'.$spalte.'"><img src="'.$figuren[$horizontal][$vertikal].'.png"></td>';
                            }
                        }
                    echo '</tr>';
                }
                echo '</table>';
				
            ?></div></div>
    	</div>
    </body>
    
</html>