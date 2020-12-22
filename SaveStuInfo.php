<!--保存用户个人信息-->
<?php 
        header("Content-Type:text/html;charset=utf-8");
        $db = mysql_connect("localhost", "root");
        MySQL_query("SET NAMES 'utf8'");
        mysql_select_db("stu_db", $db);
        $id = 0;
        if (isset($_GET['id'])) $id = $_GET['id'];
        $result = mysql_query("SELECT * FROM StuInfo", $db);
        $num=mysql_num_rows($result);
        for($i=0; $i<$num; $i++) {
            $row = mysql_fetch_assoc($result);            
            if($i == $id)
                break;
        }

        session_start();
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $birthday = $_POST['birthday'];
        $identical_card_number = $_POST['identical_card_number'];
        $id_number = $_POST['id_number'];
        $ethnic_group = $_POST['ethnic_group'];
        $political_status = $_POST['political_status'];
        $phone = $_POST['phone'];
        $qq = $_POST['qq'];
        $mail = $_POST['mail'];
        $sql = "update StuInfo set name = '".$name."',sex = '".$sex."',ethnic_group='".$ethnic_group."',birthday='".$birthday."',identical_card_number='".$identical_card_number."',political_status='".$political_status."',phone='".$phone."',qq='".$qq."',mail='".$mail."' where id_number='".$row['id_number']."'";
        $result = mysql_query($sql);
        if($result) { //保存成功后跳转
	mysql_close($db);
                header('location: studentInfo.php?id='.$id);
        }
 ?>