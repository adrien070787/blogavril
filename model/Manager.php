<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 10/05/2018
 * Time: 16:23
 */

class Manager
{

    protected function dbConnect() {
        $bdd = new PDO('mysql:host=localhost;dbname=blogavril;charset=utf8', 'root', 'root');
        return $bdd;
    }

}