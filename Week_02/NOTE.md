# week02学习笔记
## 理论知识
* <a href="#hash">Hash Table</a>
* <a href="#tree">树</a>
* <a href="#heap">堆</a>
* <a href="#map">图</a>
##  算法练习
* <a href="#hashal">HashMap相关</a>
* <a href="#treeal">二叉树相关</a>
* <a href="#al">面试高频</a>
### <a id="hash">Hash Table</a>
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
### <a id="tree">树</a>
* 树：如下图所示，"树"中每个元素称为节点，用来连接相邻节点的关系我们称为父子关系
  ![avatra](https://static001.geekbang.org/resource/image/b7/29/b7043bf29a253bb36221eaec62b2e129.jpg)
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
### <a id="heap">堆</a>
* 堆（Heap）的定义：可以迅速找出一堆数中最大值或者最小值的数据机构。将根节点最大的堆叫做大顶堆/大根堆，根节点最小的堆叫做小顶堆/小根堆。他是一种逻辑结构，可以有很多种实现方法，最简单的是二叉堆（Binary Heap），常见的还有斐波拉契堆、严格斐波拉契堆等等。
* 假设是大顶堆，常见的操作（API）：
  * find-max：O(1)
  * delete-max：O(logn)
  * insert(create)：O(logn) or O(1)
* 二叉堆（Binary Heap）：通过完全二叉树来实现的堆，特点如下
  * 是一个完全二叉树
  * 每一个节点的值都大于等于（或小于）其子树中每个节点的值
* 二叉堆一般都是用数组来实现，通过数组下标之间的关系来省去了指向其他节点的指针
* 二叉堆的具体实现：
  * 插入（insert）
    * 新元素一律插入到数组的末尾
    * 依次向上调整整个堆的结构（HeapifyUp）
    * 时间复杂度：O(logn)
      ![avatra](https://static001.geekbang.org/resource/image/e3/0e/e3744661e038e4ae570316bc862b2c0e.jpg)
  * 删除（delete）
    * 将堆尾元素替换到顶部（即堆顶被替代删除掉）
    * 依次从根部向下调整整个堆的结构（一直到堆尾为止 HeapifyDown）
    * 时间复杂度：O(logn)
      ![avatra](https://static001.geekbang.org/resource/image/11/60/110d6f442e718f86d2a1d16095513260.jpg)
  * [Java二叉堆源码](https://shimo.im/docs/GpwwDq66kC9RC3PX/read)
* 图的定义
  * Graph(V, E)
  * V-vertex：图中的元素我们就叫作顶点（vertex）
    * 度-入度和出度
    * 点与点之间：连通与否
  * E-edge：图中的一个顶点可以与任意其他顶点建立连接关系。我们把这种建立的关系叫作边（edge）
    * 有向和无向（单行线）
    * 权重（边长）
      ![avatra](https://static001.geekbang.org/resource/image/df/af/df85dc345a9726cab0338e68982fd1af.jpg)
### <a id="map">图</a>
* 图的表示
  * 邻接矩阵表示
    * 邻接矩阵的底层依赖一个二维数组。对于无向图来说，如果顶点 i 与顶点 j 之间有边，我们就将 A[i][j]和 A[j][i]标记为 1；对于有向图来说，如果顶点 i 到顶点 j 之间，有一条箭头从顶点 i 指向顶点 j 的边，那我们就将 A[i][j]标记为 1。同理，如果有一条箭头从顶点 j 指向顶点 i 的边，我们就将 A[j][i]标记为 1。对于带权图，数组中就存储相应的权重
      ![avatra](https://static001.geekbang.org/resource/image/62/d2/625e7493b5470e774b5aa91fb4fdb9d2.jpg)
  * 邻接表表示
    ![aratra](https://static001.geekbang.org/resource/image/03/94/039bc254b97bd11670cdc4bf2a8e1394.jpg)
* 图的DFS、BFS记住要加visited集合来记录已经访问过的节点
## 本周算法练习
### <a id="hashal">HashMap相关</a>
* [LeetCode299 猜字游戏](https://leetcode-cn.com/problems/bulls-and-cows)
* [LeetCode290 单词规律](https://leetcode-cn.com/problems/word-pattern)
* [LeetCode350 两个数组的交集](https://leetcode-cn.com/problems/intersection-of-two-arrays-ii)
* [LeetCode392 判断子序列](https://leetcode-cn.com/problems/is-subsequence)
* [面试题 17.09. 第 k 个数](https://leetcode-cn.com/problems/get-kth-magic-number-lcci/)
* [LeetCode242 有效的字母异位词](https://leetcode-cn.com/problems/valid-anagram)
* [LeetCode49 字母异位词分组](https://leetcode-cn.com/problems/group-anagrams)
* [LeetCode1021 删除最外层的括号](https://leetcode-cn.com/problems/remove-outermost-parentheses)
* [面试题59 - I. 滑动窗口的最大值](https://leetcode-cn.com/problems/hua-dong-chuang-kou-de-zui-da-zhi-lcof/)
### <a id="treeal">二叉树相关</a>
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
### <a id="al">面试高频</a>
* [LeetCode543 二叉树的直径](https://leetcode-cn.com/problems/diameter-of-binary-tree/)
* [LeetCode75 颜色分类](https://leetcode-cn.com/problems/sort-colors/)
* [LeetCode23 合并k个有序链表](https://leetcode-cn.com/problems/merge-k-sorted-lists/)
* [面试题 02.02. 返回倒数第 k 个节点](https://leetcode-cn.com/problems/kth-node-from-end-of-list-lcci/)
## 扩展知识
### PHP7中针对HashTable的定义
```https://gsmtoday.github.io/2018/03/21/php-hashtable/```
```https://juejin.im/post/5b967696e51d450e452a74d8```