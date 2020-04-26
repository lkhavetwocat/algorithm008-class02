<?php
/*
 * @lc app=leetcode.cn id=75 lang=php
 *
 * [75] 颜色分类
 *
 * https://leetcode-cn.com/problems/sort-colors/description/
 *
 * algorithms
 * Medium (54.71%)
 * Likes:    402
 * Dislikes: 0
 * Total Accepted:    76K
 * Total Submissions: 138.7K
 * Testcase Example:  '[2,0,2,1,1,0]'
 *
 * 给定一个包含红色、白色和蓝色，一共 n 个元素的数组，原地对它们进行排序，使得相同颜色的元素相邻，并按照红色、白色、蓝色顺序排列。
 * 
 * 此题中，我们使用整数 0、 1 和 2 分别表示红色、白色和蓝色。
 * 
 * 注意:
 * 不能使用代码库中的排序函数来解决这道题。
 * 
 * 示例:
 * 
 * 输入: [2,0,2,1,1,0]
 * 输出: [0,0,1,1,2,2]
 * 
 * 进阶：
 * 
 * 
 * 一个直观的解决方案是使用计数排序的两趟扫描算法。
 * 首先，迭代计算出0、1 和 2 元素的个数，然后按照0、1、2的排序，重写当前数组。
 * 你能想出一个仅使用常数空间的一趟扫描算法吗？
 * 
 * 
 */

// @lc code=start
class Solution {

    /**
     * 双指针解法
     * 定义左右双指针分别指向数组开头和末尾
     * 定义一个curr指针从数组开头
     * while curr<=right
     *  -当curr所指元素等于0时，就将left和curr所指元素交换，并left++，curr++
     *  -当curr所指元素等于2时，就将right和curr所指元素交换，只将right--，原因是交换过来的元素还没有经过检查
     *  -当curr所指元素等于1时，直接curr++
     * @param Integer[] $nums
     * @return NULL
     */
    function sortColors(&$nums) {
        // 定义左右指针
        $left = 0;
        $right = count($nums) -1;
        // 定义curr
        $curr = 0;
        while ($curr <= $right) {
            // 当curr所指元素等于0时，就将left和curr所指元素交换，并left
            if ($nums[$curr] == 0) {
                $tmp = $nums[$curr];
                $nums[$curr++] = $nums[$left];
                $nums[$left++] = $tmp;
            }elseif ($nums[$curr] == 2) {
                // 当curr所指元素等于2时，就将right和curr所指元素交换，只将right
                $tmp = $nums[$curr];
                $nums[$curr] = $nums[$right];
                $nums[$right--] = $tmp;
            }else {
                // 当curr所指元素等于1时，直接curr
                $curr++;
            }
        }
    }
}
// @lc code=end

