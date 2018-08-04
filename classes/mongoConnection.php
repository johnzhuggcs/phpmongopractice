<?php
/**
 * Created by PhpStorm.
 * User: johnz
 * Date: 2018-08-03
 * Time: 6:49 PM
 */

class mongoConnection
{
    private $db;
    private $collection;
    private $userCollection;
    private $companyCollection;


    function __construct(){
        $mg = new MongoDB\Client("mongodb://localhost:27017");
        $this->db = $mg->testing;
        $this->userCollection = $this->db->user;
        $this->companyCollection = $this->db->company;



    }

    function createAll($table, $input){
        switch($table){
            case 'user':
                $this->createUser($input);
                echo "called function";
            case 'company':
                $this->createCompany($input);
        }
    }

    /*
     * [
            'username' => 'admin01',
            'email' => 'admin01@example.com',
            'last name' => 'Smith',
            'first name' => 'John',
            'company' => 'testCompany'

        ]

        [
            'companyname'=>'testCompany',
            'address'=>'12345 Asdf Rd',
            'earnings'=>0
        ]
     */

    function createUser($input){
        echo $input['username'];
        $insertOneResult = $this->userCollection->insertOne($input);
    }

    function createCompany($input){
        $insertOneResult = $this->companyCollection->insertOne($input);
    }

    function getUser(){

    }


}