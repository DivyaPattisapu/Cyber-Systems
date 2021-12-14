<?php
void openSerial() {
	$openSerialOK = false;
	try {
		exec("mode com4: BAUD=115200 PARITY=n DATA=8 STOP=1 to=off dtr=off rts=off");
		$fp =fopen("com4", "w");
		//$fp = fopen('/dev/ttyUSB0','r+'); //use this for Linux
		$openSerialOK = true;
	} catch(Exception $e) {
		echo 'Message: ' .$e->getMessage();
	}

	if($openSerialOK) {
		fwrite($fp, $command); //write string to serial
		fclose($fp);
    }	
}

openSerial("Without this line, the first control will not work. I don't know way.");

if(isset($_POST['submit1'])) {
    openSerial();echo 'First one';
}

if(isset($_POST['submit2'])) {
    openSerial();
	echo 'Second one';
}

if(isset($_POST['submit3'])) {
    openSerial("@00 on 2\r");
	echo 'Thirdone';
}

if(isset($_POST['submit4'])) {
    echo 'Fourth one';
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   <input type="submit" name="submit1" value="1 on"><br>
   <input type="submit" name="submit2" value="1 off"><br>
   <input type="submit" name="submit3" value="2 on"><br>
   <input type="submit" name="submit4" value="2 off"><br>   
</form>

