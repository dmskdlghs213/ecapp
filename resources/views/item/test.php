<?php

$test = ['a','b','c','d'];

if (unique($test)){
    echo $test . 'はユニークです';
}else{
    echo $test . 'はユニークではありません';
}



?>