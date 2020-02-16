<?php
$uid=$_POST['uid'];
$eid=$_POST['eid'];
$pid=$_POST['pid'];
include 'FileParser.php';
//include 'connection.php';
function errorHandleC($error){
	return htmlentities($error)."<br>";
}
    //putenv("PATH=C:\Program Files (x86)\CodeBlocks\MinGW\bin");
	$CC="gcc";
	$out="timeout 5s ./a.out";// for windows//change for linux
	$code=htmlentities($_POST["text"]);
	$weight=parse_program(html_entity_decode($code));
	$unid=uniqid();
	$filename_code="main".$unid.".c";
	$filename_in="input".$unid.".txt";
	$filename_error="error".$unid.".txt";
	$executable="a.out";
	$command=$CC." -lm ".$filename_code;	
	$command_error=$command." 2>".$filename_error;
	$hfiles=html_entity_decode("#include<stdio.h>\n#include<math.h>\n#include<ctype.h>\n");
	$count=0;
	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,htmlspecialchars_decode($hfiles));
	fwrite($file_code,htmlspecialchars_decode($code));
	fclose($file_code);
	exec("chmod 777 $executable"); #change to chmod for linux
	exec("calcs 777 $filename_error");#change to chmod for linux	
	
	$query="select input,output from `testcase` where e_id=$eid and p_id=$pid";
	$result=mysqli_query($connection,$query) or die(mysqli_error($connection));
	$n=mysqli_num_rows($result);
    while($res=mysqli_fetch_assoc($result)){
	$input=$res['input'];
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);

	shell_exec($command_error);
	$error=file_get_contents($filename_error);

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
               //echo htmlentities($output);
	}
	else
	{
		echo errorHandleC($error);
		break;
	}
	
	if($output===$res['output']){
	   $count++;
	}
	}
	if($count==$n){
		echo "All testcases passed <br>";
		$co=html_entity_decode($code);
		$query="select * from code_table where u_id=$uid and e_id=$eid and p_id=$pid";
		$result=mysqli_query($connection,$query) or die($connection);
		$count=mysqli_num_rows($result);
		if($count!=0){
			$row=mysqli_fetch_assoc($result);
			$oldweight=$row['pscore'];
			if($oldweight>$weight){
				$q="update `code_table` set code='$co',pscore='$weight' where u_id='$uid' and e_id='$eid' and p_id='$pid'";
				$result=mysqli_query($connection,$q);
		}
			else{
				echo "<pre>Submission Not accepted.You have already submitted code with similar or lesser weight</pre>";
			}
		}
		else{
			$query="insert into `code_table`(u_id,e_id,p_id,code,lastcode,pscore) values('$uid','$eid','$pid','$co','$co','$weight') ";
		    $res=mysqli_query($connection,$query);
		}
		echo "<pre>Weight is $weight</pre>";
	}
	else if($count!=0)
		echo "Only $count/$n testcase(s) passed <br>";
	else
		echo "None of the testcase passed <br>";
	
	exec("rm $filename_code");
	exec("rm *.o");
	exec("rm *.txt");
	exec("rm $executable");
	
?>