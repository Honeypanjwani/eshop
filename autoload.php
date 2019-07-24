<?php
function autoLoader($class){
	$className=strtolower($class);
	if(phpversion()>=5.4){
		$dirs=["class/","lib/","../class/","../lib/"];
		$files=["%s.php"];
		
		foreach($dirs as $dir){
			foreach($files as $file){
			    $path=$dir.sprintf($file,$className);	
				if(file_exists($path)){
					require_once($path);
				}
			}
		}
	}else{
		echo "upgrade your version your version is old";
	}
	
	
}

spl_autoload_register("autoLoader");

?>