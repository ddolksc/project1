// JavaScript Document

$(document).ready(function(){
  var cnt=2;  //탭의개수  ***
  $('.tabs .contlist:eq(0)').show(); //첫번째 탭 내용 보여라~
  $('.tabs .tab1').css('background','#fbd204').css('color','#333');
           //첫번째 탭 활성화

  $('.tabs .tab').each(function (index) {  //index=0,1,2,...
    $(this).click(function(){ //각각의 탭메뉴를 클릭하면   
	  $(".tabs .contlist").hide(); //모든 내용을 안보이게~~ 
	  $(".tabs .contlist:eq("+index+")").show();
                //클릭한 탭에 해당 내용만 보여라~
        
	  for(var i=1;i<=cnt;i++){  //1,2,3
       $('.tab'+i).css('background','#292929').css('color','#fff');
      }  //모든 탭메뉴를 비활성화~~
      $(this).css('background','#fbd204').css('color','#333'); //클릭한 해당 탭메뉴만 활성화
   });
  });
});














