$(document).ready(function(){
    $("jquerybutton").click(function(){
        $("p").css("background-color",document.getElementById('colorname'));
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