<!--增加学生用户各项信息-->
<!DOCTYPE html>
<html>
<head>
    <title>增加个人信息</title>
</head>
<body background="images/bk.jpeg">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<form  method="POST">
    <center><table>
    <span><font color="red">个人信息模块</font></span><br>
	<font color = "white">
                学号：<input type="number" name="id_number" placeholder="你的学号"><br>
	姓名：<input type="text" name="name" placeholder="你的姓名"><br>
                性别：<input type="text" name="sex" placeholder="你的性别"><br>
	民族：<input type="text" name="ethnic_group" placeholder="你的民族"><br>
	生日：<input type="date" name="birthday" placeholder="你的生日（XXXX-XX-XX）"><br>
	政治面貌：<input type="text" name="political_status" placeholder="你的政治面貌"><br>
	身份证号：<input type="text" name="identical_card_number" placeholder="你的身份证号"><br>
	手机：<input type="text" name="phone" placeholder="你的手机"><br>
	邮箱：<input type="text" name="mail" placeholder="你的邮箱"><br>
	qq：<input type="text" name="qq" placeholder="你的qq"><br></font>

    <span><font color="red">个人学籍模块</font></span><br>
                <font color = "white">
	学历：<input type="text" name="degree" placeholder="你的学历"><br>
	学制：<input type="number" name="time" placeholder="你的学制"><br>
	专业：<input type="text" name="major" placeholder="你的专业"><br>
	学院：<input type="text" name="academy" placeholder="你的学院"><br>
	班级：<input type="number" name="class" placeholder="你的班级"><br></font>

    <span><font color="red">个人成绩模块</font></span><br>
                 <font color = "white">
	课程名：<input type="text" name="course1" value="通信原理">
	成绩：<input type="number" name="score1" ><br>
	课程名：<input type="text" name="course2" value="数据结构">
	成绩：<input type="number" name="score2" ><br>
	课程名：<input type="text" name="course3" value="计算机网络">
	成绩：<input type="number" name="score3" ><br>
                          <input type="Submit" name="submit" value="提交">
                          <input type="Reset" name="reset" value="重置">

    </table></center>
</form>

<?php
    header("Content-type: text/html; charset=UTF-8"); 
    $db = mysql_connect("localhost", "root");
    mysql_select_db("stu_db", $db);

    if (isset($_POST['submit'])) {

            MySQL_query("SET NAMES 'utf8'");
            $sql1 = "INSERT INTO StuInfo (id_number, name, sex, ethnic_group, birthday, political_status, identical_card_number, phone, mail, qq) 
                        VALUES ('$_POST[id_number]', '$_POST[name]', '$_POST[sex]', '$_POST[ethnic_group]', '$_POST[birthday]', '$_POST[political_status]', '$_POST[identical_card_number]','$_POST[phone]','$_POST[mail]','$_POST[qq]')";
            $sql2 = "INSERT INTO StuMajor (id_number, degree, time, major, academy, class) 
                        VALUES ('$_POST[id_number]', '$_POST[degree]', '$_POST[time]', '$_POST[major]', '$_POST[academy]', '$_POST[class]')";
            $sql3 = "INSERT INTO StuScore (student_id, class_id, score) 
                        VALUES ('$_POST[id_number]', '$_POST[course1]', '$_POST[score1]'),
                                      ('$_POST[id_number]', '$_POST[course2]', '$_POST[score2]'),
                                      ('$_POST[id_number]', '$_POST[course3]', '$_POST[score3]')";

            $result = mysql_query($sql1);
            $result = mysql_query($sql2);
            $result = mysql_query($sql3);
            echo '0000';
    }
?>
       <font color = 'white'><center><a href="main.php?page=1">HOME</a></center></font><br>

</body>
</html>