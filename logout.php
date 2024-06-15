<?php
session_start();
include "home.php";
if(isset($_POST["submit"])){
    session_unset();
    session_destroy();
    echo "Session destroyed";
}

else{
    echo "Error";
}

?>
<form name="logout" method="post">
    <h1>Logout</h1>
    <button type="submit" class="btn btn-primary btn-lg" name="submit" data-toggle="modal" data-target="#myModal">Logout</button>
</form>