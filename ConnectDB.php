<?php
    $SERVER = "localhost" ;
    $USERNAME = "root" ;
    $PASSWORD = "" ;
    $DBNAME = "students-manager" ;

    $connect = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DBNAME) ;

    if(!$connect)
        echo "Connect Database Fail !" ;
?>