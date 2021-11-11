<?php
	echo "1.".isStringInFile('withsign.pdf', 'adbe.pkcs7.detached')."<br>";
	echo "2.".isStringInFile('withoutsign.pdf', 'adbe.pkcs7.detached');
    
    function isStringInFile($file,$string){
        $handle = fopen($file, 'r');
        $valid 	= false;
		$signed	= "Not Digitally Signed.";
        while (($buffer = fgets($handle)) !== false) {
            if (strpos($buffer, $string) !== false) {
                $valid 	= TRUE;
				$signed	= "Digitally Signed.";
                break;
            }      
        }
        fclose($handle);
        return $signed;
    }
?>