 <?php
include_once('dbconfig.php');
include_once('ordermail.php');

include_once('sendgrid-php/vendor/autoload.php'); // If you're using Composer (recommended)
 
  function getservice_form_details_from_id($conn,$code,$type){
	 
	$ds=mysqli_query($conn,"SELECT * FROM `services` where `id`='$code' and `requesttype`='$type'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
 
} 

function getCountryIdBylocationId($conn,$did){
	$ds=mysqli_query($conn,"SELECT `countryid` FROM `location` where `id`='$did'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['countryid'];
}


function getlocationNameById($conn,$did){
	$ds=mysqli_query($conn,"SELECT `name` FROM `location` where `id`='$did'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['name'];
}

function getcountrydetails($conn,$did){
	$ds=mysqli_query($conn,"SELECT * FROM `country` where `id`='$did'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}

function getlocationdetails($conn,$did){
	$ds=mysqli_query($conn,"SELECT * FROM `location` where `id`='$did'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}
function getcountryNameById($conn,$did){
	$ds=mysqli_query($conn,"SELECT `name` FROM `country` where `id`='$did'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['name'];
}



function gettestidetails($conn,$code){
	 
	$ds=mysqli_query($conn,"SELECT * FROM `testimonial` where `id`='$code'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
 
}

function getbannerdetails($conn,$code){
	$ds=mysqli_query($conn,"SELECT * FROM `banner` where `id`='$code'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}








 
/* function getAllowedSeminarsById($conn,$impids){
	//echo "SELECT * FROM `roasterdetails` where `roaster_id`='$id'";
	$ds=mysqli_query($conn,"SELECT * FROM `roasterdetails` where `id` in ($impids) and `view`='1'"); 
	$numrows=mysqli_num_rows($ds);
	if($numrows >0){
		while($fetch=mysqli_fetch_array($ds)){
		
			 $data[]=getSlotNameById($conn,$fetch['slot_id'])." - ".getModuleNameById($conn,$fetch['module_id']);
		}
	}
	$improaster=implode(",",$data);
	return $improaster;
	
 }*/
 
 
 
function getShortMonth($conn,$val){


$monthArr=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");



return $monthArr[$val];



}
function changeToStdDate($conn,$date){



$expDate=explode("-",$date);



$monthText=getShortMonth($conn,$expDate[1]-1);



$newDate=$expDate[2]." ".$monthText.", ".$expDate[0];



return $newDate;



}
function changeDateFormatmonthyear($conn,$date){
$expDob=explode("-",$date);
$expMonth=$expDob[1];	
$expDate=$expDob[2];
$expYear=$expDob[0];
$makedate=$expMonth."/".$expDate."/".$expYear;
return 	$makedate;  
}
 
function changeDateToSlash($conn,$date){
	$expDate=explode("-",$date);
	$newDate=$expDate[2]."/".$expDate[1]."/".$expDate[0];	
	return $newDate;
}
function changeDateToYMD($date){
	$expDate=explode("-",$date);
	$newDate=$expDate[2]."-".$expDate[1]."-".$expDate[0];	
	return $newDate;
}

function changeDateToYMDfromSlash($date){
	$expDate=explode("/",$date);
	$newDate=$expDate[2]."-".$expDate[1]."-".$expDate[0];	
	return $newDate;
}
function getMonthFull($val){
	if($val<=9){
	$val=substr($val,1,1);	
	}
$monthArr=array("","January","Febuary","March","April","May","June","July","August","September","October","November","December");
return	$monthArr[$val];
	
}

function checkRoasterExistsForDate($conn,$days,$month,$year){}

function getRoasterIdByDateMonthYear($conn,$days,$month,$year){}

function getBookingId($id){
	$text="BKSM";
	$fid=1000+$id;
	$final=$text."".$fid;
	return $final; 
}










function sendElasticEmail($to,$from,$subject,$message){
	
	
	$url = 'https://api.elasticemail.com/v2/email/send';

try{
      $post = array('from' => $from,
                    'fromName' => 'Bosh',
                    'apikey' => 'ec9e9ab5-d3ba-4876-b148-b1f56b1e6821',
                    'subject' => $subject,
                    'bodyHtml' => $message,
                    //'bodyText' => $message,
                    'isTransactional' => true,
					'to'=>$to,
                   );
      
      $ch = curl_init();
          
      curl_setopt_array($ch, array(
          CURLOPT_URL => $url,
          CURLOPT_POST => true,
          CURLOPT_POSTFIELDS => $post,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_HEADER => false,
          CURLOPT_SSL_VERIFYPEER => false
      ));
      
      $result=curl_exec ($ch);
      curl_close ($ch);
      
    //  echo $result;    
}
catch(Exception $ex){
  echo $ex->getMessage();
}
	
	
	

	/*$headers = 'MIME-Version: 1.0 \r\n'.
		'Content-type: text/html \r\n'.
		'X-Mailer: PHP/' . phpversion();
		$mail = new PHPMailer();
		$mail->IsSMTP();                                      // Set mailer to use SMTP
		
		$mail->IsHTML(true);
		$mail->From = $from;
		$mail->FromName =$fromname;
		
		$mail->SMTPAuth = true;
		$mail->Host = $smtphost;  // specify main and backup server
		$mail->Username = $smtpusername;  // SMTP username
		$mail->Password = $smtppassword; // SMTP password
		$mail->Port = 587;
		$mail->AddAddress($to);
		$mail->addCC('cc@example.com');

		$mail->Subject = $subject;
		$mail->Body    = $msg;
		$mail=$mail->Send();
		if($mail){
		return true;
		}else{
		return false;
		}*/
}


function changeDateTomkTime($date){
    $expDob=explode("-",$date);
	$expMonth=$expDob[1];	
	$expDate=$expDob[2];
	$expYear=$expDob[0];
	$makedate=@mktime(0,0,0,$expMonth,$expDate,$expYear);
	return 	$makedate;
	
}

function getTimestamp($date,$time){
    $expDob=explode("-",$date);
	
	$expTime=explode(":",$time);
	
	$expMonth=$expDob[1];	
	$expDate=$expDob[2];
	$expYear=$expDob[0];
	
	
	$makedate=@mktime($expTime[0],$expTime[1],0,$expMonth,$expDate,$expYear);
	return 	$makedate;
	
}


function getStatus($value){
	if($value==1){
		return '<span class="label label-success">Approved</span>';
	}
	if($value==0){
		return '<span class="label label-danger">Blocked</span>';
	}
}
function getReleaseStatus($value){
	if($value==1){
		return '<span class="label label-success">Stop</span>';
	}
	if($value==0){
		return '<span class="label label-danger">Release</span>';
	}
}



function cleanname($string){
	$str=preg_replace('/[^0-9a-zA-Z\.]/',"-",$string);
	$str=str_replace("--","-",$str);
	return $str;
}







function timediff($time1,$time2){
	$start = strtotime($time1);
	$end   = strtotime($time2);
	$diff  = $end - $start;
    $hours = $diff / (60 * 60);
	return floor( $hours * 60 );	
}

function getLockStatusByInvId($conn,$fid){
	$endTime=date('Y-m-d h:i a' );
	//echo "SELECT `pdate` ,`ptime` FROM `reference` where `fid`='$fid' order by `id` desc";
	$ds=mysqli_query($conn,"SELECT `posteddate` ,`ptime` ,`aid` FROM `reference` where `fid`='$fid' order by `id` desc"); 
	$count=mysqli_num_rows($ds);
	if($count>0){
	$ds1=mysqli_fetch_assoc($ds);
	    $startTime= $ds1['posteddate']." ".$ds1['ptime'];
	    $diff=timediff($startTime,$endTime);
	  //die;
	   if($diff<=45){
		    return $ds1['aid']; 	
	   }else{
		  return '0'; 	 
	   }
	   
	}else{
	 return '0'; 	
	}
	
 }





function  date_range($first, $last, $step = '+1 day', $output_format = 'Y-m-d' ) {

    $dates = array();
    $current = strtotime($first);
    $last = strtotime($last);

    while( $current <= $last ) {

        $dates[] = date($output_format, $current);
        $current = strtotime($step, $current);
    }

    return $dates;
}


function addDaysToDate($Date,$day) {
	return  date('Y-m-d', strtotime($Date. " + ".$day." day"));
}

function subtractDaysToDate($Date,$day) {
	
return  date('Y-m-d', strtotime($Date. " - ".$day." day"));
}


function html2text($html)
{
    $tags = array (
    0 => '~<h[123][^>]+>~si',
    1 => '~<h[456][^>]+>~si',
    2 => '~<table[^>]+>~si',
    3 => '~<tr[^>]+>~si',
    4 => '~<li[^>]+>~si',
    5 => '~<br[^>]+>~si',
    6 => '~<p[^>]+>~si',
    7 => '~<div[^>]+>~si',
    );
    $html = preg_replace($tags,"\n",$html);
    $html = preg_replace('~</t(d|h)>\s*<t(d|h)[^>]+>~si',' - ',$html);
    $html = preg_replace('~<[^>]+>~s','',$html);
    // reducing spaces
    $html = preg_replace('~ +~s',' ',$html);
    $html = preg_replace('~^\s+~m','',$html);
    $html = preg_replace('~\s+$~m','',$html);
    // reducing newlines
    $html = preg_replace('~\n+~s',"\n",$html);
    return $html;
}









function mychildsCodes($conn,$aid){
	$childs=array();
	 $ds2=mysqli_query($conn,"SELECT `self` FROM `parents`  where `parent`='$aid' "); 

	while($fetch=mysqli_fetch_array($ds2)){
			$self=$fetch['self'];
			$aid=getAssociateIdByTreeId($conn,$self);
			 $code=associatecodefromid($conn,$aid);
			
				$childs[]=$code;
		}
		return $childs;
}

function checkmychildsCodeswithdesg($conn,$aid){
	$childs=array();
	$scode=associatecodefromid($conn,$aid);
	 $ds2=mysqli_query($conn,"SELECT `self` FROM `parents`  where `parent`='$aid' "); 

	while($fetch=mysqli_fetch_array($ds2)){
			$self=$fetch['self'];
			$caid=getAssociateIdByTreeId($conn,$self);
			//$code=associatecodefromid($conn,$aid);
			$gm=getconcernedheadGmandAbove($conn,$self);
			if($gm==$scode){
				$childs[]=$caid;
				
			}
		}
		return $childs;
}


function mychildsAssocIds($conn,$aid){
	$childs=array();
	 $ds2=mysqli_query($conn,"SELECT `self` FROM `parents`  where `parent`='$aid' "); 

	while($fetch=mysqli_fetch_array($ds2)){
			$self=$fetch['self'];
			$aid=getAssociateIdByTreeId($conn,$self);
			
			
				$childs[]=$aid;
		}
		return $childs;
}



function mychildsAssocIdsNew($conn,$aid){
	$childs=array();
	 $ds2=mysqli_query($conn,"SELECT p.`self` ,md.associate_detail_id  FROM `parents` p inner join `mlm_tree` mt on mt.id=p.self inner join mlm_associate_detail md on md.associate_detail_id=mt.associate_detail_id where p.`parent`='$aid' and md.blocked='1'  "); 

	while($fetch=mysqli_fetch_array($ds2)){
			$aids=$fetch['associate_detail_id'];
			
			
				$childs[]=$aids;
		}
		return $childs;
}





function mychildsMobileNos($conn,$aid){
	$childs=array();
	 $ds2=mysqli_query($conn,"SELECT `self` FROM `parents`  where `parent`='$aid' "); 

	while($fetch=mysqli_fetch_array($ds2)){
			$self=$fetch['self'];
			

			$mobileinput=associateMobilefromid($conn,getAssociateIdByTreeId($conn,$self));
			$rmobile=preg_replace("/[^0-9]+/", "", $mobileinput);
			$mobile="91".$rmobile."";
				$childs[]=$mobile;
		}
		return $childs;
}
function mychildsCodeswithdesg($conn,$aid,$desg){
		$childs=array();
	 $ds2=mysqli_query($conn,"SELECT `self` FROM `parents`  where `parent`='$aid' "); 

	while($fetch=mysqli_fetch_array($ds2)){
			$desgold=getDesignationByTreeId($conn,$fetch['self']);
			if($desg==$desgold){
				$childs[]=$fetch['self'];
				
			}
		}
		return $childs;
}



function mychildCount($conn,$aid){
	$childs=array();
	$myid=getTreeIdByAssociateId($conn,$aid);
	 $ds2=mysqli_query($conn,"SELECT `self` FROM `parents`  where `parent`='$myid' "); 

	while($fetch=mysqli_fetch_array($ds2)){
			
				$childs[]=$fetch['self'];
			
			
		}
		
		return count($childs);
}
function getReportByAssId($conn,$id,$sjoin){ 
  //  $code=associatecodefromid($conn,$id);
    $treeID=getTreeIdByAssociateId($conn,$id);
    $mytree=mychildsCodesNew($conn,$treeID);
	
	//print_r($mytree);
	if(count($mytree)>0){
		$totalAssoc=count($mytree)-$sjoin;
	foreach($mytree as $code){
	/*	$childid=getAssociateIdByTreeId($conn,$childid);
		
		$code=associatecodefromid($conn,$childid);*/
		//echo "<pre>";
	//	echo  "SELECT count(*) as count FROM `crm_sales_details_new` where `associatecode`='$code' ";
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `crm_sales_details_new` where `associatecode`='$code' and `salesstatus`='1'  "); 
	    $ds1=mysqli_fetch_assoc($ds);
		$counts[]=$ds1['count'];
		
		$dss=mysqli_query($conn,"SELECT count(*) as count FROM `sitevisits` where `referredcode`='$code' and `status`='1' and `cancelledstatus` ='0'  "); 
	    $dss1=mysqli_fetch_assoc($dss);
		$visits[]=$dss1['count'];
		
	}
		$total=array_sum($counts);
		$totalVisits=array_sum($visits);
	}else{
		 $total=0;	
		 $totalVisits=0;
		 $totalAssoc=0;
	}
	
	return $total."###".$totalVisits."###".$totalAssoc;
	
 
}


function getConsolidatedReportByAssId($conn,$id,$sjoin,$year){ 
  //  $code=associatecodefromid($conn,$id);
    $treeID=getTreeIdByAssociateId($conn,$id);
    $mytree=mychildsCodes($conn,$treeID);
	
	
	for($month=1;$month<=12;$month++){ 
	   if($month<=9){$month="0".$month;}
	   
	 //  $sdate="01/".$month."/".$year;
	   $sdate=$year."-".$month."-01";
	   $edate=date("Y-m-t",strtotime($sdate));
	   $assocArr[]=getAssociateDetailsBetweenDates($conn,$sdate,$edate,$id,$mytree);
		}
	
}
function getAssociateDetailsBetweenDates($conn,$sdate,$edate,$id,$mytreecodes){ 
     $mycode=associatecodefromid($conn,$id);
	 $ds2=mysqli_query($conn,"SELECT `reffered_code` FROM `mlm_associate_detail`  where `date_of_joining` BETWEEN '$sdate' and '$edate' "); 

		while($fetch=mysqli_fetch_array($ds2)){
				$refcode=$fetch['reffered_code'];
				if($mycode==$refcode){
					$myassoc=$myassoc+1;
				}
				if(in_array($refcode,$mytreecodes)){
					$mychildassoc=$mychildassoc+1;
				}
		}
		
		$ds2=mysqli_query($conn,"SELECT `refferedcode` FROM `sitevisits`  where `pickupdate` BETWEEN '$sdate' and '$edate' and `status`='1' and `cancelledstatus`='0' "); 

		while($fetch=mysqli_fetch_array($ds2)){
				$refcode=$fetch['refferedcode'];
				if($mycode==$refcode){
					$myvisit=$myvisit+1;
				}
				if(in_array($refcode,$mytreecodes)){
					$mychildvisit=$mychildvisit+1;
				}
		}
		
		
		$ds2=mysqli_query($conn,"SELECT * FROM `crm_sales_details_new` WHERE `date-of-sale` BETWEEN '$sdate' AND '$edate' and `salesstatus`='1' ORDER BY `date-of-sale` DESC  "); 

	while($fetch=mysqli_fetch_array($ds2)){
			    $asscode=$fetch['associatecode'];
				
				if($asscode==$mycode){
					$direct=$direct+1;	
					
				}else{
				
					if(in_array($asscode,$mytreecodes)){
						$indirect=$indirect+1;
					}
					
				}
				
				
			
		}
		
	$text=$myassoc."-".$mychildassoc."###".$myvisit."-".$mychildvisit."###".$direct."-".$indirect;
	return 	$text;
		
		
}

function getApplicableTeamHead($conn,$aid){
$code=associatecodefromid($conn,$aid);
if(checkisTeamHead($conn,$code)){
	$tcode=$code;
}else{
	$tcode=team_headcode_fromassociatecode($conn,$aid);
	
}
	
	return $tcode;
	
}

function getApplicableTeamHeadNew($conn,$aid){
$code=associatecodefromid($conn,$aid);
if(checkisTeamHead($conn,$code)){
	$tcode=$code;
}else{
	$tcode=getNewTeamHeadCode($conn,$aid);
	
}
	
	return $tcode;
	
}

function getAssCodeFromSaleDetails($conn,$sid){
	
	 $holded=array();
	// echo "SELECT * FROM `crm_inv_customer_detail` where  `team_head_code`='$assocode'";
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT `associatecode` FROM `crm_sales_details_new` where  `sales_details_id`='$sid'   ")); 

	
	return 	$ds2['associatecode'];
}




function getSaleDetailsbySalesId($conn,$sid){
	
	 $holded=array();
	// echo "SELECT * FROM `crm_inv_customer_detail` where  `team_head_code`='$assocode'";
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `crm_sales_details_new` where  `sales_details_id`='$sid'   ")); 

	
	return 	$ds2;
}



function getTowerNameById($conn,$id){
	
	 $holded=array();
	// echo "SELECT * FROM `crm_inv_customer_detail` where  `team_head_code`='$assocode'";
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT `tower_name` FROM `crm_inv_project_tower` where  `tower_id`='$id'   ")); 

	
	return 	$ds2['tower_name'];
}

function getTotalPlc($conn,$id){
	
	 $holded=array();
	// echo "SELECT * FROM `crm_inv_customer_detail` where  `team_head_code`='$assocode'";
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT sum(plc_rate) as sum FROM `crm_inv_project_plc` where  `floor_id`='$id'   ")); 

	
	return 	$ds2['sum'];
}

function getPlanNameByPlanId($conn,$id){
	
	 $holded=array();
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT payment_plan_master_name FROM `crm_inv_payment_plan_master` where  `payment_plan_master_id`='$id'   ")); 
	 return 	$ds2['payment_plan_master_name'];
}

function check45mindelay($ptime,$ctime){
	
	$diff=($ptime-$ctime)/60;
	if($diff<0){
		return false;	
	}else{
	if($diff>45){
		return true;	
	}else{
		return false;
	}
		
	}
	
	
	
}

function getDataFromTable($conn,$id,$table){
	$ds=mysqli_query($conn,"SELECT `name` FROM `$table` where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	
	return $ds1['name'];
 
} 

function getLeadDetailById($conn,$id){
	$ds=mysqli_query($conn,"SELECT * FROM `leads` where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
 
} 
function getLeadNameANdMobileById($conn,$id){
	$ds=mysqli_query($conn,"SELECT `name`,`contact_no`  as mobile ,`postedby` as aid FROM `leads` where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
 
} 

function getLeadAssociateById($conn,$id){
	$ds=mysqli_query($conn,"SELECT `postedby` FROM `leads` where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['postedby'];
 
}

function getLeadNameById($conn,$id){
	$ds=mysqli_query($conn,"SELECT `title`,`name` FROM `leads` where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return  getDataFromTable($conn,$ds1['title'],"title")." ".$ds1['name'];
 
} 
function getFollowCount($conn,$type,$associd){
   $curDate=date("Y-m-d");
   if($type==1){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `leads` where   `postedby`='$associd' and `leadtype`='1' and `followdate`='$curDate' and  `followdate`!='' "); 
	}
	if($type==2){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `leads` where   `postedby`='$associd' and `leadtype`='1' and  `followdate`!=''  "); 
	}
	if($type==3){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `leads` where   `postedby`='$associd' and `leadtype`='1' and `followdate`<'$curDate' and  `followdate`!='' "); 
	}
	
	if($type==4){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `leads` where   `postedby`='$associd' and `leadtype`='1' and `followdate`>='$curDate' and  `followdate`!=''  "); 
	}
	
	
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['count'];
 
}

function getFollowCountbetweendates($conn,$associd,$sdate,$edate){
   $curDate=date("Y-m-d");
   $ds=mysqli_query($conn,"SELECT count(*) as count FROM `leads` where   `postedby`='$associd' and `leadtype`='1' and `followdate` Between '$sdate' and '$edate'  "); 	
   $ds1=mysqli_fetch_assoc($ds);
   return $ds1['count'];
 
}

 

function getMeetingCount($conn,$type,$associd){
   $curDate=date("Y-m-d");
   if($type==1){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `leads` where   `postedby`='$associd' and `leadtype`='4' and `meetingdate`='$curDate'"); 
	}
	if($type==2){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `leads` where   `postedby`='$associd' and `leadtype`='4' "); 
	}
	if($type==3){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `leads` where   `postedby`='$associd' and `leadtype`='4' and `meetingdate`<'$curDate'"); 
	}
	
	if($type==4){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `leads` where   `postedby`='$associd' and `leadtype`='4' and `meetingdate`>='$curDate'"); 
	}
	
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['count'];
 
} 


function getMeetingCountbetweendates($conn,$associd,$sdate,$edate){
   $curDate=date("Y-m-d");
   $ds=mysqli_query($conn,"SELECT count(*) as count FROM `leads` where   `postedby`='$associd' and `leadtype`='4' and `meetingdate` Between '$sdate' and '$edate' "); 
   $ds1=mysqli_fetch_assoc($ds);
   return $ds1['count'];
 
} 



function getSiteVisitCount($conn,$type,$associd){
   $curDate=date("Y-m-d");
   if($type==1){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `leads` where   `postedby`='$associd' and `leadtype`='5' and `expsitevisitdate`='$curDate'"); 
	}
	if($type==2){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `leads` where   `postedby`='$associd' and `leadtype`='5' "); 
	}
	if($type==3){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `leads` where   `postedby`='$associd' and `leadtype`='5' and `expsitevisitdate`<'$curDate'"); 
	}
	
	
	if($type==4){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `leads` where   `postedby`='$associd' and `leadtype`='5' and `expsitevisitdate`>='$curDate'"); 
	}
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['count'];
 
} 

function getSiteVisitCountbetweendates($conn,$associd,$sdate,$edate){
   $curDate=date("Y-m-d");
  
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `leads` where   `postedby`='$associd' and `leadtype`='5' and `expsitevisitdate` Between '$sdate' and '$edate' "); 
	
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['count'];
 
} 



function getCabVendorNameById($conn,$id){
	$ds=mysqli_query($conn,"SELECT * FROM `cabvendors` where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['name'];
 
} 
function getCabTypeNameById($conn,$id){
	$ds=mysqli_query($conn,"SELECT * FROM `cabtype` where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['name'];
 
} 
function getSeminarDateByRoasterId($conn,$rid){
	//echo "SELECT count(*) FROM `seminarbookings` where `roaster_detail_id` ='$rid' and `status`='1'";
	//echo "SELECT * FROM `roaster` where `id` ='$rid' ";
$ds=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `roasters` where `id` ='$rid' "));
	
	 return $ds['rdate']."-".$ds['rmonth']."-".$ds['ryear'];	
}

function getSeminarDateByRoasterIdforattendence($conn,$rid){
	//echo "SELECT count(*) FROM `seminarbookings` where `roaster_detail_id` ='$rid' and `status`='1'";
	//echo "SELECT * FROM `roaster` where `id` ='$rid' ";
$ds=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `roasters` where `id` ='$rid' "));
	if($ds['rdate']<=9){
		$ds['rdate']="0".$ds['rdate'];
	}
	 return $ds['ryear']."-".$ds['rmonth']."-".$ds['rdate'];	
}
function getNoOfBookingByMonthByAssCode($conn,$ass,$sdate,$edate){
	$attendedinMonth=getAttendedBidsBetweenDates($conn,$sdate,$edate);
	$bookingsbyass=getBookingsMadeByAss($conn,$ass);
	$diff=array_intersect($bookingsbyass,$attendedinMonth);
	return $diff;	
}
function getBookingsMadeByAss($conn,$ass){
	$childs=array();
	$aid=associateidfromcode($conn,$ass);
	 $ds2=mysqli_query($conn,"SELECT `id` FROM `seminarbookings`  where `assoc_id`='$aid' "); 

	while($fetch=mysqli_fetch_array($ds2)){
			
			
				$childs[]=$fetch['id'];
		}
		return $childs;
}


function getAttendedBidsBetweenDates($conn,$sdate,$edate){
	$childs=array();
	$aid=associateidfromcode($conn,$ass);
	 $ds2=mysqli_query($conn,"SELECT `bookingid` FROM `seminarattendence`  where `pdate`Between '$sdate' and '$edate' "); 

	while($fetch=mysqli_fetch_array($ds2)){
			
			
				$childs[]=$fetch['bookingid'];
		}
	return $childs;	
}
function getSiteVisistDetailsById($conn,$id){
	$ds=mysqli_query($conn,"SELECT * FROM `sitevisits` where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}
function getSiteVisistNameMobileById($conn,$id){
	$ds=mysqli_query($conn,"SELECT `customersname` ,`contactno` FROM `sitevisits` where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}


function getNoOfVisitsByMonthByAssCode($conn,$ass,$sdate,$edate){
	$childs=array();
	$aid=associateidfromcode($conn,$ass);
	 $ds2=mysqli_query($conn,"SELECT `id` FROM `sitevisits`  where `pickupdate` BETWEEN '$sdate' and '$edate' and `status`='1' and `cancelledstatus`='0' and `referredcode`='$ass'"); 

	while($fetch=mysqli_fetch_array($ds2)){
			
			
				$childs[]=$fetch['id'];
		}
	return $childs;	
}
function getNoOfJoinedsByMonthByAssCode($conn,$ass,$sdate,$edate){
	$childs=array();
	$aid=associateidfromcode($conn,$ass);
	 $ds2=mysqli_query($conn,"SELECT `associate_detail_id` FROM `mlm_associate_detail`  where `date_of_joining` BETWEEN '$sdate' and '$edate' and `blocked`='1' and `reffered_code`='$ass' "); 

	while($fetch=mysqli_fetch_array($ds2)){
			
			
				$childs[]=$fetch['associate_detail_id'];
		}
	return $childs;	
}
function getDesignationByTreeId($conn,$id){
	$ds=mysqli_query($conn,"SELECT `desigination_id` FROM `mlm_tree` where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['desigination_id'];
	
}
function getMyImmediateChilds($conn,$treeid){
	$childs=array();
	//echo "SELECT `id` FROM `mlm_tree`  where `parent` ='$treeid'";
	 $ds2=mysqli_query($conn,"SELECT `id` FROM `mlm_tree`  where `parent` ='$treeid'"); 

	while($fetch=mysqli_fetch_array($ds2)){
			
			  $aid=getAssociateIdByTreeId($conn,$fetch['id']);
			  $empStatus=getAssociateBlockedStatus($conn,$aid);
			  if($empStatus==1){
				$childs[]=$fetch['id'];
				
			  }
				
		}
	return $childs;	
}


function getMyImmediateChildsWithBlocked($conn,$treeid){
	$childs=array();
	//echo "SELECT `id` FROM `mlm_tree`  where `parent` ='$treeid'";
	 $ds2=mysqli_query($conn,"SELECT `id` FROM `mlm_tree`  where `parent` ='$treeid'"); 

	while($fetch=mysqli_fetch_array($ds2)){
			
			  $aid=getAssociateIdByTreeId($conn,$fetch['id']);
			
				$childs[]=$fetch['id'];
				
			 
				
		}
	return $childs;	
}

function getFMSLDetails($conn,$mytreeid){
	$fc=array();
	$mc=array();
	$sv=array();
	$lf=array();
	$lm=array();
	if(count($mytreeid)>0){
		
		foreach($mytreeid as $tid){
			$aid=getAssociateIdByTreeId($conn,$tid);
			$fc[]=getFollowCount($conn,4,$aid);
			$mc[]= getMeetingCount($conn,4,$aid);	
			$sv[]= getSiteVisitCount($conn,4,$aid);	
			$lf[]= getFollowCount($conn,3,$aid);
			$lm[]= getMeetingCount($conn,3,$aid);
			
						
		}
		$text=array_sum($fc)."##".array_sum($mc)."##".array_sum($sv)."##".array_sum($lf)."##".array_sum($lm);
		unset($fc);unset($mc);unset($sv);unset($lf);unset($lm);
		return $text;
		
	}else{
		return "0##0##0##0##0";	
	}
	
	
}
function getTreeCrumb($conn,$id,$tid){
$arr = array();  
$parent = 1;
while($parent != 0 || $parent != '')
{
	if($i == 0)
	{
		$id = $id;
		$arr[0] = $id;
		$i++;
	}
	else
	{ 
		$id = $parent;
		$i++;
	}
	//echo "<br/>";
  $aresult ="SELECT id, parent,desigination_id FROM `mlm_tree` where id=$id and `id` >='$tid'"   ;

	$result2=mysqli_query($conn,$aresult);
	$row=mysqli_fetch_array($result2);
	$parent = $row['parent'];
	if($parent!=''){
	 $arr[$i] = $row['parent'];
	 $desigination_id=$row['desigination_id'];
	}
	 //$arr[$i] = $row['desigination_id'];
	 //$desigination_name=$row['desigination_name'];
	 
	
	
}	
	return $arr;
}


function getFmsType($type){
	if($type==1)return "Follow Ups";
	if($type==2)return "Meetings";
	if($type==3)return "Site Visits";
	if($type==4)return "Lapsed Followups";
	if($type==5)return "Lapsed Meetings";	
}


function getListType($type){
	if($type==1)return "Follow Ups";
	if($type==4)return "Meetings";
	if($type==5)return "Site Visits";
		
}





function geteLeadDetailById($conn,$id){
	$ds=mysqli_query($conn,"SELECT * FROM `eleads` where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
 
} 
function geteFollowCount($conn,$type,$associd){
   $curDate=date("Y-m-d");
   if($type==1){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `eleads` where   `postedby`='$associd' and `leadtype`='1' and `followdate`='$curDate' and  `followdate`!='' "); 
	}
	if($type==2){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `eleads` where   `postedby`='$associd' and `leadtype`='1' and  `followdate`!=''  "); 
	}
	if($type==3){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `eleads` where   `postedby`='$associd' and `leadtype`='1' and `followdate`<'$curDate' and  `followdate`!='' "); 
	}
	
	if($type==4){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `eleads` where   `postedby`='$associd' and `leadtype`='1' and `followdate`>='$curDate' and  `followdate`!=''  "); 
	}
	
	
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['count'];
 
} 

function geteMeetingCount($conn,$type,$associd){
   $curDate=date("Y-m-d");
   if($type==1){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `eleads` where   `postedby`='$associd' and `leadtype`='4' and `meetingdate`='$curDate'"); 
	}
	if($type==2){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `eleads` where   `postedby`='$associd' and `leadtype`='4' "); 
	}
	if($type==3){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `eleads` where   `postedby`='$associd' and `leadtype`='4' and `meetingdate`<'$curDate'"); 
	}
	
	if($type==4){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `eleads` where   `postedby`='$associd' and `leadtype`='4' and `meetingdate`>='$curDate'"); 
	}
	
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['count'];
 
} 
function geteSiteVisitCount($conn,$type,$associd){
   $curDate=date("Y-m-d");
   if($type==1){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `eleads` where   `postedby`='$associd' and `leadtype`='5' and `expsitevisitdate`='$curDate'"); 
	}
	if($type==2){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `eleads` where   `postedby`='$associd' and `leadtype`='5' "); 
	}
	if($type==3){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `eleads` where   `postedby`='$associd' and `leadtype`='5' and `expsitevisitdate`<'$curDate'"); 
	}
	
	
	if($type==4){
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `eleads` where   `postedby`='$associd' and `leadtype`='5' and `expsitevisitdate`>='$curDate'"); 
	}
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['count'];
 
} 

function addleadremarks($conn,$lid,$remarks,$stage,$fmsdate,$pdate){
	// echo "SELECT * FROM `mlm_associate_calculate` where `sales_details_id`='$saleid' and `associate_detail_id` ='$aid'";
	$ds=mysqli_query($conn,"INSERT INTO `leadremarks` (`id`, `lid`, `remarks`, `stage`, `fmsdate`, `posteddate`) VALUES (NULL, '$lid', '$remarks', '$stage', '$fmsdate', '$pdate')"); 
	return true;
 
}
function addeleadremarks($conn,$lid,$remarks,$stage,$fmsdate,$pdate){
	// echo "SELECT * FROM `mlm_associate_calculate` where `sales_details_id`='$saleid' and `associate_detail_id` ='$aid'";
	$ds=mysqli_query($conn,"INSERT INTO `eleadremarks` (`id`, `lid`, `remarks`, `stage`, `fmsdate`, `posteddate`) VALUES (NULL, '$lid', '$remarks', '$stage', '$fmsdate', '$pdate')"); 
	return true;
 
}
function getNiProjDetails($conn,$proj){
	
	if($proj=='NULL' || $proj==''){
		
	return '';	
	}else{
	$expProj=explode(",",$proj);
	foreach($expProj as $projId){
		
	$projName[]=getNonExcSubProjName($conn,$projId)	;
		
	}
	return 'Non Ex : '.implode(",",$projName);	
		
	}
	
		
}


function getNonExcSubProjName($conn,$id){
	$ds=mysqli_query($conn,"SELECT * FROM `nonexsubprojects` where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['name'];
	
}
function getNonExcSubProjDetailsById($conn,$id){
	$ds=mysqli_query($conn,"SELECT * FROM `nonexsubprojects` where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
	
}
/*Exclusive project details*/
function getExcSubProjDetailsById($conn,$id){
	$ds=mysqli_query($conn,"SELECT * FROM `crm_inv_project` where `project_id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
	
}

/*End Exclusive prject details*/

function getNonExcProjUrlById($conn,$id){
	$ds=mysqli_query($conn,"SELECT `url` FROM `nonexsubprojects` where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['url'];
}
function getNonExcPrimaryMobileById($conn,$id){
	$ds=mysqli_query($conn,"SELECT `primarymobile` as mobile FROM `nonexsubprojects` where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['mobile'];
}
function getExcProjUrlById($conn,$id){
	
	$ds=mysqli_query($conn,"SELECT `url` FROM `crm_inv_project` where `project_id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['url'];
	
}

function getAbove100List($conn){
	
	
	$childs=array();
	$ds2=mysqli_query($conn,"SELECT count(*) as count, `postedby` FROM `leads` group by `postedby` having count >100"); 

	while($fetch=mysqli_fetch_array($ds2)){
		      $childs[]=getTreeIdByAssociateId($conn,$fetch['postedby']);
				
		}
	return $childs;	
	
	
}
function getUnsubscribedAray($conn){
	
	
	$childs=array();
	$ds2=mysqli_query($conn,"SELECT `contact_no`  FROM `leads` where `unsubscribe`='1' "); 

	while($fetch=mysqli_fetch_array($ds2)){
		      $childs[]=$fetch['contact_no'];
				
		}
		$childs=array_unique($childs);
	    return $childs;	
	
	
}
function getListAray($conn,$aid){
	
	
	$childs=array();
	$ds2=mysqli_query($conn,"SELECT `contact_no` FROM `leads` where `postedby` ='$aid'"); 

	while($fetch=mysqli_fetch_array($ds2)){
		      $childs[]=$fetch['contact_no'];
				
		}
	return $childs;	
	
	
}
function getListString($conn,$aid){
	
	
	$childs=array();
	$ds2=mysqli_fetch_array(mysqli_query($conn,"SELECT GROUP_CONCAT(CONCAT('91',contact_no)) as mobile FROM `leads` where `postedby` ='$aid'")); 


	return $ds2['mobile'];	
	
	
}
function getList91($conn,$aid){
	
	
	$childs=array();
	$ds2=mysqli_query($conn,"SELECT `contact_no` FROM `leads` where `postedby` ='$aid' "); 

	while($fetch=mysqli_fetch_array($ds2)){
		      $rmobile=preg_replace("/[^0-9]+/", "", $fetch['contact_no']);
		
		
		      $childs[]="91".$rmobile;
				
		}
	return $childs;	
	
	
}

function getList91W($conn,$aid){
	
	
	$childs=array();
	$ds2=mysqli_query($conn,"SELECT `contact_no` FROM `leads` where `postedby` ='$aid' "); 

	while($fetch=mysqli_fetch_array($ds2)){
		      $rmobile=preg_replace("/[^0-9]+/", "", $fetch['contact_no']);
		
		
		      $childs[]=$rmobile;
				
		}
	return $childs;	
	
	
}


function getTeamList91($conn,$assocArr){
	
	if(count($assocArr)>0){
		$impIds=implode(",",$assocArr);	
	}else{
		$impIds=0;
	}
	$childs=array();
	//echo "SELECT `contact_no` FROM `leads` where `postedby` in ($impIds) ";
	$ds2=mysqli_query($conn,"SELECT `contact_no` FROM `leads` where `postedby` in ($impIds) "); 

	while($fetch=mysqli_fetch_array($ds2)){
		//$rmobile=preg_replace("/[^0-9]+/", "", $fetch['contact_no']);
		
		/* $rmobile=preg_replace("/[^0-9]+/", "", $fetch['contact_no']);
		
		
		      $childs[]="'"."91".$rmobile."'";*/
		
		
		      $childs[]="'"."91".$fetch['contact_no']."'";
				
		}
	return $childs;	
	
	
}

function getTeamListIds($conn,$assocArr){
	
	if(count($assocArr)>0){
		$impIds=implode(",",$assocArr);	
	}else{
		$impIds=0;
	}
	$childs=array();
	//echo "SELECT `contact_no` FROM `leads` where `postedby` in ($impIds) ";
	$ds2=mysqli_query($conn,"SELECT `id` FROM `leads` where `postedby` in ($impIds) "); 

	while($fetch=mysqli_fetch_array($ds2)){
		      $childs[]=$fetch['id'];
				
		}
	return $childs;	
	
	
}


function getTeamClient91($conn,$assocArr){
	
	if(count($assocArr)>0){
		$impIds=implode(",",$assocArr);	
	}else{
		$impIds=0;
	}
	$childs=array();
	$ds2=mysqli_query($conn,"SELECT `mobile` FROM `clientsnew` where `aid`in ($impIds) "); 

	while($fetch=mysqli_fetch_array($ds2)){
		      $childs[]="'"."91".$fetch['mobile']."'";
				
		}
	return $childs;	
	
	
}
function getTeamClientIds($conn,$assocArr){
	
	if(count($assocArr)>0){
		$impIds=implode(",",$assocArr);	
	}else{
		$impIds=0;
	}
	$childs=array();
	$ds2=mysqli_query($conn,"SELECT `id` FROM `clientsnew` where `aid`in ($impIds) "); 

	while($fetch=mysqli_fetch_array($ds2)){
		      $childs[]=$fetch['id'];
				
		}
	return $childs;	
	
	
}
function getList91BeforeDate($conn,$aid,$pdate){
	
	
	$childs=array();
	$ds2=mysqli_query($conn,"SELECT `contact_no` FROM `leads` where `postedby` ='$aid' and `pdate`<= '$pdate' "); 

	while($fetch=mysqli_fetch_array($ds2)){
		 //   $contactno=$fetch['contact_no'];
			  $rmobile=preg_replace("/[^0-9]+/", "", $fetch['contact_no']);
		      $childs[]="91".$rmobile;
				
		}
	return $childs;	
	
	
}


function getTeamList91BeforeDate($conn,$assocArr,$pdate){
	
	if(count($assocArr)>0){
		$impIds=implode(",",$assocArr);	
	}else{
		$impIds=0;
	}
	$childs=array();
	$ds2=mysqli_query($conn,"SELECT `contact_no` FROM `leads` where `postedby` in ($impIds) and `pdate`<= '$pdate' "); 

	while($fetch=mysqli_fetch_array($ds2)){
		 //   $contactno=$fetch['contact_no'];
			$rmobile=preg_replace("/[^0-9]+/", "", $fetch['contact_no']);
		      $childs[]="91".$rmobile;
				
		}
	return $childs;	
	
	
}


function getQualifiedCount($conn,$aid){
		
	$ds=mysqli_query($conn,"SELECT count(*) as count from `leads` where `postedby` ='$aid'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['count'];

}

function getVisitShortCodes($conn,$project){
	$shcodes=array();
	 $expProj=explode(",",$project);
	
	foreach($expProj as $pid){
	//	echo getProjectShortCodesNew($conn,$pid);
	$shcodes[]=	getProjectShortCodesNew($conn,$pid);
		
	}
//	print_r($shcodes);
	return implode(",",$shcodes); 
	
}

function getProjectShortCodesNew($conn,$pid){
	//	echo "SELECT *  from `crm_inv_project` where `project_id` ='$pid'";
	$ds=mysqli_query($conn,"SELECT *  from `crm_inv_project` where `project_id` ='$pid'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['project_code'];

}

function welcomeemailtouser($baseurl,$name,$anicode,$conn){
	
$msg='<head>
	<title>New mail</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="background-color:#F2F2F2;">
            	<tr>
                	<td align="center" valign="top" id="bodyCell" style="padding:20px 20px;">
                    	<table border="0" cellpadding="0" cellspacing="0" id="emailContainer" style="width:700px;">
                        	<tr>
                            	<td align="center" valign="top" bgcolor="#FFFFFF" style="padding-top:10px">
                                	<a  href="" target="_blank" title="life apple"  style="text-decoration: none; padding: 16px 20px; border-radius: 0px; margin: 20px 20px 0px; background: #FFF none repeat scroll 0px 0px; display: block;"><img src="'.$baseurl.'/img/logo.png" alt="Acreninches" height=""  class="logoImage" style="width:220px; border:0; color:#6DC6DD !important; font-family:Helvetica, Arial, sans-serif; font-size:60px; font-weight:bold; height:auto !important; letter-spacing:-4px; line-height:100%; outline:none; text-align:center; text-decoration:none;" /></a>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top" style="padding-top:0px;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailBody" style="background-color:#FFFFFF; border-collapse:separate !important; border-radius:4px;">
                                        <tr>
                                            <td align="left" valign="top" class="bodyContent" style="color:#606060; font-family:Helvetica, Arial, sans-serif; font-size:15px; line-height:150%; padding-top:40px; padding-right:40px; padding-bottom:30px; padding-left:40px; text-align:left;">
                                               
												<p>Hello <b>'.$name.',</b></p>
<p>Welcome to Acres N Inches (ANI). We have received your application for a provisional code/ID. Your
provisional ID is <b>'.$anicode.'</b></p>
<p>To know more about our organization and its values, you may attend our informational seminars
which will explain to you about the manner in which we work and all details associated with how
you can benefit by getting associated with Acres N Inches. We shall address any specific queries that
you may have during these seminars.</p>
<p>It is mandatory for you to at least attend the following informational sessions in order to be aware of
the details of our systems of operations and the responsibilities and requirements associated with
the same if you wish to enrol with us as our associate.</p>

<p>Details/ Name of sessions required as as follow : </p>';

$ds=mysqli_query($conn,"SELECT * FROM `seminars` where `mandatory`='1' and `status`='1' and `view` ='1' order by position asc"); 
			$numrows=mysqli_num_rows($ds);
			if($numrows >0){
			while($fetch=mysqli_fetch_array($ds)){
				$i++;
				
			
				 $msg.='<b><p> '.$i.'. <span>'.$fetch["code"].'</span>  <span style="text-align:left;">'.$fetch["title"].'</span> <p></b>';
			 }
			}


$msg.='<p>Note 1* - The provisional ID will remain valid only for a period of 90 days from today and this
validity shall be subject to your attending the aforementioned informational sessions and have
referred at least 4 individuals for the same, failing which you shall not be eligible for any promotions
going forward.</p>All matters in relation to the term or extension of the provisional
code or engagement thereunder may be changed and shall be subject to the sole discretion of ANI.

<p>Note 2* - You shall comply with all applicable laws and regulations including but not limited to The
Real Estate (Regulation and Development) Act, 2016 (RERA) prior to your enrolment as our
associate. You shall not solicit or advise any sale of property without fully complying with all
applicable laws and regulations.</p>
												 
                                            </td>
                                        </tr>
                                        <tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>
                                        <tr>
                                            <td align="center" valign="middle" style="padding-right:40px; padding-bottom:40px; padding-left:40px;">
                                                <table border="0" cellpadding="0" cellspacing="0" class="emailButton" style="border-collapse:separate !important; border-radius:3px;">
												Follow us on : <a href="https://www.facebook.com/AcresNInches.ANI/"><img src="'.$baseurl.'/images/fbb.png"></a>  <a href="https://twitter.com/acres_ninches"><img src="'.$baseurl.'/images/twtn.png"></a>  <a href="https://www.instagram.com/acres_n_inches/"><img src="'.$baseurl.'/images/ins.png"></a>  <a href="https://www.youtube.com/channel/UCHj3hnIPlHPPDx6UM51Ubfg"><img src="'.$baseurl.'/images/you.png"></a>  <a href="https://www.instagram.com/acres_n_inches/"><img src="'.$baseurl.'/images/lnk.png"></a>
                                                  
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            

                           
                                        
										
                                    </table>
                                </td>
                            </tr>

                            
                             <tr>
                            	<td align="center" valign="top">
                                 	<table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailFooter">
                                    	<tr>
                                        	<td align="center" valign="top" class="footerContent" style="color:#606060; font-family:Helvetica, Arial, sans-serif; font-size:10px; line-height:125%;"> <br>
                                          This e-mail and any files transmitted with it may contain confidential and privileged information are for the sole use of the intended recipient(s). If you are not the intended recipient please appraise the sender by reply e-mail and destroy all copies and the original message. The information contained in this e-mail including the attachment/of the content is being provided to you for the specific purpose of evaluation. No legal consequences can be derived of this e-mail. Any unauthorized disclosure, dissemination, forwarding, printing or copying of this email or any action taken on this e-mail is strictly prohibited and may be unlawful. The recipient acknowledges that Acres N Inches or its subsidiaries and associated companies, are unable to exercise control or ensure or guarantee the integrity of the contents of the information contained in e-mail transmissions and further acknowledges that any views expressed in this message are those of the individual senders and no binding nature of the message shall be implied or assumed unless the sender does so expressly with due authority of Acres N Inches.
                                                <br />
                                               
                                            </td>
                                        </tr>
                            <tr>
                                            <td style="padding-top:30px" valign="top" align="center">
                                                <a style="color:#0073e6;text-decoration:none" href="http://acresninches.com/" target="_blank" >acresninches.com</a>
                                            </td>
                                        </tr>
                        </table>
                        
                        </td>
                        </tr>
                        </table></body><html>';
						return $msg;	
}


function emailtoassoconinventoryheld($baseurl,$name,$project,$pdate,$customer,$conn){
	
$msg='<head>
	<title>New mail</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="background-color:#F2F2F2;">
            	<tr>
                	<td align="center" valign="top" id="bodyCell" style="padding:20px 20px;">
                    	<table border="0" cellpadding="0" cellspacing="0" id="emailContainer" style="width:700px;">
                        	<tr>
                            	<td align="center" valign="top" bgcolor="#FFFFFF" style="padding-top:10px">
                                	<a  href="" target="_blank" title="life apple"  style="text-decoration: none; padding: 16px 20px; border-radius: 0px; margin: 20px 20px 0px; background: #FFF none repeat scroll 0px 0px; display: block;"><img src="'.$baseurl.'/img/logo.png" alt="Acreninches" height=""  class="logoImage" style="width:220px; border:0; color:#6DC6DD !important; font-family:Helvetica, Arial, sans-serif; font-size:60px; font-weight:bold; height:auto !important; letter-spacing:-4px; line-height:100%; outline:none; text-align:center; text-decoration:none;" /></a>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top" style="padding-top:0px;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailBody" style="background-color:#FFFFFF; border-collapse:separate !important; border-radius:4px;">
                                        <tr>
                                            <td align="left" valign="top" class="bodyContent" style="color:#606060; font-family:Helvetica, Arial, sans-serif; font-size:15px; line-height:150%; padding-top:40px; padding-right:40px; padding-bottom:30px; padding-left:40px; text-align:left;">
                                               
												<p>Greeting <b>'.$name.',</b></p>
<p>This is to hereby inform you that  <b>'.$project.'</b>  has been temporarily held by you for '.$customer.' and will be valid till date '.$pdate.' </p>
<p>Kindly ensure that following requirements from Customer are submitted to concerned Builder failing which the said unit no. in the said project shall be released.</p>
<p>a. Duly Filled Application Form of concerned Builder for the said property.</p>
<p>b. KYC documents(Pan Card+Adhar card Or voter id card+passport size photo)</p>
<p>c. Current date cheque or RTGS of Rs 100000/-in favour of concerned Builder.</p>
<p>d. PDC Cheque to complete 10% booking amount(maximum 15 days from the date of booking )</p>
<p>Best Regards</p>
<b>TEAM ANI</b></p>
												 
                                            </td>
                                        </tr>
                                       
                                       
                                    </table>
                                </td>
                            </tr>
                            

                           
                                        
										
                                    </table>
                                </td>
                            </tr>

                            
                             <tr>
                            	<td align="center" valign="top">
                                 	<table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailFooter">
                                    	<tr>
                                        	<td align="center" valign="top" class="footerContent" style="color:#606060; font-family:Helvetica, Arial, sans-serif; font-size:10px; line-height:125%;"> <br>
                                          This e-mail and any files transmitted with it may contain confidential and privileged information are for the sole use of the intended recipient(s). If you are not the intended recipient please appraise the sender by reply e-mail and destroy all copies and the original message. The information contained in this e-mail including the attachment/of the content is being provided to you for the specific purpose of evaluation. No legal consequences can be derived of this e-mail. Any unauthorized disclosure, dissemination, forwarding, printing or copying of this email or any action taken on this e-mail is strictly prohibited and may be unlawful. The recipient acknowledges that Acres N Inches or its subsidiaries and associated companies, are unable to exercise control or ensure or guarantee the integrity of the contents of the information contained in e-mail transmissions and further acknowledges that any views expressed in this message are those of the individual senders and no binding nature of the message shall be implied or assumed unless the sender does so expressly with due authority of Acres N Inches.
                                                <br />
                                               
                                            </td>
                                        </tr>
                            <tr>
                                            <td style="padding-top:30px" valign="top" align="center">
                                                <a style="color:#0073e6;text-decoration:none" href="http://acresninches.com/" target="_blank" >acresninches.com</a>
                                            </td>
                                        </tr>
                        </table>
                        
                        </td>
                        </tr>
                        </table></body><html>';
						return $msg;	
}

function emailtoassoconinventoryrelease($baseurl,$name,$project,$customer,$conn){
	
$msg='<head>
	<title>New mail</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="background-color:#F2F2F2;">
            	<tr>
                	<td align="center" valign="top" id="bodyCell" style="padding:20px 20px;">
                    	<table border="0" cellpadding="0" cellspacing="0" id="emailContainer" style="width:700px;">
                        	<tr>
                            	<td align="center" valign="top" bgcolor="#FFFFFF" style="padding-top:10px">
                                	<a  href="" target="_blank" title="life apple"  style="text-decoration: none; padding: 16px 20px; border-radius: 0px; margin: 20px 20px 0px; background: #FFF none repeat scroll 0px 0px; display: block;"><img src="'.$baseurl.'/img/logo.png" alt="Acreninches" height=""  class="logoImage" style="width:220px; border:0; color:#6DC6DD !important; font-family:Helvetica, Arial, sans-serif; font-size:60px; font-weight:bold; height:auto !important; letter-spacing:-4px; line-height:100%; outline:none; text-align:center; text-decoration:none;" /></a>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top" style="padding-top:0px;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailBody" style="background-color:#FFFFFF; border-collapse:separate !important; border-radius:4px;">
                                        <tr>
                                            <td align="left" valign="top" class="bodyContent" style="color:#606060; font-family:Helvetica, Arial, sans-serif; font-size:15px; line-height:150%; padding-top:40px; padding-right:40px; padding-bottom:30px; padding-left:40px; text-align:left;">
                                               
												<p>Greeting <b>'.$name.',</b></p>
<p>This is to hereby inform you that  <b>'.$project.'</b>   held by you for '.$customer.' has been released as required documents were not submitted</p>
<p>Best Regards</p>
<b>TEAM ANI</b></p>
												 
                                            </td>
                                        </tr>
                                       
                                       
                                    </table>
                                </td>
                            </tr>
                            

                           
                                        
										
                                    </table>
                                </td>
                            </tr>

                            
                             <tr>
                            	<td align="center" valign="top">
                                 	<table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailFooter">
                                    	<tr>
                                        	<td align="center" valign="top" class="footerContent" style="color:#606060; font-family:Helvetica, Arial, sans-serif; font-size:10px; line-height:125%;"> <br>
                                          This e-mail and any files transmitted with it may contain confidential and privileged information are for the sole use of the intended recipient(s). If you are not the intended recipient please appraise the sender by reply e-mail and destroy all copies and the original message. The information contained in this e-mail including the attachment/of the content is being provided to you for the specific purpose of evaluation. No legal consequences can be derived of this e-mail. Any unauthorized disclosure, dissemination, forwarding, printing or copying of this email or any action taken on this e-mail is strictly prohibited and may be unlawful. The recipient acknowledges that Acres N Inches or its subsidiaries and associated companies, are unable to exercise control or ensure or guarantee the integrity of the contents of the information contained in e-mail transmissions and further acknowledges that any views expressed in this message are those of the individual senders and no binding nature of the message shall be implied or assumed unless the sender does so expressly with due authority of Acres N Inches.
                                                <br />
                                               
                                            </td>
                                        </tr>
                            <tr>
                                            <td style="padding-top:30px" valign="top" align="center">
                                                <a style="color:#0073e6;text-decoration:none" href="http://acresninches.com/" target="_blank" >acresninches.com</a>
                                            </td>
                                        </tr>
                        </table>
                        
                        </td>
                        </tr>
                        </table></body><html>';
						return $msg;	
}

function getSitevisitList($conn){
	
	
	$childs=array();
	$ds2=mysqli_query($conn,"SELECT  `referredcode` FROM `sitevisits` where `status`='1' "); 

	while($fetch=mysqli_fetch_array($ds2)){
		      $childs[]=strtoupper($fetch['referredcode']);
				
		}
	return $childs;	
	
	
}

function getSitevisitListbetweendates($conn,$sdate,$edate){
	
	
	$childs=array();
	$ds2=mysqli_query($conn,"SELECT  `referredcode` FROM `sitevisits` where `status`='1' and `pickupdate` between '$sdate' and '$edate' "); 

	while($fetch=mysqli_fetch_array($ds2)){
		      $childs[]=strtoupper($fetch['referredcode']);
				
		}
	return $childs;	
	
	
}

function getSiteVisitCountReport($conn,$mycodes){
	$total=0;
	$today=0;
	$curDate=date("Y-m-d");
	//echo count($mycodes);
	if(count($mycodes)>0){
		foreach($mycodes as $code){
			$anicodes[]='"'.$code.'"';	
		}
			$impCode=implode(",",$anicodes);
			$ds2=mysqli_query($conn,"SELECT  `pickupdate`  FROM `sitevisits` where `status`='1' and `referredcode` in ($impCode) "); 
	}else{
			$ds2=mysqli_query($conn,"SELECT  `pickupdate`  FROM `sitevisits` where `status`='1' and `referredcode` ='0' "); 
	}
//echo "SELECT  `pickupdate`  FROM `sitevisits` where `status`='1' and `referredcode` in ($impCode) ";
	//$ds2=mysqli_query($conn,"SELECT  `pickupdate`  FROM `sitevisits` where `status`='1' and `referredcode` in ($impCode) "); 

	while($fetch=mysqli_fetch_array($ds2)){
		$total++;
		      $pickupdate=$fetch['pickupdate'];
			  if($pickupdate==$curDate){
				 $today=$today+1;  
			  }
				
		}
	return $today."###".$total;	
	
	
}
function checkmychildcode($conn,$aid,$self){
	$childs=array();
	 $ds2=mysqli_fetch_row(mysqli_query($conn,"SELECT count(*)  FROM `parents`  where `parent`='$aid' and  `self`='$self' ")); 

	if($ds2[0]>0){
		return true;	
	}else{
		return false;		
	}
}
function checkbookingstatus($conn,$bid){
	$childs=array();
	 $ds2=mysqli_fetch_row(mysqli_query($conn,"SELECT count(*)  FROM `seminarattendence`  where `bookingid`='$bid' and  `view`='1' ")); 

	if($ds2[0]>0){
		return true;	
	}else{
		return false;		
	}
}
function isQualified($conn,$aid){
	
	 $ds2=mysqli_fetch_row(mysqli_query($conn,"SELECT `qualified`  FROM `mlm_associate_detail`  where `associate_detail_id`='$aid'  ")); 

	if($ds2[0]==1){
		return true;	
	}else{
		return false;		
	}
}
function gettitleDetailById($conn,$id){
	$ds=mysqli_query($conn,"SELECT * FROM `title` where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['name'];
}
function getFirstSmsText($conn,$lid){
	$leadsDetail=getLeadDetailById($conn,$lid);
	$title=gettitleDetailById($conn,$leadsDetail['title']);
	$Name=$leadsDetail['name'];
	$assocName=associatenamefromid($conn,$leadsDetail['postedby']);
	$text="Hello ".$title." ".$Name.", I am glad to inform you that I am associated with Acres N Inches, a brand known for best properties at fair prices.Will meet you soon. To know more click http://www.acresninches.com . Best Regards ".$assocName." ";
return $text;	
}
function updateSmsStatusofLead($conn,$lid){
	$pdate=date("Y-m-d");
	$ds=mysqli_query($conn,"Update `leads` set `smsstatus`='1' ,`firstsms`='$pdate' where `id`='$lid'"); 
	}
	
function updateSmsStatusofLeadwithrequestid($conn,$lid,$rid){
	$pdate=date("Y-m-d");
	$ds=mysqli_query($conn,"Update `leads` set `smsstatus`='1' ,`firstsms`='$pdate' ,`smsrequestid`='$rid'  where `id`='$lid'"); 
	}	
	
function getSitevisitCountByAsscode($conn,$ass){
	
	$ds=mysqli_query($conn,"SELECT count(*) as count FROM `sitevisits` where `referredcode`='$ass' and `status`='1' and `cancelledstatus`='0'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['count'];
}

function getSitevisitCountByAsscodebetweendates($conn,$ass,$sdate,$edate){
	
	$ds=mysqli_query($conn,"SELECT count(*) as count FROM `sitevisits` where `referredcode`='$ass' and `status`='1' and `cancelledstatus`='0' and `pickupdate` between '$sdate' and '$edate'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['count'];
}

function getTodayTeamCountByCodeANdType($conn,$code,$type){
	
	 $aid=associateidfromcode($conn,$code);
	$curDate=date("Y-m-d");
	if($type==1){
		$date='followdate';	
	}
	if($type==4){
		$date='meetingdate';	
	}
	if($type==5){
		$date='expsitevisitdate';	
	}
	
//	echo "SELECT count(*) as count FROM `leads` where `postedby`='$aid' and `leadtype`='$type'  and $date ='$curDate'";
	$ds=mysqli_query($conn,"SELECT count(*) as count FROM `leads` where `postedby`='$aid' and `leadtype`='$type'  and $date ='$curDate'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['count'];
	
}
function getTodayTeamCountByCodeANdTypeAndDates($conn,$code,$type,$sdate,$edate){
	
	 $aid=associateidfromcode($conn,$code);
	$curDate=date("Y-m-d");
	if($type==1){
		$date='followdate';	
	}
	if($type==4){
		$date='meetingdate';	
	}
	if($type==5){
		$date='expsitevisitdate';	
	}
	
//	echo "SELECT count(*) as count FROM `leads` where `postedby`='$aid' and `leadtype`='$type'  and $date ='$curDate'";
	$ds=mysqli_query($conn,"SELECT count(*) as count FROM `leads` where `postedby`='$aid' and `leadtype`='$type'  and `$date` between '$sdate' and '$edate'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['count'];
	
}

function getSecondSmsText($conn,$lid){
	$leadsDetail=getLeadDetailById($conn,$lid);
	$title=gettitleDetailById($conn,$leadsDetail['title']);
	$Name=$leadsDetail['name'];
	$assocName=associatenamefromid($conn,$leadsDetail['postedby']); 
	 $msg1="Hello ".$title." ".$Name."! This side ".$assocName.". I have recommended your name to receive free of cost updates from Acres N inches about best properties at fair prices. Best Regards";

	$msg2="Dear ".$title." ".$Name.". Your name has been recommended by ".$assocName." for you to receive free of cost updates about best properties at fair prices.To unsubscribe click http://www.ani.acresninches.com/us.php?lid=".base64_encode($lid)." .Best Regards Team ANI";
return $msg1."###".$msg2;	
}

function updateQualifiedCount($conn,$aid){
	$curDate=date("Y-m-d");
	$ds=mysqli_query($conn,"Update `mlm_associate_detail` set `qualified`='1' ,`qualifiedon`='$curDate' where `associate_detail_id` ='$aid' and `qualified`='0' "); 
}

function getMovedDepartment($conn,$id){
	//echo "SELECT *  FROM `querydepartments` where `query_id`='$id' ";
		$ds=mysqli_query($conn,"SELECT *  FROM `querydepartments` where `query_id`='$id' "); 
		$numrows=mysqli_num_rows($ds);
	   
	    if($numrows==0){
			return "None";	
		}else{
			$ds=mysqli_query($conn,"SELECT *  FROM `querydepartments` where `query_id`='$id' "); 
			//$ds1=mysqli_fetch_assoc($ds);
			while($fetch=mysqli_fetch_array($ds)){
			//echo "Testing";
		//	echo getDepartmentNameById($conn,$fetch['department_id']);
			$data[]=getDepartmentNameById($conn,$fetch['department_id']);
			
			}	
			//print_r($data); 
		return implode(",",$data);	
		}
		
	
}

function getMovedDepartmentIds($conn,$id){
	
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `querydepartments` where `query_id`='$id' "); 
	    $ds1=mysqli_fetch_assoc($ds);
	    if($ds1['count']==0){
			return "0";	
		}else{
			$ds=mysqli_query($conn,"SELECT * FROM `querydepartments` where `query_id`='$id'"); 
			$numrows=mysqli_num_rows($ds);
			
			while($fetch=mysqli_fetch_array($ds)){
			
			$data[]=$fetch['department_id'];
			
			}	
		return implode(",",$data);	
		}
		
	
}
function getMovedDepartmentIdsArr($conn,$id){
	
		$ds=mysqli_query($conn,"SELECT count(*) as count FROM `querydepartments` where `query_id`='$id' "); 
	    $ds1=mysqli_fetch_assoc($ds);
	    if($ds1['count']==0){
			return "0";	
		}else{
			$ds=mysqli_query($conn,"SELECT * FROM `querydepartments` where `query_id`='$id'"); 
			$numrows=mysqli_num_rows($ds);
			
			while($fetch=mysqli_fetch_array($ds)){
			
			$data[]=$fetch['department_id'];
			
			}	
		return $data;	
		}
		
	
}
function getProvisionalHoldedInventoriesofTeamHead($conn,$assocode,$associd){
	 $holded=array();
	// echo "SELECT * FROM `crm_inv_customer_detail` where  `team_head_code`='$assocode'";
	 $ds2=mysqli_query($conn,"SELECT * FROM `holdedinventory` where  `teamheadcode`='$assocode' and `holdstatus`='1' and `phold`='1' order by `id` desc  "); 

	while($fetch=mysqli_fetch_array($ds2)){
			$cid=$fetch['id'];
			$floorid=$fetch['floor_id'];
			
			if(checkFloorIsOnHold($conn,$floorid)){
				$holded[]=$cid;	
			}
			
			
			
			
		}
		//return $error;		
	return 	$holded;
		
}

function getPickupPoint($conn,$vid){
	$curDate=date("Y-m-d");
	$ds=mysqli_query($conn,"SELECT * FROM `sitevisits` where  `id`='$vid' ");
	$ds1=mysqli_fetch_assoc($ds);
    if($ds1==4){
		$pickuppoint=$ds1['onroute_pickpoint']; 	
	}else{
		$pickuppoint=getPickupName($conn,$ds1['pickuppoint']);
	}
	
	return $pickuppoint;
}
function getPickupName($conn,$id){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT pickup_pointname FROM `pickuppoint` where  `id`='$id'   ")); 
	 return 	$ds2['pickup_pointname'];
}


function getcommissionvaluebyProjectPlanFloor($conn,$pid,$fid,$plan){
	//echo "SELECT `commision` FROM `crm_inv_payment_plan` WHERE `project_id`='$pid' and `payment_plan_master_id` ='$plan' and `floor_id`='$fid'  ";
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT `commision` FROM `crm_inv_payment_plan` WHERE `project_id`='$pid' and `payment_plan_master_id` ='$plan' and `floor_id`='$fid'  ")); 
	 return 	$ds2['commision'];
}


function getCommissionrateByPlanANdSizeANdTower($conn,$plan,$size,$pid,$tid){
	 $holded=array();
	// echo "SELECT `floor_id` FROM `crm_inv_project_floor` WHERE `project_id`='$pid' and `basic_size`='$size' order by `id` limit 0,1  ";
	 $ds2=mysqli_query($conn,"SELECT `floor_id` FROM `crm_inv_project_floor` WHERE `project_id`='$pid' and `basic_size`='$size' and `tower_id`='$tid' order by `floor_id` limit 0,1  "); 

	 while($fetch=mysqli_fetch_array($ds2)){
			
			$floorid=$fetch['floor_id'];
			
			
			$comm=getcommissionvaluebyProjectPlanFloor($conn,$pid,$floorid,$plan);
			
			
			
			
			
		}
		//return $error;		
	return 	$comm;
		
}
function getFloorAvailableStatus($conn,$fid){
	//echo "SELECT `commision` FROM `crm_inv_payment_plan` WHERE `project_id`='$pid' and `payment_plan_master_id` ='$plan' and `floor_id`='$fid'  ";
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT `status` FROM `crm_inv_project_floor` WHERE  `floor_id`='$fid'  ")); 
	 if($ds2['status']=='Available'){
		return true; 
	 }else{
		 return false;
	 }
}






function getconcernedheadGmandAbove($conn,$id){
	$arr = array();  
	$parent = 1;
while($parent != 0 || $parent != '')
{
	if($i == 0)
	{
		$id = $id;
		$arr[0] = $id;
		$i++;
	}
	else
	{ 
		$id = $parent;
		$i++;
	}
	//echo "<br/>";
  $aresult ="SELECT mt.id, mt.parent,mt.desigination_id,mt.code ,md.blocked as blocked FROM `mlm_tree` mt inner join `mlm_associate_detail` md on md.associate_code=mt.code where id=$id" ;

	$result2=mysqli_query($conn,$aresult);
	$row=mysqli_fetch_array($result2);
	$parent = $row['parent'];
	$blocked = $row['blocked'];
	if($parent!=''){
	 $arr[$i] = $row['parent'];
	 $desigination_id=$row['desigination_id'];
	 if (  ( ($desigination_id=='GM') || ($desigination_id=='AVP') || ($desigination_id=='VP') || ($desigination_id=='SVP')) && ($blocked==1)){
		$gm= $row['code'];
		 return $gm;
		 exit();
	 }
	 
	}
	 //$arr[$i] = $row['desigination_id'];
	 //$desigination_name=$row['desigination_name'];
	 
	
	
}	
	//return $arr;
	
}


function checkSmsStatus($conn,$id){
	
	 $contact=mysqli_fetch_assoc(mysqli_query($conn,"SELECT `contact_no` FROM `leads` WHERE  `id`='$id'  ")); 
	 $mobile="91".$contact['contact_no'];
	 
	 $numrows=mysqli_num_rows(mysqli_query($conn,"SELECT *  FROM `smsstatus` WHERE  `sender_id`='$mobile' order by `id` desc  "));
	 if($numrows>0){
	 
	  
     $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT `status`,`description` FROM `smsstatus` WHERE  `sender_id`='$mobile' order by `id` desc  ")); 
	 
	 if($ds2['status']=='1'){
		return "<img src='images/delivered.png'>"; 
	 }else{
		 return "<a href='resendsms.php?lid=".base64_encode($id)."'>".$ds2['description']." [ Resend ]</a>";
	 }
	 
	 
	 }else{
		 return "<img src='images/na.png'>"; 
	 }
	
}

function viewpage($conn,$id){
	  $aresult =mysqli_query($conn,"UPDATE viewpages SET view = view +1 WHERE pageid=$id") ;
	
}
function countUnapprovedMessages($conn){
	 $contact=mysqli_fetch_assoc(mysqli_query($conn,"SELECT count(*) as count FROM `postforteam` WHERE  `status`='0'  ")); 
	return $contact['count'];
}

function getTotalList($conn,$associd){
		$ds=mysqli_fetch_assoc(mysqli_query($conn,"SELECT count(*) as count FROM `leads` where   `postedby`='$associd' ")); 
		return $ds['count'];
	}
	
function getNewTeamHeadCode($conn,$aid){
	    $trid=getTreeIdByAssociateId($conn,$aid);
		$parents=getParentsTree($conn,$trid);
		array_pop($parents);
		$flag=0;
		foreach($parents as $pid){
			if($flag!=1){
		$associd=getAssociateIdByTreeId($conn,$pid);
		$code=associatecodefromid($conn,$associd);
		if(checkisTeamHead($conn,$code)){
			$flag=1;
			$thead=$code;
			
		}
			
			}
		}
		
	return $thead;
}


function getProjectByTypeANdId($conn,$pid,$type){
   $curDate=date("Y-m-d");
   if($type==1){
		$ds=mysqli_query($conn,"SELECT `project_name` as name FROM `crm_inv_project` where   `project_id`='$pid'  "); 
	}
	if($type==2){
		$ds=mysqli_query($conn,"SELECT `name` as name  FROM `nonexsubprojects` where   `id`='$pid'   "); 
	}
	
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['name'];
 
} 
function getidByMobileAndType($conn,$type,$mobile){
	 if($type==1){
		$ds=mysqli_query($conn,"SELECT `id` as id  FROM `clients` where   `mobile`='$mobile' order by id asc limit 0,1  "); 
	}
	if($type==2){
		$ds=mysqli_query($conn,"SELECT `id` as id  FROM `leads` where   `contact_no`='$mobile' order by id asc limit 0,1   "); 
	}
	
	if($type==3){
		$ds=mysqli_query($conn,"SELECT `associate_detail_id` as id  FROM `mlm_associate_detail` where   `contact_no`='$mobile' order by id asc limit 0,1   "); 
	}
	
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['id'];
	
}

function getRedirectUrlBYsmsid($conn,$smsid){
	$url="http://www.acresninches.com/";
	$ds=mysqli_query($conn,"SELECT *    FROM `smstoshoot` where   `id`='$smsid'   ");
	$ds1=mysqli_fetch_assoc($ds);
	 $type=$ds1['type'];

	$projectid=$ds1['urlid'];
	if($type==2){
		$url= getNonExcProjUrlById($conn,$projectid);
	}
	
	if($type==1){
		$url= getExcProjUrlById($conn,$projectid);
	}
	
	return $url;
	 
	
}

function getReraTextByAid($conn,$aid){
	
	$ds=mysqli_query($conn,"SELECT `first_name`,`contact_no` FROM `mlm_associate_detail` where `associate_detail_id`='$aid'"); 
	$ds1=mysqli_fetch_assoc($ds);
	
	return "Call ".$ds1['first_name']." @ ".$ds1['contact_no'];
}

function getSMSHistory($conn){
	
	$ds=mysqli_query($conn,"SELECT count(*) as count from `smstoshoot` "); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['count'];
}

function getSMSClick($conn){
	
	$ds=mysqli_query($conn,"SELECT count(*) as count from `smsclicks` "); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['count'];
}

function getTotalSMSClick($conn,$sid){
	
	$ds=mysqli_query($conn,"SELECT count(*) as count from `smsclicks` where `smsid`='$sid' "); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['count'];
}

function getTotalSMSClickProjectWise($conn,$pid){
	$clients=0;
	$worksheet=0;
	$assoc=0;
			$ds=mysqli_query($conn,"SELECT `id` FROM `smstoshoot` where `urlid`='$pid'"); 
			$numrows=mysqli_num_rows($ds);
			while($fetch=mysqli_fetch_array($ds)){
				$smsid=$fetch['id'];
				
				$ds1=mysqli_query($conn,"SELECT `type` FROM `smsclicks` where `smsid`='$smsid'"); 
				$numrows1=mysqli_num_rows($ds1);
				while($fetch1=mysqli_fetch_array($ds1)){
				$type=$fetch1['type'];
				if($type==1){
					$clients=$clients+1;	
				}
				if($type==2){
					$worksheet=$worksheet+1;	
				}
				if($type==3){
					$assoc=$assoc+1;	
				}
				
				
				}	
				
				
			}	
	
	$grand=$clients."##".$worksheet."##".$assoc;
	return $grand;
	
	
}

function getClickHistoryByType($conn,$smsid,$type){
	
	$ds=mysqli_query($conn,"SELECT count(*) as count from `smsclicks` where `smsid`='$smsid' and `type`='$type' "); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['count'];
}

function getnoofclickreport($conn,$smsid,$aid,$type){
	$ds=mysqli_query($conn,"SELECT count(*) as count from `smsclicks` sc inner join `leads` ld on ld.id=sc.userid where sc.`smsid`='$smsid' and sc.`type`='$type' and ld.`postedby`='$aid' "); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['count'];
}

function getnoofclicks($conn,$smsid,$lid){
	$ds=mysqli_query($conn,"SELECT count(*) as count from `smsclicks` where `type`='2' and `userid`='$lid' AND smsid='$smsid'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['count'];
}


function getSeminaratendedbyass($conn,$aid){
	$modules=array();
	$childs=array();
	$bookings=array();
	$mandatorySeminar=array();
	$nm=1;
	
	$ds2=mysqli_query($conn,"SELECT `id` FROM `seminarbookings`  where `assoc_id`='$aid' "); 
	while($fetch=mysqli_fetch_array($ds2)){
   		$childs[]=$fetch['id'];
	}
	
	if(count($childs)>0){
		$impids=implode(",",$childs);
	}else{
		$impids=0;	
	}
	
	$ds23=mysqli_query($conn,"SELECT `bookingid` FROM `seminarattendence`  where bookingid in($impids)   "); 
	
	while($fetch3=mysqli_fetch_array($ds23)){
		$bookings[]=$fetch3['bookingid'];
	}
	
	if(count($bookings)>0){
		$impbids=implode(",",$bookings);
	}else{
		$impbids=0;	
	}
//	echo "SELECT `roaster_detail_id` FROM `seminarbookings`  where id in($impbids)   ";
	
	
		$ds234=mysqli_query($conn,"SELECT `roaster_detail_id` FROM `seminarbookings`  where id in($impbids)   "); 
	
	while($fetch34=mysqli_fetch_array($ds234)){
		$rid=$fetch34['roaster_detail_id'];
		$roasterArr=getRoasterDetailsDetailById($conn,$rid);
		$moduleid=$roasterArr['module_id'];
		$moduleArr[]=$moduleid;	
		if(checkMandatoryStatus($conn,$moduleid)){
			$mandatorySeminar[]=$moduleid;	
		}
		
		
	}
	
	$allseminar=array_unique($moduleArr);
	$mandatoryseminar=array_unique($mandatorySeminar);
		
	return count($allseminar)."##".count($mandatoryseminar);
		
}

function getLapseTeamCountByCodeANdType($conn,$code,$type){
	
	 $aid=associateidfromcode($conn,$code);
	$curDate=date("Y-m-d");
	if($type==1){
		$date='followdate';	
	}
	if($type==4){
		$date='meetingdate';	
	}
	if($type==5){
		$date='expsitevisitdate';	
	}
	
//	echo "SELECT count(*) as count FROM `leads` where `postedby`='$aid' and `leadtype`='$type'  and $date ='$curDate'";
	$ds=mysqli_query($conn,"SELECT count(*) as count FROM `leads` where `postedby`='$aid' and `leadtype`='$type'  and $date <'$curDate'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['count'];
	
}
function getLapseTeamCountByIdANdType($conn,$aid,$type){
	
	// $aid=associateidfromcode($conn,$code);
	$curDate=date("Y-m-d");
	if($type==1){
		$date='followdate';	
	}
	if($type==4){
		$date='meetingdate';	
	}
	if($type==5){
		$date='expsitevisitdate';	
	}
	
//	echo "SELECT count(*) as count FROM `leads` where `postedby`='$aid' and `leadtype`='$type'  and $date ='$curDate'";
	$ds=mysqli_query($conn,"SELECT count(*) as count FROM `leads` where `postedby`='$aid' and `leadtype`='$type'  and $date <'$curDate'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['count'];
	
}


function getTodaysTeamCountByIdANdType($conn,$aid,$type,$sdate,$edate){
	
	// $aid=associateidfromcode($conn,$code);
	$curDate=date("Y-m-d");
	if($type==1){
		$date='followdate';	
	}
	if($type==4){
		$date='meetingdate';	
	}
	if($type==5){
		$date='expsitevisitdate';	
	}
	
//	echo "SELECT count(*) as count FROM `leads` where `postedby`='$aid' and `leadtype`='$type'  and $date ='$curDate'";
//echo "SELECT count(*) as count FROM `leads` where `postedby`='$aid' and `leadtype`='$type'  and `$date` between '$sdate' and '$edate' ";
	$ds=mysqli_query($conn,"SELECT count(*) as count FROM `leads` where `postedby`='$aid' and `leadtype`='$type'  and `$date` between '$sdate' and '$edate' "); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['count'];
	
}



function checkMandatoryStatus($conn,$aid){
			$ds=mysqli_query($conn,"SELECT * FROM `seminars` where `id`='$aid'"); 
			$fetch=mysqli_fetch_assoc($ds);
			$mandatory=$fetch['mandatory'];
			
			if($mandatory==1){
			return true;	
			}else{
			return false;	
			}
	
}

function getAppropriateRera($conn,$id){
	
	$ds=mysqli_query($conn,"SELECT * FROM `nonexsubprojects` where `id`='$id'"); 
			$fetch=mysqli_fetch_assoc($ds);
			$mandatory=$fetch['rera'];
			return $mandatory;
	
}
function getAppropriateImg($conn,$id){
	
	$ds=mysqli_query($conn,"SELECT * FROM `nonexsubprojects` where `id`='$id'"); 
			$fetch=mysqli_fetch_assoc($ds);
			$mandatory=$fetch['image'];
			return "<img src='images/logo/$mandatory'>";
	
}


function welcomeemailtotempuser($baseurl,$name,$referee,$tid,$conn){
	
$msg='<head>
	<title>New mail</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="background-color:#F2F2F2;">
            	<tr>
                	<td align="center" valign="top" id="bodyCell" style="padding:20px 20px;">
                    	<table border="0" cellpadding="0" cellspacing="0" id="emailContainer" style="width:700px;">
                        	<tr>
                            	<td align="center" valign="top" bgcolor="#FFFFFF" style="padding-top:10px">
                                	<a  href="" target="_blank" title="life apple"  style="text-decoration: none; padding: 16px 20px; border-radius: 0px; margin: 20px 20px 0px; background: #FFF none repeat scroll 0px 0px; display: block;"><img src="'.$baseurl.'/img/logo.png" alt="Acreninches" height=""  class="logoImage" style="width:220px; border:0; color:#6DC6DD !important; font-family:Helvetica, Arial, sans-serif; font-size:60px; font-weight:bold; height:auto !important; letter-spacing:-4px; line-height:100%; outline:none; text-align:center; text-decoration:none;" /></a>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top" style="padding-top:0px;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailBody" style="background-color:#FFFFFF; border-collapse:separate !important; border-radius:4px;">
                                        <tr>
                                            <td align="left" valign="top" class="bodyContent" style="color:#606060; font-family:Helvetica, Arial, sans-serif; font-size:15px; line-height:150%; padding-top:40px; padding-right:40px; padding-bottom:30px; padding-left:40px; text-align:left;">
                                               
												<p>Dear <b>'.$name.',</b></p>
<p>You have been referred by <b>'.$referee.'</b> to be associated with Acres N Inches Private Limited.</p><p>
In order to associate with us, you have to click on the inserted link to understand the terms and conditions of angagement and thereafter, enrol yourself.
<p> <a  href="'.$baseurl.'/amc.php?tid='.$tid.'">Click Here for Terms & condition of Engagement</p>
<p>Regards,
<p>Acresninches Private Limited </p>

												 
                                            </td>
                                        </tr>
                                        <tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>
                                        <tr>
                                            <td align="center" valign="middle" style="padding-right:40px; padding-bottom:40px; padding-left:40px;">
                                                <table border="0" cellpadding="0" cellspacing="0" class="emailButton" style="background-color:#6DC6DD; border-collapse:separate !important; border-radius:3px;">
                                                  
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            

                           
                                        
										
                                    </table>
                                </td>
                            </tr>

                            
                             <tr>
                            	<td align="center" valign="top">
                                 	<table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailFooter">
                                    	<tr>
                                        	<td align="center" valign="top" class="footerContent" style="color:#606060; font-family:Helvetica, Arial, sans-serif; font-size:10px; line-height:125%;"> <br>
                                          This e-mail and any files transmitted with it may contain confidential and privileged information are for the sole use of the intended recipient(s). If you are not the intended recipient please appraise the sender by reply e-mail and destroy all copies and the original message. The information contained in this e-mail including the attachment/of the content is being provided to you for the specific purpose of evaluation. No legal consequences can be derived of this e-mail. Any unauthorized disclosure, dissemination, forwarding, printing or copying of this email or any action taken on this e-mail is strictly prohibited and may be unlawful. The recipient acknowledges that Acres N Inches or its subsidiaries and associated companies, are unable to exercise control or ensure or guarantee the integrity of the contents of the information contained in e-mail transmissions and further acknowledges that any views expressed in this message are those of the individual senders and no binding nature of the message shall be implied or assumed unless the sender does so expressly with due authority of Acres N Inches.
                                                <br />
                                               
                                            </td>
                                        </tr>
                            <tr>
                                            <td style="padding-top:30px" valign="top" align="center">
                                                <a style="color:#0073e6;text-decoration:none" href="http://acresninches.com/" target="_blank" >acresninches.com</a>
                                            </td>
                                        </tr>
                        </table>
                        
                        </td>
                        </tr>
                        </table></body><html>';
						return $msg;	
}


function birthdaymail($name,$baseurl){
$msg='<body>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="background-color:#F2F2F2;">
            	<tr>
                	<td align="center" valign="top" id="bodyCell" style="padding:20px 20px;">
                    	<table border="0" cellpadding="0" cellspacing="0" id="emailContainer" style="width:700px;">
                        <tr>
                            	<td align="center" valign="top" bgcolor="#FFFFFF" style="padding-top:10px">
                                	<a  href="" target="_blank" title="Acresninches"  style="text-decoration: none; padding: 16px 20px; border-radius: 0px; margin: 20px 20px 0px; background: #FFF none repeat scroll 0px 0px; display: block;"><img src="'.$baseurl.'/img/logo.png" alt="Acreninches" height=""  class="logoImage" style=" border:0; color:#6DC6DD !important; font-family:Helvetica, Arial, sans-serif; font-size:60px; font-weight:bold; height:auto !important; letter-spacing:-4px; line-height:100%; outline:none; text-align:center; text-decoration:none;" /></a>
                                </td>
                            </tr>
                        	<tr>
                            	<td align="center" valign="top" bgcolor="#FFFFFF" style="padding-top:10px;">
                                	<a  href="" target="_blank" title="Acresninches"  style="text-decoration: none; padding: 16px 20px; border-radius: 0px; margin: 20px 20px 0px; background: #FFF none repeat scroll 0px 0px; display: block;background: url('.$baseurl.'/img/party.png);"><img src="'.$baseurl.'/img/happybday.png" alt="Happy Birthday" height=""  class="logoImage" style=" border:0; color:#6DC6DD !important; font-family:Helvetica, Arial, sans-serif; font-size:60px; font-weight:bold; height:auto !important; letter-spacing:-4px; line-height:100%; outline:none; text-align:center; text-decoration:none;" /></a>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top" style="padding-top:0px;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailBody" style="background-color:#FFFFFF; border-collapse:separate !important; border-radius:4px;">
                                        <tr>
                                            <td align="left" valign="top" class="bodyContent" style="color:#606060; font-family:Helvetica, Arial, sans-serif; font-size:15px; line-height:150%; padding-top:40px; padding-right:40px; padding-bottom:30px; padding-left:40px; text-align:left;">
                                               
												<p>Dear <b style="color:#06C;font-weight:bold;">'.$name.' !</b></p>
<p>Wish you a very happy birthday and a great journey ahead!<p>
Our prayers to the ALMIGHTLY to bless you with lots of happiness,good health and prosperity! Keep Shining ! 

<p>Best Regards,
<p style="font-weight:bold;">Team Acres N Inches</p>

												 
                                            </td>
                                        </tr>
                                        <tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>
                                        <tr>
                                            <td align="center" valign="middle" style="padding-right:40px; padding-bottom:40px; padding-left:40px;">
                                                <table border="0" cellpadding="0" cellspacing="0" class="emailButton" style="background-color:#6DC6DD; border-collapse:separate !important; border-radius:3px;">
                                                  
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            

                           
                                        
										
                                    </table>
                                </td>
                            </tr>

                            
                             <tr>
                            	<td align="center" valign="top">
                                 	<table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailFooter">
                                    	<tr>
                                        	<td align="center" valign="top" class="footerContent" style="color:#606060; font-family:Helvetica, Arial, sans-serif; font-size:10px; line-height:125%;"> <br>
                                          This e-mail and any files transmitted with it may contain confidential and privileged information are for the sole use of the intended recipient(s). If you are not the intended recipient please appraise the sender by reply e-mail and destroy all copies and the original message. The information contained in this e-mail including the attachment/of the content is being provided to you for the specific purpose of evaluation. No legal consequences can be derived of this e-mail. Any unauthorized disclosure, dissemination, forwarding, printing or copying of this email or any action taken on this e-mail is strictly prohibited and may be unlawful. The recipient acknowledges that Acres N Inches or its subsidiaries and associated companies, are unable to exercise control or ensure or guarantee the integrity of the contents of the information contained in e-mail transmissions and further acknowledges that any views expressed in this message are those of the individual senders and no binding nature of the message shall be implied or assumed unless the sender does so expressly with due authority of Acres N Inches.
                                                <br />
                                               
                                            </td>
                                        </tr>
                            <tr>
                                            <td style="padding-top:30px" valign="top" align="center">
                                                <a style="color:#0073e6;text-decoration:none" href="http://acresninches.com/" target="_blank" >acresninches.com</a>
                                            </td>
                                        </tr>
                        </table>
                        
                        </td>
                        </tr>
                        </table></body>';	
						return $msg;
}

function getTempAssocDetails($conn,$tid){
	//echo "SELECT `commision` FROM `crm_inv_payment_plan` WHERE `project_id`='$pid' and `payment_plan_master_id` ='$plan' and `floor_id`='$fid'  ";
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  * FROM `mlm_associate_detail_temp` WHERE  `associate_detail_id`='$tid'  ")); 
	return $ds2;
}


function checkTermofengagementdone($conn,$tid){
	
	//echo "SELECT count(*) as count FROM `mlm_associate_detail_new` where `tempid`='$tid'";
	//die;
	
	$tempArr=getTempAssocDetails($conn,$tid);
	$cnt=$tempArr['contact_no'];
	$pan=$tempArr['pan_no'];
	
	
			$ds=mysqli_query($conn,"SELECT count(*) as count FROM `mlm_associate_detail` where (`tempid`='$tid' or  `contact_no`='$cnt' or `pan_no`='$pan' ) and `blocked`='1'"); 
			$fetch=mysqli_fetch_assoc($ds);
			$mandatory=$fetch['count'];
			
			if($mandatory>0){
				return true;	
			}else{
				return false;	
			}	
}

function getassociatefewdetailsbyid($conn,$id){
	$ds=mysqli_query($conn,"SELECT mt.id as treeid, CONCAT(`first_name`,' ' , `middle_name`,' ' , `last_name`) AS name ,contact_no as mobileno,associate_code as code ,mad.rera_rk_approval as reraapproval FROM `mlm_associate_detail` mad inner join mlm_tree mt on mad.associate_detail_id=mt.associate_detail_id  where mad.`associate_detail_id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	
	return $ds1;
 
} 


function getassociatetreeidassccodebyid($conn,$id){
	$ds=mysqli_query($conn,"SELECT mt.id as treeid, CONCAT(`first_name`,' ' , `middle_name`,' ' , `last_name`) AS name ,mad.associate_code as code ,mad.associate_detail_id as mid FROM `mlm_associate_detail` mad inner join mlm_tree mt on mad.associate_detail_id=mt.associate_detail_id  where mt.`id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	
	return $ds1;
 
}
function checkIntrusion($sesid,$baseurl){
if($sesid=='' || $sesid=='NULL' || $sesid=='0' ){
header("location:".$baseurl."/index.php");	
}
	
}

function getBuilderSMSByQid($conn,$qid,$baseurl){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  * FROM `checknonavailability` WHERE  `id`='$qid'  ")); 
	 
	 
	$Query[]="Size between : ".$ds2['sizefrom']."-".$ds2['sizeto'];
	$Query[]="Floor between : ".$ds2['floorfrom']."-".$ds2['floorto'];
	$Query[]="Budget between : ".$ds2['budgetfrom']."-".$ds2['budgetto'];
	
	if($ds2['tower']==''){
		$Query[]="Any Tower";	
	}else{
		$Query[]="Tower: ".$tower;	
	}
	
	if($ds2['plan']==''){
		$Query[]="Any Plan";	
	}else{
		$Query[]="Plan ".$plan;	
	}
	$pid=$ds2['projectid'];
	$client=$ds2['client'];
	$qp=base64_encode($qid."-".$pid);
	
	 $approvalLink=$baseurl."/bqlogin.php?qid=".$qp."";
	  
	 $message="Query for : (".getProjectByTypeANdId($conn,$pid,2).") , -  ".implode(", ",$Query).", for Client : ". getLeadNameById($conn,$client)." Click To Reply ".$approvalLink."";
	  
	
	
	return $message;
}


function checkbuilderqueryreplyexists($conn,$qid){
	
	//echo "SELECT count(*) as count FROM `mlm_associate_detail_new` where `tempid`='$tid'";
	//die;
	//echo "SELECT count(*) as count FROM `builderqueryreply` where `qid`='$qid'";
			$ds=mysqli_query($conn,"SELECT count(*) as count FROM `builderqueryreply` where `qid`='$qid'"); 
			$fetch=mysqli_fetch_assoc($ds);
			$mandatory=$fetch['count'];
			
			if($mandatory>0){
				return true;	
			}else{
				return false;	
			}	
}

function getReplyToQuery($conn,$qid){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  * FROM `builderqueryreply` WHERE  `qid`='$qid'  ")); 
	 return $ds2['reply']; 
	 
	 
	 
}

function getQueryDetailsByQid($conn,$qid){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  * FROM `checknonavailability` WHERE  `id`='$qid'  ")); 
	 
	 
	$Query[]="Size between : ".$ds2['sizefrom']."-".$ds2['sizeto'];
	$Query[]="Floor between : ".$ds2['floorfrom']."-".$ds2['floorto'];
	$Query[]="Budget between : ".$ds2['budgetfrom']."-".$ds2['budgetto'];
	
	if($ds2['tower']==''){
		$Query[]="Any Tower";	
	}else{
		$Query[]="Tower: ".$tower;	
	}
	
	if($ds2['plan']==''){
		$Query[]="Any Plan";	
	}else{
		$Query[]="Plan ".$plan;	
	}
	$pid=$ds2['projectid'];
	$client=$ds2['client'];
	$qp=base64_encode($qid."-".$pid);
	
	// $approvalLink=$baseurl."/bqlogin.php?qid=".$qp."";
	  
	 $message="Query for : (".getProjectByTypeANdId($conn,$pid,2).") , -  ".implode(", ",$Query).", for Client : ". getLeadNameById($conn,$client)."";
	  
	
	
	return $message;
}

function getNonExcQueryDetailsByid($conn,$qid){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  * FROM `checknonavailability` WHERE  `id`='$qid'  ")); 
	 return $ds2;

}

function getProjectIdBYCsid($conn,$cid){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  * FROM `costsheet` WHERE  `id`='$cid'  ")); 
	 $qid= $ds2['qid']; 
	 $nonExAr=getNonExcQueryDetailsByid($conn,$qid);
	 $pid=$nonExAr['projectid'];
	 return $pid;
	 
}


function getNonHoldingCommission($conn,$arr,$hid,$cdisc){
	
//die;
$bonusFlag=0;
foreach($arr as $associds){
	
	
$i++;

if($i==1){

	$commPercentandindex=getCommissionPercentByAssociId($conn,$associds);
	$commPercent=$commPercentandindex[1];
	$index=$commPercentandindex[0];
	$assoc[$associds]=$commPercent."##1";
	
}else{
	 $newIndex=getAssociateDesignationIndexById($conn,$associds);
	
	if($newIndex < $index){
		 $commPercentandindex=getCommissionPercentByAssociId($conn,$associds);
		 $necommPercent=$commPercentandindex[1];
		 $commPercent=$commPercentandindex[1]-$commPercent;
		 $index=$commPercentandindex[0];
		 $assoc[$associds]=$commPercent."##1";
		 $commPercent=$necommPercent;	
		
	}else{
		
		$check=qualifyforbonus($conn,$arr,$associds,$bonusFlag);
		if($bonusFlag==0){
			if($check){
			$assoc[$associds]='5##2';	
			$bonusFlag=1;	
			}
		}
		
	}
	
	
	
}


}
	
//array_pop($assoc);
foreach($assoc as $ass=>$commpercent){
	$assid=$ass;
	$mlmArr=getMlmTreeDetailById($conn,$assid);
	$code=$mlmArr['code'];
	$desg_name=$mlmArr['desigination_id'];
	$desgArr=getDesignationDetailsByDesgName($conn,$desg_name);
	$desg_id=$desgArr['desigination_id'];
	$expComm=explode("##",$commpercent);
	$comm=$expComm[0];
	$type=$expComm[1];
	//echo "<br/>";
	mysqli_query($conn, "INSERT INTO `commission_on_nonholding` (`id`, `hold_id`, `assoc_tree_id`, `assoc_code`, `designation_id`, `designation_name`, `commpercent`,`type`) VALUES (NULL, '$hid', '$assid', '$code', '$desg_id', '$desg_name', '$comm','$type');");
	
}

//die;	
	
}	



function updateNonExcSale($conn,$arr,$saleid,$saledate){
	
	$wt=getWeightageBySaleId($conn,$saleid);
	
foreach($arr as $ets)
{
		$et=getAssociateIdByTreeId($conn,$ets);
	//	$asscidxxx=getAssociateIdByTreeId($conn,$ets);
		$cd=associatecodefromid($conn,$et);
	 
	 
	 $expnewsaledate=explode("-",$saledate);
	 $saleyear=$expnewsaledate[0]."-".$expnewsaledate[1];
	 
	 $ret ="SELECT * FROM total_sales WHERE `associate_detail_id` =$et";
	 $ret1=mysqli_query($conn,$ret);
if ($ret && mysqli_num_rows($ret1) > 0)

    {
		
	   	$update = "UPDATE total_sales SET total_sales = total_sales + ".$wt."  WHERE associate_detail_id=$et";	 
          
		$update1=mysqli_query($conn,$update);
		
		
		
    }
else
    {
		
        $sq="INSERT INTO `total_sales`(`associate_detail_id`,`associate_code`, `total_sales`, `individual_sale_nonex`) VALUES ($et,'$cd','$wt',0)";
        $re=mysqli_query($conn,$sq);
 
    }

 		$sq11="INSERT INTO `totalsaleeffect` (`id`, `sale_month`, `asscode`, `sale`,`saletype`) VALUES (NULL, '$saleyear', '$cd', '$saleid','2');";
        $re=mysqli_query($conn,$sq11);


	 $updates =mysqli_query($conn,"UPDATE total_sales SET individual_sale_nonex = individual_sale_nonex +1 WHERE associate_detail_id='$et'");	


}


	unset($arr);	

}

function MyListCount($conn,$aid){
	
	
	$childs=array();
	$ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT count(*) as count FROM `leads` where `postedby` ='$aid'")); 

	
	return $ds2['count'];	
	
	
}

function checktotalsaleexists($conn,$code){
	
			$ds=mysqli_query($conn,"SELECT count(*) as count FROM `total_sales` where `associate_code`='$code'"); 
			$fetch=mysqli_fetch_assoc($ds);
			$mandatory=$fetch['count'];
			
			if($mandatory>0){
				return true;	
			}else{
				return false;	
			}	
}

function getCoshsheetDetailsById($conn,$cid){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  * FROM `costsheet` WHERE  `id`='$cid'  ")); 
	 return $ds2;
	 
}

function getNonExcDocumentDetailsById($conn,$cid){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  * FROM `nonexcdetail` WHERE  `id`='$cid'  ")); 
	 return $ds2;
	 
}
function getExcDocumentDetailsById($conn,$cid){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  * FROM `excdetail` WHERE  `id`='$cid'  ")); 
	 return $ds2;
	 
}
function getYouTubeVideo($url){

parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
return $my_array_of_vars['v'];    
  // Output: C4kxS1ksqtw
	
}


function builderforgotpwd($baseurl,$name,$password){
	
$msg='<head>
	<title>New mail</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="background-color:#F2F2F2;">
            	<tr>
                	<td align="center" valign="top" id="bodyCell" style="padding:20px 20px;">
                    	<table border="0" cellpadding="0" cellspacing="0" id="emailContainer" style="width:700px;">
                        	<tr>
                            	<td align="center" valign="top" bgcolor="#FFFFFF" style="padding-top:10px">
                                	<a  href="" target="_blank" title="life apple"  style="text-decoration: none; padding: 16px 20px; border-radius: 0px; margin: 20px 20px 0px; background: #FFF none repeat scroll 0px 0px; display: block;"><img src="'.$baseurl.'/img/logo.png" alt="Acreninches" height=""  class="logoImage" style="width:220px; border:0; color:#6DC6DD !important; font-family:Helvetica, Arial, sans-serif; font-size:60px; font-weight:bold; height:auto !important; letter-spacing:-4px; line-height:100%; outline:none; text-align:center; text-decoration:none;" /></a>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top" style="padding-top:0px;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailBody" style="background-color:#FFFFFF; border-collapse:separate !important; border-radius:4px;">
                                        <tr>
                                            <td align="left" valign="top" class="bodyContent" style="color:#606060; font-family:Helvetica, Arial, sans-serif; font-size:15px; line-height:150%; padding-top:40px; padding-right:40px; padding-bottom:30px; padding-left:40px; text-align:left;">
                                               
												<p>Greeting <b>'.$name.',</b></p>
<p>Your Password  is '.$password.'</p>
<p>Best Regards</p>
<b>TEAM ANI</b></p>
												 
                                            </td>
                                        </tr>
                                       
                                       
                                    </table>
                                </td>
                            </tr>
                            

                           
                                        
										
                                    </table>
                                </td>
                            </tr>

                            
                             <tr>
                            	<td align="center" valign="top">
                                 	<table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailFooter">
                                    	<tr>
                                        	<td align="center" valign="top" class="footerContent" style="color:#606060; font-family:Helvetica, Arial, sans-serif; font-size:10px; line-height:125%;"> <br>
                                          This e-mail and any files transmitted with it may contain confidential and privileged information are for the sole use of the intended recipient(s). If you are not the intended recipient please appraise the sender by reply e-mail and destroy all copies and the original message. The information contained in this e-mail including the attachment/of the content is being provided to you for the specific purpose of evaluation. No legal consequences can be derived of this e-mail. Any unauthorized disclosure, dissemination, forwarding, printing or copying of this email or any action taken on this e-mail is strictly prohibited and may be unlawful. The recipient acknowledges that Acres N Inches or its subsidiaries and associated companies, are unable to exercise control or ensure or guarantee the integrity of the contents of the information contained in e-mail transmissions and further acknowledges that any views expressed in this message are those of the individual senders and no binding nature of the message shall be implied or assumed unless the sender does so expressly with due authority of Acres N Inches.
                                                <br />
                                               
                                            </td>
                                        </tr>
                            <tr>
                                            <td style="padding-top:30px" valign="top" align="center">
                                                <a style="color:#0073e6;text-decoration:none" href="http://acresninches.com/" target="_blank" >acresninches.com</a>
                                            </td>
                                        </tr>
                        </table>
                        
                        </td>
                        </tr>
                        </table></body><html>';
						return $msg;	
}


function getPlc($conn,$fid){
	//echo "SELECT * FROM `crm_inv_project_floor` where  `id`='$fid' and `status`='hold' and `holdedbycode`='$asscode' and `holdedbyid`='$assid'  ";die;
	$ds=mysqli_query($conn,"SELECT `plc_id` ,`short` FROM `crm_inv_project_plc` p inner join crm_inv_project_plc_master m on m.project_plc_master_id=p.plc_id where p.`floor_id`='$fid' and p.`plc_rate`!='0'"); 
	$ds1=mysqli_num_rows($ds);
	if($ds1>0){
		
		
		
	
	while($fetch34=mysqli_fetch_assoc($ds)){
		$rid[]=$fetch34['short'];
	
		
		
		
	}
		
		
	return implode(",",$rid);	
		
		
		
		
		
	}else{
		return "";
	}
}

function getNoOfTimesHeld($conn,$assoc,$floorid){
		 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  count(*) as count FROM `holdedinventory` WHERE  `associatecode`='$assoc' and `floor_id`='$floorid'  ")); 
	 return $ds2['count'];
	
}

function getProjectLoayoutByTypeAndId($conn,$type,$pid){
if($type==1){
	return "noimage.jpg";	
}else{
	$ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  content ,contenttype FROM `nonexcdetail` WHERE  `projid`='$pid' and `whichcontent`='4'  ")); 
	 return $ds2['content']."##".$ds2['contenttype'];
}
	
	
}
function createThumbNailold($oldname,$width,$height,$baseurl){

if($oldname==''){



$oldname='noimage.jpg';



}



if(!file_exists($baseurl."/docs/".$oldname)){


  $oldname='noimage.jpg';



 }else{

 }

 

 

 



$imgName=$width."_".$height."_".$oldname;



 







$newname = $baseurl."/thumb/". $imgName;





  if(!file_exists($newname)){



$thumbw = $width;



$thumbh = $height;



$nh = $thumbh;



$nw = $thumbw;



$size = getImageSize($baseurl."/docs/".$oldname);



$w = $size[0];



$h = $size[1];



$img_type=$size[2];



$ratio = $h / $w;



$nratio = $nh / $nw;







 if($ratio > $nratio)



 {



   $x = intval($w * $nh / $h);



   if ($x < $nw)



   {



     $nh = intval($h * $nw / $w);



   }



   else



   {



     $nw = $x;



   }



 }



 else



 {



   $x = intval($h * $nw / $w);



   if ($x < $nh)



   {



     $nw = intval($w * $nh / $h);



   }



   else



   {



     $nh = $x;



   }



 }  











//die($img_type);



switch($img_type) {



         case '1':



         $resimage = imagecreatefromgif($baseurl."/docs/".$oldname);



         break;



         case '2':



         $resimage = imagecreatefromjpeg($baseurl."/docs/".$oldname);



         break;



         case '3':



         $resimage = imagecreatefrompng($baseurl."/docs/".$oldname);



         break;



     }







 //$resimage = imagecreatefromjpeg($oldname);



 $newimage = imagecreatetruecolor($nw, $nh);  



 // use alternate function if not installed



 imageCopyResampled($newimage, $resimage,0,0,0,0,$nw, $nh, $w, $h);



 



 // Making the final cropped thumbnail



 



 $viewimage = imagecreatetruecolor($thumbw, $thumbh);



 imagecopy($viewimage, $newimage, 0, 0, 0, 0, $nw, $nh);



 



 // saving



 imagejpeg($viewimage, $newname, 85);







return $imgName;

  }else{

return $imgName;  

}

}


function getProjectAddressByTypeAndId($conn,$type,$pid){
if($type==1){
	$ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  address   FROM `crm_inv_project` WHERE  `project_id`='$pid'   ")); 
	 return $ds2['address'];
	
}else{
	$ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  address  FROM `nonexsubprojects` WHERE  `id`='$pid'  ")); 
	 return $ds2['address'];
}
	
	
}


function getProjectLocationByTypeAndId($conn,$type,$pid){
if($type==1){
	$ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  map   FROM `crm_inv_project` WHERE  `project_id`='$pid'   ")); 
	 $map=str_replace("width=600","width=200",$ds2['map']);
	 $map=str_replace("width=450","height=250",$map);
	
}else{
	$ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  map  FROM `nonexsubprojects` WHERE  `id`='$pid'  ")); 
	  $map=str_replace("width=600","width=200",$ds2['map']);
	 $map=str_replace("width=450","height=250",$map);
}
	
	return $map;
}
function getProjectDetailsByTypeAndId($conn,$type,$pid){
if($type==1){
	$ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  *   FROM `crm_inv_project` WHERE  `project_id`='$pid'   ")); 
}else{
	$ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  *  FROM `nonexsubprojects` WHERE  `id`='$pid'  ")); 
}
	 return $ds2;
}


function inventoryviewed($conn,$fid,$aid){
	$pdate=date("Y-m-d");
	$ptime=date("h:i a");
mysqli_query($conn,"INSERT INTO `inventoryviewed` (`id`, `fid`, `assoc_id`, `pdate`, `ptime`) VALUES (NULL, '$fid', '$aid', '$pdate', '$ptime'); ")	;
	
}

function projectviewed($conn,$type,$pid){
	$pdate=date("Y-m-d");
	$ptime=date("h:i a");
	
	$assoc=mysqli_fetch_assoc(mysqli_query($conn,"select count(*) as count from `microinterested` where `type`='$type' and `pid`='$pid' "));
	return $assoc['count'];
	
}
/*function getHoldedCustomerDetailsById($conn,$cid){
	$ds=mysqli_query($conn,"SELECT * FROM `crm_inv_customer_detail` where  `customer_detail_id`='$cid'  "); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;	
}
*/
function getHoldedInventoryStatusById($conn,$cid){
	$ds=mysqli_query($conn,"SELECT `holdstatus` FROM `holdedinventory` where  `id`='$cid'  "); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['holdstatus'];	
}
function getSaleDateFromHid($conn,$id){
	$ds=mysqli_query($conn,"SELECT `date-of-sale` as date FROM `crm_sales_details_new` where `hid`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	
	return $ds1['date'];
 
} 

function myworksheets($conn,$aid){
	
	
	$childs=array();
	$ds2=mysqli_query($conn,"SELECT `id` FROM `leads` where `postedby` ='$aid'"); 

	while($fetch=mysqli_fetch_array($ds2)){
		      $childs[]=$fetch['id'];
				
		}
	return $childs;	
	
	
}

function myTeamworksheets($conn,$associds){
	
	
	$childs=array();
	$ds2=mysqli_query($conn,"SELECT `id` FROM `leads` where `postedby` in (".implode(',',$associds).")"); 

	while($fetch=mysqli_fetch_array($ds2)){
		      $childs[]=$fetch['id'];
				
		}
	return $childs;	
	
	
}


function myclientlist($conn,$aid){
	$childs=array();
	$code=associatecodefromid($conn,$aid);
	$ds2=mysqli_query($conn,"SELECT `id` FROM `clientsnew` where `associtecode` ='$code'"); 

	while($fetch=mysqli_fetch_array($ds2)){
		      $childs[]=$fetch['id'];
		}
	return $childs;	
}

function myTeamclientlist($conn,$associds){
	$childs=array();
	//$code=associatecodefromid($conn,$aid);
	$ds2=mysqli_query($conn,"SELECT `id` FROM `clientsnew` where `aid` IN (".implode(',',$associds).")"); 

	while($fetch=mysqli_fetch_array($ds2)){
		      $childs[]=$fetch['id'];
		}
	return $childs;	
}

function myclientMobilelist($conn,$aid){
	
	
	$childs=array();
	$code=associatecodefromid($conn,$aid);
	//echo "SELECT `mobile` FROM `clientsnew` where `associatecode` ='$code'";
	$ds2=mysqli_query($conn,"SELECT `mobile` FROM `clientsnew` where `associtecode` ='$code'"); 

	while($fetch=mysqli_fetch_array($ds2)){
		
		      $rmobile=preg_replace("/[^0-9]+/", "", $fetch['mobile']);
		      $childs[]="91".$rmobile;
		
		
		
		     // $childs[]="'".'91'.$fetch['mobile']."'";
				
		}
	return $childs;	
	
	
}


function myTeamclientMobilelist($conn,$assocArr){
	
	
	$childs=array();
	
	if(count($assocArr)>0){
		$impIds=implode(",",$assocArr);	
	}else{
		$impIds=0;
	}
	
	//$code=associatecodefromid($conn,$aid);
	//echo "SELECT `mobile` FROM `clientsnew` where `associatecode` ='$code'";
	$ds2=mysqli_query($conn,"SELECT `mobile` FROM `clientsnew` where `aid` IN ($impIds)"); 

	while($fetch=mysqli_fetch_array($ds2)){
		      $childs[]='91'.$fetch['mobile'];
				
		}
	return $childs;	
	
	
}


function myclientlistcount($conn,$aid){
	
	
	$childs=array();
	$code=associatecodefromid($conn,$aid);
	$ds2=mysqli_query($conn,"SELECT sc.`smsid` as smsid FROM `clientsnew` cn inner join `smsclicks` sc on cn.id=sc.userid where `cn`.aid='$aid'  and sc.type=1"); 

	while($fetch=mysqli_fetch_array($ds2)){
		      $childs[]=$fetch['smsid'];
				
		}
	return $childs;	
	
	
}

function myworksheetssmscount($conn,$aid){
	
	$childs=array();
	$ds2=mysqli_query($conn,"SELECT sc.`smsid` as smsid FROM `leads` ld inner join `smsclicks` sc on ld.id=sc.userid where `ld`.postedby='$aid'  and sc.type=2"); 

	while($fetch=mysqli_fetch_array($ds2)){
		      $childs[]=$fetch['smsid'];
				
		}
	return $childs;	
	
	
}

function myteamworksheetssmscount($conn,$impids){
	
	
	$childs=array();
	
	//echo "SELECT sc.`smsid` as smsid FROM `leads` ld inner join `smsclicks` sc on ld.id=sc.userid where `ld`.postedby in ($impids)  and sc.type=2";
	$ds2=mysqli_query($conn,"SELECT sc.`smsid` as smsid FROM `leads` ld inner join `smsclicks` sc on ld.id=sc.userid where `ld`.id in ($impids)  and sc.type=2"); 

	while($fetch=mysqli_fetch_array($ds2)){
		      $childs[]=$fetch['smsid'];
				
		}
	return $childs;	
	
	
}


function myteamworksheetssmsclickreport($conn,$impids,$smsid){
	
	
	$childs=array();
	
	//echo "SELECT sc.`smsid` as smsid FROM `leads` ld inner join `smsclicks` sc on ld.id=sc.userid where `ld`.postedby in ($impids)  and sc.type=2";
	$ds2=mysqli_query($conn,"SELECT ld.`name` as name FROM `leads` ld inner join `smsclicks` sc on ld.id=sc.userid where `ld`.id in ($impids)  and sc.type=2 and sc.smsid='$smsid'"); 

	while($fetch=mysqli_fetch_array($ds2)){
		      $childs[]=$fetch['name'];
				
		}
	return $childs;	
	
	
}


function myworksheetsdeliverycount($conn,$aid){
	
	
	$childs=array();
	$ds2=mysqli_query($conn,"SELECT sc.`smsid` as smsid FROM `leads` ld inner join `smsdelivered` sc on ld.'91'.contact_no=sc.mobile where `ld`.postedby='$aid' "); 

	while($fetch=mysqli_fetch_array($ds2)){
		      $childs[]=$fetch['smsid'];
				
		}
	return $childs;	
	
	
}

function getLeadCountBeforeDate($conn,$date,$associd){
   $curDate=date("Y-m-d");
  
	$ds=mysqli_fetch_assoc(mysqli_query($conn,"SELECT count(*) as count FROM `leads` where   `postedby`='$associd' and `pdate` <= '$date'  "));
	return $ds['count'];
		
   }

function getSMSPostedDate($conn,$smsid){
	
	$ds=mysqli_query($conn,"SELECT `pdate` as date from `smstoshoot` where `id`='$smsid' "); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['date'];
}


function getSMSDetailById($conn,$smsid){
	
	$ds=mysqli_query($conn,"SELECT `sms`  from `smstoshoot` where `id`='$smsid' "); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['sms'];
}

function getLeadNameFromMobile($conn,$id,$mobile){
	//echo "SELECT `name` FROM `leads` where `postedby`='$id' and `contact_no`='$mobile'";
	$mobile=substr($mobile,2);
	$ds=mysqli_query($conn,"SELECT `name` FROM `leads` where `postedby`='$id' and `contact_no`='$mobile'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['name'];
 
} 

function getTeamLeadNameFromMobile($conn,$mobile){
	//echo "SELECT `name` FROM `leads` where `postedby`='$id' and `contact_no`='$mobile'";
	$mobile=substr($mobile,2);
	$ds=mysqli_query($conn,"SELECT `name` FROM `leads` where 1 and `contact_no`='$mobile'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['name'];
 
}
function getNonExcSlugById($conn,$id){
	
	$ds=mysqli_query($conn,"SELECT `slug` as name from `nonexprojects` where `id`='$id' "); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['name'];
}
function getNonExcProjectNameById($conn,$id){
	
	$ds=mysqli_query($conn,"SELECT `name` as name from `nonexprojects` where `id`='$id' "); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['name'];
}
function getNonExcProjectDetailById($conn,$id){
	
	$ds=mysqli_query($conn,"SELECT *  from `nonexprojects` where `id`='$id' "); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}
function updatelogs($conn,$pageid,$buid,$pid,$btype,$ptype=2){
	$pdate=date("Y-m-d");
	$ptime=date("h:i a");
	$ds=mysqli_query($conn,"INSERT INTO `builderlogs` (`id`, `pageid`, `updatedby`, `projectid`, `pdate`, `ptime`, `status`, `updatetype`,`projecttype`) VALUES (NULL, '$pageid', '$buid', '$pid', '$pdate', '$ptime', '1', '$btype','$ptype') "); 
	
	
	
			if($btype==1){
				$updatedtext="Builder";	
			}else{
				$updatedtext="Operations (ANI)";	
			}
		    $project=getProjectByTypeANdId($conn,$buid,$ptype);
			$text=$project." - ".getPageNameById($conn,$pageid)." has been updated by $updatedtext";
			postdata('9953964123',$text);
			postdata('8860813845',$text);
}

function getPageNameById($conn,$id){
	
	$ds=mysqli_query($conn,"SELECT `page` as name from `builderpages` where `id`='$id' "); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['name'];
}

function getgstratesdetailbyid($conn,$id){
	
	/*$ds=mysqli_query($conn,"SELECT *  from `gstrates` where `id`='$id' "); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;*/
}

function getBuilderRedirectPage($conn,$pid){
	$ds=mysqli_query($conn,"SELECT `redirect`  from `builderpages` where `id`='$pid' "); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['redirect'];
}




function sendBuilderAppMsg($conn,$baseurl,$pid,$pageid){
 
	
	  $pageName=getPageNameById($conn,$pageid);
	  $qid=base64_encode($pageid."-".$pid);
	  $link= $baseurl."/ablog.php?qid=".$qid."";
	  $sms= $pageName." has been updated by Operations Team(ANI). Click ".$link."  to view details."; 
  return $sms;
	 // postdata($mobile,$sms); // this is sms to customer 
}

function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise ;
}


function getUnitDescriptionNameById($conn,$pid){
	$ds=mysqli_query($conn,"SELECT `name`  from `unitdescmaster` where `id`='$pid' "); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['name'];

}


function getPropertyTypeNameById($conn,$pid){
	$ds=mysqli_query($conn,"SELECT `name`  from `propertytype` where `id`='$pid' "); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['name'];
}
function getLeadStatusById($conn,$type){
   $curDate=date("Y-m-d");
   if($type==1){
		return "Followup";
	}
	if($type==2){
		return "Finalized";
	}
	if($type==3){
		return "Not Interested";
	}
	
	if($type==4){
		return "Meeting";
	}
	if($type==5){
		return "Site Visit";
	}
	if($type==6){
		return "Post Site Visit Followup";
	}
	if($type==7){
		return "Refer";
	}
	
	
 
} 

function getWeightageByProjectId($conn,$pid){
	$ds=mysqli_query($conn,"SELECT `weightage`  from `nonexsubprojects` where `id`='$pid' "); 
	$ds1=mysqli_fetch_assoc($ds);
	return  $ds1['weightage'];
}


function getWeightageBySaleId($conn,$saleid){
	$ds=mysqli_query($conn,"SELECT `projectid`  from `costsheet` where `id`='$saleid' "); 
	$ds1=mysqli_fetch_assoc($ds);
	$pid= $ds1['projectid'];
	$wt=getWeightageByProjectId($conn,$pid);
	return $wt;
	
}

function getProjectCLickedBySMSIdANdType($conn,$userid,$smsid,$type){
	
	$childs=array();
	$project=array();
//echo "SELECT  `pid`,`ptype` from microinterested where `smsid`='$smsid' ,`type`='$type',`userid`='$userid'";
	$ds2=mysqli_query($conn,"SELECT  `pid`,`ptype` from microinterested where `smsid`='$smsid' and `type`='$type' and `userid`='$userid'"); 

	while($fetch=mysqli_fetch_array($ds2)){
		//echo $fetch['pid']."#".$fetch['ptype'];
		     if($fetch['pid']!=''){
		      $childs[]=$fetch['pid']."#".$fetch['ptype'];
			 }
				
		}
	if(count($childs)>0){
		foreach($childs as $child){
			$expArr=explode("#",$child);
			$pid=$expArr[0];
			$type=$expArr[1];	
			$project[]=getProjectByTypeANdId($conn,$pid,$type);
		}
		$projectNew=array_unique($project);
		
		return "<b style='color:red'>".implode(", ",$projectNew)."<b>";
	}else{
	 return "- - -";	
	}
		
		
}
function getClientsDetailById($conn,$id){
	$ds=mysqli_query($conn,"SELECT *  from `clientsnew` where `id`='$id' "); 
	$ds1=mysqli_fetch_assoc($ds);
	return  $ds1;
}

function getClientsNameANdMobileById($conn,$id){
	$ds=mysqli_query($conn,"SELECT `name`,`mobile`,`aid` as aid  from `clientsnew` where `id`='$id' "); 
	$ds1=mysqli_fetch_assoc($ds);
	return  $ds1;
}


function getClientsAssocaiteById($conn,$id){
	$ds=mysqli_query($conn,"SELECT `aid`  from `clientsnew` where `id`='$id' "); 
	$ds1=mysqli_fetch_assoc($ds);
	return  $ds1['aid'];
}



function getClientsNameById($conn,$id){
	$ds=mysqli_query($conn,"SELECT `name`  from `clientsnew` where `id`='$id' "); 
	$ds1=mysqli_fetch_assoc($ds);
	return  $ds1['name'];
}

function getClientNameBYIdANdType($conn,$uid,$type){
if($type==1){
	$name=getClientsNameANdMobileById($conn,$uid);	
}
if($type==2){
	$name=getLeadNameANdMobileById($conn,$uid);	
}

if($type==3){
	$name=associatenameandmobilefromid($conn,$uid);	
}
	return $name;
}


function getAssociateIdBYIdANdType($conn,$uid,$type){
if($type==1){
	$name=getClientsAssocaiteById($conn,$uid);	
}
if($type==2){
	$name=getLeadAssociateById($conn,$uid);	
}

if($type==3){
	$name=$uid;	
}
	return $name;
}



function getFeedBackDetailById($conn,$loc,$bud,$unit){
	if($loc!=''){
		$exploc=explode(",",$loc);	
	}
	
	if($bud!=''){
		$expbud=explode(",",$bud);	
	}
	
	if($unit!=''){
		$expunit=explode(",",$unit);	
		
	}
	
}

function getClientAssocWrkType($type){
	if($type==1){
		return "Client";	
	}
	if($type==2){
		return "Worksheet";	
	}
	if($type==3){
		return "Associate";	
	}
	
	
}

function getProjectViewedByIdANdType($conn,$userid,$type){
	
	$childs=array();
	$project=array();
//echo "SELECT  `pid`,`ptype` from microinterested where `smsid`='$smsid' ,`type`='$type',`userid`='$userid'";
	$ds2=mysqli_query($conn,"SELECT  `pid`,`ptype` from microinterested where  `type`='$type' and `userid`='$userid'"); 

	while($fetch=mysqli_fetch_array($ds2)){
		//echo $fetch['pid']."#".$fetch['ptype'];
		     if($fetch['pid']!=''){
		      $childs[]=$fetch['pid']."#".$fetch['ptype'];
			 }
				
		}
	if(count($childs)>0){
		foreach($childs as $child){
			$expArr=explode("#",$child);
			$pid=$expArr[0];
			$type=$expArr[1];	
			$project[]=getProjectByTypeANdId($conn,$pid,$type);
		}
		$projectNew=array_unique($project);
		
		return "<b style='color:green'>".implode(", ",$projectNew)."<b>";
	}else{
	 return "- - -";	
	}
}


function getUserPreferenceByIdANdType($conn,$userid,$type){
	
	$childs=array();
	$project=array();
//echo "SELECT  `pid`,`ptype` from microinterested where `smsid`='$smsid' ,`type`='$type',`userid`='$userid'";
	$ds2=mysqli_query($conn,"SELECT  `ploc`,`pbud`,`punit` from anifeedback where  `type`='$type' and `userid`='$userid' order by `id` desc limit 0,1 "); 

	while($fetch=mysqli_fetch_array($ds2)){
		//echo $fetch['pid']."#".$fetch['ptype'];
		     
				$plocs=$fetch['ploc'];
				$pbud=$fetch['pbud'];
				$punit=$fetch['punit'];
			
		}
		
		
	return $plocs."#".$pbud."#".$punit;
}

function getBudgetMaster($conn){
	$ds2=mysqli_query($conn,"SELECT  * from `budgetmaster` where `status`='1'"); 

	while($fetch=mysqli_fetch_array($ds2)){
	  		$id=$fetch['id'];
			$name=$fetch['name'];
			$budget[$id]=$name;
		     
		}
		
		return $budget;
}
function getUnitMaster($conn){
	$ds2=mysqli_query($conn,"SELECT  * from `unitdescmaster` where `status`='1'"); 

	while($fetch=mysqli_fetch_array($ds2)){
	  		$id=$fetch['id'];
			$name=$fetch['name'];
			$budget[$id]=$name;
		     
		}
		
		return $budget;
}
function getLocationtMaster($conn){
	$ds2=mysqli_query($conn,"SELECT  * from `locationmaster` where `status`='1'"); 

	while($fetch=mysqli_fetch_array($ds2)){
	  		$id=$fetch['id'];
			$name=$fetch['name'];
			$budget[$id]=$name;
		     
		}
		
		return $budget;
}

function getExclusiveandnonexclusiveprojectlist($conn){
	$projects=array();
	$ds2=mysqli_query($conn,"SELECT  * from `nonexsubprojects` where `status`='1'"); 

	while($fetch=mysqli_fetch_array($ds2)){
	  		
			$projects[]='"'.$fetch['name'].'"';
			
		     
		}
		
		$ds2=mysqli_query($conn,"SELECT  * from `crm_inv_project` where `status`='1'"); 

	while($fetch=mysqli_fetch_array($ds2)){
	  		
			$projects[]='"'.$fetch['project_name'].'"';
			
		     
		}
		
		return implode(",",$projects);
}
function getExclusiveandnonexclusiveprojectlistAr($conn){
	$projects=array();
	
		
		$ds2=mysqli_query($conn,"SELECT  * from `crm_inv_project` where `status`='1' order by  `project_name` asc"); 

	while($fetch=mysqli_fetch_array($ds2)){
	  		
			$projects[]=$fetch['project_name'];
			
		     
		}
		
		$ds21=mysqli_query($conn,"SELECT  * from `nonexsubprojects` where `status`='1' order by  `name` asc"); 

	while($fetch=mysqli_fetch_array($ds21)){
	  		
			$projects[]=$fetch['name'];
			
		     
		}
		
		return $projects;
}

function hoursRange( $lower = 0, $upper = 86400, $step = 1800, $format = '' ) {
    $times = array();

    if ( empty( $format ) ) {
        $format = 'g:i a';
    }

    foreach ( range( $lower, $upper, $step ) as $increment ) {
        $increment = gmdate( 'H:i', $increment );

        list( $hour, $minutes ) = explode( ':', $increment );

        $date = new DateTime( $hour . ':' . $minutes );

        $times[(string) $increment] = $date->format( $format );
    }

    return $times;
}

function getCancelledSaleStatus($conn){
	
	 $holded=array();
	// echo "SELECT * FROM `crm_inv_customer_detail` where  `team_head_code`='$assocode'";
	// $ds2=mysqli_query($conn,"SELECT * FROM `holdedinventory` where  `holdstatus`='1' and `approval`='1' and `oprapproval`='1'  "); 
	 
	 

	 $ds2=mysqli_query($conn,"SELECT `hid` FROM `crm_sales_details_new` where  `salesstatus`='0'  and `date-of-sale` > '2018-01-01' and `hid`!='0'  order by `sales_details_id` desc   "); 

	while($fetch=mysqli_fetch_array($ds2)){
			
				$holded[]=$fetch['id'];	
			
			
			
			
		}
		//return $error;		
	return 	$holded;
}


function updateSaleonconversation($conn,$saleid){
		  $result=mysqli_query($conn,"SELECT * FROM `crm_sales_details_new` WHERE  `sales_details_id` = '$saleid' ORDER BY `date-of-sale` ");
		while ($row = mysqli_fetch_assoc($result))
			 { 
				$ids=associateidfromcode($conn,$row['associatecode']);
				$saleid=$row['sales_details_id'];
				$date0fsale=explode("-",$row['date-of-sale']);
				$month=$date0fsale[1]."-".$date0fsale[0];
				$arr = array();  
				$parent = 1;
				$i=0;
			
		while($parent != 0 || $parent != '')
			{
				if($i == 0)
				{
				
				$tid = associateidfromcode($conn,$row['associatecode']);
				 $id=getTreeIdByAssociateId($conn,$tid);
				
				$arr[0] =$id;
				$i++;
				}
				else
				{ 
				$id = $parent;
				$i++;
				}
				
				
			
			
			 $aresult ="SELECT id,parent,desigination_id FROM `mlm_tree` where id=$id" ;
			
			$result2=mysqli_query($conn,$aresult);
			$row1=mysqli_fetch_array($result2);
				$parent = $row1['parent'];
				if($parent == 0)
				break;
				 $arr[$i] = $row1['parent'];
				 $desigination_id=$row1['desigination_id'];
				
			}
		foreach($arr as $ets)
		{
				$et=getAssociateIdByTreeId($conn,$ets);
			 $ret ="SELECT * FROM total_sales WHERE `associate_detail_id` =$et";
			$ret1=mysqli_query($conn,$ret);
		if ($ret && mysqli_num_rows($ret1) > 0)
		
			{ 
				
					$update = "UPDATE total_sales SET total_sales = total_sales +1 WHERE associate_detail_id=$et";	 
				
				$update1=mysqli_query($conn,$update);
				$asscidxxx=getAssociateIdByTreeId($conn,$ets);
				$cd=associatecodefromid($conn,$asscidxxx);
			}
		else
			{
				$asscid=getAssociateIdByTreeId($conn,$ets);
				$cd=associatecodefromid($conn,$asscid);
				 $sq="INSERT INTO `total_sales`(`associate_detail_id`,`associate_code`, `total_sales`, `individual_sale`) VALUES ($et,'$cd',1,0)";
				$re=mysqli_query($conn,$sq);
			}
				 $sq11="INSERT INTO `totalsaleeffect` (`id`, `sale_month`, `asscode`, `sale`) VALUES (NULL, '$month', '$cd', '$saleid');";
				$re=mysqli_query($conn,$sq11);
		}
		
	   $updates =mysqli_query($conn,"UPDATE total_sales SET individual_sale = individual_sale +1 WHERE associate_detail_id='$ids'");	
		
		unset($arr);	
		}
			
			
}

function getQualifiedArray($conn){
	$holded=array();
	$ds2=mysqli_query($conn,"SELECT `associate_detail_id` FROM `mlm_associate_detail` where  `qualified`='1'  and `qsmssent`='0'  "); 
	while($fetch=mysqli_fetch_array($ds2)){
			
				$holded[]=$fetch['associate_detail_id'];	
		}
	return 	$holded;
}

function mychildsCodesNew($conn,$aid){
	$childs=array();
	 $ds2=mysqli_query($conn,"SELECT p.`self` ,md.associate_code  FROM `parents` p inner join `mlm_tree` mt on mt.id=p.self inner join mlm_associate_detail md on md.associate_detail_id=mt.associate_detail_id where p.`parent`='$aid'   "); 

	while($fetch=mysqli_fetch_array($ds2)){
			$aids=$fetch['associate_code'];
			
			
				$childs[]=$aids;
		}
		return $childs;
}

function checkNonexExistsGstRates($conn,$pid){
	$ds=mysqli_query($conn,"SELECT count(*) as count FROM `gstrates` where `subprojectid`='$pid' and `subprojecttype`='2' "); 
	$ds1=mysqli_fetch_assoc($ds);
	if(  ($ds1['count']=='0') || ($ds1['count']=='NULL')){
		return false;	
	}else{
		return true;	
	}
}

function getlocationmasterbyid($conn,$id){
	//echo "SELECT * FROM `mlm_associate_detail` where `associate_code`='$code'";
	$ds=mysqli_query($conn,"SELECT `name` FROM `locationmaster` where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['name'];
 
} 


function getpropertytypemasterbyid($conn,$id){
	//echo "SELECT * FROM `mlm_associate_detail` where `associate_code`='$code'";
	$ds=mysqli_query($conn,"SELECT `name` FROM `propertytype` where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['name'];
 
} 

/*Start skypark function*/


function getSkyParkTowerNameById($conn,$id){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  `name` FROM `skyparktower` WHERE  `id`='$id'  ")); 
	 return $ds2['name']; 
}

function updateSkyParkInvStage($conn,$invid,$stage,$by,$clientname){
	$pdate=date("Y-m-d");
	$ptime=date("h:i a");
	
mysqli_query($conn,"INSERT INTO `skyparkinventorylog` (`id`, `inv_id`, `stage`, `pdate`, `ptime`, `postedby`,`clientname`) VALUES (NULL, '$invid', '$stage', '$pdate', '$ptime', '$by' , '$clientname');");	
}

function updateSkyParkInvStageall($conn,$invid,$stage,$by,$clientname,$clientpan,$chequeno,$chequeamt, $chequedate,$bankname){
	$pdate=date("Y-m-d");
	$ptime=date("h:i a");
	
mysqli_query($conn,"INSERT INTO `skyparkinventorylog` (`id`, `inv_id`, `stage`, `pdate`, `ptime`, `postedby`,`clientname`,`clientpan`, `chequeno`, `chequeamt`, `chequedate`, `bankname`) VALUES (NULL, '$invid', '$stage', '$pdate', '$ptime', '$by' , '$clientname' , '$clientpan' , '$chequeno' , '$chequeamt' , '$chequedate' , '$bankname');");	
}

function skypark_holddata($conn){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT count(`id`) as hold FROM `non_invskypark_new` WHERE `invstatus`=2")); 
	 return $ds2['hold'];
}

function skypark_solddata($conn){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT count(`id`) as sold FROM `non_invskypark_new` WHERE `invstatus`=3")); 
	 return $ds2['sold']; 
}

function getstatusskyparkinventory($conn,$id){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  * FROM `non_invskypark_new` WHERE  `id`='$id'")); 
	 return $ds2; 
}

/*end skypark function*/


function getParkingChargeByPid($conn,$pid){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  `price` FROM `projectcarparkings` WHERE  `pid`='$pid' and `active`='1' and `selectedparking`='1'  ")); 
	 return $ds2['price']; 
}
function getSkyParkUnitAddressById($conn,$id){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  `unitaddress` FROM `non_invskypark_new` WHERE  `id`='$id'  ")); 
	 return $ds2['unitaddress']; 
}

function updatecancellbooking($conn,$bid,$aid){
	$pdate=date("Y-m-d");
	$ptime=date("h:i a");
	
	 mysqli_query($conn,"INSERT INTO `updatecancelbooking` (`id`, `bid`, `cancelledby`, `cancelleddate`, `cancelledtime`) VALUES (NULL, '$bid', '$aid', '$pdate', '$ptime'); "); 
}

function getTypeDetail($type){
	if($type==1) return "Client";
	if($type==2) return "Worksheet";
	if($type==3) return "Associate";	
}


function getExclNonexclusiveprojectlist($conn,$val){
	$projects=array();

	if($val==2){
			$ds2=mysqli_query($conn,"SELECT  * from `nonexsubprojects` where `status`='1'"); 
	while($fetch=mysqli_fetch_array($ds2)){
	  		$id=$fetch['id'];
			$projects[$id]=$fetch['name'];
		}
	}
	
	if($val==1){
		$ds2=mysqli_query($conn,"SELECT  * from `crm_inv_project` where `status`='1'"); 

	while($fetch=mysqli_fetch_array($ds2)){
	  		$id=$fetch['project_id'];
			$projects[$id]=$fetch['project_name'];
			
		     
		}
	}
		
		return $projects;
}


function getNonExPaymentPlanMaster($conn){
	$projects=array();

	
			$ds2=mysqli_query($conn,"SELECT  * from `non_paymentplan_master` where `status`='1' "); 
	while($fetch=mysqli_fetch_array($ds2)){
	  		$id=$fetch['id'];
			$projects[$id]=$fetch['name'];
		}
	
	
	
		
		return $projects;
}

function getBBARoasterDetailById($conn,$id){
	//echo "SELECT * FROM `seminars` where `id`='$id'";
	$ds=mysqli_query($conn,"SELECT * FROM `bbaroaster` where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}
function getNonPaymentPlanRoasterDetailById($conn,$id){
	//echo "SELECT * FROM `seminars` where `id`='$id'";
	$ds=mysqli_query($conn,"SELECT * FROM `nonpaymentplanroaster` where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}

function getNonexPaymentPlanNameBYId($conn,$id){
	//echo "SELECT * FROM `seminars` where `id`='$id'";
	$ds=mysqli_query($conn,"SELECT * FROM `non_paymentplan_master` where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['name'];
}
function getNonextowermasterbyId($conn,$id){
	//echo "SELECT * FROM `seminars` where `id`='$id'";
	$ds=mysqli_query($conn,"SELECT * FROM `nonex_tower_master` WHERE `id`=$id And `status`=1 And `view`=1"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}
function getremarkconstruction_towerbyId($conn,$id){
	//echo "SELECT * FROM `seminars` where `id`='$id'";
	$ds=mysqli_query($conn,"SELECT * FROM `construction_tower` WHERE `id`=$id And `status`=1 And `view`=1"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1["remark"];
}

function getSaleIdByHid($conn,$id){
	//echo "SELECT * FROM `seminars` where `id`='$id'";
	
//	echo "SELECT `id` FROM `crm_sales_details_new` WHERE `hid`='$id' and `salestatus`='1' ";die;
	$ds=mysqli_query($conn,"SELECT `sales_details_id` FROM `crm_sales_details_new` WHERE `hid`='$id' and `salesstatus`='1' "); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1["sales_details_id"];
}

function getBuilderReceiptDetailsById($conn,$id){
	//echo "SELECT * FROM `seminars` where `id`='$id'";
	$ds=mysqli_query($conn,"SELECT * FROM `builderreceipts` WHERE `id`=$id"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}
function getConstructionRemarkById($conn,$id){
	//echo "SELECT * FROM `seminars` where `id`='$id'";
	$ds=mysqli_query($conn,"SELECT `remark` FROM `construction_tower` WHERE `id`=$id"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['remark'];
}

/*check payment plan*/

function check_paymentplan($conn,$name){
	//echo "SELECT * FROM `seminars` where `id`='$id'";
	$ds=mysqli_query($conn,"SELECT * FROM `non_paymentplan_master` WHERE `name`='".strtoupper($name)."'"); 
	if(mysqli_num_rows($ds) > 0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

/*after update*/
function checkupdate_paymentplan($conn,$id,$name){
	//echo "SELECT * FROM `seminars` where `id`='$id'";
	$ds=mysqli_query($conn,"SELECT * FROM `non_paymentplan_master` WHERE `name`='".strtoupper($name)."' AND `id`!=$id"); 
	if(mysqli_num_rows($ds) > 0)
	{
		return false;
	}
	else
	{
		return true;
	}
}


/*end check payment plan*/
/*get payment plan id using nonpaymentroster*/

function getpaymentplanidBYId($conn,$id){
	//echo "SELECT * FROM `seminars` where `id`='$id'";
	$ds=mysqli_query($conn,"SELECT * FROM `nonpaymentplanroaster` WHERE `id`=$id"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}

/*check add_struct*/

function check_addstruct_id($conn,$name,$id){
	//echo "SELECT * FROM `seminars` where `id`='$id'";
	$ds=mysqli_query($conn,"SELECT * FROM `addplanstruct_nonexc` WHERE `attach_plan_struct`='".ucwords($name)."' AND `attach_roster_id`=$id"); 
	if(mysqli_num_rows($ds) > 0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

/*after update*/
function checkupdate_addstruct_id($conn,$id,$name,$rid){
	//echo "SELECT * FROM `seminars` where `id`='$id'";

	 
	$ds=mysqli_query($conn,"SELECT * FROM `addplanstruct_nonexc` WHERE `attach_plan_struct`='".ucwords($name)."' AND `attach_roster_id`=$rid AND `id`!=$id"); 
	if(mysqli_num_rows($ds) > 0)
	{
		return false;
	}
	else
	{
		return true;
	}
}


/*end check add_stuct*/
function getaddstructdetailsId($conn,$id){
	//echo "SELECT * FROM `seminars` where `id`='$id'";
	$ds=mysqli_query($conn,"SELECT * FROM `addplanstruct_nonexc` WHERE `id`=$id"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}
/*get project name behalf of towerid*/

function getprojectnamebytowerId($conn,$id){
	//echo "SELECT * FROM `seminars` where `id`='$id'";
	$ds=mysqli_query($conn,"SELECT `nonexsubprojects`.`name` as projectName,`nonex_tower_master`.`name` as towerName FROM `nonexsubprojects` JOIN `nonex_tower_master` ON `nonex_tower_master`.`pid`=`nonexsubprojects`.`id` WHERE `nonex_tower_master`.`id`=$id"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}

/*get paymentplan structure*/

function getprojectplandefbyId($conn,$id){
	//echo "SELECT * FROM `seminars` where `id`='$id'";
	$ds=mysqli_query($conn,"SELECT * FROM `addplanstruct_nonexc` WHERE `status`=1 AND `view`=1 AND `id`=$id"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}

/*get imagedata contruction*/

/*get imagedata contruction*/

function getimageconstructionbyId($conn,$id){
	//echo "SELECT * FROM `seminars` where `id`='$id'";
	$ds=mysqli_query($conn,"SELECT * FROM `construction_tower_update` WHERE `status`=1 AND `view`=1 AND `id`=$id"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}

function getExclusiveProjectDetailById($conn,$id){
	$ds=mysqli_query($conn,"SELECT * FROM `crm_inv_project` where  `project_id`='$id'  "); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}

function checkNonexExistsGstRatesNew($conn,$pid,$type){
	$ds=mysqli_query($conn,"SELECT count(*) as count FROM `gstrates` where `subprojectid`='$pid' and `subprojecttype`='$type' "); 
	$ds1=mysqli_fetch_assoc($ds);
	if(  ($ds1['count']=='0') || ($ds1['count']=='NULL')){
		return false;	
	}else{
		return true;	
	}
}

function updatelogex($conn,$pageid,$buid,$pid,$btype){
	$pdate=date("Y-m-d");
	$ptime=date("h:i a");
	$ds=mysqli_query($conn,"INSERT INTO `builderlogs` (`id`, `pageid`, `updatedby`, `projectid`, `pdate`, `ptime`, `status`, `updatetype`,`projecttype`) VALUES (NULL, '$pageid', '$buid', '$pid', '$pdate', '$ptime', '1', '$btype','1') "); 
	
	
	
			if($btype==1){
				$updatedtext="Builder";	
			}else{
				$updatedtext="Operations (ANI)";	
			}
		    $project=getProjectByTypeANdId($conn,$buid,1);
			$text=$project." - ".getPageNameById($conn,$pageid)." has been updated by $updatedtext";
			postdata('9953964123',$text);
			postdata('8860813845',$text);
}

function getDescriptionByRoasterSlotModuleId($conn,$rid,$sid){

	$ds=mysqli_query($conn,"SELECT `description` FROM `roasterdetails` where  `roaster_id`='$rid' and `slot_id`='$sid' 
		 and `view`='1'  "); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['description'];
}

/*added date 2018-12-01*/

/*get sale details by id*/
function getsaledetailsByid($conn,$id)
{

	$ds=mysqli_query($conn,"SELECT * FROM `costsheet` where `salestatus` !='0' AND `id`=$id"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}

/* creation date-20181130*/
/*get bank master details*/
function getBankmaster($conn)
{
	$ds1=array();
	$ds=mysqli_query($conn,"SELECT * FROM `bank_master` WHERE `status`=1 ORDER BY `name` ASC"); 
	if($ds->num_rows>0)
	{
		while ($row=$ds->fetch_assoc()) {
		    
		    $ds1[]=$row;
		}
	}
	return $ds1;
}
function getBankmasterById($conn,$id)
{

	$ds=mysqli_query($conn,"SELECT * FROM `bank_master` WHERE `status`=1 AND `id`=$id"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}
/*get checque type*/

function getChequetypeMaster($conn)
{
	$ds1=array();
	$ds=mysqli_query($conn,"SELECT * FROM `chequetypes` WHERE  `status`=1 ORDER BY `name` ASC"); 
	if($ds->num_rows>0)
	{
		while ($row=$ds->fetch_assoc()) {
		    
		    $ds1[]=$row;
		}
	}
	return $ds1;
}
function getChequetypeMasterById($conn,$id)
{

	$ds=mysqli_query($conn,"SELECT * FROM `chequetypes` WHERE `status`=1 AND `id`=$id"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}
/*get check status master*/
function getChequestatusMaster($conn)
{
	$ds1=array();
	$ds=mysqli_query($conn,"SELECT * FROM `chequestatusmaster` WHERE  `status`=1 ORDER BY `name` ASC");
	if($ds->num_rows>0)
	{
		while ($row=$ds->fetch_assoc()) {
		    
		    $ds1[]=$row;
		}
	}
	return $ds1;
}
function getChequestatusMasterId($conn,$id)
{

	$ds=mysqli_query($conn,"SELECT * FROM `chequestatusmaster` WHERE `status`=1 AND `id`=$id"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}
/*log update non cheque details*/

function UpdateNonExchequeLogs($conn,$cossheetid,$chkstatusId,$submisiondate,$remark,$submittedby)
{
	$ds=mysqli_query($conn,"INSERT INTO `nonexchequelogs`(`costsheet_id`, `chequestatus_id`, `submission_date`, `remarks`, `submittedby`) VALUES ('$cossheetid','$chkstatusId','$submisiondate','$remark',$submittedby)"); 
	if($ds)
	{
		return true;
	}
	else
	{
		return false;
	}
	
}

function UpdateexchequeLogs($conn,$saleid,$chkstatusId,$submisiondate,$remark)
{
	$ds=mysqli_query($conn,"INSERT INTO `exchequelogs`(`id`, `sale_id`, `chequestatus_id`, `submission_date`, `remarks`, `submittedby`) VALUES ('$saleid','$chkstatusId','$submisiondate','$remark')"); 
	if($ds)
	{
		return true;
	}
	else
	{
		return false;
	}
	
}


function getChequeIdsByRceiptId($conn,$rid){
	$cheques=array();
	$ds2=mysqli_query($conn,"SELECT  * from `chequereceiptdetails` where `receipt_id`='$rid' and  `view`='1' "); 
	while($fetch=mysqli_fetch_array($ds2)){
		$id=$fetch['id'];
		$projects[]=$fetch['cheque_id'];
	}
	return $cheques;
}

function getReceiptDetailsById($conn,$id)
{

	$ds=mysqli_query($conn,"SELECT * FROM `chequereceipts` where  `id`=$id"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}

/*get details addpartpayment by id*/

function getaddpartPaymentById($conn,$id)
{

	$ds=mysqli_query($conn,"SELECT * FROM `nonsales_booking_cheques` where  `status`=1 AND `view`=1 AND `id`=$id"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}
function getIncludedChequesByRceiptId($conn,$rid){
	$cheques=array();
//	echo "SELECT  * from `chequereceiptdetails` where `receipt_id`='$rid' and  `view`='1' ";
	$ds2=mysqli_query($conn,"SELECT  * from `chequereceiptsdetails` where `receipt_id`='$rid' and  `view`='1' "); 
	while($fetch=mysqli_fetch_array($ds2)){
		$id=$fetch['id'];
		$cheques[]=getNonChequeNoById($conn,$fetch['cheque_id']);
	}
	
	//print_r($cheques);die;
	return implode(",",$cheques);
}
function getNonChequeDetailById($conn,$cid)
{

	$ds=mysqli_query($conn,"SELECT * FROM `nonsales_booking_cheques` where  `id`='$cid'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}
function getNonChequeNoById($conn,$cid)
{
//echo "SELECT `cheque_no` FROM `nonsales_booking_cheques` where  `id`='$cid'";die;
	$ds=mysqli_query($conn,"SELECT `cheque_no` FROM `nonsales_booking_cheques` where  `id`='$cid'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['cheque_no'];
}

function getSlotsNameArray($conn){
	
	 $holded=array();
	// echo "SELECT * FROM `crm_inv_customer_detail` where  `team_head_code`='$assocode'";
	 $ds2=mysqli_query($conn,"SELECT * FROM `slots`   "); 

	while($fetch=mysqli_fetch_array($ds2)){
				$id=$fetch['id'];
				$holded[$id]=$fetch['name'];	
			
			
			
			
		}
		//return $error;		
	return 	$holded;
}
function getSlotsTimingArray($conn){
	
	 $holded=array();
	// echo "SELECT * FROM `crm_inv_customer_detail` where  `team_head_code`='$assocode'";
	 $ds2=mysqli_query($conn,"SELECT * FROM `slots`   "); 

	while($fetch=mysqli_fetch_array($ds2)){
				$id=$fetch['id'];
				$holded[$id]=$fetch['startsfrom'];	
			
			
			
			
		}
		//return $error;		
	return 	$holded;
}




function getModuleNameCodeArr($conn){
	
	 $holded=array();
	// echo "SELECT * FROM `crm_inv_customer_detail` where  `team_head_code`='$assocode'";
	 $ds2=mysqli_query($conn,"SELECT * FROM `seminars`   "); 

	while($fetch=mysqli_fetch_array($ds2)){
				$id=$fetch['id'];
				$holded[$id]=$fetch['code']." - ".$fetch['title']." ( ".$fetch['duration']." mins ) ";
			
			
			
			
		}
		//return $error;		
	return 	$holded;
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function getCategoriesDetailById($conn,$cid){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  * FROM `categories` WHERE  `id`='$cid'  ")); 
	 return $ds2;
	 
}
function checkSlugInCategories($conn,$slug){
	$ds=mysqli_query($conn,"SELECT * FROM `categories` where `status`='1' and `view`='1' and `slug`='$slug'  "); 
	$numrows=mysqli_num_rows($ds);
	if($numrows>0){
		return true;	
	}else{
		return false;	
	}
	
	
}


function getCategoryIdBySlug($conn,$slug)
{
//echo "SELECT `cheque_no` FROM `nonsales_booking_cheques` where  `id`='$cid'";die;
	$ds=mysqli_query($conn,"SELECT `id` FROM `categories` where  `slug`='$slug'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['id'];
}
function getCategoryDetailsById($conn,$cid)
{
	//echo "SELECT `cheque_no` FROM `nonsales_booking_cheques` where  `id`='$cid'";die;
	$ds=mysqli_query($conn,"SELECT * FROM `categories` where  `id`='$cid'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}
function getCategoryNameById($conn,$cid)
{
	//echo "SELECT `cheque_no` FROM `nonsales_booking_cheques` where  `id`='$cid'";die;
	$ds=mysqli_query($conn,"SELECT * FROM `categories` where  `id`='$cid'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['name'];
}
function getBannerImage($conn,$image)
{
	if($image==''){
	$image="nobanner.jpg";
	}
	return $image;

}
function getLogoImage($conn,$image)
{
	if($image==''){
	$image="noimage.jpg";
	}
	return $image;

}

function createThumbNail($oldname, $width, $height, $baseurl) {
    if ($oldname == '') {
	$oldname = 'nophoto.jpg';
    }
    if (!file_exists($baseurl . "/photos/" . $oldname)) {
	$oldname = 'nophoto.jpg';
    }
    $imgName = $width . "_" . $height . "_" . $oldname;
    $newname = $baseurl . "/thumb/" . $imgName;
    if (!file_exists($newname)) {
	$thumbw = $width;
	$thumbh = $height;
	$nh = $thumbh;
	$nw = $thumbw;
	$size = getImageSize($baseurl . "/photos/" . $oldname);
	$w = $size[0];
	$h = $size[1];
	$img_type = $size[2];
	$ratio = $h / $w;
	$nratio = $nh / $nw;
	if ($ratio > $nratio) {
	    $x = intval($w * $nh / $h);
	    if ($x < $nw) {
		$nh = intval($h * $nw / $w);
	    } else {
		$nw = $x;
	    }
	} else {
	    $x = intval($h * $nw / $w);
	    if ($x < $nh) {
		$nw = intval($w * $nh / $h);
	    } else {
		$nh = $x;
	    }
	}
//die($img_type);
	switch ($img_type) {
	    case '1':
		$resimage = imagecreatefromgif($baseurl . "/photos/" . $oldname);
		break;
	    case '2':
		$resimage = imagecreatefromjpeg($baseurl . "/photos/" . $oldname);
		break;
	    case '3':
		$resimage = imagecreatefrompng($baseurl . "/photos/" . $oldname);
		break;
	}
	//$resimage = imagecreatefromjpeg($oldname);
	$newimage = imagecreatetruecolor($nw, $nh);
	// use alternate function if not installed
	imageCopyResampled($newimage, $resimage, 0, 0, 0, 0, $nw, $nh, $w, $h);
	// Making the final cropped thumbnail
	$viewimage = imagecreatetruecolor($thumbw, $thumbh);
	imagecopy($viewimage, $newimage, 0, 0, 0, 0, $nw, $nh);
	// saving
	imagejpeg($viewimage, $newname, 85);
	return $imgName;
    } else {
	return $imgName;
    }
}


function newpasswordlink($email,$id,$baseurl)
{

$unText=" <a style='color:#FFFFFF;text-decoration:none' href ='".$baseurl."/changepassword.php?id=".base64_encode($id)."'>Change Password</a> ";
$msg='<head>
	<title>Change password</title>
	</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="background-color:#F2F2F2;">
            	<tr>
                	<td align="center" valign="top" id="bodyCell" style="padding:20px 20px;">
                    	<table border="0" cellpadding="0" cellspacing="0" id="emailContainer" style="width:600px;">
                        	<tr>
                            	<td align="center" valign="top" bgcolor="#FFFFFF" style="padding-top:10px">
      <a href="" target="_blank" title="life apple" style="text-decoration:none;"><img src=http://78.46.117.226/education/img/logo.png alt="Bosh Education" height=""  class="logoImage" style="border:0; color:#6DC6DD !important; font-family:Helvetica, Arial, sans-serif; font-size:60px; font-weight:bold; height:auto !important; letter-spacing:-4px; line-height:100%; outline:none; text-align:center; text-decoration:none;" /></a>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top" style="padding-top:0px; padding-bottom:20px;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailBody" style="background-color:#FFFFFF; border-collapse:separate !important; border-radius:4px;">
                                        <tr>
                                            <td align="center" valign="top" class="bodyContent" style="color:#606060; font-family:Helvetica, Arial, sans-serif; font-size:15px; line-height:150%; padding-top:40px; padding-right:40px; padding-bottom:30px; padding-left:40px; text-align:center;">
                                                <h1 style="color:#606060 !important; font-family:Helvetica, Arial, sans-serif; font-size:40px; font-weight:bold; letter-spacing:-1px; line-height:115%; margin:0; padding:0; text-align:center;">Just one more step...</h1>
                                                <br />
                                               
                                                Click the big button below to change your password.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="middle" style="padding-right:40px; padding-bottom:40px; padding-left:40px;">
                                                <table border="0" cellpadding="0" cellspacing="0" class="emailButton" style="background-color:#6DC6DD; border-collapse:separate !important; border-radius:3px;">
                                                    <tr>
                                                        <td align="center" valign="middle" class="emailButtonContent" style="color:#FFFFFF; font-family:Helvetica, Arial, sans-serif; font-size:15px; font-weight:bold; line-height:100%; padding-top:18px; padding-right:15px; padding-bottom:15px; padding-left:15px;">'.$unText.'</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                            	<td align="center" valign="top">
                                 	<table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailFooter">
                                    	<tr>
                                        	<td align="center" valign="top" class="footerContent" style="color:#606060; font-family:Helvetica, Arial, sans-serif; font-size:10px; line-height:125%;">
                                           The information contained in and accompanying this communication may be confidential, subject to legal privilege, or otherwise protected from disclosure, and is intended solely for the use of the intended recipient(s). 
                                                <br />
                                               
                                            </td>
                                        </tr>
                                           
										 <tr>
                                        	<td align="center" valign="top" style="padding-top:30px;color:#f2f2f2;">'.date("h:m:i").'</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        
                        </td>
                        </tr>
                        </table></body><html>';

return $msg;

	
	
}
function  resetpasslink($conn,$id,$baseurl,$pass){

//$memName=getUserNameById($conn,$id);








$msg='<head>



	<title>New mail</title>



	</head>



<body>



<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="background-color:#F2F2F2;">



            	<tr>



                	<td align="center" valign="top" id="bodyCell" style="padding:20px 20px;">



                    	<table border="0" cellpadding="0" cellspacing="0" id="emailContainer" style="width:600px;">



                        	<tr>



                            	<td align="center" valign="top" bgcolor="#FFFFFF" style="padding-top:10px">



                                	<a href="" target="_blank" title="life apple" style="text-decoration:none;"><img src="'.$baseurl.'/images/logo.png" alt="LifePositive" height=""  class="logoImage" style="border:0; color:#6DC6DD !important; font-family:Helvetica, Arial, sans-serif; font-size:60px; font-weight:bold; height:auto !important; letter-spacing:-4px; line-height:100%; outline:none; text-align:center; text-decoration:none;" /></a>



                                </td>



                            </tr>



                            <tr>



                                <td align="center" valign="top" style="padding-top:0px; padding-bottom:20px;">



                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailBody" style="background-color:#FFFFFF; border-collapse:separate !important; border-radius:4px;">



                                        <tr>



                                            <td align="center" valign="top" class="bodyContent" style="color:#606060; font-family:Helvetica, Arial, sans-serif; font-size:15px; line-height:150%; padding-top:40px; padding-right:40px; padding-bottom:30px; padding-left:40px; text-align:center;">



                                                <h1 style="color:#606060 !important; font-family:Helvetica, Arial, sans-serif; font-size:40px; font-weight:bold; letter-spacing:-1px; line-height:115%; margin:0; padding:0; text-align:center;">New Password</h1>



                                                <br />



                                                <h3 style="color:#2b95ff !important; font-family:Helvetica, Arial, sans-serif; font-size:18px; letter-spacing:-.5px; line-height:115%; margin:0; padding:0; text-align:center;">'.$memName.'</h3>



                                                <br />



                                               Your new password is '." ".$pass.'.



                                            </td>



                                        </tr>



                                        <tr>



                                            <td align="center" valign="middle" style="padding-right:40px; padding-bottom:40px; padding-left:40px;">



                                                <table border="0" cellpadding="0" cellspacing="0" class="emailButton" style="background-color:#6DC6DD; border-collapse:separate !important; border-radius:3px;">



                                                    



                                                </table>



                                            </td>



                                        </tr>



                                    </table>



                                </td>



                            </tr>



                            <tr>



                            	<td align="center" valign="top">



                                 	<table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailFooter">



                                    	<tr>



                                        	<td align="center" valign="top" class="footerContent" style="color:#606060; font-family:Helvetica, Arial, sans-serif; font-size:10px; line-height:125%;">



                                           The information contained in and accompanying this communication may be confidential, subject to legal privilege, or otherwise protected from disclosure, and is intended solely for the use of the intended recipient(s). 



                                                <br />



                                               



                                            </td>



                                        </tr>



                                        <tr>



                                        	<td align="center" valign="top" style="padding-top:30px;">



                                            	<a style="color:#0073e6;text-decoration:none" href="'.$baseurl.'">'.$baseurl.'</a>



                                            </td>



                                        </tr>



										 <tr>



                                        	<td align="center" valign="top" style="padding-top:30px;color:#f2f2f2;">'.date("h:m:i").'</td>



                                        </tr>



                                    </table>



                                </td>



                            </tr>



                        </table>



                        



                        </td>



                        </tr>



                        </table></body><html>';



return $msg;



}

function randomPassword($conn) {



    $alphabet = "0123456789";



    $pass = array(); //remember to declare $pass as an array



    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache



    for ($i = 0; $i < 6; $i++) {



        $n = rand(0, $alphaLength);



        $pass[] = $alphabet[$n];



    }



    return implode($pass); //turn the array into a string



}

function getAdminDetailById($conn,$cid){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  * FROM `admin` WHERE  `id`='$cid'  ")); 
	 return $ds2;
	 
}
function getPackageDetailById($conn,$cid){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  * FROM `packages` WHERE  `id`='$cid'  ")); 
	 return $ds2;
	 
}
function getAdminNameById($conn,$cid){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  * FROM `admin` WHERE  `id`='$cid'  ")); 
	 return $ds2['name'];
	 
}
function sendBasicMail($to,$from,$fromname,$subject,$msg){

	$headers = 'MIME-Version: 1.0 \r\n'.
		'Content-type: text/html \r\n'.
		'X-Mailer: PHP/' . phpversion();
		$mail = new PHPMailer();
		$mail->IsSMTP();                                      // Set mailer to use SMTP
		$mail->IsHTML(true);
		$mail->From = $from;
		$mail->FromName =$fromname;
		$mail->SMTPAuth = false;
		$mail->AddAddress($to);
		$mail->Subject = $subject;
		$mail->Body    = $msg;
		$mail=$mail->Send();
		if($mail){
		return true;
		}else{
		return false;
		}   
}

function getLocationsByCountry($conn,$cid){
$location=array();
//echo "SELECT * FROM `locations` where `countryid`='$cid' and `view` ='1'";
$ds=mysqli_query($conn,"SELECT * FROM `location` where `countryid`='$cid' and `view` ='1'"); 
	$numrows=mysqli_num_rows($ds);
	if($numrows >0){
		while($fetch=mysqli_fetch_array($ds)){
		
			 $location[]=$fetch['id'];
		}
	}
	
return $location;	
}

function getcontentpagesbyid($conn,$code){
	$ds=mysqli_query($conn,"SELECT * FROM `contentpages` where `type`='$code'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

function getTableDetailsById($conn,$table,$id){
	//echo "SELECT * FROM $table where `id`='$id'";
	$ds=mysqli_query($conn,"SELECT * FROM $table where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
 
}

function getUserAddress($conn,$id){
	//echo "SELECT * FROM $table where `id`='$id'";
	$ds=mysqli_query($conn,"SELECT * FROM `orders` where `userid`='$id' order by `id` desc limit 0,1"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
 
}
function getYesNoByValue($conn,$value){
	 
	if($value==1){
		return "<span style='color:#6C9100'>Yes</span>";	
	}
	if($value==0){
		return "<span style='color:#A9454A'>No</span>";	
	}
 
}
function getSiteName($conn){
   $curDate=date("Y-m-d");
   $ds=mysqli_query($conn,"SELECT `name`  FROM `generalsettings` where   `id`='1' "); 
   $ds1=mysqli_fetch_assoc($ds);
   return $ds1['name'];
 
} 
function getColoumnNameById($conn,$col,$table,$id){
	
	$ds=mysqli_query($conn,"SELECT $col FROM  $table where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1[$col];
}
function getNQfeaturessById($conn,$cid){
$location=array();
//echo "SELECT * FROM `locations` where `countryid`='$cid' and `view` ='1'";
$ds=mysqli_query($conn,"SELECT * FROM `edu_pricingnonqfeatures` where `pricingid`='$cid' and `view` ='1'"); 
	$numrows=mysqli_num_rows($ds);
	if($numrows >0){
		while($fetch=mysqli_fetch_array($ds)){
		
			 $location[]=$fetch['nqfeatureid'];
		}
	}
	
return $location;	
}

function getQfeaturessById($conn,$cid){
$location=array();
$ds=mysqli_query($conn,"SELECT * FROM `edu_pricingqfeatures` where `pricingid`='$cid' and `view` ='1'"); 
	$numrows=mysqli_num_rows($ds);
	if($numrows >0){
		while($fetch=mysqli_fetch_array($ds)){
		     $qfid=$fetch['qfeatureid'];
			 $location[$qfid]=$fetch['sets'];
		}
	}
	
return $location;	
}

function getQfeaturessByIdnew($conn,$cid){
$location=array();
$ds=mysqli_query($conn,"SELECT * FROM `edu_pricingqfeatures` where `pricingid`='$cid' and `view` ='1'"); 
	$numrows=mysqli_num_rows($ds);
	if($numrows >0){
		while($fetch=mysqli_fetch_array($ds)){
		     $qfid=$fetch['qfeatureid'];
			 $location[]=$fetch['qfeatureid'];
		}
	}
	
return $location;	
}
function getSchoolsDetailById($conn,$cid){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  * FROM `schools` WHERE  `id`='$cid'  ")); 
	 return $ds2;
	 
}
function getSubjectdetails($conn,$cid){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  * FROM `subjects` WHERE  `id`='$cid'  ")); 
	 return $ds2;
	 
}

function getsubtypedetails($conn,$cid){
	 $ds2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  * FROM `subtype` WHERE  `id`='$cid'  ")); 
	 return $ds2;
	 
}
function getattachedtopicsids($conn,$cid){
	 $ds2=mysqli_query($conn,"SELECT  * FROM `attachedtopics` WHERE  `subtype_id`='$cid' and `status`='1' and `view`='1'"); 

while($resultset=mysqli_fetch_array($ds2))
{
	
	$resultarr[]=$resultset['id'];
	
		 
}
return $resultarr; 
}

function getSubidfromAttid($conn,$aid){
	 $ds2=mysqli_query($conn,"SELECT  * FROM `subtype` WHERE  `attachedid` in($aid) and `status`='1' and `view`='1'"); 

while($resultset=mysqli_fetch_array($ds2))
{
	
	$resultarr[]=$resultset['id'];
	
		 
}
return $resultarr; 
}

function getallAttachedIdwithSubId($conn,$cid,$level){
	 $ds2=mysqli_query($conn,"SELECT  * FROM `attachedtopics` WHERE  `subject_id`='$cid' and `status`='1' and `view`='1'"); 

while($resultset=mysqli_fetch_array($ds2))
{ 
	$amtid=$resultset['attachedid'];
//	echo "SELECT  * FROM `levelsubjects` WHERE  `id`='$amtid' and `level_id`='$level' and `status`='1' and `view`='1'";   
		 $ds=mysqli_query($conn,"SELECT  * FROM `levelsubjects` WHERE  `id`='$amtid' and `level_id`='$level' and `status`='1' and `view`='1'"); 
if($num=mysqli_num_rows($ds)>0)
{
	
	
	$resultarr[]=$resultset['id'];
	
}
}
return $resultarr; 
}
function getattachedtopiccount($conn,$cid){
	 $ds2=mysqli_num_rows(mysqli_query($conn,"SELECT  * FROM `attachedtopics` WHERE  `subtype_id`='$cid' and `view`='1'"));
		 return $ds2;
 
}

function getattachedtopiccountwithsubid($conn,$name,$hidsubid1)
{
	
	$ds2=mysqli_num_rows(mysqli_query($conn,"SELECT  * FROM `attachedtopics` WHERE  `subtype_id`='$cid' and `topics`='$name'"));
		 return $ds2;
	
	
	
}

function getColoumnNameByIdtableval($conn,$col,$table,$id){
	$ds=mysqli_query($conn,"SELECT $col FROM  $table where `id`='$id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1[$col];
}

    
function getQuestionCountfromTopicId($conn,$hidsubid1)
{
	
	$ds2=mysqli_num_rows(mysqli_query($conn,"SELECT  * FROM `questions` WHERE  `topic_id`='$hidsubid1'"));
		 return $ds2;
	
	
	
}

function getLocationIdfromCountryId($conn,$countryid)
{
	
	
	  $query="SELECT location.id FROM location INNER JOIN country ON country.id = location.countryid where country.id=$countryid;";
		$ds=mysqli_query($conn,$query); 
		while($result=mysqli_fetch_array($ds))
		{
$ds1[]=$result[0];
		}
	return $ds1;
	
}
function getschoolsfromLocationId($conn,$lid)
{
	
	
	
	
	  $query="SELECT schools.id FROM schools INNER JOIN location ON location.id = schools.locationid where location.id=$lid and schools.status=1";
		$ds=mysqli_query($conn,$query); 
		while($result=mysqli_fetch_array($ds))
		{
$ds1[]=$result[0];
		}
	return $ds1;
	

	
	
	
}

function getSchoollocationcount($conn,$lid)
{
	$ds2=mysqli_num_rows(mysqli_query($conn,"SELECT  * FROM `schools` WHERE  `locationid`='$lid'"));
		 return $ds2;
	
	
}

function getlevelIdfromslug($conn,$slug)
{	
	$ds=mysqli_query($conn,"SELECT `id` FROM  `edu_levels` where `slug`='$slug'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['id'];
	
	
}

function getsubjectIdfromAttachedId($conn,$aid)
{
	$ds=mysqli_query($conn,"SELECT `subject_id` FROM  `levelsubjects` where `id`='$aid'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['subject_id'];
	
	
	
	
}


function checkemailExistence($conn,$email)
{
$ds2=mysqli_num_rows(mysqli_query($conn,"SELECT  * FROM `register` WHERE  `email`='$email'"));
		 return $ds2;
	


}

function gettest_statusfromTestId($conn,$tid,$userid,$sid,$lid,$tids)
{ 
	//echo "SELECT * FROM  `testgiven` where `userid`='$userid' and `subject_id`='$sid' and `levelid`='$lid' and `testname`='$tids' order by `id` desc";
	$ds=mysqli_query($conn,"SELECT * FROM  `testgiven` where `userid`='$userid' and `subject_id`='$sid' and `levelid`='$lid' and `testname`='$tids' order by `id` desc"); 
	$numrows=mysqli_num_rows($ds);
	if($numrows>0)
	{
	$ds1=mysqli_fetch_assoc($ds);
	}
	else
	{
		$ds1='';
		
	}
	return $ds1;
	
	
}
function getminitest_statusfromTestId($conn,$lid,$userid,$sid)
{ 
	//echo "SELECT * FROM  `minitestgiven` where `userid`='$userid' and `subject_id`='$sid' and `levelid`='$lid' and `testname`='$tids' order by `id` desc";
	$ds=mysqli_query($conn,"SELECT * FROM  `minitestgiven` where `userid`='$userid' and `subject_id`='$sid' and `levelid`='$lid'"); 
	$numrows=mysqli_num_rows($ds);
	if($numrows>0)
	{
	$ds1=mysqli_fetch_assoc($ds);
	}
	else
	{
		$ds1='';
		
	}
	return $ds1;
	
	
}	function getdifficultyfromQId($conn,$question_id)
	{
		
	
	
	
	$ds=mysqli_query($conn,"SELECT `difficulty` FROM  `questions` where `id`='$question_id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['difficulty'];
	
	
	
		
		
	}
	
	function getAdminanswerfromquestionid($conn,$question_id)
	{
		
	
	
	$ds=mysqli_query($conn,"SELECT `correct` FROM  `questions` where `id`='$question_id'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['correct'];
	
	
	
		
		
	}
	function checkCartproductexist($conn,$lid,$pid){
	$count=-1;
	$status=0;
	foreach($_SESSION['cart_array']["bags"] as $arr){
	$count++;
	if(($arr[0]==$lid)&&($arr[1]==$pid)){
		$status=1;
	}
	
	}
	
	return $status;
	
	
}
function updatecart($conn,$lid,$pid,$type){
	
$count=-1;
   foreach($_SESSION['cart_array']["bags"] as $arr){
	if(($arr[0]==$lid) &&(($arr[1]==$pid))){
		   $count++;

		   $oldQty=$_SESSION['cart_array']["bags"][$count][2];
		$qty=1;
		if($type==1)
		
		{
		  $_SESSION['cart_array']["bags"][$count][2]=$oldQty+$qty;
		}
		else
		{
					  $_SESSION['cart_array']["bags"][$count][2]=$oldQty-$qty;

			
		}
			// print_r($_SESSION['cart_array']["bags"]);       

	}
	   
   }
   return true;	
	
}
function orderidbyUserid($conn,$userid){
	$ds=mysqli_query($conn,"SELECT * FROM `orders` where `userid`='$userid'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1;
 
}
	function getBoughtPackagefromOid($conn,$id){
	//echo "SELECT * FROM `seminars` where `id`='$id'";
	$ds=mysqli_query($conn,"SELECT * FROM `orderlist` where `orderid`='$id'"); 
	$numrows=mysqli_num_rows($ds);
	if($numrows >0){
		while($fetch=mysqli_fetch_array($ds)){
		
			 $data[]=$fetch['planid'];
		}
	}
	//$improaster=implode(",",$data);
	return $data;
}

	function getallOrderIDfromUserID($conn,$id){
	//echo "SELECT * FROM `seminars` where `id`='$id'";
	$ds=mysqli_query($conn,"SELECT * FROM `orders` where `userid`='$id' and `status`='1'"); 
	$numrows=mysqli_num_rows($ds);
	if($numrows >0){
		while($fetch=mysqli_fetch_array($ds)){
		
			 $data[]=$fetch['id'];
		}
	}
	//$improaster=implode(",",$data);
	return $data;
}
function getSingleBoughtPackagefromOid($conn,$id){
	//echo "SELECT * FROM `seminars` where `id`='$id'";
	$ds=mysqli_query($conn,"SELECT * FROM `orderlist` where `orderid`='$id'"); 
	$numrows=mysqli_num_rows($ds);
	
		$fetch=mysqli_fetch_assoc($ds);
		
	
	//$improaster=implode(",",$data);
	return $fetch;
}


function getAttemptedQuestionsfromTestId($conn,$testgivenid)
{//	$ds=mysqli_query($conn,"SELECT * FROM `testattempted` where `testid`='$testgivenid' and `button`='0' order by `id` desc"); 
//echo "SELECT * FROM `testattempted` where `testid`='$testgivenid' and `answer`!=0 order by `id` desc";
	
	$ds=mysqli_query($conn,"SELECT * FROM `testattempted` where `testid`='$testgivenid' and `answer`!=0 order by `id` desc"); 
	$numrows=mysqli_num_rows($ds);
	if($numrows=='')
	{
		$numrows=0;
	}
		
		
	return $numrows;
	
	
	
}

function getPracAttemptedQuestionsfromTestId($conn,$testgivenid)
{//	$ds=mysqli_query($conn,"SELECT * FROM `testattempted` where `testid`='$testgivenid' and `button`='0' order by `id` desc"); 
//echo "SELECT * FROM `testattempted` where `testid`='$testgivenid' and `answer`!=0 order by `id` desc";
	
	$ds=mysqli_query($conn,"SELECT * FROM `testattempted` where `testid`='$testgivenid' and `answer`!=0 order by `id` desc"); 
	$numrows=mysqli_num_rows($ds);
	if($numrows=='')
	{
		$numrows=0;
	}
		
		
	return $numrows;
	
	
	
}

function getTotalquesfromTopicId($conn,$tid)
{
	
	
	//echo "SELECT * FROM `seminars` where `id`='$id'";
	$ds=mysqli_query($conn,"SELECT * FROM `questions` where `topic_id`='$tid' and `status`='1' and `view`='1'"); 
	$numrows=mysqli_num_rows($ds);
	if($numrows >0){
		while($fetch=mysqli_fetch_array($ds)){
		
			 $data[]=$fetch['id'];
		}
	}
	//$improaster=implode(",",$data);
	return $data;

	
	
}

function GetUserCorrectAnsFromTidQid($conn,$qid,$tid)
{
	
	$ds=mysqli_query($conn,"select * from `testattempted` where `questionid`='$qid' and `testid`='$tid' and `buttonval`!='0'");  
	$numrows=mysqli_fetch_assoc($ds);
	
	return $numrows;
	
	
	

	
	
}
function GetMiniUserCorrectAnsFromTidQid($conn,$qid,$tid)
{
	
	$ds=mysqli_query($conn,"select * from `minitestattempted` where `questionid`='$qid' and `testid`='$tid' and `buttonval`!='0'");  
	$numrows=mysqli_fetch_assoc($ds);
	
	return $numrows;
	
	
	

	
	
}
function GetUserPracticeCorrectAnsFromTidQid($conn,$qid,$tid)
{       
 	$ds=mysqli_query($conn,"select * from `ptestattempted` where `questionid`='$qid' and `testid`='$tid' and `buttonval`!='0'");  
	$numrows=mysqli_fetch_assoc($ds);
	
	return $numrows;
	
	
	

	
	
}
function GetActiveQuesFromTopicId($conn,$strings)
{
//	echo "select * from `questions` where `topic_id` in ($strings) and `status`='1' and `view`='1'";
	
	$ds=mysqli_query($conn,"select * from `questions` where `topic_id` in ($strings) and `status`='1' and `view`='1'"); 
$numrows=mysqli_num_rows($ds);
	
	return $numrows;
	
	
	

	
	
}

function getMINItestid($conn)
{
//	echo "select * from `questions` where `topic_id` in ($strings) and `status`='1' and `view`='1'";
	
	$ds=mysqli_query($conn,"select `id` from `minitestid` where `status`='1' and `view`='1'"); 
$numrows=mysqli_fetch_row($ds);
	
	return $numrows[0];
	
	
	

	
	
}

function Getmainrecordids($conn,$level){
	//echo "SELECT  * FROM `minitest` WHERE  `level_id`='$level' and `status`='1' and `view`='1'";
$ds=mysqli_query($conn,"SELECT  * FROM `minitest` WHERE  `level_id`='$level' and `status`='1' and `view`='1'");
if($num=mysqli_num_rows($ds)>0)
{
	
while($resultset=mysqli_fetch_array($ds))
{
	$amtid=$resultset['id'];
		  

	
	$resultarr[]=$amtid;
	
}
}
return $resultarr; 
}
function GetMinisSubjectsidsfromLevelid($conn,$level){
	//echo "SELECT  * FROM `minitest` WHERE  `level_id`='$level' and `status`='1' and `view`='1'";
$ds=mysqli_query($conn,"SELECT  * FROM `minitest` WHERE  `level_id`='$level' and `status`='1' and `view`='1'");
if($num=mysqli_num_rows($ds)>0)
{
	
while($resultset=mysqli_fetch_array($ds))
{
	$amtid=$resultset['subject_id'];
		  

	
	$resultarr[]=$amtid;
	
}
}
return $resultarr; 
}
function GetSubjectsidsfromLevelid($conn,$level){
	//echo "SELECT  * FROM `levelsubjects` WHERE  `level_id`='$level' and `status`='1' and `view`='1'";
$ds=mysqli_query($conn,"SELECT  * FROM `levelsubjects` WHERE  `level_id`='$level' and `status`='1' and `view`='1'");
if($num=mysqli_num_rows($ds)>0)
{
	
while($resultset=mysqli_fetch_array($ds))
{
	$amtid=$resultset['subject_id'];
								$sub_details=getTableDetailsById($conn,"subjects",$amtid);
	  

	if($sub_details['status']==1)
	{
	$resultarr[]=$amtid;
	}
}
}
return $resultarr; 
}
function GetLevelSubjectmainidfromLevelid($conn,$level){
$ds=mysqli_query($conn,"SELECT  * FROM `levelsubjects` WHERE  `level_id`='$level' and `status`='1' and `view`='1'");
if($num=mysqli_num_rows($ds)>0)
{
	
while($resultset=mysqli_fetch_array($ds))
{
	$amtid=$resultset['id'];
								$sub_details=getTableDetailsById($conn,"subjects",$resultset['subject_id']);
	  

	if($sub_details['status']==1)
	{
	
	
	$resultarr[]=$amtid;
	}
}
}
return $resultarr; 
}

function getdetailsfromUserIdandSubjectId($conn,$userid,$sid)
{
	
	$ds=mysqli_query($conn,"select * from `testgiven` where `userid`='$userid' and `subject_id`='$sid' order by `id` desc limit 0,1"); 
	
	$numrows=mysqli_num_rows($ds);
	if($numrows>0)
	{
$resultset=mysqli_fetch_assoc($ds);
	}
	
	else
	{
	$resultset='';	
		
	}
	return $resultset;
	
	
	
}


function getdetailsfromUserIdandSubjectIdforMinitest($conn,$userid,$sid)
{
	
	$ds=mysqli_query($conn,"select * from `minitestgiven` where `userid`='$userid' and `subject_id`='$sid' order by `id` desc limit 0,1"); 
	
	$numrows=mysqli_num_rows($ds);
	if($numrows>0)
	{
$resultset=mysqli_fetch_assoc($ds);
	}
	
	else
	{
	$resultset='';	
		
	}
	return $resultset;
	
	
	
}
function sendgridmail($to,$message,$subject)
{
$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("support@brandsforless.in", "Bosh Education");
$email->setSubject($subject);
$email->addTo($to, "Bosh Education");

$email->addContent(
    "text/html",$message
);
//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
 $sendgrid = new \SendGrid('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');
try {
    $response = $sendgrid->send($email);
    $response->statusCode() . "\n";
   $response->headers();
   $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
}


function GetPausedquestionIdfromTestId($conn,$testgivenid)
{//	$ds=mysqli_query($conn,"SELECT * FROM `testattempted` where `testid`='$testgivenid' and `button`='0' order by `id` desc"); 

	//echo "SELECT * FROM `testattempted` where `testid`='$testgivenid'"; die;
	$ds=mysqli_query($conn,"SELECT * FROM `testattempted` where `testid`='$testgivenid'"); 
	while($resultset=mysqli_fetch_array($ds))
	{
		
		$data[]=$resultset['questionid'];
		
		
	}
		
		
	return $data;
	
	
	
}

function GetMiniPausedquestionIdfromTestId($conn,$testgivenid)
{//	$ds=mysqli_query($conn,"SELECT * FROM `testattempted` where `testid`='$testgivenid' and `button`='0' order by `id` desc"); 

	$ds=mysqli_query($conn,"SELECT * FROM `minitestattempted` where `testid`='$testgivenid'"); 
	while($resultset=mysqli_fetch_array($ds))
	{
		
		$data[]=$resultset['questionid'];
		
		
	}
		
		
	return $data;
	
	
	
}
function getQuesAttemptedforPrac($conn,$testgivenid)
{//	$ds=mysqli_query($conn,"SELECT * FROM `testattempted` where `testid`='$testgivenid' and `button`='0' order by `id` desc"); 

	
	$ds=mysqli_query($conn,"SELECT * FROM `ptestattempted` where `testid`='$testgivenid'"); 
	while($resultset=mysqli_fetch_array($ds))
	{
		
		$data[]=$resultset['questionid'];
		
		
	}
		
		
	return $data;
	
	
	
}

function getQuesAttemptedforminiWithCorrectAnswer($conn,$testgivenid,$type)
{//	$ds=mysqli_query($conn,"SELECT * FROM `testattempted` where `testid`='$testgivenid' and `button`='0' order by `id` desc");

if($type==2)
{
	
	$answer="`answer`=0";
	
}
else
{
$answer="`answer`!=0";  	     
	    
	
}
  	$ds=mysqli_query($conn,"SELECT * FROM `minitestattempted` where `testid`='$testgivenid' and $answer"); 
	while($resultset=mysqli_fetch_array($ds))
	{ 

	$data[]=$resultset['questionid'];
 
		
	}
		
		
	return $data;
	
	
	
}
function getMAINQuesAttemptedforminiWithCorrectAnswer($conn,$testgivenid,$type)
{

if($type==2)
{
	
	$answer="`answer`=0";
	
}
else
{
$answer="`answer`!=0";  	     
	    
	
}
  	$ds=mysqli_query($conn,"SELECT * FROM `testattempted` where `testid`='$testgivenid' and $answer"); 
	while($resultset=mysqli_fetch_array($ds))
	{ 

	$data[]=$resultset['questionid'];
 
		
	}
		
		
	return $data;
	
	
	
}

function gettimeTakenQuesAttemptedforminiWithCorrectAnswer($conn,$testgivenid,$ques_arr)
{
$data=0;
  	$ds=mysqli_query($conn,"SELECT * FROM `testattempted` where `testid`='$testgivenid' and `questionid` in ($ques_arr)"); 
	while($resultset=mysqli_fetch_array($ds))
	{ 

	$data+=$resultset['timetaken'];
 
		
	}
		
		
	return $data;
	
	
	
}

function getmainLevelidfromId($conn,$lid)
{ //echo "SELECT `level_id` FROM  `levelsubjects` where `id`='$lid'"; die;
	$ds=mysqli_query($conn,"SELECT `level_id` FROM  `levelsubjects` where `id`='$lid'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['level_id'];
	
	
	
	
}

function MinigetmainLevelidfromId($conn,$lid)
{ //echo "SELECT `level_id` FROM  `levelsubjects` where `id`='$lid'"; die;
	$ds=mysqli_query($conn,"SELECT `level_id` FROM  `minitest` where `id`='$lid'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['level_id'];
	
	
	
	
}


function getattachedMainLevelidfromSIdLecelId($conn,$sid,$lid)
{ 
	$ds=mysqli_query($conn,"SELECT `id` FROM  `levelsubjects` where `subject_id`='$sid' and `level_id`='$lid'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['id'];
	
	
	
	
}

function minigetattachedMainLevelidfromSIdLecelId($conn,$sid,$lid)
{ 
	$ds=mysqli_query($conn,"SELECT `id` FROM  `minitest` where `subject_id`='$sid' and `level_id`='$lid'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['id'];
	
	
	
	
}

function getExistenceofTestIdWithPracticeIdLid($conn,$test_name,$levelids,$userid)
{      
	//userid also   
	//$ds=mysqli_query($conn,"SELECT `id` FROM  `testgiven` where `testname`='$test_name' and `levelid`='$levelids' and `userid`='$userid'");
	
		$ds=mysqli_query($conn,"SELECT `id` FROM  `testgiven` where `id`='$test_name' and `levelid`='$levelids' and `userid`='$userid'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['id'];
	
	
	
}

function getMiniExistenceofTestIdWithPracticeIdLid($conn,$test_name,$levelids,$userid)
{      
	//userid also   
	//echo "SELECT `id` FROM  `minitestgiven` where `testname`='$test_name' and `levelid`='$levelids' and `userid`='$userid'";  die;   
		$ds=mysqli_query($conn,"SELECT `id` FROM  `minitestgiven` where `id`='$test_name' and `levelid`='$levelids' and `userid`='$userid'"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['id'];
	
	
	
}

function getlevelsfromquestionfromtid($conn,$tid,$level){
	//echo"SELECT  * FROM `questions` WHERE  `topic_id`='$tid' and `status`='1' and `view`='1'";
$ds=mysqli_query($conn,"SELECT  * FROM `questions` WHERE  `topic_id`='$tid' and `status`='1' and `view`='1'");
if($num=mysqli_num_rows($ds)>0)
{
	
while($resultset=mysqli_fetch_array($ds))
{
		 $amtid=$resultset['difficulty'];

	if($level==0)
	{
	 	$resultarr[]=$amtid;

	}

	else
	{
		if($amtid==$level)
		
		{
		 	$resultarr[]=$amtid;
	
		}
	}
	
}
}

$arr_unique=array_unique($resultarr);
return $arr_unique; 
}
function noOfquestionfromtopicidandlevel($conn,$topic_id,$level_id)
{
	
	
	//echo"SELECT  * FROM `questions` WHERE  `topic_id`='$tid' and `status`='1' and `view`='1'";
$ds=mysqli_query($conn,"SELECT  * FROM `questions` WHERE  `topic_id`='$topic_id' and `difficulty`='$level_id' and `status`='1' and `view`='1'");
$num=$num=mysqli_num_rows($ds);
return $num;

}

function practestExistence($conn,$userid,$topicid,$levelid)
{
	
	$ds=mysqli_query($conn,"SELECT `id` FROM  `practicetestgiven` where `subject_id`='$topicid' and `levelid`='$levelid' and `userid`='$userid' order by `id` desc limit 0,1"); 
	$ds1=mysqli_fetch_assoc($ds);
	return $ds1['id'];
	
	
}
	function practestExistencecount($conn,$userid,$topicid,$levelid)
	{
		$ds=mysqli_query($conn,"SELECT `id` FROM  `practicetestgiven` where `subject_id`='$topicid' and `levelid`='$levelid' and `userid`='$userid'"); 
	$ds1=mysqli_num_rows($ds);
	return $ds1;
		
		
	}
	
	
function existenceofpractice_exerciseinpackage($conn,$packid)
	{
		$ds=mysqli_query($conn,"SELECT * FROM  `edu_pricingqfeatures` where `qfeatureid`='4' and `pricingid`='$packid' and `status`='1' and `view`='1'"); 
	$ds1=mysqli_num_rows($ds);
	return $ds1;
		
		
	}

function getOrderCode($conn,$id){

	$val=1000+$id;

	return "BOSH".$val;

}

function getteststatusfromuseridandtestname($conn,$uid,$tid)
	{
		$ds=mysqli_query($conn,"SELECT * FROM  `testgiven` where `userid`='$uid' and `testname`='$tid' and `status`='1' and `button`='1'"); 
	$ds1=mysqli_num_rows($ds);
	return $ds1;
		
		
	}
	
	function getlastCountryID($conn)
	{
		
		
		
	$ds=mysqli_query($conn,"SELECT `id` FROM `country` where `view`='1' and `status`='1' order by `id` desc limit 0,1"); 
	$ds1=mysqli_fetch_row($ds);
	return $ds1[0];	
		
		
		
		
		
	}
	
?>  