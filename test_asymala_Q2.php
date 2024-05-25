<?php

//input pertanyaan
$input = "{ ( ( [ ] ) [ ] ) [ ] }";

//output
    echo "Input: $input ";
    echo "Output: " . checkTandaKurung($input);

function checkTandaKurung($s) {
    // pasangan bracket
    $tandaKurung = array(
        ')' => '(',
        '}' => '{',
        ']' => '['
    );
    // temp nilai array
    $temp_nilai = array();
    
    // looping setiap string
    for ($i = 0; $i < strlen($s); $i++) {
        $temp_char = $s[$i];
        
        // jika bracket sama push to array temp_nilai
        if (in_array($temp_char, $tandaKurung)) {
            $temp_nilai[] = $temp_char;
        } elseif (array_key_exists($temp_char, $tandaKurung)) {
            // jika tidak sesuai return no
            if (empty($temp_nilai) || array_pop($temp_nilai) != $tandaKurung[$temp_char]) {
                return "NO";
            }
        }
    }
    
    // jika variable kosong maka return yes 
    return empty($stack) ? "YES" : "NO";
}
?>
