
$(document).ready(function(){
    $("#jquerybutton").click(function(){
        $("#div2").css("background-color",document.getElementById("colorname").value);
    });
    $("#fadetoggle").click(function(){
        $("#div3").fadeToggle("slow", "linear");

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