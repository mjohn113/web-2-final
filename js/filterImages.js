$(document).ready(function(){
    $("#filter").click(function(){
        $(".images").hide();

        if ($("#countries option:selected").val() == "all" && $("#continents option:selected").val() == "all") {
            $(".images").show();
        }
        else if ($("#countries option:selected").val() == "all") {
            $("[continent='"+ $("#continents option:selected").text() +"']").show();
        }
        else if ($("#continents option:selected").val() == "all") {
            $("[country='"+ $("#countries option:selected").text() +"']").show();
        }
        else {
            $("[country='"+ $("#countries option:selected").text() +"'][continent='"+ $("#continents option:selected").text() +"']").show();
        }
    });
});