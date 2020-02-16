<?php
function errorHandleC($error){
	return $error;
}
    //putenv("PATH=C:\Program Files (x86)\CodeBlocks\MinGW\bin");
	$CC="gcc";
	$out="timeout 5s ./a.out";//$out="a.exe";//change for linux
	$code=htmlentities($_POST["code"]);
	$filename_code="main.c";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$executable="a.out";
	$command=$CC." -lm ".$filename_code;	
	$command_error=$command." 2>".$filename_error;
	$hfiles=html_entity_decode("#include<stdio.h>\n#include<math.h>\n#include<ctype.h>\n");
	
	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,htmlspecialchars_decode($hfiles));
	fwrite($file_code,htmlspecialchars_decode($code));
	fclose($file_code);
	exec("chmod 777  $executable"); #change to chmod for linux
	exec("chmod 777  $filename_error");#change to chmod for linux	

	shell_exec($command_error);
	$error=file_get_contents($filename_error);
	$executionStartTime = microtime(true);
    
	while($nf>0){
  $input=$_POST["ip$nf"];
  $file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
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
	else
	{
		echo errorHandleC($error);
	}
	$stmt->bind_param("ss", $input,$output);	
	$stmt->execute();
	$nf=$nf-1;
	}
	exec("rm $filename_code");
	exec("rm *.o");
	exec("rm *.txt");
	exec("rm $executable");
	
?>
