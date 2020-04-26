<?php
/*
 * @lc app=leetcode.cn id=290 lang=php
 *
 * [290] 单词规律
 *
 * https://leetcode-cn.com/problems/word-pattern/description/
 *
 * algorithms
 * Easy (42.44%)
 * Likes:    146
 * Dislikes: 0
 * Total Accepted:    21.6K
 * Total Submissions: 50.9K
 * Testcase Example:  '"abba"\n"dog cat cat dog"'
 *
 * 给定一种规律 pattern 和一个字符串 str ，判断 str 是否遵循相同的规律。
 * 
 * 这里的 遵循 指完全匹配，例如， pattern 里的每个字母和字符串 str 中的每个非空单词之间存在着双向连接的对应规律。
 * 
 * 示例1:
 * 
 * 输入: pattern = "abba", str = "dog cat cat dog"
 * 输出: true
 * 
 * 示例 2:
 * 
 * 输入:pattern = "abba", str = "dog cat cat fish"
 * 输出: false
 * 
 * 示例 3:
 * 
 * 输入: pattern = "aaaa", str = "dog cat cat dog"
 * 输出: false
 * 
 * 示例 4:
 * 
 * 输入: pattern = "abba", str = "dog dog dog dog"
 * 输出: false
 * 
 * 说明:
 * 你可以假设 pattern 只包含小写字母， str 包含了由单个空格分隔的小写字母。    
 * 
 */

// @lc code=start
class Solution {

    /**
     * 解法：
     * 先以空格分隔str，转换为数组strarr
     * 先对比数组元素数和pattern字符串长度，如果不相等则无法一一对应，直接返回false
     * 当$pattern[$i]还无对应元素时，先需要判断对应的$strarr[$i]是否已经被对应了，
     *  如果没有则在map中增加此映射关系
     *  如果存在则代表它和其他的元素对应了，直接返回false
     * 当$pattern[$i]有此元素时，只需要判断和$strarr[$i]是否对应，如果不对应这直接返回false
     * 复杂度分析
     * 时间复杂度：O(n)
     * 空间复杂度：O(n)
     * @param String $pattern
     * @param String $str
     * @return Boolean
     */
    function wordPattern($pattern, $str) {
        //以空格为分隔符转换str为数组
        $strarr = explode(' ', $str);
        //判断数组长度和字符串长度
        if (strlen($pattern) <> count($strarr)) {
            return false;
        }
        //声明一个空map
        $Hashmap = [];
        for ($i=0; $i < strlen($pattern); $i++) { 
            if (!isset($Hashmap[$pattern[$i]])) {
                //如果map中无对应元素
                if (in_array($strarr[$i], $Hashmap)) {
                    //$pattern[$i]未映射但$strarr[$i]已经映射，返回false
                    return false;
                }
                $Hashmap[$pattern[$i]] = $strarr[$i];
            }else {
                //如果map中存在映射，则判断映射的元素和$strarr[$i]是否相等，不相等则返回false
                if ($Hashmap[$pattern[$i]] <> $strarr[$i]) {
                    return false;
                }
            }
        }
        //所有元素判断完成，直接返回true即可
        return true;
    }
}
// @lc code=end

