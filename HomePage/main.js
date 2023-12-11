

var slide = document.getElementById("slide");
    var left = document.getElementById("left");
    var right = document.getElementById("right");
    var icon = document.getElementById("icon");
    let x = 0;
    left.onclick = function(){
        if(x > "-1500"){
            x = x - 500;
        slide.style.top = x + "px";
        }
       
    }
    right.onclick = function(){
        if(x < 0){
            x = x + 500;
        slide.style.top = x + "px";
        }
       
    }

    icon.onclick = ()=>{
        document.body.classList.toggle("dark-theme");

    }
   

    