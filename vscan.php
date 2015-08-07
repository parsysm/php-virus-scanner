<?php

class virusScan{
	
	function virusScan($content, $address = ''){
		$this->activexScan($content);
		$this->exeScan($content, $address);
		$this->dllScan($content, $address);
		$this->binScan($content);
		$this->batScan($content);
		$this->soScan($content);
	}
	
	function activexScan($content){
		$start = 'ActiveXObject(';
    	$end = ')';

    	preg_match("/$start(.*)$end/s", $content, $match);
    	foreach($match as $key => $val){
			if($val != '"Msxml2.XMLHTTP"' || $val != '"Microsoft.XMLHTTP"'  || $val != "'Msxml2.XMLHTTP'"  || $val != "'Microsoft.XMLHTTP'"){
				$this->vFound();								
			}
		}
		
	}
	
	function exeScan($content, $address){
		if(strrpos($content, '.exe')){
			$this->vFound();								
		}
	}
	
	function dllScan($content, $address){
		if(strrpos($content, '.dll')){
			$this->vFound();								
		}
	}
	
	function binScan($content){
		if(strrpos($content, '.bin')){
			$this->vFound();								
		}
	}
	
	function batScan($content){
		if(strrpos($content, '.bat')){
			$this->vFound();								
		}
	}
	
	function soScan($content){
		if(strrpos($content, '.so')){
			$this->vFound();								
		}
	}
	
	function vFound(){
	 die('!!!Virus Found Content Unsafe!!!');
	}
}
?>