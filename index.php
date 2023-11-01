<?php
session_start();

// Unset the user session and destroy it.
session_unset();
session_destroy();

header("Location: ../login.php");
exit();
?>