<?php
/*
 * @lc app=leetcode.cn id=543 lang=php
 *
 * [543] 二叉树的直径
 *
 * https://leetcode-cn.com/problems/diameter-of-binary-tree/description/
 *
 * algorithms
 * Easy (49.45%)
 * Likes:    325
 * Dislikes: 0
 * Total Accepted:    45.5K
 * Total Submissions: 91.8K
 * Testcase Example:  '[1,2,3,4,5]'
 *
 * 给定一棵二叉树，你需要计算它的直径长度。一棵二叉树的直径长度是任意两个结点路径长度中的最大值。这条路径可能穿过也可能不穿过根结点。
 * 
 * 
 * 
 * 示例 :
 * 给定二叉树
 * 
 * ⁠         1
 * ⁠        / \
 * ⁠       2   3
 * ⁠      / \     
 * ⁠     4   5    
 * 
 * 
 * 返回 3, 它的长度是路径 [4,2,1,3] 或者 [5,2,1,3]。
 * 
 * 
 * 
 * 注意：两结点之间的路径长度是以它们之间边的数目表示。
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
    // 设置全局变量用来更新子树最大直径
    private $ans = 0;
    /**
     * DFS递归解法
     * 二叉树直径等于子树根节点的左最大深度+右最大深度-1的最大值
     * @param TreeNode $root
     * @return Integer
     */
    function diameterOfBinaryTree($root) {
        $this->depth($root);
        return $this->ans;
    }
    /**
     * @param TreeNode $node
     * @return Interger 子树最大深度
     */
    function depth($node) {
        if ($node == null) {
            return 0;
        }
        $left = $this->depth($node->left);
        $right = $this->depth($node->right);
        $this->ans = max($this->ans, $left+$right);
        return max($left, $right) + 1;
    }
}
// @lc code=end

