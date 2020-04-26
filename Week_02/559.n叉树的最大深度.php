<?php
/*
 * @lc app=leetcode.cn id=559 lang=php
 *
 * [559] N叉树的最大深度
 *
 * https://leetcode-cn.com/problems/maximum-depth-of-n-ary-tree/description/
 *
 * algorithms
 * Easy (69.02%)
 * Likes:    84
 * Dislikes: 0
 * Total Accepted:    20.9K
 * Total Submissions: 30.2K
 * Testcase Example:  '[1,null,3,2,4,null,5,6]'
 *
 * 给定一个 N 叉树，找到其最大深度。
 * 
 * 最大深度是指从根节点到最远叶子节点的最长路径上的节点总数。
 * 
 * 例如，给定一个 3叉树 :
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 我们应返回其最大深度，3。
 * 
 * 说明:
 * 
 * 
 * 树的深度不会超过 1000。
 * 树的节点总不会超过 5000。
 * 
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
     * @return integer
     */
    // function maxDepth($root) {
    //     if ($root == null) {
    //         return 0;
    //     }
    //     $maxdep = 0;
    //     for ($i=0; $i < count($root->children); $i++) { 
    //         $maxdep = max($maxdep, $this->maxDepth($root->children[$i]));
    //     }
    //     return $maxdep + 1;
    // }
    /**
     * DFS前序解法
     * @param Node $root
     * @return integer
     */
    function maxDepth($root) {
        $maxdep = 0;
        if ($root == null) {
            return $maxdep;
        }
        $stack = new SplStack();
        $stack->push([$root, 1]);
        while (!$stack->isEmpty()) {
            $currarr = $stack->pop();
            $cur = $currarr[0];
            $nodedep = $currarr[1];
            $maxdep = max($nodedep, $maxdep);
            if (!empty($cur->children)) {
                $len = count($cur->children);
                for ($i=$len-1; $i >= 0; $i--) { 
                    $stack->push([$cur->children[$i], $nodedep + 1]);
                }
            }
        }
        return $maxdep;
    }
}
// @lc code=end

