<?php
// Register the autoloader
spl_autoload_register(function($classname) {
    include "classes/$classname.php";
});


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $db = new mysqli(Config::$db["host"], 
                Config::$db["user"], Config::$db["pass"], 
                Config::$db["database"]);

$db->query("create table closet_user (
                id int not null auto_increment,
                name text not null,
                email text not null,
                password text not null,
                primary key (id)
            );");

$db->query("create table listings (
                id int not null auto_increment,
                user_id int not null,
                item text not null,
                description text not null,
                price float not null,
                type text not null,
                size varchar(5) not null,
                primary key (id)
            );");

$db->query("create table images (
                id int not null auto_increment,
                listing_id int not null,
                image longblob not null,
                primary key (id)
            );");