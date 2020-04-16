<?php
/*
 * @app=leetcode.cn id=141 lang=php
 *
 * [141] 环形链表
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
     * 快慢指针方式
     * 如果存在环，快指针最终会追上慢指针
     * 如果不存在环，快指针会到达链表末尾
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle($head) {
        if ($head == null || $head->next == null) {
            return false;
        }
        $slow = $head;
        $fast = $head->next;
        while ($slow <> $fast) {
            if ($fast == null || $fast->next == null) {
                return false;
            }
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        return true;
    }
}
// @lc code=end

