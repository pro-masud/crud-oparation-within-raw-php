<?php 
/**
 * create a database path and database name here 
 * */ 

define("DB", "C:/xampp/htdocs/crud/DB/database.txt");



/**
 * create a students data for seed name
 * */ 

 function seed($fileName){
    $Data = [
        [
            "fname" => "Masud",
            "lname" => "Rana",
            "age"   => 18,
            "class" => 12,
            "roll"  => 001,
        ],
        [
            "fname" => "Al Amin",
            "lname" => "Islam",
            "age"   => 25,
            "class" => "BBA",
            "roll"  => 002,
        ],
        [
            "fname" => "Fatima",
            "lname" => "Khatun",
            "age"   => 18,
            "class" => 12,
            "roll"  => 003,
        ],
        [
            "fname" => "Parvej",
            "lname" => "Islam",
            "age"   => 18,
            "class" => 12,
            "roll"  => 004,
        ],
        [
            "fname" => "Monuar",
            "lname" => "Rahman",
            "age"   => 18,
            "class" => 12,
            "roll"  => 006,
        ]
    ];

    $serializeData = serialize($Data);

    file_put_contents($fileName, $serializeData, LOCK_EX);
 }