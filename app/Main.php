<?php

namespace Test\app;
require 'app/Database.php';

use Test\app\Database;

class Main{
    private $host;
    private $username;
    private $password;
    function handleCLIRequest(){
        $shortopts  = "";
        $shortopts .= "u::";  // Optional value
        $shortopts .= "p::"; // Optional value
        $shortopts .= "h::"; // Optional value
        
        $longopts  = array(
            "file::",    // Optional value
            "create_table::",    // Optional value
            "dry_run::",        // Optional value
            "help",           // No value
        );
        
        
        $argv = getopt($shortopts, $longopts);

        $this->username = isset($argv['u']) && !empty($argv['u']) ? $argv['u'] : 'root';
        $this->password = isset($argv['p']) && !empty($argv['p']) ? $argv['p'] : 'ztech@44';
        $this->host = isset($argv['h']) && !empty($argv['h']) ? $argv['h'] : 'localhost';

        //init Database
        $database = new Database($this->host, $this->username, $this->password);
        $database->connectDB();
        $database->createDB();

        foreach ($argv as $key=>$arg){
            switch($key){
                case "u":
                    $this->username = $arg;   
                    break;
                case "p":
                    $this->password = $arg;
                    break;
                case "h":
                    $this->host = $arg;
                    break;
                case "file":
                    echo "file";
                    break;
                    case "create_table":
                        $database->createTable($arg);
                        break;
                    case "dry_run":
                        echo "dry_run-------------------\r\n";
                        break;
                    case "help":
                            // echo "\r\n";
                            // echo "For CSV File to parsed - Run below command-----------  \r\n";
                            // echo "./index.php --file FileName  \r\n";
                            // echo "\r\n";
                            break; 
                
                    default:
                        echo "Please enter correct options";
                  }
            }
            //return($options);
    
        }
        
    }
    
    //./index.php -u"shshhs" -p"ddddddssd" -h"dddd" --create_table="dddd" --dry_run="dddddsdsds" --help --file="users"
    //./index.php  -h"localhost" --dry_run="dddddsdsds" --help --file="users" -u"root" -p"ztech@44"  --create_table="user"
    ?>