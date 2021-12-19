<?php 
ob_start();
session_start();	
session_destroy();
ob_clean();
header ("Refresh: 0; url='index.php'");
?>