<?php
session_start();

// hapus semua session
session_unset();   // hapus semua variabel session
session_destroy(); // hancurkan session

header("Location: login.php");
exit;
