<?php

$setUrl['base'] = 'http://localhost/SIG/SIG';

function getPage($a = '')
{
    $url = '?page=' . $a;
    $getbase_url = $GLOBALS['setUrl']['base'];
    return $getbase_url . $url;
}

?>