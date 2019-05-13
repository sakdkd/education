<?php 
// Efficient PHP program to 
// make sorted array elements 
// distinct by incrementing 
// elements and keeping sum 
// to minimum. 

// To find minimum sum 
// of unique elements. 
function minSum($arr, $n) 
{ 
	$sum = $arr[0]; 
	$prev = $arr[0]; 

	for ( $i = 1; $i < $n; $i++) 
	{ 

		// If violation happens, 
		// make current value as 
		// 1 plus previous value 
		// and add to sum. 
		if ($arr[$i] <= $prev) 
		{ 
			$prev = $prev + 1; 
			$sum = $sum + $prev; 
		} 

		// No violation. 
		else
		{ 
			$sum = $sum + $arr[$i]; 
			$prev = $arr[$i]; 
		} 
	} 

	return $sum; 
} 

// Driver code 
$arr = array(3,1,2,3,7); 
$n = count($arr); 
echo minSum($arr, $n); 

// This code is contributed by anuj_67. 
?> 
