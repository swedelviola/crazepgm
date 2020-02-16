<?php
session_start();
include 'connection.php';
function break_line($program){
$line=explode("\n",trim($program));
return $line;
}
function break_words($line){
	$wordss=explode(" ",trim($line));
	$c=count($wordss);
	for($a=0;$a<$c;$a++){
		if($wordss[$a]=="")
			unset($wordss[$a]);
	}
	$words=array();
	foreach($wordss as $word){
	array_push($words,$word);
	}
	return $words;
}
function break_letters($word){
	$letters=str_split(trim($word));
	return $letters;
}
function parse_keywords(){
	global $WEIGHT,$keywords,$words;
	foreach($words as $word){
		if(array_key_exists($word,$keywords)){
			//program to add weight for keywords
			$WEIGHT=$WEIGHT+$keywords[$word];
		}
	}
}
function parse_data(){
	global $WEIGHT,$letters,$alpha,$arithmetic,$assignment,$bitwise,$digits,$dollar,$underscore,$relational;
	$i=0;
	for($i=0;$i<count($letters);$i++){
		$letter=$letters[$i];
		if(ctype_alpha($letter)){
			$WEIGHT=$WEIGHT+$alpha;
		}
		else if($letter=="_"){
			$WEIGHT=$WEIGHT+$underscore;
		}
		else if($letter=="$"){
			$WEIGHT=$WEIGHT+$dollar;
		}
		else if(is_numeric($letter)){
			$WEIGHT=$WEIGHT+$digits;
		}
		else if($letter=="<" || $letter==">"){
			if($letters[$i+1]=="<" ||$letters[$i+1]==">"){
			$WEIGHT=$WEIGHT+$bitwise;
			$i++;
			}
			else if($letters[$i+1]=="="){
				$WEIGHT=$WEIGHT+$relational;
				$i++;
			}
			else{
				$WEIGHT=$WEIGHT+$relational;
			}
		}
		else if($letter=="+" || $letter=="-" || $letter=="*" ||$letter=="/"){
			$WEIGHT=$WEIGHT+$arithmetic;
		}
		else if($letter=="~" || $letter=="^" || $letter=="|" ||$letter=="&"){
			$WEIGHT=$WEIGHT+$bitwise;
		}
		else if($letter=="="){
			$WEIGHT=$WEIGHT+$assignment;
		
		}
	}	
}

$str = "";
$WEIGHT = 0;
$stringarr="";
$words=array(); // will contain words used in the program, that are seperated by space
$letters=array();//will contain each character used in program

$keywords=array("auto" => 0,"break"=> 0,"case"=> 50,"char"=> 0,"const"=> 0,"continue"=> 0,"default"=> 0,"do"=> 0,"double"=> 0,"else"=> 0,"enum"=> 0,"extern"=> 0,
"float"=> 0,"for"=> 5000,"goto"=>100,"if"=> 0,"int"=> 0,"long"=> 0,"register"=> 0,"return"=> 0,"short"=> 0,"signed"=> 0,
"sizeof"=> 0,"static"=> 0,"struct"=> 0,"switch"=> 500,"typedef"=> 0,"union"=> 0,"unsigned"=> 0,"void"=> 0,"volatile"=> 0,"while"=> 3000);
$eid=$_SESSION['eid'];
$query="select * from `weight` where e_id=$eid";
$result=mysqli_query($connection,$query) or die(mysqli_error($connection));
$row=mysqli_fetch_array($result);
$x=9;
foreach($keywords as $key=>$value){
		$keywords[$key]=$row[$x++];
}

$alpha=$row[1];
$arithmetic=$row[2];
$assignment=$row[3];
$bitwise=$row[4];
$digits=$row[5];
$dollar=$row[6];
$underscore=$row[7];
$relational=$row[8];
//code for removing multiple addition of weights for same keyword, once in parse_data and in parse_keywords

foreach($keywords as $key=>$value){
	if($value!=0){
		$n=strlen($key)*$alpha;
		$keywords[$key]=$keywords[$key]-$n;
	}
}
function parse_program($prog){
	global $str,$WEIGHT,$keywords,$stringarr,$words,$letters;
	$str=$prog;
$stringarr=break_line($str);

for($i=0; $i<count($stringarr); $i++) {
		$words123=break_words($stringarr[$i]);
		foreach($words123 as $x)
		array_push($words,$x);
}
for($j=0; $j<count($words);$j++){
					$letter123=break_letters($words[$j]);
					foreach($letter123 as $x)
					array_push($letters,$x);
}
parse_keywords();
parse_data();
return $WEIGHT;
}
?> 

