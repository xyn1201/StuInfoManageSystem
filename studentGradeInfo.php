<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>成绩信息</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/punishment.css">
</head>
<body>

<?php 
    header("Content-Type:text/html;charset=utf-8");
    $db = mysql_connect("localhost", "root");
    MySQL_query("SET NAMES 'utf8'");
    mysql_select_db("stu_db", $db);
    $id = $_GET['id'];
?>

     <div class="container">
        <div class="content">
            <div class="header clearfix">
                <div class="top fl">当前位置>成绩信息</div>
            </div>
            <div class="main">
                <!--基础信息-->
                <div class="BasicInformation">
                    <div class="title">基础信息</div>
                </div>
                <div class="content clearfix">
                
                    <div class="reason fl">
                       <br>
                       <table width="300px" height="100px" border="1px">

<?php  
            $result = mysql_query("SELECT * FROM StuInfo", $db);
            $num=mysql_num_rows($result);
            for($i=0; $i<$num; $i++) {
                 $row = mysql_fetch_assoc($result);            
                 if($i == $id)
                     break;
             }

             $result = mysql_query("SELECT * FROM StuScore WHERE student_id = '".$row['id_number']."'", $db);                
             $num=mysql_num_rows($result);
             for($i=0; $i<$num; $i++) {
                 $row = mysql_fetch_assoc($result);
                 echo "<tr>";
                 echo "<td>{$row['student_id']}</td>";
                 echo "<td>{$row['class_id']}</td>";
                 echo "<td>{$row['score']}</td>";
                 echo "</tr>";
                 $id ++;
             } 
?>           
                       </table>
                       <br>
                       <br>
                       <br>
                       <center><a href="main.php?page=1">HOME</a></center><br>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    <script src="js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $('#emit').on('click',function(){
            $('input').removeAttr('disabled');
            $('textarea').removeAttr('disabled');
        });
        $('#keep').on('click',function(){
            $('input').attr('disabled','disabled');
            $('textarea').attr('disabled','disabled');
        });
    </script>

</body>
</html>