<?php
/*
 * @lc app=leetcode.cn id=589 lang=php
 *
 * [589] N叉树的前序遍历
 *
 * https://leetcode-cn.com/problems/n-ary-tree-preorder-traversal/description/
 *
 * algorithms
 * Easy (72.72%)
 * Likes:    75
 * Dislikes: 0
 * Total Accepted:    23.9K
 * Total Submissions: 32.8K
 * Testcase Example:  '[1,null,3,2,4,null,5,6]'
 *
 * 给定一个 N 叉树，返回其节点值的前序遍历。
 * 
 * 例如，给定一个 3叉树 :
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 返回其前序遍历: [1,3,5,6,2,4]。
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
    /**
     * 递归解法
     * @param Node $root
     * @return integer[]
     */
    // function preorder($root) {
    //     $res = [];
    //     $this->helper($root, $res);
    //     return $res;
    // }
    function helper($root, &$res) {
        if ($root == null) {
            return;
        }
        $res[] = $root->val;
        for ($i=0; $i < count($root->children); $i++) { 
            $this->helper($root->children[$i], $res);
        }
    }
    /**
     * 使用栈迭代
     * @param Node $root
     * @return integer[]
     */
    function preorder($root) {
        $res = [];
        if ($root == null) {
            return $res;
        }
        $stack = new SplStack();
        $stack->push($root);
        while (!$stack->isEmpty()) {
            $curr = $stack->pop();
            $res[] = $curr->val;
            if (!empty($curr->children)) {
                $len = count($curr->children);
                for ($i = $len - 1; $i >= 0; $i--) { 
                    $stack->push($curr->children[$i]);
                }
            }
        }
        return $res;
    }
}
// @lc code=end

