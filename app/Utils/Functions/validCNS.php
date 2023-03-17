<?php
function validCNS($cns)
{
    $cns = preg_replace('/[^0-9]/', '', (string) $cns);

    if (strlen($cns) != 15) {
        return false;
    }

    $invalids = [
        '000000000000000',
        '111111111111111',
        '222222222222222',
        '333333333333333',
        '444444444444444',
        '555555555555555',
        '666666666666666',
        '777777777777777',
        '888888888888888',
        '999999999999999'
    ];

    if (in_array($cns, $invalids)) {
        return false;
    }

    $action = substr($cns, 0, 1);

    switch ($action) {
        case '1':
        case '2':
            return checkCns($cns);
        case '7':
            return checkCnsProv($cns);
        case '8':
            return checkCnsProv($cns);
        case '9':
            return checkCnsProv($cns);
        default:
            return false;
    }
}

function checkCns($cns)
{
    $pis = substr($cns, 0, 11);
    $sum = 0;

    for ($i = 0, $j = strlen($pis), $k = 15; $i < $j; $i++, $k--) :
        $sum += $pis[$i] * $k;
    endfor;

    $dv = 11 - fmod($sum, 11);
    $dv = ($dv != 11) ? $dv : '0'; // retorna '0' se for igual a 11

    if ($dv == 10) {
        $sum += 2;
        $dv = 11 - fmod($sum, 11);
        $result = $pis . '001' . $dv;
    } else {
        $result = $pis . '000' . $dv;
    }

    if ($cns != $result) {
        return false;
    } else {
        return true;
    }
}

function checkCnsProv($cns)
{
    $sum = 0;

    for ($i = 0, $j = strlen($cns), $k = $j; $i < $j; $i++, $k--) :
        $sum += $cns[$i] * $k;
    endfor;

    return $sum % 11 == 0 && $j == 15;
}
