
$(document).ready(function(){
    $("#jquerybutton").click(function(){
        $("#div1").css("background-color",document.getElementById("colorname").value);
    });
    $("#fadetoggle").click(function(){
        $("#div3").fadeToggle();
        $("#div3").fadeToggle("slow");
        $("#div3").fadeToggle(3000);
    });
});


function week2teamalert (){
    alert('Clicked!');
}

function changedivcolor(newcolor){
    var div1 = document.getElementById('div1');
    div1.backgroundColor
    div1.style.backgroundColor = newcolor;
}