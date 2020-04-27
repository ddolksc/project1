<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../common/css/login.css">
</head>
<body>
    <div id="login_wrap">
        <form  name="member_form" method="post" action="login.php"> 
            <div id="title">
                <a href="../index.html"><img src="../mobile/images/logo_x2.png"></a>
            </div>
            <div id="login_form">
                <div id="id_input_button">
                    <div id="id_pw_title">
                        <ul>
                            <li>I D</li>
                            <li>PASSWORD</li>
                        </ul>
                    </div>
                    <div id="id_pw_input">
                        <ul>
                            <li><input type="text" name="id" class="login_input"></li>
                            <li><input type="password" name="pass" class="login_input"></li>
                        </ul>						
                    </div>
                    <div id="login_button">
                        <input type="submit" value="LOG IN">
                    </div>
                </div>
                <div id="join_button">
                    <a href="../member/member_form.php">아직 회원이 아니신가요? &gt;</a>
                </div>
            </div> <!-- end of form_login -->
        </form>
    </div> <!-- end of wrap -->
</body>
</html>