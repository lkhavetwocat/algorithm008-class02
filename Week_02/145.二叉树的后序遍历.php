<?php
/*
 * @lc app=leetcode.cn id=145 lang=php
 *
 * [145] 二叉树的后序遍历
 *
 * https://leetcode-cn.com/problems/binary-tree-postorder-traversal/description/
 *
 * algorithms
 * Hard (71.00%)
 * Likes:    282
 * Dislikes: 0
 * Total Accepted:    70.5K
 * Total Submissions: 99.2K
 * Testcase Example:  '[1,null,2,3]'
 *
 * 给定一个二叉树，返回它的 后序 遍历。
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
 * 输出: [3,2,1]
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
    // function postorderTraversal($root) {
    //     $res = [];
    //     $this->helper($root, $res);
    //     return $res;
    // }
    function helper($root, &$res) {
        if ($root == null) {
            return;
        }
        $this->helper($root->left, $res);
        $this->helper($root->right, $res);
        $res[] = $root->val;
    }
    /**
     * 堆栈解法
     * @param TreeNode $root
     * @return Integer[]
     */
    // function postorderTraversal($root) {
    //     $res = [];
    //     $stack = new SplStack();
    //     $stack->push($root);
    //     while (!$stack->isEmpty()) {
    //         $curr = $stack->pop();
    //         array_unshift($res, $curr->val);
    //         if ($curr->left != null) {
    //             $stack->push($curr->left);
    //         }
    //         if ($curr->right != null) {
    //             $stack->push($curr->right);
    //         }
    //     }
    //     return $res;
    // }
    /**
     * 莫里斯解法
     * Step 1: 将当前节点current初始化为根节点
     * Step 2: While current不为空
     * -如果cur节点没有左子树，cur指针右移，cur = cur.right
     * -如果cur节点有左子树，找到cur节点的左子树的最右节点，记为mostRight
     *  -如果mostRight节点的右指针为空，则将其指向cur，cur指针左移，cur = cur.left
     *  -如果mostRight节点的右指针指向cur，则将其指向空，cur指针右移，cur = cur.right
     * @param TreeNode $root
     * @return Integer[]
     */
    function postorderTraversal($root) {
        $res = [];
        $curr = $root;
        while ($curr != null) {
            // 如果左子树不为空，进入左子树
            if ($curr->left != null) {
                $pre = $curr->left;
                // 找到左子树最右边的叶子节点
                while ($pre->right != null && $pre->right != $curr) {
                    $pre = $pre->right;
                }
                // 如果叶子节点右子节点为空则将其与curr连接成闭环，curr指针指向下一个左子树
                if ($pre->right == null) {
                    $pre->right = $curr;
                    $curr = $curr->left;
                }else {
                    // 叶子节点右子节点不为空，代表第二次遍历，则取消闭环，同时curr指向下一个右子树
                    $pre->right = null;
                    // 将curr的左子树的右边界倒序输出
                    $this->printNode($curr->left, $res);
                    $curr = $curr->right;
                }
            }else {
                // 无左子树则curr指针指向右子树
                $curr = $curr->right;
            }
        }
        $this->printNode($root, $res);
        return $res;
    }
    function printNode($node, &$res) {
        $tail = $this->reverseNode($node);
        while ($tail != null) {
            $res[] = $tail->val;
            $tail = $tail->right;
        }
        $this->reverseNode($tail);
    }
    /**
     * 反转右边界可以理解成反转链表
     */
    function reverseNode($head) {
        $cur = null;
        $prev = $head;
        while ($prev != null) {
            $tmp = $prev->right;
            $prev->right = $cur;
            $cur = $prev;
            $prev = $tmp;
        }
        return $cur;
    }
}
// @lc code=end

