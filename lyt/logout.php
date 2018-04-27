<?php
session_start();
unset($_SESSION);
session_destroy();
header('Location: ../vulners?a=sql');
exit("");
?>
