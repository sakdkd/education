 
 
 
 function   setTimesession(stime)
{
	
$.ajax({
        type: "POST",
		dataType:'json',
        url: baseurl+"/ajaxCallToPhp/sessiontime.php",
        data: { 
        	stime:stime,
		
			
        },
        success: function(result) {},
        error: function(result) {
            
        }
    });	
	
	
	
}
 
 
 
 var myEle = document.getElementById("timer");
// alert(myEle);






    if(myEle){
       

var newtimings=document.getElementById('timer').value;

val= newtimings + ":" + 00;


document.getElementById('timerss').innerHTML =val
 ;
startTimer();

function startTimer() {
	
	
  var presentTime = document.getElementById('timerss').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
   var stime=m + ":" + s;
  setTimesession(stime);
  
  if(s==59){m=m-1}
  //if(m<0){alert('timer completed')}
  
  document.getElementById('timerss').innerHTML =
    m + ":" + s;
	
	var timestring= m + ":" + s;
	document.getElementById('savedtime').value=timestring;
  setTimeout(startTimer, 1000);
 if((m==00) && (s==00))
 {
submitform();
 }
}

function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
}
	}