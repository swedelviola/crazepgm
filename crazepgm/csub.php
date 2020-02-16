<?php
include 'FileParser.php';
//include 'connection.php';
function errorHandleC($error){
	return $error;
}
    //putenv("PATH=C:\Program Files (x86)\CodeBlocks\MinGW\bin");
	$CC="gcc";
	$out="timeout 5s ./a.out";      //a.exe; for windows//change for linux
	$code=htmlentities($_POST["text"]);
	//$input=$_POST["textfield2"];
	$filename_code="main.c";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$executable="a.out";
	$command=$CC." -lm ".$filename_code;	
	$command_error=$command." 2>".$filename_error;
	$check=0;
	$hfiles=html_entity_decode("#include<stdio.h>\n#include<math.h>\n#include<ctype.h>\n");
	
	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,htmlspecialchars_decode($hfiles));
	fwrite($file_code,htmlspecialchars_decode($code));
	fclose($file_code);
	exec("chmod 777  $executable"); #change to chmod for linux
	exec("chmod 777  $filename_error");#change to chmod for linux	
	
	$count=0;
	
	$query="select input,output from `testcase` where e_id=1 and p_id=1";
	$result=mysqli_query($connection,$query) or die(mysqli_error($connection));
	$n=mysqli_num_rows($result);
    while($res=mysqli_fetch_assoc($result)){
	$input=$res['input'];
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);

	shell_exec($command_error);
	$error=file_get_contents($filename_error);
	$executionStartTime = microtime(true);

	if(trim($error)=="")
	{
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		//echo "<pre>$output</pre>";
        //echo htmlentities($output);
	}
	else if(!strpos($error,"error"))
	{
		echo errorHandleC($error);
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		//echo "<pre>$output</pre>";
               // echo htmlentities($output);
	}
	else
	{
		echo errorHandleC($error);
		break;
	}
	
	if($output==$res['output']){
	   $count++;
	}
	}
	if($count==$n)
		echo "All testcases passed";
	else if($count!=0)
		echo "Only $count/$n testcase(s) passed";
	else
		echo "None of the testcase passed";
	
	exec("rm $filename_code");
	exec("rm *.o");
	exec("rm *.txt");
	exec("rm $executable");
	
?>