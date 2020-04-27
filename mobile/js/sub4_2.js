$(document).ready(function() {
    
    var onoff=[false,false,false,false,false];
    var arrcount=onoff.length;
    $('.faq .faq_depth1 p>a').click(function(){
        var ind=$(this).parents('.faq_depth1').index();
        if(onoff[ind]==false){
            $(this).parent('p').next('ul').slideDown('slow');
            $(this).parents('.faq_depth1').siblings('li').find('ul').slideUp('fast');
            for(var i=0; i<arrcount; i++) onoff[i]=false; 
            onoff[ind]=true;   
        }else{
            $(this).parent('p').next('ul').slideUp('fast');
            onoff[ind]=false;  
        }
    });    

});