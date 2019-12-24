<?php 
    
    error_reporting(0);
    session_destroy();
    $host = 'localhost';
    $user = 'root';
    $psswd = 'rootroot';
    $db = 'test';
    $con = mysqli_connect($host, $user, $psswd, $db);
    $email = $_POST['email'];
    $login = $_POST['login'];
    $passwd = $_POST['password'];
    $valid_e = '/^[a-z]+[a-z0-9.]{0,}+[@]+[a-z0-9-]{0,}+[.]+[a-z.]{2,5}$/';
    $valid_l = '/^[a-zA-Z0-9_]+[a-zA-Z0-9_]{0,}$/';
    $valid_p = '/^[a-zA-Z0-9_]+[a-zA-Z.0-9_]{0,}$/';
    $len_p = strlen($passwd);
    $len_l = strlen($login);
    $prov1 = $passwd == $_POST['password_p'];
    $prov2 = preg_match($valid_e, $email);
    $prov3 = preg_match($valid_l, $login);
    $prov4 = preg_match($valid_p, $passwd);

   

    if (!$con)
        {
            die("connection failed:" . mysqli_connect_error());
        };
    
    $v = 1;
    $query = "SELECT * FROM `hm`";
    $res = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($res))
    {   
        if($row['login'] == $login)
            {
                $v = 0;
            }
    }  
    
    
    if ($prov1 && $prov2 && $prov3 && $prov4 && $len_p >= 8 && $len_l >= 6 && $v == 1)
    {
         $sql = "INSERT INTO hm (email, login, passwd) VALUES ('$email', '$login', '$passwd');";
         mysqli_query($con,$sql);
         session_start();
         $_SESSION['enter'] = 0;
         $_SESSION['login'] =  $_POST['login'];
         include "MyPortfolio2.php";
         $_SESSION['enter'] = 0;
         # echo "Вы успешно зарегистрировались под именем: " . $_SESSION['login'] . " !<br>";
    }
    else if (!$prov1)
    echo "Пароли не совпадают";
    else if (!$prov2)
        echo "не верныая почта";
    else if (!$prov3)
        echo "не верный логин";
    else if (!($len_l >= 6))
        echo "логин должен быть длиннее 6 символов";
    else if (!($len_p >= 8))
        echo "пароль должен быть длиннее 8 символов";
    else if (!$prov4)
        echo "не верный пароль";
    else if (!$v)
        echo "такой пользователь уже существует";
    else echo "неизвестная ошибка ";

    if ($con->query($sql) !== TRUE) 
    {
        die($con->error);
    };
    

?> 
