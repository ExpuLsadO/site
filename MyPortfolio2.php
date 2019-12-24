<html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style_for_MyPortfolio.css">
        
        <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Montserrat:400,700&display=swap&subset=cyrillic-ext" rel="stylesheet">

        
        
        <title >MySite</title>
        
           
    </head>
    
    

    
    <body > 

       <header class="header">
           <div class="container">
                <div class="header__inner">
                   
                    <div class="header__logo">MySyte</div>
                    
                    <nav class="nav">
                        <a class="nav__link" href="./MyPortfolio2.php">About Me</a>
                        <a class="nav__link" href="./MyMarks.php">My marks</a>
                        <a class="nav__link" href="./MyTimetable.php">timetable</a>
                        <a class="nav__link" href="./blog.php">Blog</a>
                        <a class="nav__link" href="./exit.php"><img width = "20px" height = "20" src="./images11.png"></a>
                    </nav>
                </div>
           </div>
            
       </header>
      
       
       <div class="intro"> 
          <div class="container">
           <div class="intro__inner">
               <h2 class="intro__suptitle">student life not so bad</h2>
               
                <h1 class="intro__title"> My Portfolio</h1>
           
        
    
    



    <header align="center">5 facts about me:</header>
    <ul  class="ul">
         
            <?php
                echo "<li class=\"li\">";
                error_reporting(0);
                session_start();
                $host = 'localhost';
                $user = 'root';
                $psswd = '';
                $db = 'test';
                $con = mysqli_connect($host, $user, $psswd, $db);
                if (isset($_POST['post1']))
                    {$query = "UPDATE `5_facts` SET `fact1` = '$_POST[comment1]'";
                    mysqli_query($con, $query);}
                elseif (isset($_POST['post2']))
                    {$query = "UPDATE `5_facts` SET `fact2` = '$_POST[comment2]'";
                    mysqli_query($con, $query);}
                elseif (isset($_POST['post3']))
                    {$query = "UPDATE `5_facts` SET `fact3` = '$_POST[comment3]'";
                    mysqli_query($con, $query);}
                elseif (isset($_POST['post4']))
                    {$query = "UPDATE `5_facts` SET `fact4` = '$_POST[comment4]'";
                    mysqli_query($con, $query);}
                elseif (isset($_POST['post5']))
                    {$query = "UPDATE `5_facts` SET `fact5` = '$_POST[comment5]'";
                    mysqli_query($con, $query);}


                if ($_SESSION['login'] == "ExpuLsado" )
                {
                    $query = "SELECT * FROM `5_facts`";
                    $res = mysqli_query($con, $query);
                    $row = mysqli_fetch_array($res);
                    
                    
                    if (!isset($_POST['edit1']))
                        echo $row['fact1'] . "<form action=\"\" method=\"post\"> <input type=\"submit\" value = \"edit\" name = \"edit1\"> </form>";
                    else
                        {echo $row['fact1'];
                        echo "<form action=\"\" method=\"post\"> <input type=\"text\" value = \"\" name = \"comment1\"> <input type=\"submit\" value = \"post\" name = \"post1\"> </form>";}
                    
                    echo "</li>"; 
                    echo "<li class=\"li\">";


                    if (!isset($_POST['edit2']))
                        echo $row['fact2'] . "<form action=\"\" method=\"post\"> <input type=\"submit\" value = \"edit\" name = \"edit2\"> </form>";
                    else
                        {echo $row['fact2'];
                        echo "<form action=\"\" method=\"post\"> <input type=\"text\" value = \"\" name = \"comment2\"> <input type=\"submit\" value = \"post\" name = \"post2\"> </form>";}

                    echo "</li>"; 
                    echo "<li class=\"li\">";

                    if (!isset($_POST['edit3']))
                        echo $row['fact3'] . "<form action=\"\" method=\"post\"> <input type=\"submit\" value = \"edit\" name = \"edit3\"> </form>";
                    else
                        {echo $row['fact3'];
                        echo "<form action=\"\" method=\"post\"> <input type=\"text\" value = \"\" name = \"comment3\"> <input type=\"submit\" value = \"post\" name = \"post3\"> </form>";}
                    
                    echo "</li>"; 
                    echo "<li class=\"li\">";

                    if (!isset($_POST['edit4']))
                        echo $row['fact4'] . "<form action=\"\" method=\"post\"> <input type=\"submit\" value = \"edit\" name = \"edit4\"> </form>";
                    else
                        {echo $row['fact4'];
                        echo "<form action=\"\" method=\"post\"> <input type=\"text\" value = \"\" name = \"comment4\"> <input type=\"submit\" value = \"post\" name = \"post4\"> </form>";}
                    
                    echo "</li>"; 
                    echo "<li class=\"li\">";

                    if (!isset($_POST['edit5']))
                        echo $row['fact5'] . "<form action=\"\" method=\"post\"> <input type=\"submit\" value = \"edit\" name = \"edit5\"> </form>";
                    else
                        {echo $row['fact5'];
                        echo "<form action=\"\" method=\"post\"> <input type=\"text\" value = \"\" name = \"comment5\"> <input type=\"submit\" value = \"post\" name = \"post5\"> </form>";}
                    
                    echo "</li>"; 
                
                }

                else
                {
                    $query = "SELECT * FROM `5_facts`";
                    $res = mysqli_query($con, $query);
                    $row = mysqli_fetch_array($res);
                    echo $row['fact1'];
                    echo "</li>"; 
                    echo "<li class=\"li\">";
                    echo $row['fact2'];
                    echo "</li>"; 
                    echo "<li class=\"li\">";
                    echo $row['fact3'];
                    echo "</li>"; 
                    echo "<li class=\"li\">";
                    echo $row['fact4'];
                    echo "</li>"; 
                    echo "<li class=\"li\">";
                    echo $row['fact5'];
                    echo "</li>";
                    
                }


                 ###
            
                
            ?>
    </ul>
        
             
    <div>
    <table class="table__Myportfolio" align="center">
        <tr id="a">
            <td>информатика</td>
            <td>84</td>
           
            
        
        </tr>
        
        <tr id="b">
            <td>профильная математика </td>
            <td>80</td>
            
        </tr>
        
        <tr id="c">
            <td>русский</td>
            <td>72</td>
        </tr>
        
        <tr id="d">
            <td>физика</td>
            <td>62</td>
        </tr>
        
    </table>
    </div>
       


    <div>
    <p align = "center">
        <?php 
            error_reporting(0);
            session_start();
            if ($_SESSION['enter'] == 1)
                {
                    echo $_SESSION['login'] . " , добро пожаловать!<br>";
                    
                }
            else 
                echo "Вы успешно зарегистрировались под именем: " . $_SESSION['login'] . " !<br>";
        ?>
    </p>
    </div>

    <div>
     <?php
        error_reporting(0);
        session_start();

        

        $host = 'localhost';
        $user = 'root';
        $psswd = 'rootroot';
        $db = 'test';
        $con = mysqli_connect($host, $user, $psswd, $db);
        $query = "SELECT * FROM `hm`;";
        $res = mysqli_query($con, $query);
        $k = 1;
        if ($_SESSION['login'] == "ExpuLsado" )
        while($row = mysqli_fetch_array($res))
        {
            $log = $row['login'];
            if (isset($_POST["delete$log"]))
                {
                $p = $_POST["delete$log"];
                $query = "DELETE FROM `hm` WHERE `login` = \"$log\";";
                
                mysqli_query($con, $query);
                

                }
            
        if ($k != 1 && !isset($_POST["delete$log"]))        
        {echo "<table class=\"table__del\" align=\"center\">";
            echo "<tr>";
                echo "<td class=\"td_del\">";
                    
                        echo $row['login'];
                        
                        echo "<form action=\"\" method=\"post\"> <input type=\"submit\" value = \"delete user $log\" name = \"delete$log\"> </form>";
                    
                        
                
                echo "</td>";
            echo "</tr>";
        echo "</table>";}
        $k += 1;

        }
                
     ?>
    </div>
     
    
            
            
        </div>
         </div>
         </div>
    </body>
 
</html>
