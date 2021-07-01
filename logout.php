<?php
session_start();
// mengosongkan session yang telah diset
$_SESSION = [];
session_unset();
session_destroy();

// menghapus cookie yang telah dibuat
setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);

header("Location: login.php");
exit;

?>