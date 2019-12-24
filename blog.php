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
                <div class="intro__inner__blog">
                    <h2 class="intro__suptitle">student life not so bad</h2>
               
                    <h1 class="intro__title"> My Portfolio</h1>
           
                    <div class = "blog">
                    <?php
                        error_reporting(0);
                        session_start();
                        $host = 'localhost';
                        $user = 'root';
                        $psswd = 'rootroot';
                        $db = 'test';
                        $con = mysqli_connect($host, $user, $psswd, $db);
                        

                        if (!isset($_SESSION['post_num']))
                            $_SESSION['post_num'] = 1;

                        if (isset($_POST['post3']))
                            {$p1 = $_POST["add_name"];
                            $p = $_POST["add"];
                            $query = "INSERT INTO `posts` (name_of_post, post) VALUES ('$p1','$p') ";
                            mysqli_query($con, $query);
                            }
                        

                        $query = "SELECT * FROM `posts`;";
                        $res = mysqli_query($con, $query);
                        while($row = mysqli_fetch_array($res))
                        {   echo "<table class=\"table__blog\" align=\"center\">";
                                echo "<tr>";
                                    echo "<td>";
                                        $post_num = $_SESSION['post_num'];
                                        
                                        if (isset($_POST["post_text$post_num"]))
                                        {   
                                            $p = $_POST["edited_post$post_num"];
                                            $query = "UPDATE `posts` SET `name_of_post` = '$p' WHERE `id` = '$post_num'; ";
                                            mysqli_query($con, $query);
                                            $row['name_of_post'] = $p;
                                        }

                                        if ($_SESSION['login'] == "ExpuLsado" )
                                            {                                        
                                                if (!isset($_POST["edit_post$post_num"]))
                                                    echo $row['name_of_post'] . "<form action=\"\" method=\"post\"> <input type=\"submit\" value = \"edit\" name = \"edit_post$post_num\"> </form>";
                                                else
                                                    {
                                                        echo $row['name_of_post'];
                                                        echo "<form action=\"\" method=\"post\"> <input type=\"text\" value = \"\" name = \"edited_post$post_num\"> <input type=\"submit\" value = \"post\" name = \"post_text$post_num\"> </form>";
                                                    
                                                    }
                                            }
                                        else 
                                            {
                                                echo $row['name_of_post'];
                                            }
                                        
                                        
                                    echo "</td>";
                                echo "</tr>";

                                echo "<tr>";
                                    echo "<td>";
                                    
                                        
                                    if (isset($_POST["post_text1$post_num"]))
                                    {   
                                        $p = $_POST["edited_post1$post_num"];
                                        $query = "UPDATE `posts` SET `post` = '$p' WHERE `id` = '$post_num'; ";
                                        mysqli_query($con, $query);
                                        $row['post'] = $p;
                                    }

                                    if ($_SESSION['login'] == "ExpuLsado" )
                                        {                                        
                                            if (!isset($_POST["edit_post1$post_num"]))
                                                echo $row['post'] . "<form action=\"\" method=\"post\"> <input type=\"submit\" value = \"edit\" name = \"edit_post1$post_num\"> </form>";
                                            else
                                                {echo $row['post'];
                                                echo "<form action=\"\" method=\"post\"> <input type=\"text\"  value = \"\" name = \"edited_post1$post_num\"> <input type=\"submit\" value = \"post\" name = \"post_text1$post_num\"> </form>";
                                                
                                                }

                                            $h = $row['post'];
                                            $query1 = "SELECT * FROM `comments_for_posts` WHERE `post` = \"$h\";";
                                            $res1 = mysqli_query($con, $query1);
                                            while ($row1 = mysqli_fetch_array($res1))
                                            {
                                                echo "<table>";
                                                    echo "<tr>";
                                                        echo "<td>";
                                                            echo $row1['comment'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo $row1['user'];
                                                        echo "</td>";
                                                    echo "</tr>";
                                                echo "</table>";
                                            }

                                        }
                                    else 
                                        {
                                            $h = $row['name_of_post'];
                                            
                                            
                                            $query1 = "SELECT * FROM `comments_for_posts` WHERE `post` = \"$h\";";
                                            
                                            $res1 = mysqli_query($con, $query1);
                                            echo $row['post'];
                                            
                                            
                                            while ($row1 = mysqli_fetch_array($res1))
                                            {
                                                echo "<table>";
                                                    echo "<tr>";
                                                        echo "<td>";
                                                            
                                                            echo $row1['user'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo $row1['comment'];
                                                        echo "</td>";
                                                    echo "</tr>";
                                                echo "</table>";
                                            }
                                           
                                        }

                                        $_SESSION['post_num'] +=1;
                                    echo "</td>";
                                echo "</tr>";
                            echo "</table>"; 
                        } 
                        
                        if ($_SESSION['login'] == "ExpuLsado" )
                        {echo "<table class=\"table__blog\" align=\"center\">";
                            echo "<tr>";
                                echo "<td>";
                                    if (!isset($_POST["addd"]))
                                        echo "<form action=\"\" method=\"post\"> <input type=\"submit\" value = \"add post\" name = \"addd\"> </form>";
                                    else
                                        {
                                            echo "Добавьте пост";
                                            echo "<form action=\"\" method=\"post\"> <input type=\"text\" placeholder =\"post name\" value = \"\" name = \"add_name\"> <input type=\"text\" placeholder =\"post\" value = \"\" name = \"add\"> <input type=\"submit\" value = \"post\" name = \"post3\"> </form>";
                                        }
                                        
                                
                                echo "</td>";
                            echo "</tr>";
                        echo "</table>";}
                       

                    ?>
                    </div>
    
        
            
       
       




            
            
                </div>
            </div>
        </div>
    </body>
 
</html>