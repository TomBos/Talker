<?php
session_start();

function println(string $string = '')
{
    print($string . PHP_EOL);
}

function consolelog($data)
{
    $output = $data;
    if (is_array($output)) {
        $output = implode(',', $output);
    }

    echo "<script>console.log('$output');</script>";
    echo "<script>console.log(' ');</script>";
}

