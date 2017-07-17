<?php
/**
 * 希尔排序
 * 基本思想：
 * （shell sort）：希尔排序是基于插入排序的，区别在于插入排序是相邻的一个个比较（类似于希尔中h=1的情形），而希尔排序是距离h的比较和替换。 希尔排序中一个常数因子n，原数组被分成各个小组，每个小组由h个元素组成，很可能会有多余的元素。当然每次循环的时候，h也是递减的（h=h/n）。第一次循环就是从下标为h开始。希尔排序的一个思想就是，分成小组去排序。
 * 该方法实质上是一种分组插入方法。
 * 希尔排序是不稳定的
 */
function shellSort(array $arr)
{
    // 将$arr按升序排列
    $len = count($arr);
    $f = 3;// 定义因子
    $h = 1;// 最小为1
    while ($h < $len/$f){
        $h = $f*$h + 1; // 1, 4, 13, 40, 121, 364, 1093, ...
    }
    while ($h >= 1){  // 将数组变为h有序
        for ($i = $h; $i < $len; $i++){  // 将a[i]插入到a[i-h], a[i-2*h], a[i-3*h]... 之中 （算法的关键
            for ($j = $i; $j >= $h;  $j -= $h){
                if ($arr[$j] < $arr[$j-$h]){
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j-$h];
                    $arr[$j-$h] = $temp;
                }
                //print_r($arr);echo "\n"; // 打开这行注释，可以看到每一步被替换的情形
            }
        }
        $h = intval($h/$f);
    }
    return $arr;
}
$list = array(3, 6, 2, 4, 10, 1 ,9, 8, 5, 7);
var_dump(shellSort($list));
