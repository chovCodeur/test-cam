<?php
function __autoload($className){
    require 'classes/'.$className.'.class.php';
}?>
