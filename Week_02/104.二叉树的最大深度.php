<?php
/*
 * @lc app=leetcode.cn id=104 lang=php
 *
 * [104] 二叉树的最大深度
 *
 * https://leetcode-cn.com/problems/maximum-depth-of-binary-tree/description/
 *
 * algorithms
 * Easy (72.81%)
 * Likes:    513
 * Dislikes: 0
 * Total Accepted:    162.2K
 * Total Submissions: 222.4K
 * Testcase Example:  '[3,9,20,null,null,15,7]'
 *
 * 给定一个二叉树，找出其最大深度。
 * 
 * 二叉树的深度为根节点到最远叶子节点的最长路径上的节点数。
 * 
 * 说明: 叶子节点是指没有子节点的节点。
 * 
 * 示例：
 * 给定二叉树 [3,9,20,null,null,15,7]，
 * 
 * ⁠   3
 * ⁠  / \
 * ⁠ 9  20
 * ⁠   /  \
 * ⁠  15   7
 * 
 * 返回它的最大深度 3 。
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
    // function maxDepth($root) {
    //     if ($root == null) {
    //         return 0;
    //     }
    //     $leftDepth = $this->maxDepth($root->left);
    //     $rightDepth = $this->maxDepth($root->right);
    //     return max($leftDepth, $rightDepth) + 1;
    // }
    /**
     * DFS前序遍历解法
     * @param TreeNode $root
     * @return Integer
     */
    // function maxDepth($root) {
    //     if ($root == null) {
    //         return 0;
    //     }
    //     $maxDepth = 0;
    //     $stack = new SplStack();
    //     $stack->push([$root, 1]);
    //     while (!$stack->isEmpty()) {
    //         $currarr = $stack->pop();
    //         $curr = $currarr[0];
    //         $depth = $currarr[1];
    //         $maxDepth = max($maxDepth, $depth);
    //         if ($curr->right != null) {
    //             $stack->push([$curr->right, $depth+1]);
    //         }
    //         if ($curr->left != null) {
    //             $stack->push([$curr->left, $depth+1]);
    //         }
    //     }
    //     return $maxDepth;
    // }
    /**
     * DFS中序遍历解法
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root) {
        if ($root == null) {
            return 0;
        }
        $maxDepth = 0;
        $stack = new SplStack();
        $currarr = [$root, 1];
        while ($currarr[0] != null || !$stack->isEmpty()) {
            while ($currarr[0] != null) {
                $stack->push($currarr);
                $currarr = [$currarr[0]->left, $currarr[1] + 1];
            }
            $currarr = $stack->pop();
            $maxDepth = max($currarr[1], $maxDepth);
            $currarr = [$currarr[0]->right, $currarr[1] + 1];
        }
        return $maxDepth;
    }
}
// @lc code=end

