# week02学习笔记
## 理论知识
* <a href="#dfs">深度优先搜索</a>
* <a href="#bfs">广度优先搜索</a>
* <a href="#tx">贪心算法</a>
* <a href="#ef">二分查找</a>

### <a id="dfs">深度优先搜索</a>
*   深度优先搜索（DFS）
    *   代码模板（递归）
    ```php
    function dfs($node, $visited = []) {
        array_push($visited, $node);
        for ($i=0; $i < count($node->children); $i++) {
            if (in_array($visited, $node->children[$i])) {
                continue;
            }
            $this->dfs($node->children[$i], $visited);
        }
    }
    ```
    *   代码模板（迭代）
    ```php
    function dfs($root) {
        if ($root == null) {
            return [];
        }
        $visited = [];
        $stack = new SplStack();
        $stack->push($root);
        while (!$stack->isEmpty()) {
            $cur = $stack->pop();
            array_push($visited, $cur);
            for ($i=0; $i < count($cur->children); $i++) {
                if (in_array($visited, $cur->children[$i])) {
                    continue;
                }
                $stack->push($cur->children[$i]);
            }
        }
    }
    ```
### <a id="bfs">广度优先搜索</a>
*   广度优先搜索
    *   代码模板
    ```php
    function bfs($graph, $start, $end) {
        $visited = [];
        $queue = new SplQueue();
        $queue->enqueue($start);
        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();
            array_push($visited, $node);
            for ($i=0; $i < count($node->children); $i++) {
                if (in_array($visited, $node->children[$i])) {
                    continue;
                }
                $stack->push($node->children[$i]);
            }
        }
    }
    ```
### <a id="tx">贪心</a>
*   贪心算法是指在每一步的选择中，都采取当前状态下最好或者最优（最有利）的的选择，从而希望导致结果是全局最好或者最优的算法。
*   贪心算法与动态规划的不同在于，它对每个子问题都做出选择并且不能回退。动态规划则会保存以前的运算结果，并根据以前的运算结果对当前进行选择，有回退功能。

### <a id="ef">二分查找</a>
*   二分查找的前提条件
    *   目标函数单调性（单调递增或者单调递减）
    *   存在上下界（bounded）
    *   能够通过索引进行访问（index accessible）
*   代码模板
```php
    function split($data, $target) {
        $left = 0;
        $right = count($data) - 1;
        while ($left <= $right) {
            $mid = intval(($left + $right)/2);
            if ($data[$mid] == $target) {
                return $mid;
            } elseif ($data[$mid] < $target) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }
    }
```
##  相关算法题

*   [LeetCode70 爬楼梯](https://leetcode-cn.com/problems/climbing-stairs/)
*   [LeetCode22 括号生成](https://leetcode-cn.com/problems/generate-parentheses/)
*   [LeetCode98 验证二叉搜索树](https://leetcode-cn.com/problems/validate-binary-search-tree/)
*   [LeetCode22 括号生成问题](https://leetcode-cn.com/problems/generate-parentheses/)
*   [LeetCode50 Pow(x, n)](https://leetcode-cn.com/problems/powx-n/)
*   [LeetCode78 子集](https://leetcode-cn.com/problems/subsets/)
*   [LeetCode169 多数元素--高频](https://leetcode-cn.com/problems/majority-element/description/)
*   [LeetCode17 电话号码的字母组合](https://leetcode-cn.com/problems/letter-combinations-of-a-phone-number/)
*   [LeetCode51 N皇后](https://leetcode-cn.com/problems/n-queens/)
