<?php
    function checklogin($user,$pass){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "web_2";
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "SELECT * FROM `user` WHERE username = '".$user."' and password = '".$pass."';";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq[0]['type'];
    }
?>