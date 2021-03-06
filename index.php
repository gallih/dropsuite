<?php

$path = 'DropsuiteTest';


$dir_path = array_diff(getDirContents($path), array('.DS_Store'));
$arr_contents = array();

//get value path
foreach ($dir_path as $key => $value) {
    // get file name
    $basename = basename($value);
    if (is_file($value) && $basename != '.DS_Store') {
        $contents = file_get_contents($value);
        array_push($arr_contents, ['path' => $value, 'file' => $basename, 'isi' => $contents, 'length' => strlen($contents)]);
    }
}

$isi = '';
$length = 0;
$i = 1;

foreach ($arr_contents as $key => $value) {
    if ($isi == $value['isi'] && $length == $value['length']) {
        $result = sprintf('isi: %s , %s', $value['isi'], $i);
        $i++;
    }
    $isi = $value['isi'];
    $length = $value['length'];
}

//print result
var_dump($result);

function getDirContents($dir, &$results = array())
{
    $files = scandir($dir);

    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            $results[] = $path;
        } else if ($value != "." && $value != ".." && $value != ".DS_Store") {
            getDirContents($path, $results);
            $results[] = $path;
        }
    }

    return $results;
}