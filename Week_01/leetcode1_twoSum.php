<?php
/*
 * @lc app=leetcode.cn id=1 lang=php
 *
 * [1] 两数之和
 */

// @lc code=start
class Solution {

    /**
     * 暴力解法：
     * 遍历数组
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    // function twoSum($nums, $target) {
    //     for ($i=0; $i < count($nums); $i++) { 
    //         for ($j=$i+1; $j < count($nums); $j++) { 
    //             if (($nums[$i] + $nums[$j]) == $target) {
    //                 return [$i, $j];
    //             }
    //         }
    //     }
    //     return [];
    // }
     /**
     * HashMap解法，使用array模拟HashMap
     * 
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    // function twoSum($nums, $target) {
    //     for ($i=0; $i < count($nums); $i++) { 
    //         $tmp = $target - $nums[$i];
    //         $keys = array_keys($nums, $tmp);
    //         foreach ($keys as $key) {
    //             if ($key && $key <> $i) {
    //                 return [$i, $key];
    //             }
    //         }
    //     }
    //     return [];
    // }
    /**
     * HashMap解法优化，使用array模拟HashMap
     * 
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $map = [];
        for ($i=0; $i < count($nums); $i++) { 
            $tmp = $target - $nums[$i];
            if (array_key_exists($tmp, $map) && $i <> $map[$tmp]) {
                return [$map[$tmp], $i];
            } else {
                $map[$nums[$i]] = $i;
            }
        }
        return [];
    }
    
}
// @lc code=end

