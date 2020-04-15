<?php
/*
 * [189] 旋转数组
 */

// @lc code=start
class Solution {

    /**
     * 暴力解法，每次旋转一个元素，旋转k次
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    // function rotate(&$nums, $k) {
    //     $length = count($nums); 
    //     $k = $k%$length;
    //     for ($i = 0; $i < $k; $i++) { 
    //         $pri = $nums[$length - 1];
    //         for ($j = 0; $j < $length; $j++) { 
    //             $tmp = $nums[$j];
    //             $nums[$j] = $pri;
    //             $pri = $tmp;
    //         }
    //     }
    // }
    /**
     * 环状替代解法（注意：在$n%$k==0的情况下，需要继续执行$i%$k==1）
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    // function rotate(&$nums, $k) {
    //     $length = count($nums);
    //     //装换为最终的移动位置
    //     $k = $k%$length;
    //     if (!$k) {
    //         return;
    //     }
    //     //声明一个count用来表示一共移动了多少次元素，移动了n次后就代表全部移动完成了
    //     $count = 0;
    //     for ($i=0; $count < $length; $i++) { 
    //         $current = $i;
    //         $prev = $nums[$i];
    //         do {
    //             $next = ($current + $k)%$length;
    //             $tmp = $nums[$next];
    //             $nums[$next] = $prev;
    //             $prev = $tmp;
    //             $current = $next;
    //             $count++;
    //         } while ($i <> $current);
    //     }
    // }
    /**
     * 三次翻转解法
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, $k) {
        $len = count($nums);
        $k = $k%$len;
        $this->reverse($nums, 0, $len - 1);
        $this->reverse($nums, 0, $k - 1);
        $this->reverse($nums, $k, $len-1);
    }

    function reverse(&$nums, $start, $end) {
        while ($start < $end) {
            $tmp = $nums[$start];
            $nums[$start] = $nums[$end];
            $nums[$end] = $tmp;
            $start++;
            $end--;
        }
    }
}
