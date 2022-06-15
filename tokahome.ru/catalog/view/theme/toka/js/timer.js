var seconds = 10*60+1, h,m,s,t;
function countDown() {
    if (seconds > 0) {
        seconds --;
        h = seconds/3600 ^ 0,
            m = (seconds-h*3600)/60 ^ 0,
            s = seconds-h*3600-m*60,
            time = (m<10?"0"+m:m)+":"+(s<10?"0"+s:s);
        $("#timer").text(time);
    }
    setTimeout(function() {
        countDown();
    }, 1000);
}