<!-- Tracy Nguyen (tn9eer) and Rachel Ding (rd7bk) -->
<!-- Sources used: 
https://www.codexworld.com/store-retrieve-image-from-database-mysql-php/ 
https://www.tutorialspoint.com/php-files 
https://www.w3schools.com/jsref/jsref_regexp_test.asp 
https://developer.mozilla.org/en-US/docs/Web/API/HTMLElement/input_event
-->

<!-- LINK TO HOSTED SITE: https://cs4640.cs.virginia.edu/tn9eer/project/ -->

<?php

session_start();

spl_autoload_register(function($classname) {
    include "classes/$classname.php";
});

$command = "login";
if (isset($_GET["command"]))
    $command = $_GET["command"];

if (!isset($_SESSION["email"])) {
    $command = "login";
}

$closet = new ClosetController($command);
$closet->run();
