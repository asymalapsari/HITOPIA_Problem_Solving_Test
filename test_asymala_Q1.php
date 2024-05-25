<?php
//input huruf dan array angka
$huruf = "abbcccd";
$angka = array(1, 3, 9, 8);

$output = cekSkorHuruf($huruf, $angka);
print_r($output);

function nilaiHuruf($string) {
    $temp_nilai = 0;
    $huruf_array = array();
    $huruf_array_length = strlen($string);

    //looping untuk huruf yang dipecah menjadi array
    for ($i = 0; $i < $huruf_array_length; $i++) {
        //memeriksa apakah huruf berikutnya sama seperti huruf saat ini
        if ($i > 0 && $string[$i] == $string[$i - 1]) {
            //menambahkan possbile score yang dihasilkan
            $temp_nilai += (ord($string[$i]) - ord('a') + 1);
        } else {
            //skor tetap, karena tidak ada huruf yang sama
            $temp_nilai = (ord($string[$i]) - ord('a') + 1);
        }

        $huruf_array[] = $temp_nilai;
    }

    return $huruf_array;
}

function cekSkorHuruf($huruf, $angka) {
    $huruf_array = nilaiHuruf($huruf);
    $results = array();
    //looping array angka pada pertanyaan, kemudian dilakukan pengecekan kesamaan possible score dengan fungsi nilai huruf
    foreach ($angka as $a) {
        if (in_array($a, $huruf_array)) {
            $results[$a] = "Yes";
        } else {
            $results[$a] = "No";
        }
    }

    return $results;
}

?>