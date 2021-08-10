<?php

$error = [];

$aC   = [];
$llC  = [];
$zzC  = [];
$jjC  = [];
$nnnC = [];

for($i=0 ; $i<=99 ; $i++){
	if($i < 10){
		$aaC[] = '0'.$i;
	}else{
		$aaC[] = ''.$i;
	}
}

for($i=1 ; $i<=12 ; $i++){
	if($i < 10){
		$llC[] = '0'.$i;
	}else{
		$llC[] = ''.$i;
	}
}

for($i=1 ; $i<=31 ; $i++){
	if($i < 10){
		$zzC[] = '0'.$i;
	}else{
		$zzC[] = ''.$i;
	}
}

for($i=1 ; $i<=52 ; $i++){
	if($i < 10){
		$jjC[] = '0'.$i;
	}else{
		$jjC[] = ''.$i;
	}
}
for($i=1 ; $i<=999 ; $i++){
	if($i<10){
		$nnnC[] = '00'.$i;
	}elseif($i<100){
		$nnnC[] = '0'.$i;
	}else{
		$nnnC[] = ''.$i;
	}

}

if(isset($_POST["cnp"])){
	$cnp = $_POST["cnp"];
	if(strlen($cnp) == 13){

		$cpnArr  = str_split($cnp);

		$cnpArrC = str_split('279146358279');

		$onlyNum = [];
		for($i=0 ; $i<13 ; $i++){
			if(is_numeric($cnp[$i])){
				$onlyNum[$i] = true;
			}
		}
		if(13 == count($onlyNum)){
			$s   = $cnp[0];
			$aa  = $cnp[1].$cnp[2];
	 		$ll  = $cnp[3].$cnp[4];
			$zz  = $cnp[5].$cnp[6];
			$jj  = $cnp[7].$cnp[8];
			$nnn = $cnp[9].$cnp[10].$cnp[11];
			$c   = $cnp[12];

			if(!in_array($s, range(1,9))){
				$error[] = 's';
			}

			if(!in_array($aa, $aaC)){
				$error[] = 'aa';
			}
			if(!in_array($ll, $llC)){
				$error[] = 'll';
			}

			if(!in_array($zz, $zzC)){
				$error[] = 'zz';
			}

			if(!in_array($jj, $jjC)){
				$error[] = 'jj';
			}

			if(!in_array($nnn, $nnnC)){
				$error[] = 'nnn';
			}

			$sum = 0;
			for($i=0 ; $i<12 ; $i++){
				$sum += intval($cpnArr[$i]) * intval($cnpArrC[$i]);
			}
			$cR = $sum % 11;
			if($cR == 10 && $c != 1){
				$error[] = 'c';
			}
			if($cR != 10 && $c != $cR){
				$error[] = 'c';
			}

		}else{
			$error[] = 'type';
		}

	}else{
		$error[] = 'length';
	}
}

if(empty($error)){
	echo '<p style="text-align: center; color: green; font-size: 20px;">CNP-ul tau este valid';
}else{
	echo '<p style="text-align: center; color: red; font-size: 20px;">CNP-ul tau nu este valid</p>';
}

?>

<style>
	.wrapper{
		width: 900px;
		margin: 0 auto;
		text-align: center;
		padding: 50px;
	}

</style>
<div class="wrapper">
	<p>Verifica CNP-ul tau:</p>
	<form method="POST">
		<input type="text" name="cnp" placeholder="CNP">
		<input type="submit" value="Verifica">
	</form>
</div>