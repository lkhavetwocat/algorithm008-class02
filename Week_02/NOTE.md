# week02学习笔记
## 理论知识
* Hash table：哈希表（散列表），是根据关键码值（key value）而直接进行访问的数据结构，它通过把关键码值映射到表中一个位置来访问记录，以加查找的速度。这个映射函数也叫作散列函数（Hash Function），存放记录的数组叫做哈希表（散列表），**散列表用的是数组支持按照下标随机访问数据的特性，所以散列表其实就是数组的一种扩展，由数组演化而来。可以说，如果没有数组，就没有散列表**。
![avatra](https://static001.geekbang.org/resource/image/92/73/92c89a57e21f49d2f14f4424343a2773.jpg)
* 散列函数设计的基本要求
  * 散列函数计算得到的散列值是一个非负整数
  * 如果 key1 = key2，那 hash(key1) == hash(key2)
  * 如果 key1 ≠ key2，那 hash(key1) ≠ hash(key2)
* Hash Collisions：哈希碰撞，根据散列函数计算出来的值存在重复的情况
  * 拉链式解决冲突法：在散列表中，每个“桶（bucket）”或者“槽（slot）”会对应一条链表，所有散列值相同的元素我们都放到相同槽位对应的链表中，如果选用的散列函数比较差，大量的值重复，都存储在链表中，那么查找的时间复杂度就会退化到O(n)。
  ![avatra](https://static001.geekbang.org/resource/image/a4/7f/a4b77d593e4cb76acb2b0689294ec17f.jpg)
  * 开放寻址法：如果出现了散列冲突，我们就重新探测一个空闲位置，将其插入（二次探测、双重散列）
* Hash table时间复杂度：大部分情况下添加、删除、查询为O(n)，如果采用的散列函数比较差或者Hash table的size比较小就会导致哈希碰撞比较严重，就有可能查找的时间复杂度退化为O(n)，绝大部分情况都是O(1)。
* HashTable工程上应用
  * Map：key-value对，key不重复
  * Set：不重复元素集合
* 树：如下图所示，"树"中每个元素称为节点，用来连接相邻节点的关系我们称为父子关系
![avatar](https://static001.geekbang.org/resource/image/b7/29/b7043bf29a253bb36221eaec62b2e129.jpg)
  * 下图中A是B的父亲节点、是E的子节点，而B、C、D互为兄弟节点
  ![avatra](https://static001.geekbang.org/resource/image/22/ae/220043e683ea33b9912425ef759556ae.jpg)
  * 树有高度、深度、层的概念，如下图所示
  ![avatra](https://static001.geekbang.org/resource/image/40/1e/4094a733986073fedb6b9d03f877d71e.jpg)
  ![avatra](https://static001.geekbang.org/resource/image/50/b4/50f89510ad1f7570791dd12f4e9adeb4.jpg)
* 二叉树（Binary Tree）：每个节点最多有两个子节点（左子节点和右子节点），二叉树并不要求每个节点都有两个子节点，所以二叉树还可以进行进一步分类
![avatra](https://static001.geekbang.org/resource/image/09/2b/09c2972d56eb0cf67e727deda0e9412b.jpg)
  * 满二叉树：如上图中2号树所示，叶子节点全部都在最底层，除了叶子节点外，其他节点都有左右两个子节点
  * 完全二叉树：如上图中3号树所示，叶子节点均在最底下两层，最后一层的叶子节点都靠左排列，并且除了最后一层，其他层的节点要达到最大
  ![avatra](https://static001.geekbang.org/resource/image/18/60/18413c6597c2850b75367393b401ad60.jpg)
* 二叉树的存储方式
  * 链式存储法，如下图所示，简单好理解但是占用的内存比较大
  ![avatra](https://static001.geekbang.org/resource/image/12/8e/12cd11b2432ed7c4dfc9a2053cb70b8e.jpg)
  * 顺序存储法：基于数组进行存储，把根结点存储在下标为1的位置，那么左子节点的位置：2*i，右子节点位置：2*i+1，如下图所示：
  ![avatra](https://static001.geekbang.org/resource/image/14/30/14eaa820cb89a17a7303e8847a412330.jpg)
  * 注：如果是完全二叉树或者满二叉树，使用数组存储比较利用空间，如果是非完全二叉树的话，那么会浪费很多位置，如下图所示：
  ![avatra](https://static001.geekbang.org/resource/image/08/23/08bd43991561ceeb76679fbb77071223.jpg)
* 二叉树的遍历
  * 时间复杂度：O(n)因为每个节点最多被访问两次
  * 前序遍历：先根->再左->再右
  * 中序遍历：先左->再根->再右
  * 后序遍历：先左->再右->再根
![avatra](https://static001.geekbang.org/resource/image/ab/16/ab103822e75b5b15c615b68560cb2416.jpg)
## 算法练习
### HashMap相关
* [LeetCode299 猜字游戏](https://leetcode-cn.com/problems/bulls-and-cows)
* [LeetCode290 单词规律](https://leetcode-cn.com/problems/word-pattern)
* [LeetCode350 两个数组的交集](https://leetcode-cn.com/problems/intersection-of-two-arrays-ii)
* [LeetCode392 判断子序列](https://leetcode-cn.com/problems/is-subsequence)
* [面试题 17.09. 第 k 个数](https://leetcode-cn.com/problems/get-kth-magic-number-lcci/)
* [LeetCode242 有效的字母异位词](https://leetcode-cn.com/problems/valid-anagram)
* [LeetCode49 字母异位词分组](https://leetcode-cn.com/problems/group-anagrams)
* [LeetCode1021 删除最外层的括号](https://leetcode-cn.com/problems/remove-outermost-parentheses)
* [面试题59 - I. 滑动窗口的最大值](https://leetcode-cn.com/problems/hua-dong-chuang-kou-de-zui-da-zhi-lcof/)
### 二叉树相关
* [LeetCode94 二叉树的中序遍历](https://leetcode-cn.com/problems/binary-tree-inorder-traversal/)
* [LeetCode144 二叉树的前序遍历](https://leetcode-cn.com/problems/binary-tree-preorder-traversal/)
* [LeetCode145 二叉树的后序遍历](https://leetcode-cn.com/problems/binary-tree-postorder-traversal/)
* [LeetCode104 二叉树的最大深度](https://leetcode-cn.com/problems/maximum-depth-of-binary-tree/)
* [LeetCode111 二叉树的最小深度](https://leetcode-cn.com/problems/minimum-depth-of-binary-tree/)
* [LeetCode589 N叉树的前序遍历](https://leetcode-cn.com/problems/n-ary-tree-preorder-traversal/description/)
* [LeetCode590 N叉树的后序遍历](https://leetcode-cn.com/problems/n-ary-tree-postorder-traversal/)
* [LeetCode429 N叉树的层序遍历](https://leetcode-cn.com/problems/n-ary-tree-level-order-traversal/)
* [LeetCode559 N叉树的最大深度](https://leetcode-cn.com/problems/maximum-depth-of-n-ary-tree/)
* [LeetCode110 平衡二叉树](https://leetcode-cn.com/problems/balanced-binary-tree/)
## 扩展知识
### PHP7中针对HashTable的定义
```https://gsmtoday.github.io/2018/03/21/php-hashtable/```
```https://juejin.im/post/5b967696e51d450e452a74d8```