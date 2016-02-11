<?php
    function userbefragung () {
        echo "<div id='user'>
                <form name = 'usereingabe' action = 'index.php' method = 'get'>
                    <input type = 'submit' value = 'Weiter'><br>
                            
                        Von<br>
                                
                        <select name = 'vonspalte' size = '1'>";
                            for ($value = 1; $value <= 8; $value ++){
                                echo"<option value = $value >".chr($value+64)."</option>";
                            }
                        echo "</select>
                
                        <select name = 'vonzeile' size = '1'>";
                            for ($value = 1; $value <= 8; $value ++){
                                echo"<option value = $value >".chr($value+48)."</option>";
                            }
                        echo "</select><br>
                                
                        Nach<br>
                        
                        <select name = 'nachspalte' size = '1'>";
                            for ($value = 1; $value <= 8; $value ++){
                                echo"<option value = $value >".chr($value+64)."</option>";
                            }
                        echo "</select>
                                
                        <select name = 'nachzeile' size = '1'>";
                            for ($value = 1; $value <= 8; $value ++){
                                echo"<option value = $value >".chr($value+48)."</option>";
                            }
                        echo "</select>
                    <input type='hidden' name='neu'>
                </form>
            </div>";
            
    }
?>