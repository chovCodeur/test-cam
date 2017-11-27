<?php
function __autoload($className){
    require 'classes/'.$className.'.php';
}?>
