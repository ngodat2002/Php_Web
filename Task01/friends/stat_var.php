<?php
$var1 =0;
$var1;
function sum(){
    static $var1 =9;
    $var2= $var1+12;
    echo "The value pf the variable is: $var1";
    echo "The addition value of 9 +12";
    echo "$var2";
}
sum();
?>
