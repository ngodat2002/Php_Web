<?php
$var1=4;
$var2=15;
function multiply(){
    global $var1,$var2;
    $var2=$var1*$var2;
}
echo "The multication value of 4 *15 is";
multiply();
?>
