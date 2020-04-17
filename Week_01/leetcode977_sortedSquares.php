<?php
/*
 *  app=leetcode.cn id=977 lang=php
 *
 * [977] 有序数组的平方
 *
 * https://leetcode-cn.com/problems/squares-of-a-sorted-array/description/
 *
 * algorithms
 * Easy (71.20%)
 * Likes:    82
 * Dislikes: 0
 * Total Accepted:    33.6K
 * Total Submissions: 47.2K
 * Testcase Example:  '[-4,-1,0,3,10]'
 *
 * 给定一个按非递减顺序排序的整数数组 A，返回每个数字的平方组成的新数组，要求也按非递减顺序排序。
 * 
 * 
 * 
 * 示例 1：
 * 
 * 输入：[-4,-1,0,3,10]
 * 输出：[0,1,9,16,100]
 * 
 * 
 * 示例 2：
 * 
 * 输入：[-7,-3,2,3,11]
 * 输出：[4,9,9,49,121]
 * 
 * 
 * 
 * 
 * 提示：
 * 
 * 
 * 1 <= A.length <= 10000
 * -10000 <= A[i] <= 10000
 * A 已按非递减顺序排序。
 * 
 * 
 */

// @lc code=start
class Solution {

    /**
     * 暴力解法，先乘积在排序
     * @param Integer[] $A
     * @return Integer[]
     */
    // function sortedSquares($A) {
    //     for ($i=0; $i < count($A); $i++) { 
    //         $A[$i] *= $A[$i];
    //     }
    //     sort($A);
    //     return $A;
    // }
    /**
     * 双指针解法
     * @param Integer[] $A
     * @return Integer[]
     */
    function sortedSquares($A) {
        $len = count($A);
        $i = 0;
        $j = $len - 1;
        $ans = [];
        $k = $len-1;
        while ($k >= 0) {
            if (abs($A[$i]) > abs($A[$j])) {
                array_unshift($ans, $A[$i]*$A[$i]);
                $i++;
            }else {
                array_unshift($ans, $A[$j]*$A[$j]);
                $j--;
            }
            $k--;
        }
        return $ans;
    }
}
// @lc code=end

