<?php
function get_result($factor_1, $factor_2, $limit)
{
    function sum_of_AP($limit, $factor)
    {
        // Функция высчитывает сумму прогрессии, находя максимальный элемент прогрессии, меньший максимального числа.

        $max_AP_term = intdiv($limit, $factor);
        return $max_AP_term*$factor*($max_AP_term+1)/2;
    }

    $limit = $limit-1;

    return sum_of_AP($limit, $factor_1)+sum_of_AP($limit, $factor_2)-sum_of_AP($limit, $factor_1*$factor_2);
}

echo get_result(3, 5, 1000);
