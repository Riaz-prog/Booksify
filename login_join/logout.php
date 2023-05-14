<?php
session_start();
session_unset();
session_destroy();
header('Location: ../login_join/log_reg.php');
exit;
?>
