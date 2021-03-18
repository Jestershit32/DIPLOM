$( document ).ready(function(){
    
    $( "#form-login" ).focus(function(){
        $(".login").animate({'font-size': "16px"}, 500);
	});
    
    $( "#form-login" ).focusout(function(){
        var $Login = $( "#form-login" );
        var LoginVal = $Login.val();
        if(LoginVal.length <= 1){
            $(".login").animate({'font-size': "32px"}, 500);
        };
	});
    


    
    $( "#form-password" ).focus(function(){
       $(".password").animate({'font-size': "16px"}, 500);
	});
    $( "#form-password" ).focusout(function(){
        var $Pass = $( "#form-password" );
        var PassVal = $Pass.val();
        if(PassVal.length <= 1){
        $(".password").animate({'font-size': "32px"}, 500);
    };
     });
    //  $.ajax({
    //     type: "POST",
    //     url: "some.php",
    //     data: "name=John&location=Boston",
    //     success: function(msg){
    //       alert( "Прибыли данные: " + msg );
    //     }
    //   });
    });
