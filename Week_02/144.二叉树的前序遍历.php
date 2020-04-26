<?php
/*
 * @lc app=leetcode.cn id=144 lang=php
 *
 * [144] 二叉树的前序遍历
 *
 * https://leetcode-cn.com/problems/binary-tree-preorder-traversal/description/
 *
 * algorithms
 * Medium (65.09%)
 * Likes:    245
 * Dislikes: 0
 * Total Accepted:    94.8K
 * Total Submissions: 145.3K
 * Testcase Example:  '[1,null,2,3]'
 *
 * 给定一个二叉树，返回它的 前序 遍历。
 * 
 * 示例:
 * 
 * 输入: [1,null,2,3]  
 * ⁠  1
 * ⁠   \
 * ⁠    2
 * ⁠   /
 * ⁠  3 
 * 
 * 输出: [1,2,3]
 * 
 * 
 * 进阶: 递归算法很简单，你可以通过迭代算法完成吗？
 * 
 */

// @lc code=start
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {

    /**递归解法
     * @param TreeNode $root
     * @return Integer[]
     */
    // function preorderTraversal($root) {
    //     $res = [];
    //     $this->helper($root, $res);
    //     return $res;
    // }
    function helper($root, &$res) {
        if ($root == null) {
            return;
        }
        $res[] = $root->val;
        $this->helper($root->left, $res);
        $this->helper($root->right, $res);
    }
    /**
     * 栈解法
     * @param TreeNode $root
     * @return Integer[]
     */
    // function preorderTraversal($root) {
    //     // 声明结果数组
    //     $res = [];
    //     // 声明空栈
    //     $stack = new SplStack();
    //     // 边界判断
    //     if ($root == null) {
    //         return $res;
    //     }
    //     // 先把根节点存进去
    //     $stack->push($root);
    //     while (!$stack->isEmpty()) {
    //         // 把节点弹出放入结果数组
    //         $node = $stack->pop();
    //         $res[] = $node->val;
    //         // 先放右节点（因为栈是先进后出）
    //         if ($node->right != null) {
    //             $stack->push($node->right);
    //         }
    //         // 再放左节点
    //         if ($node->left != null) {
    //             $stack->push($node->left);
    //         }
    //     }
    //     return $res;
    // }
    /**
     * 莫里斯遍历
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal($root) {
        $res = [];
        $curr = $root;
        while ($curr != null) {
            if ($curr->left == null) {
                $res[] = $curr->val;
                $curr = $curr->right;
            }else {
                $pre = $curr->left;
                while ($pre->right != null && $pre->right != $curr) {
                    $pre = $pre->right;
                }
                if ($pre->right == null) {
                    $res[] = $curr->val;
                    $pre->right = $curr;
                    $curr = $curr->left;
                }else {
                    $pre->right = null;
                    $curr = $curr->right;
                }
            }
        }
        return $res;
    }
}
// @lc code=end

