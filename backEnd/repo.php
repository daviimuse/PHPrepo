<?php
session_start();
    $regButton = $_POST['regButton'];
    $logButton = $_POST['logButton'];
        if (isset($regButton)) { //Registrazione
            if($_POST['rMail']!="" && $_POST['usrn']!="" && $_POST['rPsw']!=""){
            $dirs = scandir("./usersFolders/");
            $found = false;
            foreach($dirs as $dir){
                if($dir == $_POST['rMail']){
                        $found = true;
                        echo "user already exists";
                }
            }
            if($found != true){
                        mkdir('./usersFolders/'.$_POST['rMail'],0777);
                        $myfile = fopen("./usersFolders/".$_POST['rMail']."/password.json", "w");
                        $psw = json_encode($_POST['rPsw']);
                        file_put_contents("./usersFolders/".$_POST['rMail']."/password.json", $psw);
                        return;
                }
            }
        }
    if(isset($logButton)){ //Login
    $regButton = $_POST['regButton'];
    $logButton = $_POST['logButton'];
        $dirs = scandir("./usersFolders/"); 
            foreach($dirs as $dir){
                if($dir == $_POST['lMail']){
                $myfile = fopen("./usersFolders/".$_POST['lMail']."/password.json", "r");
                $contents = fread($myfile, filesize("./usersFolders/".$_POST['lMail']."/password.json"));
                fclose($myfile);
                    if(json_decode($contents) == $_POST['lPsw']){
                        $_SESSION["ExpirationTime"]=time()+3600;
                        header("location: home.php");
                    }
            }
        }
    }
?>