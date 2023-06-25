<?php
session_start();

// Destroy session
session_destroy();

// Redirect to homepage or some other page
header('Location: index.php');
exit();
