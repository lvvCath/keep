var timeoutHandle;
function countdown(minutes,stat){
    var seconds = 30;
    var mins = minutes;

    if(getCookie("minutes")&&getCookie("seconds")&&stat){
        var seconds = getCookie("seconds");
        var mins = getCookie("minutes");
    }

    function tick() {
        var counter = document.getElementById("timer");
        setCookie("minutes",mins);
        setCookie("seconds",seconds);
        var current_minutes = mins;
        seconds--;
        counter.innerHTML = current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
        // console.log(seconds);
        //save the time in cookie
        if(seconds > 0){
            timeoutHandle=setTimeout(tick, 1000);
        }
        else{
            // if(mins > 1){  
            // setTimeout(function () { countdown(parseInt(mins)-1,false); }, 1000);
            // }
            delcookie("minutes");
            delcookie("seconds");
            location.replace("LogIn.php");
            return;
        }
    }
    tick();
 }

function setCookie(cname,cvalue) {
    // var d = new Date();
    // cookie expiration: days*hours*minutes*seconds*millisec
    // d.setTime(d.getTime() + (30*1000)).interval=0;
    // var expires = "expires=" + d.toGMTString();
    // document.cookie = cname+"="+cvalue+"; "+expires;
    document.cookie = cname+"="+cvalue+"; Path=/;";
    console.log(document.cookie);
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function delcookie(name){
    document.cookie = name+"=; Path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT;";
    console.log(document.cookie);
}

// for internal script
// window.onload = function startingTimer(){
//     if(lock==true){
//         countdown(0, true);
//     }
// }

window.addEventListener("load", function startingTimer() { 
    if(lock==true){
        countdown(0, true);
    }
});