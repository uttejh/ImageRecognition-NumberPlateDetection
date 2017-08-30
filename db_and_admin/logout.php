<?php

require 'core.inc.php';
echo $http_referer;
session_destroy();
header('Location: '.$http_referer);

?>