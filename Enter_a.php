<?php 
    #error_reporting(0);
    $host = 'localhost';
    $user = 'root';
    $psswd = 'rootroot';
    $db = 'test';
    $con = mysqli_connect($host, $user, $psswd, $db);
    
    $login = $_POST['login'];
    $passwd = $_POST['password'];

    $valid_l = '/^[a-zA-Z0-9_]+[a-zA-Z0-9_]{0,}$/';
    $valid_p = '/^[a-zA-Z0-9_]+[a-zA-Z.0-9_]{0,}$/';
    $len_p = strlen($passwd);
    $len_l = strlen($login);

    
    $prov3 = preg_match($valid_l, $login);
    $prov4 = preg_match($valid_p, $passwd);

   

    if (!$con)
        {
            die("connection failed: " . mysqli_connect_error());
        };
    
    $v = 1;
    $query = "SELECT * FROM `hm`";
    $res = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($res))
    {   
        if($row['login'] == $login && $row['passwd'] == $passwd)
            {
                $v = 0;
                
            }
             $a = $row['login'] == $login;
            $b = $row['passwd'] == $passwd;
            // echo $passwd . "<br>";
            // echo $row['passwd'] . "<br>";
            echo $a . "<br>";
            echo $b . "<br>";
          echo $row['login'] . "<br>";
          echo $login . "<br>";
            
    }  
    
    
    if ($prov3 && $prov4 && $len_p >= 8 && $len_l >= 6 && $v == 0)
    {
        
         session_start();
         $_SESSION['login'] =  $_POST['login'];
         $_SESSION['enter'] = 1; 
         header ('Location: MyPortfolio2.php');  // перенаправление на нужную страницу
         exit();
        
    }
    
    else if (!$prov3)
        echo "не верный логин" . $passwd;
    else if (!($len_l >= 6))
        echo "логин должен быть длиннее 6 символов";
    else if (!($len_p >= 8))
        echo "пароль должен быть длиннее 8 символов";
    else if (!$prov4)
        echo "не верный пароль";
    else if ($v)
        echo "такого пользователя не существует";
    else echo "неизвестная ошибка ";

    
    

?> 