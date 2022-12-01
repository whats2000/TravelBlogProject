<?php

// Connection check from https://gist.github.com/RodRitter/5390459
function connect($root, $pass)
{
    try {
        $conn = new PDO('mysql:host=localhost; dbname=travel_blog', $root, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(Exception $e) {
        print("Error connecting to database: ".$e->getMessage());
        return false;
    }
}