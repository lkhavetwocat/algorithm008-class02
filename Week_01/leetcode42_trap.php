<?php
/*
 *  app=leetcode.cn id=42 lang=php
 *
 * [42] 接雨水
 *
 * https://leetcode-cn.com/problems/trapping-rain-water/description/
 *
 * algorithms
 * Hard (50.56%)
 * Likes:    1207
 * Dislikes: 0
 * Total Accepted:    91.9K
 * Total Submissions: 181.5K
 * Testcase Example:  '[0,1,0,2,1,0,1,3,2,1,2,1]'
 *
 * 给定 n 个非负整数表示每个宽度为 1 的柱子的高度图，计算按此排列的柱子，下雨之后能接多少雨水。
 * 
 * 
 * 
 * 上面是由数组 [0,1,0,2,1,0,1,3,2,1,2,1] 表示的高度图，在这种情况下，可以接 6 个单位的雨水（蓝色部分表示雨水）。 感谢
 * Marcos 贡献此图。
 * 
 * 示例:
 * 
 * 输入: [0,1,0,2,1,0,1,3,2,1,2,1]
 * 输出: 6
 * 
 */

// @lc code=start
class Solution {

    // /**暴力解法O(n^2)
    //  * @param Integer[] $height
    //  * @return Integer
    //  */
    // function trap($height) {
    //     $ans = 0;
    //     $len = count($height);
    //     for ($i=1; $i < $len - 1; $i++) { 
    //         $leftmax = $rightmax = 0;
    //         for ($j=$i; $j >= 0; $j--) { 
    //             $leftmax = max($leftmax, $height[$j]);
    //         }
    //         for ($k=$i; $k < $len; $k++) { 
    //             $rightmax = max($rightmax, $height[$k]);
    //         }
    //         $ans += min($rightmax, $leftmax) - $height[$i];
    //     }
    //     return $ans;
    // }
    // /**双指针解法
    //  * @param Integer[] $height
    //  * @return Integer
    //  */
    function trap($height) {
        $ans = 0;
        $leftmax = $rightmax = 0;
        $left = 0;
        $right = count($height) - 1;
        while ($left < $right) {
            if ($height[$left] <= $height[$right]) {
                $leftmax < $height[$left] ? $leftmax = $height[$left] : $ans += $leftmax - $height[$left];
                $left++;
            }else {
                $rightmax < $height[$right] ? $rightmax = $height[$right] : $ans += $rightmax - $height[$right];
                $right--;
            }
        }
        return $ans;
    }
}
// @lc code=end

