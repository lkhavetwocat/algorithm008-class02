<?php
/*
 * @lc app=leetcode.cn id=242 lang=php
 *
 * [242] 有效的字母异位词
 *
 * https://leetcode-cn.com/problems/valid-anagram/description/
 *
 * algorithms
 * Easy (59.38%)
 * Likes:    183
 * Dislikes: 0
 * Total Accepted:    92.8K
 * Total Submissions: 156K
 * Testcase Example:  '"anagram"\n"nagaram"'
 *
 * 给定两个字符串 s 和 t ，编写一个函数来判断 t 是否是 s 的字母异位词。
 * 
 * 示例 1:
 * 
 * 输入: s = "anagram", t = "nagaram"
 * 输出: true
 * 
 * 
 * 示例 2:
 * 
 * 输入: s = "rat", t = "car"
 * 输出: false
 * 
 * 说明:
 * 你可以假设字符串只包含小写字母。
 * 
 * 进阶:
 * 如果输入字符串包含 unicode 字符怎么办？你能否调整你的解法来应对这种情况？
 * 
 */

// @lc code=start
class Solution {

    /**
     * HashMap解法
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    // function isAnagram($s, $t) {
    //     // 如果字符串长度都不相等那么直接返回false
    //     if (strlen($s) <> strlen($t)) {
    //         return false;
    //     }
    //     // 声明一个map
    //     $HashMap = [];
    //     // 将$s内的字母放入map中作为key，value为出现次数，重复的字符更新value
    //     for ($i=0; $i < strlen($s); $i++) { 
    //         isset($HashMap[$s[$i]]) ? $HashMap[$s[$i]]++ : $HashMap[$s[$i]] = 1;
    //     }
    //     // 循环判断$t的每一位在map中是否存在，并且剩余数量是否大于零
    //     for ($i=0; $i < strlen($t); $i++) { 
    //         if (isset($HashMap[$t[$i]]) && $HashMap[$t[$i]] > 0) {
    //             $HashMap[$t[$i]]--;
    //         }else {
    //             return false;
    //         }
    //     }
    //     return true;
    // }
    /**
     * 有序数组解法
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        // 先分割为数组
        $s = str_split($s, 1);
        $t = str_split($t, 1);
        // 排序
        sort($s);
        sort($t);
        // 判断排序后是否相同
        return $s == $t;
    }
}
// @lc code=end

