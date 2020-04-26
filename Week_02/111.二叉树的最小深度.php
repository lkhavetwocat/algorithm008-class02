<?php
/*
 * @lc app=leetcode.cn id=111 lang=php
 *
 * [111] 二叉树的最小深度
 *
 * https://leetcode-cn.com/problems/minimum-depth-of-binary-tree/description/
 *
 * algorithms
 * Easy (42.01%)
 * Likes:    244
 * Dislikes: 0
 * Total Accepted:    68.8K
 * Total Submissions: 163.2K
 * Testcase Example:  '[3,9,20,null,null,15,7]'
 *
 * 给定一个二叉树，找出其最小深度。
 * 
 * 最小深度是从根节点到最近叶子节点的最短路径上的节点数量。
 * 
 * 说明: 叶子节点是指没有子节点的节点。
 * 
 * 示例:
 * 
 * 给定二叉树 [3,9,20,null,null,15,7],
 * 
 * ⁠   3
 * ⁠  / \
 * ⁠ 9  20
 * ⁠   /  \
 * ⁠  15   7
 * 
 * 返回它的最小深度  2.
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
     * 递归解法
     * @param TreeNode $root
     * @return Integer
     */
    // function minDepth($root) {
    //     // 无子节点返回为0
    //     if ($root == null) {
    //         return 0;
    //     }
    //     // 分别计算左子树和右子树的最小深度
    //     $leftminidep = $this->minDepth($root->left);
    //     $rightminidep = $this->minDepth($root->right);
    //     // 如果左子节点或者右子节点为叶子节点，那么代表左深度/右深度有一个为0，直接返回左+右+1即可
    //     // 如果左右均有子树，那么返回左右子树的最小深度的最小值再加一即可
    //     return $root->left == null || $root->right == null ? $leftminidep + $rightminidep + 1 : min($leftminidep, $rightminidep) + 1;
    // }
    /**
     * DFS前序解法
     * @param TreeNode $root
     * @return Integer
     */
    function minDepth($root) {
        if ($root == null) {
            return 0;
        }
        $stack = new SplStack();
        $stack->push([$root, 1]);
        $minidepth = PHP_INT_MAX;
        while (!$stack->isEmpty()) {
            $currarr = $stack->pop();
            $curr = $currarr[0];
            $nodedepth = $currarr[1];
            // 只有为叶子节点的时候才进行深度判断更新
            if ($curr->left == null && $curr->right == null) {
                $minidepth = min($minidepth, $nodedepth);
            }
            if ($curr->right != null) {
                $stack->push([$curr->right, $nodedepth + 1]);
            }
            if ($curr->left != null) {
                $stack->push([$curr->left, $nodedepth + 1]);
            }
        }
        return $minidepth;
    }
}
// @lc code=end

