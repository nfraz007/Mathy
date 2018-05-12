<?php

/*
	Author : Nazish Fraz
	Date : 2018-02-01
	Description : This is an advance math class where lots of other method are available which generally doesnt available in math
*/
class Mathy{

	public static function add($a = "", $b = "", $string = false){
		if($string){
			$a = (string)$a;
			$b = (string)$b;

			if(strlen($a) < strlen($b)){
				$t = $a;
				$a = $b;
				$b = $t;
			}
			$a_len = strlen($a);
			$b_len = strlen($b);
			// a is larger and b is smaller

			$left = 0;
			$answer = "";
			$j = $b_len-1;
			for($i=$a_len-1;$i>=0;$i--){
				$add = (int)$a[$i] + (int)$b[$j] + $left;
				if($add/10) $tens=$add/10;
				$ones = $add%10;
				$answer=$ones.$answer;
				$left = (int)$tens;
				$j -= 1;
			}
			if($left) $answer=$left.$answer;
			return $answer;
		}else{
			return $a+$b;
		}
	}

	public static function factorial($number = 0, $string = false){
		if($number == 0) return 1;
		elseif($number == 1) return 1;
		elseif($number < 0) throw new Exception("Input must be positive", 1);
		else{
			if($string){
				// for large value, string condition will be true, it will return output in string
				$current = 111;
				return $current;
			}else{
				// normal output
				$answer=1;
				for($i=1;$i<=$number;$i++){
					$answer*=$i;
				}
				return $answer;
			}
		}
	}

	public function calculate($str = ""){
		$len = strlen($str);
		$number = array();
		$operation = array();
		$continue = true;

		for($i=0;$i<$len;$i++){
			if(is_numeric($str[$i])){
				if($continue){
					$n = end($number);
					array_pop($number);
					array_push($number, (int)($n.$str[$i]));
				}else{
					array_push($number, (int)$str[$i]);
				}
				$continue = true;
			}else{
				array_push($operation, $str[$i]);
				$continue = false;
			}
		}
		echo json_encode($number)." | ".json_encode($operation)."<br>";
		// start partial solving, it will solve the equation and bring it to plus and minus
		$pos = array_search("*", $operation);
		do{
			$val = $number[$pos]*$number[$pos+1];
			$number[$pos] = $val;
			array_splice($number, $pos+1, 1);
			array_splice($operation, $pos, 1);
			echo json_encode($number)." | ".json_encode($operation)." | ".$pos."<br>";
			$pos = array_search("*", $operation);
		}while($pos!==false);
		return "done";
	}

	// Algebra
	public function gcd($a,$b){
		return ($a%$b) ? gcd($b,$a%$b) : $b;
	}

	public function lcm($a,$b){
		return $a*$b/gcd($a,$b);
	}

	public function factor($number){
		return 1;
	}

	public function isPrime($number){
		return 1;
	}

	public function nextPrime($number,$pos=1){
		return 1;
	}

	// quadratic equation

	// polynomial

	// linear varialble

	// complex number

	// permutation combination
	public function factorial($number){
		$factorial=1;
		for($i=1;$i<=$number;$i++){
			$factorial*=$i;
		}
		return $factorial;
	}

	public function ncr($n,$r){
		return factorial($n)/(factorial($r)*factorial($n-$r));
	}

	public function npr($n,$r){
		return factorial($n)/factorial($n-$r);
	}

	// vector

	// series

	// stright line

	// mensuration

	// statistic
	public function sum($arr){
		$sum=0;
		for($i=0;$i<sizeof($arr);$i++){
			$sum+=$arr[$i];
		}
		return $sum;
	}

	public function mid($a,$b){
		return ($a+$b)/2;
	}

	public function mean($arr){
		return $this->sum($arr)/sizeof($arr);
	}

	public function median($arr){
		sort($arr);
		$l=sizeof($arr);
		if($l%2==0){
			//even size
			return $this->mid($arr[$l/2-1],$arr[$l/2]);
		}else{
			return $arr[$l/2];
		}
	}

	public function mode($arr){
		return 1;
	}
}

?>