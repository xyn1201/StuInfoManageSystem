<!--保存用户学籍信息-->
<?php 
        header("Content-Type:text/html;charset=utf-8");
        $db = mysql_connect("localhost", "root");
        MySQL_query("SET NAMES 'utf8'");
        mysql_select_db("stu_db", $db);
        $id = 0;
        if (isset($_GET['id'])) $id = $_GET['id'];
        $result = mysql_query("SELECT * FROM StuMajor", $db);
        $num=mysql_num_rows($result);
        for($i=0; $i<$num; $i++) {
            $row = mysql_fetch_assoc($result);            
            if($i == $id)
                break;
        }

        session_start();
        $degree = $_POST['degree'];
        $time = $_POST['time'];
        $academy = $_POST['academy'];
        $major = $_POST['major'];
        $class = $_POST['class'];
        $sql = "update StuMajor set degree = '".$degree."',time = '".$time."',academy='".$academy."',major='".$major."',class='".$class."' where id_number='".$row['id_number']."'";
        $result = mysql_query($sql);
        if($result) { //保存成功后跳转
	mysql_close($db);
	header('location: schoolMsg.php?id='.$id);
        }
 ?>