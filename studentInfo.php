<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>个人信息</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/student.css">
    <script src="js/jquery-1.9.1.min.js"></script>
</head>
<body>

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
?>

<form method="post" action="<?php echo "saveStuInfo.php"."?id=". $id ?>">
    <div class="container">
        <div class="content">
            <div class="header clearfix">
                <div class="top fl">当前位置>个人信息</div>
                <div class="bottom fr">
                    <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] . "?id=". $id?>">
                    <!-- <a id="emit" href="javascript:;">编辑</a> -->
                    <input type="button" value="编辑" id="emit">
                    <input type="Submit" value="保存" id="sub" >

                    </form>
                </div>
            </div>

            <div class="main">
                <!--基础信息-->
                <div class="BasicInformation">
                    <div class="title">
                        基础信息
                    </div>
                </div>
                <div class="content clearfix">
                    <div class="left fl">
                        <div>
                            <label for="">姓名：</label>
                            
                             <input id="name" name="name" type="text" value=<?php echo $row['name'] ?>  disabled />
                        </div>
                        <div>
                            <label for="">性别：</label>
                           
                           <input id="sex" name="sex" type="text" value="<?php echo $row['sex'] ?>"  disabled />
                        </div>
                        <div>
                            <label for="">出生日期：</label>

                            <input id="birthday" name="birthday" type="text" value="<?php echo $row['birthday'] ?>" disabled>
                        </div>
                        <div>
                            <label for="">身份证号：</label>

                            <input id="identical_card_number" name="identical_card_number" class="id oInp" type="text" value="<?php echo $row['identical_card_number'] ?>" disabled>
                        </div>
                    </div>
                    <div class="right fr">
                        <div>
                            <label for="">学号：</label>
                            
                            <input id="id_number" name="id_number" type="number" value="<?php echo $row['id_number'] ?>" disabled>
                        </div>
                        <div>
                            <label for="">民族：</label>

                            <input id="ethnic_group" name="ethnic_group" type="text" value="<?php echo $row['ethnic_group'] ?>" disabled>
                        </div>
                        <div class="label">
                            <label for="">政治面貌：</label>

                             <input id="political_status" name="political_status" type="text" value="<?php echo $row['political_status'] ?>" disabled>
                        </div>
                      
                    </div>
                </div>
                <!--联系方式-->
                <div class="BasicInformation">
                    <div class="title">联系方式</div>
                </div>
                <div class="content clearfix">
                    <div class="left fl">
                        <div>
                            <label for="">手机号码：</label>

                            <input id="phone" name="phone" type="text" value="<?php echo $row['phone'] ?>" disabled>
                        </div>
                        <div>
                            <label for="">QQ号码：</label>

                            <input id="qq" name="qq" type="text" value="<?php echo $row['qq'] ?>" disabled>
                        </div>
                    </div>
                    <div class="right fr">
                        <div>
                            <label for="">电子邮箱：</label>

                            <input id="mail" name="mail" type="text" value="<?php echo $row['mail'] ?>" class="mailbox" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <center><a href="main.php?page=1">HOME</a></center><br>
            </form>

        </div>
    </div>
    </form>

    <script>
        $('#politics i').on('click', function() {
            $(this).siblings('ul').show();
        });
        $('#politics ul li').on('click', function() {
            var selTxt = $(this).text();
            $('#politics a').text(selTxt);
            $('#politics ul').hide();
        });
        $('#child i').on('click', function() {
            $(this).siblings('ul').show();
        });
        $('#child ul li').on('click', function() {
            var selTxt = $(this).text();
            $('#child a').text(selTxt);
            $('#child ul').hide();
        });
        $('#emit').on('click',function(){
            $('input').removeAttr('disabled');
        });

        $('#keep').on('click',function(){
            $('input').attr('disabled','disabled');
        });
        $(document).ready(function(){
            $.ajax({
                url: "http://101.201.154.205:9090/bm/bmList",
                type: 'post',
                data: {
                    t: Math.random()
                },
                dataType: 'jsonp',
                'jsonp': 'callback'
            }).then(function(res){
                console.log(res)
    //              var stu_name = $('#stu_name').val();
                for (var i=0; i<res.length; i++) {
                    $('#name').arr('value',res[i].stu_name);
                    $('#sex').arr('value',res[i].sex);
                    $('#id_number').arr('value',res[i].id_number);
                    $('#identical_card_number').arr('value',res[i].identical_card_number);
                    $('#birthday').arr('value',res[i].birthday);
                    $('#ethnic_group').arr('value',res[i].ethnic_group);
                    $('#qq').arr('value',res[i].qq);
                    $('#phone').arr('value',res[i].phone);
                    $('#mail').arr('value',res[i].mail);
                    $('#political_status').text(res[i].political_status);
                }
            },function(){
                console.log('error');
            });
        });
    </script>

</body>
</html>