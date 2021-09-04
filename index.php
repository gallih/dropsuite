<?php

$path = 'DropsuiteTest';

$directory_array = rootDirectory();

$i = 0;
while ($i < count($directory_array)) {
    $context = '';
    if (is_dir($path . '/' . $directory_array[$i])) {
        $fileType[$i] = 'D'; //type Directory
        $child_directory = rootDirectory($directory_array[$i]);
        var_dump($path. '/'. $directory_array[$i]);
        var_dump($child_directory);
    } else {
        $fileType[$i] = 'F'; //type File
        $context = file_get_contents($path . '/' . $directory_array[$i]);
        echo $context . '<br>';
    }
    $i++;
}


function rootDirectory($directory = '')
{
    $path = 'DropsuiteTest' . '/' . $directory;
    $files = array_diff(scandir($path), array('.', '..', '.DS_Store'));
    $directory_array = array();
    foreach ($files as $dir) {
        array_push($directory_array, $dir);
    }
    return $directory_array;
}
