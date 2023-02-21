<?php
session_start();

$currentDate = date_create()->format('Y-m-d H:i:s');
$dataBaseName = '20ic01';


if (!file_exists('../FileShare')) {
    mkdir('../FileShare', 0777, true);
}

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

function importNavName(){
    print("<a href='#' class='nav__logo'>" . ucwords($_SESSION['userName']) . "</a>");
}

function printOutFiles($queryResult){
    $sendersNames = array();
    while ($row = mysqli_fetch_row($queryResult)) {
        array_push($sendersNames, $row[1]);
    }


    $result = [];
    foreach (glob('../FileShare/*.*') as $file) {
        $result[] = [filemtime($file), basename($file)];
    }

    sort($result);

    for ($i = 0; $i < count($result); $i++) {
        $fileName = $result[$i][1];


        print("

        <a download='' href='../FileShare/" . $fileName . "' class='skills__header'>
            <i class='uil uil-file-share-alt skills__icon'></i>

            <div>
                <h1 class='skills__title'>" . $fileName . "</h1>
                <span class='skills__subtitle'> Uploaded By: " . ucwords($sendersNames[$i]) . "</span>
            </div>
        </a>

        ");
    }
}


function printOutMessages($result,$usersIdentification){
    while ($row = mysqli_fetch_row($result)) {
        $messageFromSender   =  $row[0];
        $sendersName =  $row[1];
        $sendersId = $row[3];


        if ($usersIdentification == $sendersId) {
            $messageType = "Messages__self";
        } else {
            $messageType = "Messages__other";
        }


        print("
        <div class='$messageType'>
            <a class='button__special button--flex'>
                " . ucwords($sendersName) . ":  " . $messageFromSender . "
            </a>
        </div>
        ");
    }
}


function splitLongWords($matches) {
    $word = $matches[0];
    if (strlen($word) > 20) {
        $split_word = wordwrap($word, 20, " ", true);
        return $split_word;
    } else {
        return $word;
    }
}

function deleteDirectory($dir)
{
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }
    }

    return rmdir($dir);
}

?>