<?php

function execution_speed($function_name, $repetitions_count, $arg_1, $arg_2, $arg_3)
{
    $time_stamps = [];
    for ($i = 0; $i < $repetitions_count; $i++) {
        $start = hrtime(true);
        call_user_func($function_name, $arg_1, $arg_2, $arg_3);
        $end = hrtime(true);
        $time_stamps[] = ($end  - $start)/1e+6;
    }
    $result = array_sum($time_stamps)/count($time_stamps);
    echo "Среднее время выполнения функции $function_name: ".$result.'ms<br>';
    return $result;
}

function sum_of_AP($limit, $factor)
{
    $max_AP_term = intdiv($limit, $factor);
    return $max_AP_term*$factor*($max_AP_term+1)/2;
}

function get_result_with_AP($factor_1, $factor_2, $limit)
{
    $limit = $limit-1;
    return sum_of_AP($limit, $factor_1)+sum_of_AP($limit, $factor_2)-sum_of_AP($limit, $factor_1*$factor_2);
}

function get_result_with_1_loop($factor_1, $factor_2, $limit)
{
    $result = 0;
    for ($i = 0; $i < $limit; $i++){
        if (($i % $factor_1 == 0) or ($i % $factor_2 == 0)) {
            $result += $i;
        }
    }
    return $result;
}

$time_1 = execution_speed('get_result_with_AP', 10000, 3, 5, 1000);
$time_2 = execution_speed('get_result_with_1_loop', 10000, 3, 5, 1000);
echo "<br>";
echo "Функция get_result_with_AP в ".$time_2/$time_1." раз быстрее, чем функция get_result_with_1_loop";