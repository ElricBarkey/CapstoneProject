/*
$(document).ready(function(){
    $("#boxchecked").click(function (){
        if ($("#boxchecked").prop("checked")){
            $("#hidden").show();
        }else{
            $("#hidden").hide();
        }
    });
});
*/

$("#hidden").hide();

$(document).ready(function(){
    $("#spouseYes").click(function (){
        if ($("#spouseYes").prop("checked")){
            $("#hidden").show();
        } else{
            $("#hidden").hide();
        }
    });
});



$(document).ready(function(){
    $("#spouseNo").click(function (){
        if ($("#spouseNo").prop("checked")) {
            $("#hidden").hide();
        }
    });
});

$(document).ready(function(){
    $("#doesNotApp").click(function (){
        if ($("#doesNotApp").prop("checked")) {
            $("#hidden").hide();
        }
    });
});