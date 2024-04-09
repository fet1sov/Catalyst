<?php

$avatarsPath = $_SERVER["DOCUMENT_ROOT"] . '/uploads/avatars/';

if (isset($_REQUEST["userid"]) && file_exists())
{
    $avatarFilePath = $avatarsPath . $_REQUEST["userid"] . ".png";
} else {
    $avatarFilePath = $avatarsPath . 'no_avatar.png';
}

$fp = fopen($avatarFilePath, 'rb');
header("Content-Type: image/png");
header("Content-Length: " . filesize($name));
fpassthru($fp);
exit;