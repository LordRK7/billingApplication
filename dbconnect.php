<?php

$con=mysqli_connect("127.0.0.1","root","") or die("Database Connection Error");

mysqli_select_db($con,"billing_app") or die("Database selection error");

?>