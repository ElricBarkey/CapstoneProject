
$("#hidden").hide();
//show and hide spouse information
$(document).ready(function(){
    $("#marriedYes").click(function (){
        if ($("#marriedYes").prop("checked")){
            $("#hidden").show();
        } else{
            $("#hidden").hide();
        }
    });
});


$(document).ready(function(){
    $("#marriedNo").click(function (){
        if ($("#marriedNo").prop("checked")) {
            $("#hidden").hide();
        }
    });
});
/*
$(document).ready(function(){
    $("#doesNotApp").click(function (){
        if ($("#doesNotApp").prop("checked")) {
            $("#hidden").hide();
        }
    });
});

 */