<?php
function sendsms($message,$contact)
{
	
	
	$url="https://control.msg91.com/sendhttp.php";
		
 $url; 
  function postdata($url,$data)
    {
    
        $objURL = curl_init($url);
        curl_setopt($objURL, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($objURL,CURLOPT_POST,1);
        curl_setopt($objURL, CURLOPT_POSTFIELDS,$data); 
        $retval = trim(curl_exec($objURL));
        curl_close($objURL);
         $retval;
    }  
$usermobile=$contact;
 $message1=rawurlencode($message); 
$data1="authkey=112289A2jv7702ntW5742d5fd&mobiles=". $usermobile ."&message=" . $message1 . "&sender=ANISMS&route=4";
postdata($url,$data1);
	
	
}




function postdata($mobile,$message)
    {
		
		//https://control.msg91.com/sendhttp.php?authkey=185095Auj0iyidV8d5a16b1ad&mobiles=9350042826&message=msgfromani&sender=ANIOTP&route=4
		
		$url="https://control.msg91.com/sendhttp.php";
$data="authkey=185095Auj0iyidV8d5a16b1ad&mobiles=". $mobile ."&message=" . $message . "&sender=ANIOTP&route=4";
    
        $objURL = curl_init($url);
        curl_setopt($objURL, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($objURL,CURLOPT_POST,1);
        curl_setopt($objURL, CURLOPT_POSTFIELDS,$data); 
        $retval = trim(curl_exec($objURL));
        curl_close($objURL);
         $retval;
    } 



 ?>