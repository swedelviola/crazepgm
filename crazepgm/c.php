<?php
//your database must be having the weight table filled and change FileParser's query using session variables
$eid=$_POST['eid'];
include 'FileParser.php';
//include 'connection.php';
function errorHandleC($error){
	return htmlentities($error);
}
    //putenv("PATH=C:\Program Files (x86)\CodeBlocks\MinGW\bin");#cpmment for linux
	$CC="gcc";
	$unid=uniqid();
	$out="timeout 5s ./main".$unid;//change to a.out for linux
	$code=htmlentities($_POST["text"]);
	$weight=parse_program(html_entity_decode($code));
	if(empty(trim($code))){
		echo "Write Your Code Then Run!";
		exit;
	}
	$uid=$_POST['uid'];
	$input=$_POST["textfield2"];
	$cbox=$_POST['cbox'];
	$filename_code="main".$unid.".c";
	$sample_code="sample".$unid.".c";
	$filename_in="input".$unid.".txt";
	$sample_in="sample".$unid.".txt";
	$filename_error="error".$unid.".txt";
	$sample_error="sampleerr".$unid.".txt";
	$executable="main".$unid;	
	$command1=$CC." -lm ".$filename_code." -o main".$unid;
    $command2=$CC." -lm ".$sample_code;
	$command1_error=$command1." 2>".$filename_error;
	$command2_error=$command2." 2>".$sample_error;
	$check=0;
	$hfiles=html_entity_decode("#include<stdio.h>\n#include<math.h>\n#include<ctype.h>\n");
	$pid=$_POST['pid'];
	//change values in the following query by providing session values of eid and pid
	$query="select sample_input from `problem` where e_id=$eid and p_id=$pid";
	$result=mysqli_query($connection,$query) or die(mysqli_error($connection));
    $res=mysqli_fetch_array($result);
    $dbinput=$res[0];
	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,htmlspecialchars_decode($hfiles));
	fwrite($file_code,htmlspecialchars_decode($code));
	fclose($file_code);
	
	$sample_file=fopen($sample_code,"w+");
	$query="select sample_pgm from `problem` where e_id=$eid and p_id=$pid";
	$result=mysqli_query($connection,$query) or die(mysqli_error($connection));
    $res=mysqli_fetch_array($result);
    $dbcode=$res[0];
	fwrite($sample_file,htmlspecialchars_decode($hfiles));
	fwrite($sample_file,htmlspecialchars_decode($dbcode));
	fclose($sample_file);
	
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
	exec("chmod 777  $executable"); #change to chmod 777 for linux
	exec("chmod 777 $filename_error");#change to chmod 777 for linux	
	exec("chmod 777  $sample_error");#change to chmod 777 for linux	
	
	$sample_input=fopen($sample_in,"w+");
	fwrite($sample_input,$dbinput);
	fclose($sample_input);
	$co=html_entity_decode($code);
	$q1="select * from `code_table` where u_id=$uid and e_id=$eid and p_id=$pid";
	$result=mysqli_query($connection,$q1);
	$c1=mysqli_num_rows($result);
	if($c1==0){
		$query="insert into `code_table`(u_id,e_id,p_id,lastcode) values('$uid','$eid','$pid','$co') ";
		$res=mysqli_query($connection,$query);
	}
	else{
		$query="update `code_table` set lastcode='$co' where u_id='$uid' and e_id='$eid' and p_id='$pid'";
		$res=mysqli_query($connection,$query);
	}
	shell_exec($command1_error);
	
	$error=file_get_contents($filename_error);
	if(trim($error)=="")
	{
		if(trim($input)=="" || $cbox=="0")
		{   
            $out=$out." < ".$sample_in;
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		//echo "<pre>$output</pre>";
        echo htmlentities($output)."<br>";
	}
	else if(!strpos($error,"error"))
	{   
		echo errorHandleC($error);
		if(trim($input)=="" || $cbox=="0")
		{
			$out=$out." < ".$sample_in;
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
                echo htmlentities($output)."<br>";
	}
	else
	{
		echo errorHandleC($error);
		goto abc;
	}
	
	shell_exec($command2_error);
	
	$error1=file_get_contents($sample_error);
	
	if(trim($error1)=="")
	{
		if(trim($input)=="" || $cbox=="0")
		{  
            $out=$out." < ".$sample_in;
			$output2=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output2=shell_exec($out);
		}
		//echo "<pre>$output2</pre>";
	}
	if($output==$output2){
		echo "<br>Correct output";
	}
	else
		echo "Wrong output :)";
	abc:
	echo "<pre>Weight is $weight</pre>";
	exec("rm $sample_code");
	exec("rm $filename_code");#change del to rm
	exec("rm *.o");
	exec("rm *.txt");
	exec("rm $executable");
	
?>
