<?php
$array=["1"=>"Available",
"2"=>"Hold",
"3"=>"Sold"];
$result=array();
if(isset($_REQUEST["q"]))
{
$input=$_REQUEST["q"];
$result = array_filter($array, function ($item) use ($input) {
    if (stripos($item,$input) !== false) {
        return true;
    }
    return false;
});

}
else
{
	$result=$array;		
}
foreach ($result as $key => $value) 
			{
				$json[]=['id'=>strtok($key, " "),'text'=>"$value"];
			}
echo json_encode($json);


?>