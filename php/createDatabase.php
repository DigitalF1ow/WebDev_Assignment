<?php

 $connect = mysqli_connect("localhost", "root", "");
 $query = "CREATE DATABASE tourismDatabase";

 $result = mysqli_query($connect, $query);

 if ($result)
    echo "Tourism Database is created!";
 else
    echo "Database cannot be duplicated / Database has already been created!";

 mysqli_close($connect);

?>