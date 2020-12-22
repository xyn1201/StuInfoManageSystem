<!--显示、修改并保存指定用户学籍信息-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>学籍信息</title>
    <link rel="stylesheet" href="css/common.css" >
    <link rel="stylesheet" href="css/school-msg.css">	
</head>
<body>

<?php 
        header("Content-Type:text/html;charset=utf-8");
        $db = mysql_connect("localhost", "root");
        MySQL_query("SET NAMES 'utf8'");
        mysql_select_db("stu_db", $db);
        $id = $_GET['id'];
        $result = mysql_query("SELECT * FROM StuMajor", $db);
        $num=mysql_num_rows($result);
        for($i=0; $i<$num; $i++) {
            $row = mysql_fetch_assoc($result);            
            if($i == $id)
                break;
        }
?>
    <form method="post" action="<?php echo "saveStuMajor.php"."?id=". $id ?>">
        <div class="school-msg">
             <div class="pos-set wrap">
                 <span>当前位置>学籍信息</span>
	     <p>
	     <input type="button" id="emit" value="编辑">
	     <input type="submit" name="keep" value="保存">
	     </p>
             </div>
             <div class="basics-msg">
	     <p>专业信息</p>
             </div>

         <div class="basics-list">
             <ul class="clearfix">
                 <li>
	     <label for="">学历 :</label>
	     <div class="inp-border">
	         <input type="text" name="degree" value="<?php echo $row['degree']?>" disabled>
	     </div>
	 </li>
	 <li>
	     <label for="">学制 :</label>
	     <div class="inp-border">
	         <input type="text" name="time" value="<?php echo $row['time'] ?>" disabled>
	     </div>
	 </li>
	 <li>
	     <label for="">专业 :</label>
	     <div class="inp-border">
	         <input type="text" name="major" value="<?php echo $row['major'] ?>"   disabled>
	     </div>
	 </li>
	 <li>
	     <label for="">学院 :</label>
	     <div class="inp-border">
	         <input type="text" name="academy" value="<?php echo $row['academy'] ?>" disabled>
	     </div>
	 </li>
                 <li>
	     <label for="">班级 :</label>
	     <div class="inp-border">
	         <input type="text" name="class" value="<?php echo $row['class'] ?>" disabled>
	     </div>
	 </li>
             </ul>
         </div>
         <center><a href="main.php?page=1">HOME</a></center><br>
    </div>
    </form>

    <script src="js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $('#emit').on('click',function(){
            $('input').removeAttr('disabled');
        });
        $('#keep').on('click',function(){
            $('input').attr('disabled','disabled');
        });
    </script>
</body>
</html>