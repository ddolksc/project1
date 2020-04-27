<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>회원가입</title>
	<link rel="stylesheet" href="../common/css/common.css">
	
	
	<script src="../common/js/jquery-1.12.4.min.js"></script>
	<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
	
	<script>
	 $(document).ready(function() {
  
   
 
 //id 중복검사
 $("#id").keyup(function() {    // id입력 상자에 id값 입력시
    var id = $('#id').val(); //a

    $.ajax({
        type: "POST",
        url: "check_id.php", // 값을 넘길 목적지
        data: "id="+ id,  // 넘길 변수값
        cache: false,  // 캐쉬값에 기록 할것인가? true = 한다 , false = 안한다
        success: function(data)  // 
        {
            //data => echo "문자열" 이 저장된
             $("#loadtext").html(data);
        }
    });
});
		 
//nick 중복검사		 
$("#nick").keyup(function() {    // nick입력 상자에 nick값 입력시
    var nick = $('#nick').val();

    $.ajax({
        type: "POST",
        url: "check_nick.php",
        data: "nick="+ nick,  
        cache: false, 
        success: function(data)
        {
             $("#loadtext2").html(data);
        }
    });
});		 


});
	
	
	
	</script>
	<script>
   

  
   function check_input()
   {
      
      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }


      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit(); 
		   // insert.php 로 변수 전송
   }

   function reset_form()
   {
      
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>
</head>
<?
    //$userid='aaa';
    
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);
    //$row[id]....$row[level]

    $hp = explode("-", $row[hp]);  //000-0000-0000
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>
<body>
	 <? include "../common/subhead.html" ?>
	 
	<article id="content">  
	  
	  <h2>회원가입</h2>
	  <form  name="member_form" method="post" action="modify.php"> 
		
     <table>
      <caption class="hidden">회원가입</caption>
     	<tr>
     		<th scope="col"><label for="id">아이디</label></th>
     		<td>
                 
           
                <?= $row[id] ?>           
            
			     
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="pass">비밀번호</label></th>
     		<td>
     			 <input type="password" name="pass" id="pass" required value="">
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="pass_confirm">비밀번호확인</label></th>
     		<td>
     			<input type="password" name="pass_confirm" id="pass_confirm"  required value="">
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="name">이름</label></th>
     		<td>
     			<input type="text" name="name" id="name"  required value="<?= $row[name] ?>"> 
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="nick">닉네임</label></th>
     		<td>
     			 <input type="text" name="nick" id="nick"  required value="<?= $row[nick] ?>">
			     <span id="loadtext2"></span>
     		</td>
     	</tr>
     	<tr>
     		<th scope="col">휴대폰</th>
     		<td>
     			<label class="hidden" for="hp1">전화번호앞3자리</label>
     			<input type="text" class="hp" name="hp1" id="hp1" value="<?= $hp1 ?>">
          - <label class="hidden" for="hp2">전화번호중간4자리</label><input type="text" class="hp" name="hp2" id="hp2"  required value="<?= $hp2 ?>"> - <label class="hidden" for="hp3">전화번호끝4자리</label><input type="text" class="hp" name="hp3" id="hp3"  required value="<?= $hp3 ?>">
     			
     		</td>
     	</tr>
     	<tr>
     		<th scope="col">이메일</th>
     		<td>
     		  <label class="hidden" for="email1">이메일아이디</label>
     			<input type="text" id="email1" name="email1"  required value="<?= $email1 ?>"> @ 
     			<label class="hidden" for="email2">이메일주소</label>
     			<input type="text" name="email2" id="email2"  required value="<?= $email2 ?>">
     		</td>
     	</tr>
     	<tr>
     		<td colspan="2">
     			<a href="#"><img src="images/button_save.gif"  onclick="check_input()"></a>&nbsp;&nbsp;
				 <a href="#"><img src="images/button_reset.gif" onclick="reset_form()"></a>
     		</td>
     	</tr>
     </table>

	 </form>
	  
	</article>
	 <? include "../common/subfoot.html" ?>
</body>
</html>


