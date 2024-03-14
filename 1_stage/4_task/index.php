<?php

    $db_host = $_SERVER['SERVER_ADDR'];
    $db_user = 'user';
    $db_password = 'password';
    $db_name = 'ExampleBD';

    $connection_OOP = @new mysqli($db_host, $db_user, $db_password, $db_name);
    $connection_PP = @mysqli_connect($db_host, $db_user, $db_password, $db_name);

    if ($connection_OOP->connect_errno or !$connection_PP) 
        printf(mysqli_connect_error(), $connection_OOP->connect_error);
        die("Ошибка соединения с БД.");

    $query = "SELECT user.firstName, user.lastName, city.city FROM user LEFT JOIN city ON user.city=city.id;";

    $result_OOP = $connection_OOP->query($query);
    $result_PP = @mysqli_query($connection_PP, $query);

    if (!$result_OOP or !$result_PP)
        printf(mysqli_error($connection_PP), $connection_OOP->error);
        die("Ошибка выполнения запроса в БД.");

    $result_PP = mysqli_fetch_all($result_PP, MYSQLI_ASSOC);
    // Работа с массивом результата запроса.

    while ($row = $result_OOP->fetch_assoc())
    {
        // Работа со строкой результата запроса.
    }

    $result_OOP->free_result();

    mysqli_close($connection_PP);
    $connection_OOP->close();

?>