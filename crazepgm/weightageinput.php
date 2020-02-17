<?php 

//AAYUSH

	session_start();
	include 'connection.php';
	//$p_id = $_SESSION['p_id'];	uncomment this after pipeline
	//$e_id = $_SESSION['e_id'];			"

	$alphabets = $_POST['alphabets'];
	$arithmetic_operator = $_POST['arithmetic_operator'];
	$assignment_operator = $_POST['assignment_operator'];
	$bitwise_operator = $_POST['bitwise_operator'];
	$digits = $_POST['digits'];
	$dollar = $_POST['dollar'];
	$underscore = $_POST['underscore'];
	$relational_operator = $_POST['relational_operator'];
	$auto = $_POST['auto'];
	$break = $_POST['break'];
	$case = $_POST['case'];
	$char = $_POST['char'];
	$const = $_POST['const'];
	$continue = $_POST['continue'];
	$default = $_POST['default'];
	$do = $_POST['do'];
	$double = $_POST['double'];
	$else = $_POST['else'];
	$enum = $_POST['enum'];
	$extern = $_POST['extern'];
	$float = $_POST['float'];
	$for = $_POST['for'];
	$goto = $_POST['goto'];
	$if = $_POST['if'];
	$int = $_POST['int'];
	$long = $_POST['long'];
	$register = $_POST['register'];
	$return = $_POST['return'];
	$short = $_POST['short'];
	$signed = $_POST['signed'];
	$sizeof = $_POST['sizeof'];
	$static = $_POST['static'];
	$struct = $_POST['struct'];
	$switch = $_POST['switch'];
	$typedef = $_POST['typedef'];
	$union = $_POST['union'];
	$unsigned = $_POST['unsigned'];
	$void = $_POST['void'];
	$volatile = $_POST['volatile'];
	$while = $_POST['while'];

	//$sql = "INSERT into weight VALUES ($e_id,$p_id,$alphabets,$arithmetic_operator,$assignment_operator,$bitwise_operator,$digits,$dollar,$underscore,$relational_operator,$auto,$break,$case,$char,$const,$continue,$default,$do,$double,$else,$enum,$extern,$float,$for,$goto,$if,$int,$long,$register,$return,$short,$signed,$sizeof,$static,$struct,$switch,$typedef,$union,$unsigned,$void,$volatile,$while)"; uncomment after pipeline

	$sql = "INSERT into weight VALUES (0,0,$alphabets,$arithmetic_operator,$assignment_operator,$bitwise_operator,$digits,$dollar,$underscore,$relational_operator,$auto,$break,$case,$char,$const,$continue,$default,$do,$double,$else,$enum,$extern,$float,$for,$goto,$if,$int,$long,$register,$return,$short,$signed,$sizeof,$static,$struct,$switch,$typedef,$union,$unsigned,$void,$volatile,$while)"; //comment this after pipeline



	$result = mysqli_query($connection,$sql);
	if($result)
	{
		echo "Record insterted successfully";
		header("Location: Dashboard.html");
	}
	else
	{
		echo "ERRRRR";
	}


 ?>