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
            background-image: url(./hintergrund.jpg);
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            text-
            
        
            a:link {
            color: #FFFFFF;
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
            table tr td { width:20px;height:20px; }
            td { width: 20px; height: 20px; border: thin solid; }
            tr:nth-child(odd) td:nth-child(odd) {background: black;}
            tr:nth-child(even) td:nth-child(even) {background: black;}
    
            
            
            body,td,th {
        color: #FFFFFF;
        font-family: Arial;
    }
            </style>
        <title>Franks Schach</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        
        </head>
<div class="uhr"><h1>Heute ist der <?php $aktuellesDatum=date('d.m.Y') ;$aktuelleUhrzeit=date('H:i'); echo $aktuellesDatum,"&nbsp;um&nbsp;",$aktuelleUhrzeit; ?></h1></div>
        
    <h1>Schach</h1>
    <div><audio controls loop >
      <source src="Sunny.mp3" type="audio/mp3">
    </audio></div>
        
        <?php

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
            echo "<br>Dies ist Ihr $zaehler. Zug und es zieht $farbe";

        ?>    

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
            ?><br>2016 by. <a href="http://frank-panzer.de" title="Frank Panzer" target="_blank" id="copy">Frank Panzer</a></div>

        <form name="zaehler" action='' method='Get' >
        
            <input type='submit' value='Weiter'>
            <input type='hidden' name='transportfeld' value="<?php echo $_SESSION['zaehler'] ?>" >
        
        </form>
    
    </body>
    
</html>