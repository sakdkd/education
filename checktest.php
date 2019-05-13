<?php 
// Efficient PHP program to 
// make sorted array elements 
// distinct by incrementing 
// elements and keeping sum 
// to minimum. 

// To find minimum sum 
// of unique elements. 
$newarr=array();

function minSum($arr, $n,$newarr,$newarrnew) 
{ 
	//$sum = $arr[0]; 
	//$prev = $arr[0]; 

 $max=max($arr);
	for ( $i = 0; $i <$n; $i++) 
	{ 

		// If violation happens, 
		// make current value as 
		// 1 plus previous value 
		// and add to sum. 
		
		// No violation. 
		
	echo  $first=$arr[$i];
		if(in_array($first,$arr))
		{ $counts=array_count_values($arr); 
		
		$no_count=$counts[$first]; 
			if($no_count>1)
			{
				
				
			if($first<=$max)
			{
				
			$first++;	
			array_push($newarr,$first);	
				

				
			}
			
			
			
		}
		
		else
		{
			
echo "here";
			
				 $first=$arr[$i];

							array_push($newarr,$first);	
			

				
			
			
			
			
		}
		
		} 
		
	} 

print_r($newarr);

$unique=array_unique($newarr);
//$sum=array_sum($unique);
	return $sum; 
} 

// Driver code 
$arr = array(3,1,2,3,7); 
$n = count($arr); 
$newarr=array();
$newarrnew=array();
echo minSum($arr, $n,$newarr,$newarrnew); 

// This code is contributed by anuj_67. 
?> 
