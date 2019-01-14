<?php 

set_time_limit(30);//tempo limite de processamento

$number_of_groups = 10;
$sum_to = 1050;

$groups = array();
$group = 0;

while (array_sum($groups) != $sum_to) {
$groups[$group] = mt_rand(0, $sum_to / mt_rand(1, 5));

if (++$group == $number_of_groups) {
$group = 0;
}
}
var_dump($groups);

 ?>