<?php
function highest_palindrome() {
    //input
    $input = [
        ["3943", 1],
        ["932239", 2]
    ];

    foreach ($input as $i) {
        list($s, $k) = $i;
        $result = find_highest_palindrome($s, $k);
        echo "Input: $s, k: $k ";
        echo "Output: $result ";
    }
}

highest_palindrome();

//fungsi untuk memastikan string menjadi palindrome dengan maksimum k perubahan
function make_palindrome($s, $k, $left = 0, $right = null) {
    if ($right === null) {
        $right = strlen($s) - 1;
    }
    
    if ($left >= $right) {
        return $s;
    }

    if ($s[$left] == $s[$right]) {
        return make_palindrome($s, $k, $left + 1, $right - 1);
    }

    if ($k == 0) {
        return "-1";
    }

    $higher_value = max($s[$left], $s[$right]);
    $s[$left] = $higher_value;
    $s[$right] = $higher_value;

    return make_palindrome($s, $k - 1, $left + 1, $right - 1);
}

//fungsi untuk mendapat nilai maksimal palindrome
function maximize_palindrome($s, $k, $left = 0, $right = null) {
    if ($right === null) {
        $right = strlen($s) - 1;
    }

    if ($left >= $right) {
        return $s;
    }

    if ($s[$left] == $s[$right]) {
        return maximize_palindrome($s, $k, $left + 1, $right - 1);
    }

    if ($k == 0) {
        return $s;
    }

    $s[$left] = '9';
    $s[$right] = '9';

    return maximize_palindrome($s, $k - 2, $left + 1, $right - 1);
}

//fungsi gabungan untuk kedua fungsi
function find_highest_palindrome($s, $k) {
    $s = make_palindrome($s, $k);
    if ($s === "-1") {
        return "-1";
    }
    return maximize_palindrome($s, $k);
}
?>
