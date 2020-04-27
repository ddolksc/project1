$(document).ready(function(){

	var ht = $(window).height();	
    
    $("section").height(ht);
	
    $(window).on("resize",function(){
		var ht = $(window).height();	
		$("section").height(ht);
	});	
	
	
	//메뉴 버튼 클릭시
	$("#menu li").on("click",function(e){
		e.preventDefault();
		
		//변수 ht에 브라우저의 높이값 저장
		var ht = $(window).height();
		
		//변수 i에 현재 클릭한 li의 순서값을 저장
		var i = $(this).index();
		
		//브라우저의 높이값*박스의 순서값은 현재 박스의 스크롤 위치값과 동일
		var nowTop = i*ht;			
	
		//해당 스크롤 위치값으로 문서를 이동
		$("html,body").stop().animate({"scrollTop":nowTop},1000,"swing");
	});
	
	
	$(window).on("scroll",function(){	
	   
		var ht = $(window).height();
		
		var scroll = $(window).scrollTop();
		
		for(var i=0; i<8;i++){
			if(scroll>=ht*i && scroll< ht*(i+1)){
				$("#menu li").removeClass();
				$("#menu li").eq(i).addClass("on");
			};
		}
		
		$("section").on("mousewheel",function(event,delta){    
		    if (delta > 0) {  
                var prev = $(this).prev().offset().top;
                $("html,body").stop().animate({"scrollTop":prev},1000,"swing");
                return false;
		    }else if (delta < 0) {  
                var next = $(this).next().offset().top;
                $("html,body").stop().animate({"scrollTop":next},1000,"swing");
                return false;
            }
          
        });
		
	});
	
});















