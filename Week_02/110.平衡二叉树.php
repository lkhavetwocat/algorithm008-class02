<?php
/*
 * @lc app=leetcode.cn id=110 lang=php
 *
 * [110] 平衡二叉树
 *
 * https://leetcode-cn.com/problems/balanced-binary-tree/description/
 *
 * algorithms
 * Easy (51.19%)
 * Likes:    297
 * Dislikes: 0
 * Total Accepted:    68.5K
 * Total Submissions: 133.5K
 * Testcase Example:  '[3,9,20,null,null,15,7]'
 *
 * 给定一个二叉树，判断它是否是高度平衡的二叉树。
 * 
 * 本题中，一棵高度平衡二叉树定义为：
 * 
 * 
 * 一个二叉树每个节点 的左右两个子树的高度差的绝对值不超过1。
 * 
 * 
 * 示例 1:
 * 
 * 给定二叉树 [3,9,20,null,null,15,7]
 * 
 * ⁠   3
 * ⁠  / \
 * ⁠ 9  20
 * ⁠   /  \
 * ⁠  15   7
 * 
 * 返回 true 。
 * 
 * 示例 2:
 * 
 * 给定二叉树 [1,2,2,3,3,null,null,4,4]
 * 
 * ⁠      1
 * ⁠     / \
 * ⁠    2   2
 * ⁠   / \
 * ⁠  3   3
 * ⁠ / \
 * ⁠4   4
 * 
 * 
 * 返回 false 。
 * 
 * 
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

    /**
     * 自顶向下递归解法。暴力法
     * @param TreeNode $root
     * @return Boolean
     */
    // function isBalanced($root) {
    //     // 空树默认为平衡的
    //     if ($root == null) {
    //         return true;
    //     }
    //     // 左右数高的差值小于2并且左右子树全都是平衡的
    //     return abs($this->height($root->left) - $this->height($root->right)) < 2 && $this->isBalanced($root->left) && $this->isBalanced($root->right);
    // }
    /**
     * 用于计算树的高度
     */
    function height($root) {
        if ($root == null) {
            return -1;
        }
        return 1 + max($this->height($root->left), $this->height($root->right));
    }
    /**
     * 自低到顶递归解法
     * 增加一个辅助函数recur
     * @param TreeNode $root
     * @return Boolean
     */
    function isBalanced($root) {
        return $this->recur($root) != -1;
    }
    /**
     * 递归计算左右子树高度
     *  -如果左右子树高度差小于2则返回根节点的高度即max(left,right)+1
     *  -否则代表数存在不平衡子树，直接返回-1
     * @param TreeNode $root
     * @return Int
     */
    function recur($root) {
        if ($root == null) {
            return 0;
        }
        $left = $this->recur($root->left);
        if ($left == -1) {
            return -1;
        }
        $right = $this->recur($root->right);
        if ($right == -1) {
            return -1;
        }
        return abs($left - $right) < 2 ? max($left,$right) + 1 : -1;
    }
}
// @lc code=end

