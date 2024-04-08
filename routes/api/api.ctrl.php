<?php

$avatarFilePath = $_SERVER["DOCUMENT_ROOT"] . '/uploads/avatars/no_avatar.png';
$fp = fopen($avatarFilePath, 'rb');
// send the right headers
header("Content-Type: image/png");
header("Content-Length: " . filesize($name));
// dump the picture and stop the script
fpassthru($fp);
exit;