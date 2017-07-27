<?php

function wordCount($textFile)
{
    $replaced = str_replace(['?',"'",";",',','`','-','!',')','(','.',':','"']," ",$textFile);
    $loweredCase = strtolower($replaced);
    $words = str_word_count($loweredCase, 1);
    $result = array_combine($words, array_fill(0, count($words), 0));
    foreach($words as $word){
        $result[$word]++;
    }
    arsort($result);
    $top = array_slice($result, 0, 10);
    foreach($top as $word => $count) {
        echo $word.' => '. $count ."\n";
    }

}
$alice = file_get_contents('alice.txt');
wordCount($alice);