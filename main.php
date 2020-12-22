<!--主脚本文件-->
<!DOCTYPE html>
<html>
<head>
    <title>System</title>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">;
</head>
<body>

<div class="login">
    <div class="content clearfix">

    <center>
    <h1>学生信息管理系统</h1><hr /><br>

<?php
    header("Content-type: text/html; charset=UTF-8"); 
    $db = mysql_connect("localhost", "root");
    mysql_select_db("stu_db", $db);
    $id = 0;
    $num_rec_per_page = 10;
    if (isset($_GET['id'])) $id = $_GET['id'];
    if (isset($_GET['page'])) $page = $_GET['page'];
    MySQL_query("SET NAMES 'utf8'");
    $result = mysql_query("SELECT * FROM StuInfo", $db);
    
    $id = $page *10 - 10;
    $start_from = ($page-1) * $num_rec_per_page; 
    $sql = "SELECT * FROM StuInfo LIMIT $start_from, $num_rec_per_page"; 
    $rs_result = mysql_query ($sql); // 查询数据
?>

     <h1 align="center">学生名单列表</h1>
     <center><table border="1px" align="center" cellpadding="0" cellspacing="0" style="border-color: blue ;align-content: center;">
               
<?php
        $num=mysql_num_rows($result);
        while($row = mysql_fetch_assoc($rs_result)) {
            echo "<tr>";
            echo "<td>{$row['id_number']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>
                       <a href='studentInfo.php?id=".$id."'>个人信息</a>
                       </td>";
            echo "<td>
                       <a href='schoolMsg.php?id=".$id."'>学籍信息</a>
                       </td>";
            echo "<td>
                       <a href='studentGradeInfo.php?id=".$id."'>成绩信息</a>
                       </td>";
            echo "<td>
                       <a href='main.php?page=1&id=".$id."&delete=yes'>删除</a>
                       </td>";
            echo "</tr>";
            $id ++;

    }
?>
    </table>

<?php 
    $sql = "SELECT * FROM StuInfo"; 
    $rs_result = mysql_query($sql); //查询数据
    $total_records = mysql_num_rows($rs_result);  // 统计总共的记录条数
    $total_pages = ceil($total_records / $num_rec_per_page);  // 计算总页数

    echo "<a href='main.php?page=1'>".'|<'."</a> "; // 第一页

    for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='main.php?page=".$i."'>".$i."</a> "; 
    }; 
    echo "<a href='main.php?page=$total_pages'>".'>|'."</a> "; // 最后一页
?>

<?php
    if (isset($_GET['delete'])) {  // delete a record
        $id = $_GET['id']; 
        MySQL_query("SET NAMES 'utf8'");
        $result = mysql_query("SELECT * FROM StuInfo", $db);
        $num=mysql_num_rows($result);
        for($i=0; $i<$num; $i++) {
            $row = mysql_fetch_assoc($result);            
            if($i == $id)
                break;
         }
         $sql1 = "DELETE FROM StuInfo WHERE id_number = '".$row['id_number']."'"; 
         $sql2 = "DELETE FROM StuMajor WHERE id_number = '".$row['id_number']."'"; 
         $sql3 = "DELETE FROM StuScore WHERE student_id = '".$row['id_number']."'";
?>

<SCRIPT LANGUAGE=javascript>
         if (confirm('是否确认?')==true) {

             alert('confirm');
<?php
             $result = mysql_query($sql1);
             $result = mysql_query($sql2);
             $result = mysql_query($sql3);
             echo "<br>DELETE OK!<br>\n";
?>
        }
        else {
            alert('no confirm');
        }
</SCRIPT>


<?php
    }
?>

        <h3 align="center"><a href="addInfo.php">增加学生</a></h3>                
        <a href="main.php?page=1">HOME</a><br>
    </div>
</div>
<?php
    mysql_close($db);
?>

</body>
</html>