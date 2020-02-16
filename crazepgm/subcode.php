
<?php
$c=$_POST["text"];
if(substr_count($c,"#include")==0){
include 'csub.php';
}
else
	echo "Do not use #include";
?>