<?php
//error_reporting(0);
/**
 * 插入排序:
 * 每次将一个待排序的数据元素，插入到前面已经排好序的数列中的适当位置，使数列依
 * 然有序；直到待排序数据元素全部插入完为止。
 */
function insert_sort($arr){
	$arr_count = count($arr);
	for ($i=1; $i < $arr_count ; $i++) { 
		$tmp = $arr[$i];
		$j = $i - 1;
		while ($arr[$j] > $tmp){
			$arr[$j+1] = $arr[$j];
			$arr[$j] = $tmp;
			if($j == 0)
				continue;
			$j--;
		}
	}
	return $arr;
}


/**
 * 选择排序
 * 每一趟从待排序的数据元素中选出最小（或最大）的一个元素，顺序放在已排好序的数
 * 列的最后，直到全部待排序的数据元素排完。
 */
function select_sort($arr){
	$arr_count = count($arr);
	for ($i=0; $i < $arr_count ; $i++) { 
		$k = $i;
		for ($j=$i+1; $j < $arr_count ; $j++) { 
			if($arr[$k] > $arr[$j])
				$k = $j;
		}
		if($k != $i){
			$tmp = $arr[$i];
			$arr[$i] = $arr[$k];
			$arr[$k] = $tmp;
		}
	}
	return $arr;
}



/**
 * 冒泡排序：
 * 两两比较待排序数据元素的大小，发现两个数据元素的次序相反时即进行交换，直到没
 * 有反序的数据元素为止。 
 */
function bubble_sort($arr){
	$count = count($arr);
	for ($i=0; $i < $count; $i++) { 
		for ($j=$count-1; $j>$i ; $j--) { 
			if($arr[$j] < $arr[$j-1]){
				$tmp = $arr[$j];
				$arr[$j] = $arr[$j-1];
				$arr[$j-1] = $tmp;
			}
		}
	}
	return $arr;
}


/**
 * 快速排序
 * 在当前无序区R[1..H]中任取一个数据元素作为比较的”基准”(不妨记为X)， 
 * 用此基准将当前无序区划分为左右两个较小的无序区：R[1..I-1]和R[I 1..H]
 * ，且左边的无序子区中数据元素均小于等于基准元素， 右边的无序子区中数据元素均大
 * 于等于基准元素，而基准X则位于最终排序的位置上，即R[1..I-1]≤X.Key≤RI 
 * 1..H， 当 R[1..I-1]和R[I 1..H]均非空时，分别对它们进行上述的划分过程，直
 * 至所有无序子区中的数据元素均已排序为止。
 */
function quick_sort($arr){
	if(count($arr)>1){
		$k = $arr[0];  //第一个元素作为基准数
		$left = array();
		$right = array();
		$count = count($arr);
		for ($i=1; $i < $count; $i++) { 
			if($arr[$i] > $k){
				$right[] = $arr[$i];
			}elseif($arr[$i] <= $k){
				$left[] = $arr[$i];
			}
		}
		$left = quick_sort($left);
		$right = quick_sort($right);
		return array_merge($left,array($k),$right);
	}else{
		return $arr;
	}
}



$arr = [49,38,65,97,76,13,27,49];
// $arr_sort = insert_sort($arr);
// $arr_sort = select_sort($arr);
// $arr_sort = bubble_sort($arr);
$arr_sort = quick_sort($arr);
print_r($arr_sort);







