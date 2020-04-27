$(document).ready(function() {
    $(".btn").click(function() { //메뉴버튼 클릭시

        var documentHeight =  $(document).height();
        //실제 페이지의 높이 = $(document).height();
        $(".box").css('height',documentHeight);
        $("#gnb").css('height',documentHeight);
        //반투명박스와 네비의 높이를 실제 페이지의 높이로 바꾸어라   

        $("#gnb").animate({right:0,opacity:1}, 'slow');
        $(".box").show();
    });

    $(".box,.mclose").click(function() { //닫기버튼 클릭시
        $("#gnb").animate({right:'-100%',opacity:0}, 'fast');
        $(".box").hide();
    });

    //2depth 메뉴 교대로 열기 처리 

    var onoff=[false,false,false,false];
    var arrcount=onoff.length;
    $('#gnb .depth1 h3>a').click(function(){
        var ind=$(this).parents('.depth1').index();
        if(onoff[ind]==false){
            //$('#gnb .depth1 ul').hide();
            $(this).parents('.depth1').siblings('li').find('h3').find('a').css('background','#202020').css('color','#fff');
            $(this).parent('h3').next('ul').slideDown('slow');
            $(this).parents('.depth1').siblings('li').find('ul').slideUp('fast');
            for(var i=0; i<arrcount; i++) onoff[i]=false; 
            $(this).css('background','#fbd204').css('color','#000');
            onoff[ind]=true;   
        }else{
            $(this).parent('h3').next('ul').slideUp('fast');
            $(this).css('background','#202020').css('color','#fff');
            onoff[ind]=false;  
        }
    });    

});