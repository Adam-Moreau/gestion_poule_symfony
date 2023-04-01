$(document).ready(function(){
    $(".actvForm").prop("disabled", true);
    $(".actvForm > select").prop("disabled", true);
    $(".btnActvForm").click(function(){
        if($(".actvForm").prop("disabled") == true){
            $(".actvForm").prop("disabled", false);
            $(".actvForm > select").prop("disabled", false);
        }
        else if($(".actvForm").prop("disabled") == false){
            $(".actvForm").prop("disabled", true);
            $(".actvForm > select").prop("disabled", true);
        }
    });
});
