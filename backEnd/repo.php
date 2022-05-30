<?php
session_start();
if(!isset($_SESSION["logged"])){ //Registrazione
    $regButton = $_POST['regButton'];
    $logButton = $_POST['logButton'];
        if (isset($regButton)) {
            if($_POST['rMail']!="" && $_POST['usrn']!="" && $_POST['rPsw']!=""){
            $dirs = scandir("/usersFolders");
                if(empty($dirs)){
                    mkdir('./usersFolders/'.$_POST['rMail']);
                    $myfile = fopen("./usersFolders/".$_POST['rMail']."/password.json", "w");
                    $psw = json_encode($_POST['rPsw']);
                    file_put_contents("./usersFolders/".$_POST['rMail']."/password.json", $psw);
                    return;
                }else{
                    echo "user already exists";
                    return;
                }
            }else{
                echo "empty parameters";
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
                // var_dump($contents);
                fclose($myfile);
                    if(json_decode($contents) == $_POST['lPsw']){
                        $_SESSION["ExpirationTime"]=time()+3600;
                        header("location: home.php");
                    }
            }
        }
    }
?>