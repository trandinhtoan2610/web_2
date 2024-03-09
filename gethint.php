<?php
include "./admincp/config/config.php";
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param("s", $q);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $hint = "Tài khoản đã tồn tại";
        }
        $stmt->close();
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint;
?>