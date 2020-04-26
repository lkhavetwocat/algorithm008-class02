<?php
/*
 * @lc app=leetcode.cn id=49 lang=php
 *
 * [49] 字母异位词分组
 *
 * https://leetcode-cn.com/problems/group-anagrams/description/
 *
 * algorithms
 * Medium (61.15%)
 * Likes:    328
 * Dislikes: 0
 * Total Accepted:    67.6K
 * Total Submissions: 110.4K
 * Testcase Example:  '["eat","tea","tan","ate","nat","bat"]'
 *
 * 给定一个字符串数组，将字母异位词组合在一起。字母异位词指字母相同，但排列不同的字符串。
 * 
 * 示例:
 * 
 * 输入: ["eat", "tea", "tan", "ate", "nat", "bat"]
 * 输出:
 * [
 * ⁠ ["ate","eat","tea"],
 * ⁠ ["nat","tan"],
 * ⁠ ["bat"]
 * ]
 * 
 * 说明：
 * 
 * 
 * 所有输入均为小写字母。
 * 不考虑答案输出的顺序。
 * 
 * 
 */

// @lc code=start
class Solution {

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {
        $HashMap = [];
        for ($i=0; $i < count($strs); $i++) { 
            $tmparr = str_split($strs[$i]);
            sort($tmparr);
            $tmpstr = implode('', $tmparr);
            $HashMap[$tmpstr][] = $strs[$i];
        }
        return array_values($HashMap);
    }
}
// @lc code=end

