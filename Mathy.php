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
}

?>