<?php

$avatarFilePath = './data/uploads/avatars/';

switch($params['category'])
{
    case "avatar": {
        if (isset($_REQUEST["userid"])
            && file_exists($avatarFilePath . intval($_REQUEST["userid"]) . '.png'))
        {
            $avatarFilePath .= intval($_REQUEST["userid"]) . '.png';
        } else {
            $avatarFilePath .= 'no_avatar.png';
        }

        $fp = fopen($avatarFilePath, 'rb');
        header("Content-Type: image/png");
        header("Content-Length: " . filesize($avatarFilePath));
        fpassthru($fp);
    }
}