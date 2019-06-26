<?php

function dbconnection($spString)
{
    $dbuser = 'root';
    $dbpass = '';
    $dbconnstring = 'mysql:host=localhost:3306;dbname=travels;';

    try {
        $pdo = new PDO($dbconnstring, $dbuser, $dbpass, array('charset' => 'utf8'));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'CALL ' . $spString;
        $pdo->query("SET CHARACTER SET utf8");
        $query = $pdo->query($sql);

        //Fetch the data
        $result = array();
        If (preg_match("/(spUpdate|spDelete|spNew){1}/", $sql) == 0) {
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $result[] = $row;
            }
        }

        $pdo = null;
        return $result;
    } catch (PDOException $e) {
        $pdo = null;
        die("Error occured: " . $e->getMessage());
    }
}
