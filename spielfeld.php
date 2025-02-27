<?php
/**
 * Copyright (c) 2025 Frank Panzer | PanzerIT.de
 * Alle Rechte vorbehalten.
 * 
 * Dieses Script generiert das Schachbrett für das Schachspiel.
 */

$feld = array (
    array(0,3,5,5,5,5,5,5,5,0),  // 0=Ecke, 3= Feld für Buchstabenrand, 5=Dummy
    array(4,1,2,1,2,1,2,1,2,4),  // 4= Zahlenrand, 1= Dunkel, 2= Hell
    array(4,2,1,2,1,2,1,2,1,4),
    array(4,1,2,1,2,1,2,1,2,4),
    array(4,2,1,2,1,2,1,2,1,4),
    array(4,1,2,1,2,1,2,1,2,4),
    array(4,2,1,2,1,2,1,2,1,4),
    array(4,1,2,1,2,1,2,1,2,4),
    array(4,2,1,2,1,2,1,2,1,4),
    array(0,3,5,5,5,5,5,5,5,0)
);

return $feld;
?>
