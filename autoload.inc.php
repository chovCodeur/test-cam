<?php
function __autoload($className){
    require $className.'.php';
}?>
