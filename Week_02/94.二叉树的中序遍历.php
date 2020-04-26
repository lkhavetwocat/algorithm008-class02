<?php
/*
 * @lc app=leetcode.cn id=94 lang=php
 *
 * [94] 二叉树的中序遍历
 *
 * https://leetcode-cn.com/problems/binary-tree-inorder-traversal/description/
 *
 * algorithms
 * Medium (70.97%)
 * Likes:    476
 * Dislikes: 0
 * Total Accepted:    144.2K
 * Total Submissions: 202.7K
 * Testcase Example:  '[1,null,2,3]'
 *
 * 给定一个二叉树，返回它的中序 遍历。
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
 * 输出: [1,3,2]
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

    /**
     * 递归解法
     * @param TreeNode $root
     * @return Integer[]
     */
    // function inorderTraversal($root) {
    //     $res = [];
    //     $this->helper($root, $res);
    //     return $res;
    // }
    function helper($root, &$res) {
        if ($root == null) {
            return;
        }
        $this->helper($root->left, $res);
        $res[] = $root->val;
        $this->helper($root->right, $res);
    }
    /**
     * 使用栈解法
     * @param TreeNode $root
     * @return Integer[]
     */
    // function inorderTraversal($root) {
    //     // 声明返回数组
    //     $res = [];
    //     // 声明一个栈
    //     $stack = new SplStack();
    //     // 声明一个指针
    //     $curr = $root;
    //     // 当前元素不为空或者栈中还有元素时
    //     while ($curr != null || !$stack->isEmpty()) {
    //         // 向左遍历，把元素放入栈中
    //         while ($curr != null) {
    //             $stack->push($curr);
    //             $curr = $curr->left;
    //         }
    //         // 遍历到底部后放出栈顶元素,更新指针
    //         $curr = $stack->pop();
    //         // 把值放入返回数组
    //         $res[] = $curr->val;
    //         // 向右移动，如果为叶子节点，那么右边就为null，因此上面while条件中还要有栈不为空的判断
    //         $curr = $curr->right;
    //     }
    //     return $res;
    // }
    /**
     * 莫里斯遍历
     * Step 1: 将当前节点current初始化为根节点
     * Step 2: While current不为空
     * -若current没有左子节点
     *  -将current添加到结果数组
     *  -进入右子树，即current = current->right
     * -否则
     *  -在current的左子树中，令current成为最右侧的右子节点
     *  -进入左子树，即current = current->left
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root) {
        // 初始化结果数组
        $res = [];
        // 初始化移动节点
        $curr = $root;
        // 如果curr不为空
        while ($curr != null) {
            // 若curr没有左节点
            if ($curr->left == null) {
                // 将其value加入结果数组
                $res[] = $curr->val;
                // 向右移动，进入右子树
                $curr = $curr->right;
            }else {
                // 如果curr有左节点
                $pre = $curr->left;
                // 找到左子树中最右边的叶子节点
                while ($pre->right != null && $pre->right != $curr) {
                    $pre = $pre->right;
                }
                if ($pre->right == null) {
                    $pre->right = $curr;
                    $curr = $curr->left;
                }else {
                    $res[] = $curr->val;
                    $pre->right = null;
                    $curr = $curr->right;
                }
            }
        }
        return $res;
    }
}
// @lc code=end

