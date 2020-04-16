<?php
/*
 * @lc app=leetcode.cn id=15 lang=php
 *
 * [15] 三数之和
 *
 * https://leetcode-cn.com/problems/3sum/description/
 *
 * algorithms
 * Medium (26.43%)
 * Likes:    2012
 * Dislikes: 0
 * Total Accepted:    198.1K
 * Total Submissions: 748.2K
 * Testcase Example:  '[-1,0,1,2,-1,-4]'
 *
 * 给你一个包含 n 个整数的数组 nums，判断 nums 中是否存在三个元素 a，b，c ，使得 a + b + c = 0
 * ？请你找出所有满足条件且不重复的三元组。
 * 
 * 注意：答案中不可以包含重复的三元组。
 * 
 * 
 * 
 * 示例：
 * 
 * 给定数组 nums = [-1, 0, 1, 2, -1, -4]，
 * 
 * 满足要求的三元组集合为：
 * [
 * ⁠ [-1, 0, 1],
 * ⁠ [-1, -1, 2]
 * ]
 * 
 * 
 */

// @lc code=start
class Solution {

    /**
     * 暴力解法
     * 三层循环，无法避免重复的三元组出现
     * @param Integer[] $nums
     * @return Integer[][]
     */
    // function threeSum($nums) {
    //     $res = [];
    //     for ($i=0; $i < count($nums) - 2; $i++) { 
    //         for ($j=$i + 1; $j < count($nums) - 1; $j++) { 
    //             for ($k=$j + 1; $k < count($nums); $k++) { 
    //                 if ($nums[$i] + $nums[$j] + $nums[$k] === 0) {
    //                     $res[] = [$nums[$i], $nums[$j], $nums[$k]];
    //                 }
    //             }
    //         }
    //     }
    //     return $res;
    // }
    /**
     * 三指针解法
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums) {
        $res = [];
        sort($nums);
        for ($i=0; $i < count($nums) - 2; $i++) { 
            if ($i == 0 || ($i > 0 && $nums[$i] <> $nums[$i-1])) {
                $j = $i + 1;
                $k = count($nums) - 1;
                $sum = 0 - $nums[$i];
                while ($j < $k) {
                    if ($nums[$j] + $nums[$k] == $sum) {
                        $res[] = [$nums[$i], $nums[$j], $nums[$k]];
                        while ($j < $k && $nums[$j] == $nums[++$j]);
                        while ($j < $k && $nums[$k] == $nums[--$k]);
                    } elseif ($nums[$j] + $nums[$k] < $sum) {
                        while ($j < $k && $nums[$j] == $nums[++$j]);
                    } else {
                        while ($j < $k && $nums[$k] == $nums[--$k]);
                    }
                }
            }
        }
        return $res;
    }
}
// @lc code=end

