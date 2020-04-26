<?php
/*
 * @lc app=leetcode.cn id=590 lang=php
 *
 * [590] N叉树的后序遍历
 *
 * https://leetcode-cn.com/problems/n-ary-tree-postorder-traversal/description/
 *
 * algorithms
 * Easy (72.84%)
 * Likes:    61
 * Dislikes: 0
 * Total Accepted:    20.7K
 * Total Submissions: 28.3K
 * Testcase Example:  '[1,null,3,2,4,null,5,6]'
 *
 * 给定一个 N 叉树，返回其节点值的后序遍历。
 * 
 * 例如，给定一个 3叉树 :
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 返回其后序遍历: [5,6,3,2,4,1].
 * 
 * 
 * 
 * 说明: 递归法很简单，你可以使用迭代法完成此题吗?
 */

// @lc code=start
/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $children = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->children = array();
 *     }
 * }
 */

class Solution {
    /**递归解法
     * @param Node $root
     * @return integer[]
     */
    // function postorder($root) {
    //     $res = [];
    //     $this->helper($root, $res);
    //     return $res;
    // }
    function helper($root, &$res) {
        if ($root == null) {
            return;
        }
        for ($i=0; $i < count($root->children); $i++) { 
            $this->helper($root->children[$i], $res);
        }
        $res[] = $root->val;
    }
    /**使用栈迭代解法
     * @param Node $root
     * @return integer[]
     */
    function postorder($root) {
        $res = [];
        $stack = new SplStack();
        $stack->push($root);
        while (!$stack->isEmpty()) {
            $curr = $stack->pop();
            array_unshift($res, $curr->val);
            if (!empty($curr->children)) {
                $len = count($curr->children);
                for ($i=0; $i < $len; $i++) { 
                    $stack->push($curr->children[$i]);
                }
            }
        }
        return $res;
    }
}
// @lc code=end

