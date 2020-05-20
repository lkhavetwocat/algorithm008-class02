# week02学习笔记
## 理论知识
* <a href="#recur">递归</a>
* <a href="#fz">分治</a>
* <a href="#hs">回溯</a>
### <a id="recur">递归</a>
*   递归（Recursion）：
    *   循环
    *   通过函数体来进行循环
*   类比盗梦空间
    *   向下进入到不同的梦境中；向上又回到原来一层
    *   通过声音同步回到上一层
    *   每一层的环境和周围的人都是一份拷贝，主角等几个人穿越不同层级的梦境（发生和携带变化）
*   递归思维要点
    *   抵制人肉递归的诱惑
    *   找最近重复性
    *   数学归纳法思维
*   递归代码模板
```php
function recursion($level, $param1, $param2,...) {
    // recursion terminator （递归终结条件）
    if ($level > $maxlevel) {
        // process_result
        return;
    }
    // process logic in current level （处理当前层逻辑）
    process($leval, $data);
    // drill down （下探到下一层）
    seft:recursion($level+1, $param,....);
    // reverse the current level status if needed （清理当前层）

}
```
### <a id="fz">分治</a>
分治和回溯本质上是就是一种递归，是对递归的分化
*   分治代码模板
```php
function divide_conquer($problem, $param1, $param2,...) {
    // recursion terminator
    if ($problem == null) {
        echo $result;
        return ;
    }
    // prepare data
    $data = $this->prepareData($problem);
    // split problem
    $subproblems = $this->splitProblem($problem);
    // conquer subproblems
    $subresult1 = $this->divide_conquer($subproblems[0], $param);
    $subresult2 = $this->divide_conquer($sbuproblems[2], $param);
    // process and generate the final result
    $result = $this->processResult($subresult1, $subresult2,..);
    // reverse the current level states
}
```
### <a id="hs">回溯</a>
回溯采用试错的思想，它尝试分步的去解决一个问题。在分步解决问题的过程中，当它通过尝试发现现有的分步答案不能得到有效的正确解答的时候，它将取消上一步或者上几步的运算，再通过其他的可能的分步解答再次尝试寻找问题的答案。
回溯法通常用最简单的递归来实现，在反复重复上述的步骤后可能出现两种情况：
*   找到一个可能存在的正确答案
*   在尝试了所有可能的分步方法后宣告这个问题没有答案
在最坏的情况的下，回溯可能会导致一次复杂度为指数时间的计算
## 算法练习
*   [LeetCode70 爬楼梯](https://leetcode-cn.com/problems/climbing-stairs/)
*   [LeetCode22 括号生成](https://leetcode-cn.com/problems/generate-parentheses/)
*   [LeetCode98 验证二叉搜索树](https://leetcode-cn.com/problems/validate-binary-search-tree/)
*   [LeetCode22 括号生成问题](https://leetcode-cn.com/problems/generate-parentheses/)
*   [LeetCode50 Pow(x, n)](https://leetcode-cn.com/problems/powx-n/)
*   [LeetCode78 子集](https://leetcode-cn.com/problems/subsets/)
*   [LeetCode169 多数元素--高频](https://leetcode-cn.com/problems/majority-element/description/)
*   [LeetCode17 电话号码的字母组合](https://leetcode-cn.com/problems/letter-combinations-of-a-phone-number/)
*   [LeetCode51 N皇后](https://leetcode-cn.com/problems/n-queens/)
