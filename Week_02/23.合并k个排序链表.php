<?php
/*
 * @lc app=leetcode.cn id=23 lang=php
 *
 * [23] 合并K个排序链表
 *
 * https://leetcode-cn.com/problems/merge-k-sorted-lists/description/
 *
 * algorithms
 * Hard (49.87%)
 * Likes:    612
 * Dislikes: 0
 * Total Accepted:    108.5K
 * Total Submissions: 213K
 * Testcase Example:  '[[1,4,5],[1,3,4],[2,6]]'
 *
 * 合并 k 个排序链表，返回合并后的排序链表。请分析和描述算法的复杂度。
 * 
 * 示例:
 * 
 * 输入:
 * [
 * 1->4->5,
 * 1->3->4,
 * 2->6
 * ]
 * 输出: 1->1->2->3->4->4->5->6
 * 
 */

// @lc code=start
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

    /**
     * 暴力解法，依次合并
     * @param ListNode[] $lists
     * @return ListNode
     */
    // function mergeKLists($lists) {
    //     $ans = null;
    //     for ($i=0; $i < count($lists); $i++) { 
    //         if (empty($lists[$i])) {
    //             continue;
    //         }
    //         $ans = $this->mergeTwoLists($ans, $lists[$i]);
    //     }
    //     return $ans;
    // }
    function mergeTwoLists($l1, $l2) {
        if ($l1 ==  null) {
            return $l2;
        }elseif ($l2 == null) {
            return $l1;
        }
        if ($l1->val < $l2->val) {
            $l1->next = $this->mergeTwoLists($l1->next, $l2);
            return $l1;
        }else {
            $l2->next = $this->mergeTwoLists($l1, $l2->next);
            return $l2;
        }
    }
    /**
     * 分治法递归
     * @param ListNode[] $lists
     * @return ListNode
     */
    // function mergeKLists($lists) {
    //     $len = count($lists);
    //     // 空链表列直接返回null
    //     if ($len == 0) {
    //         return null;
    //     }
    //     // 链表只有一列时将其返回即可
    //     if ($len == 1) {
    //         return $lists[0];
    //     }
    //     // 向上取整取中间值（向上向下取整都可以）
    //     $mid = floor($len/2);
    //     // 声明l1用来存储左半边
    //     $l1 = [];
    //     for ($i=0; $i < $mid; $i++) { 
    //         $l1[] = $lists[$i];
    //     }
    //     // 声明l2用来存储右半边
    //     $l2 = [];
    //     for ($i=$mid; $i < $len; $i++) { 
    //         $l2[] = $lists[$i];
    //     }
    //     // 返回合并左半边和右半边的结果，因为左右半边还是链表集，所以左右半边还需要递归
    //     return $this->mergeTwoLists($this->mergeKLists($l1), $this->mergeKLists($l2));
    // }
    /**
     * 优先队列解法
     * @param ListNode[] $lists
     * @return ListNode
     */
    // function mergeKLists($lists) {
    //     // 边界判断
    //     if (empty($lists)) {
    //         return $lists;
    //     }
    //     // 声明一个优先队列
    //     $pq = new PQSolution();
    //     // 先将每个链表第一个节点放入优先队列，这样队列最大存储cout($lists)个值
    //     for ($i=0; $i < count($lists); $i++) { 
    //         if ($lists[$i] != null) {
    //             $pq->insert($lists[$i], $lists[$i]->val);
    //         }
    //     }
    //     // 声明一个哨兵节点
    //     $prehead = new ListNode(-1);
    //     $ans = $prehead;
    //     // 当优先队列中不为空时
    //     while (!$pq->isEmpty()) {
    //         // 弹出优先队列的值（这一批节点中值最小的最小节点）
    //         $node = $pq->extract();
    //         // 让他和哨兵节点相连
    //         $ans->next = $node;
    //         // 节点前移
    //         $ans = $ans->next;
    //         // 如果弹出的节点所在队列还有节点，就将其放入队列
    //         if ($node->next != null) {
    //             $pq->insert($node->next, $node->next->val);
    //         }
    //     }
    //     return $prehead->next;
    // }
    /**
     * 小顶堆解法（思路和优先队列解法一致，只是用的数据结构不一样）
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists) {
        if (empty($lists)) {
            return $lists;
        }
        $minheap = new SplMinHeap();
        for ($i=0; $i < count($lists); $i++) { 
            if ($lists[$i] != null) {
                $minheap->insert($lists[$i]);
            }
        }
        $prehead = new ListNode(-1);
        $ans = $prehead;
        while (!$minheap->isEmpty()) {
            $node = $minheap->extract();
            $ans->next = $node;
            $ans = $ans->next;
            if ($node->next != null) {
                $minheap->insert($node->next);
            }
        }
        return $prehead->next;
    }
}
class PQSolution extends SplPriorityQueue {
    public function compare($priority1, $priority2)
    {
        return $priority1 > $priority2 ? -1 : 1;
    }
}
// @lc code=end

