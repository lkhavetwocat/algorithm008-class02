<?php
/*
 * @lc app=leetcode.cn id=350 lang=php
 *
 * [350] 两个数组的交集 II
 *
 * https://leetcode-cn.com/problems/intersection-of-two-arrays-ii/description/
 *
 * algorithms
 * Easy (47.71%)
 * Likes:    265
 * Dislikes: 0
 * Total Accepted:    79.6K
 * Total Submissions: 166.3K
 * Testcase Example:  '[1,2,2,1]\n[2,2]'
 *
 * 给定两个数组，编写一个函数来计算它们的交集。
 * 
 * 示例 1:
 * 
 * 输入: nums1 = [1,2,2,1], nums2 = [2,2]
 * 输出: [2,2]
 * 
 * 
 * 示例 2:
 * 
 * 输入: nums1 = [4,9,5], nums2 = [9,4,9,8,4]
 * 输出: [4,9]
 * 
 * 说明：
 * 
 * 
 * 输出结果中每个元素出现的次数，应与元素在两个数组中出现的次数一致。
 * 我们可以不考虑输出结果的顺序。
 * 
 * 
 * 进阶:
 * 
 * 
 * 如果给定的数组已经排好序呢？你将如何优化你的算法？
 * 如果 nums1 的大小比 nums2 小很多，哪种方法更优？
 * 如果 nums2 的元素存储在磁盘上，磁盘内存是有限的，并且你不能一次加载所有的元素到内存中，你该怎么办？
 * 
 * 
 */

// @lc code=start
class Solution {

    /**
     * Hash map解法
     * 先在map中记录一个数组中存在数字和对应出现的次数
     * 然后遍历另一个数组，检查数字在map是否存在
     *  如果存在且计数为正，则将该数字添加到答案并减少计数次数
     *  如果不存在直接跳过即可
     * 复杂度分析：
     * 时间复杂度：O(n+m) 其中n，m分别代表数组的大小
     * 空间复杂度：O(min(n,m))，开辟了HashMap对小数组进行了存储
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    // function intersect($nums1, $nums2) {
    //     // 巧妙的优化点，HashMap只存储小数组的值
    //     if (count($nums1) > count($nums2)) {
    //         return $this->intersect($nums2, $nums1);
    //     }
    //     $Hashmap = [];
    //     // 将数组内数字放入map中并统计其出现次数
    //     for ($i=0; $i < count($nums1); $i++) { 
    //         isset($Hashmap[$nums1[$i]]) ? $Hashmap[$nums1[$i]]++ : $Hashmap[$nums1[$i]] = 1;
    //     }
    //     // 巧妙优化2：利用已经无用的$nums1去存储需要返回的数据，无需再开辟新的空间
    //     $k = 0;
    //     for ($i=0; $i < count($nums2); $i++) {
    //         // 如果map中存在该数字并且其计数次数大于0，则将其统计到返回数组中 
    //         if (isset($Hashmap[$nums2[$i]]) && $Hashmap[$nums2[$i]] > 0) {
    //             $nums1[$k++] = $nums2[$i];
    //             $Hashmap[$nums2[$i]]--;
    //         }
    //     }
    //     // 最后只需要返回$nums1数组前$k+1位即可
    //     return array_slice($nums1, 0, $k);
    // }
    /**
     * 有序数组 解法
     * 如果两个数组是有序，那么使用双指针i,j
     * i指向$nums1数组首位，j指向$nums2数组首位
     *  如果 $nums1[$i] < $nums2[$j] $i++
     *  如果 $nums1[$i] > $nums2[$j] $j++
     *  如果 $nums1[$i] == $nums2[$j]，将元素拷贝$nums1[$k] $k++,$i++,$j++
     * 复杂度分析：
     * 时间复杂度：O(nlogn+mlogm) 其中n，m分别代表数组的大小，排序导致
     * 空间复杂度：O(1)，没有开辟新空间
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersect($nums1, $nums2) {
        $lenth1 = count($nums1);
        $lenth2 = count($nums2);
        // 先进行数组排序
        sort($nums1);
        sort($nums2);
        // 初始化三个指针
        $i = $j = $k = 0;
        while ($i < $lenth1 && $j < $lenth2) {
            // $nums1小于$nums2
            if ($nums1[$i] < $nums2[$j]) {
                // 巧妙点：如果下一个元素和上一个相等，就不用比较了，直接跳过
                while ($i < $lenth1 && $nums1[$i] == $nums1[++$i]);
            } elseif ($nums1[$i] > $nums2[$j]) {
                while ($j < $lenth2 && $nums2[$j] == $nums2[++$j]);
            }else {
                $nums1[$k++] = $nums2[$j++];
                $i++;
            }
        }
        // 最后只需要返回$nums1数组前$k+1位即可
        return array_slice($nums1, 0, $k);
    }
}
// @lc code=end

