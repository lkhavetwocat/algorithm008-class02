# week01学习笔记

## 理论基础知识

* 重点思维：升纬，空间换时间


* Array: 在频繁的增加删除过程中，Arry要做大量的重复操作 各种操作的时间复杂度:prepend O(n), append O(n), loopup O(1), insert O(n), delete O(n)


* Linked List: Java 中是双向链表，没有涉及群移操作，但对访问链表中的任意位置便不再简单了。 循环链表：头尾相连 双向链表：preview ->next <- 各种操作的时间复杂度:prepend O(1), append O(1), loopup O(n), insert O(1), delete O(1)


* 跳表：只能用于元素有序的情况，所以跳表对标的是平衡树AVL 和 二分查找。 最大的优势：原理简单、容易实现、方便扩展、效率更高、因此在一些项目中用来替代平衡树，如Redis、LevelDB等


* 如何给有序的链表加速？ 一维数据结构加速的话 --->升纬，变成二维，因为多一个维度之后就会多一级的信息，可以帮助很快的定位到元素所在的范围，而这个范围在一维里面需要一个一个走才能走到的元素位置。 跳表中查询任意数据的时间复杂度：O(logn)


* 现实中的跳表：维护成本相对高，因为不断增加删除，导致索引不是完全工整的，每增加删除，索引都要更新一遍，增加删除为log(n)

## 优秀同学的学习笔记

* https://github.com/guoziliangshr/algorithm008-class02/blob/master/Week_01/NOTE.md