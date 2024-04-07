<?php

$array = array_fill(0, 10000000, 0);
$array = array_map(function () {
    return rand(0, 10000000);
}, $array);

QuickSort($array, 0, count($array)-1);
print_r($array);

function QuickSort(&$array, $start, $end): void
{
    if($start > $end){
        return;
    }

    $pivot = Partition($array, $start, $end);
    QuickSort($array, $start, $pivot-1);
    QuickSort($array, $pivot+1, $end);
}

function Partition(&$array, $start, $end): int
{
    $marker = $start;
    for ($i = $start; $i < $end; $i++) {
        if ($array[$i] < $array[$end]) {
            $temp = $array[$i];
            $array[$i] = $array[$marker];
            $array[$marker] = $temp;

            $marker += 1;
        }
    }
    $temp = $array[$end];
    $array[$end] = $array[$marker];
    $array[$marker] = $temp;

    return $marker;
}