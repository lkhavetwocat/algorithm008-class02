<?php
/*
 * @lc app=leetcode.cn id=299 lang=php
 *
 * [299] 猜数字游戏
 *
 * https://leetcode-cn.com/problems/bulls-and-cows/description/
 *
 * algorithms
 * Easy (47.42%)
 * Likes:    65
 * Dislikes: 0
 * Total Accepted:    11.7K
 * Total Submissions: 24.6K
 * Testcase Example:  '"1807"\n"7810"'
 *
 * 你正在和你的朋友玩 猜数字（Bulls and
 * Cows）游戏：你写下一个数字让你的朋友猜。每次他猜测后，你给他一个提示，告诉他有多少位数字和确切位置都猜对了（称为“Bulls”,
 * 公牛），有多少位数字猜对了但是位置不对（称为“Cows”, 奶牛）。你的朋友将会根据提示继续猜，直到猜出秘密数字。
 * 
 * 请写出一个根据秘密数字和朋友的猜测数返回提示的函数，用 A 表示公牛，用 B 表示奶牛。
 * 
 * 请注意秘密数字和朋友的猜测数都可能含有重复数字。
 * 
 * 示例 1:
 * 
 * 输入: secret = "1807", guess = "7810"
 * 
 * 输出: "1A3B"
 * 
 * 解释: 1 公牛和 3 奶牛。公牛是 8，奶牛是 0, 1 和 7。
 * 
 * 示例 2:
 * 
 * 输入: secret = "1123", guess = "0111"
 * 
 * 输出: "1A1B"
 * 
 * 解释: 朋友猜测数中的第一个 1 是公牛，第二个或第三个 1 可被视为奶牛。
 * 
 * 说明: 你可以假设秘密数字和朋友的猜测数都只包含数字，并且它们的长度永远相等。
 * 
 */

// @lc code=start
class Solution {

    /**
     * 解法1：
     * 遍历所有secret和guess进行对比，得到所有公牛，并把不是公牛的数字放入map中作为key，value为出现的次数
     * 遍历guess，如果map中存在当前数字，并且不是公牛，那么cows++,并且把map的value--，因为可能存在重复的数字
     * 返回bulls和cows
     * 复杂度分析
     * 时间复杂度：O(n)，虽然有两个for循环但是并没有嵌套
     * 空间复杂度：最好的情况下map为空，最差的情况下map为strlen($secret)，中和复杂度为O(n)
     * @param String $secret
     * @param String $guess
     * @return String
     */
    // function getHint($secret, $guess) {
    //     //声明一个空map
    //     $map = [];
    //     //设定公牛母牛初始值
    //     $bulls = $cows = 0;
    //     //第一个循环，用来得到公牛数，并把非公牛的数字存入map中
    //     for ($i=0; $i < strlen($secret); $i++) { 
    //         if ($secret[$i] == $guess[$i]) {
    //             //同样位置的元素相同，公牛数加一
    //             $bulls++;
    //         }else {
    //             //非公牛放入map作为key并把value设为出现次数
    //             $map[$secret[$i]]++;
    //         }
    //     }
    //     //第二个循环，用来得到母牛数
    //     for ($j=0; $j < strlen($guess); $j++) { 
    //         //如果当前元素在map中存在
    //         //并且map中value（次数）大于0
    //         //并且当前元素不是公牛（因为重复数字的原因，这个位置可能是公牛）
    //         if (isset($map[$guess[$j]]) && $map[$guess[$j]] > 0 && $guess[$j] <> $secret[$j]) {
    //             //母牛数加一
    //             $cows++;
    //             //map对应的校验次数减一
    //             $map[$guess[$j]]--;
    //         }
    //     }
    //     //返回公牛和母牛数
    //     return sprintf('%sA%sB',$bulls , $cows);
    // }
    /**
     * 解法2:
     * 使用两个数组来统计非公牛数字在secret和在guess中出现的次数
     * 二者相同的数字出现次数少的一方代表加入母牛数
     * @param String $secret
     * @param String $guess
     * @return String
     */
    // function getHint($secret, $guess) {
    //     //设定公牛母牛初始值
    //     $bulls = $cows = 0;
    //     //初始化两个数组，分别用来记录secret和guess中非公牛数字的次数
    //     $secarr = new SplFixedArray(10);
    //     $guearr = new SplFixedArray(10);
    //     //第一次循环用来计算出公牛数，并把两个数组内容填好
    //     for ($i=0; $i < strlen($secret); $i++) { 
    //         if ($secret[$i] == $guess[$i]) {
    //             $bulls++;
    //         }else {
    //             isset($secarr[$secret[$i]]) ? $secarr[$secret[$i]]+=1 : $secarr[$secret[$i]] = 1;
    //             isset($guearr[$guess[$i]]) ? $guearr[$guess[$i]]+=1 : $guearr[$guess[$i]] = 1;
    //         }
    //     }
    //     //计算母牛数，母牛数等于相同数字中出现最少的次数之和
    //     for ($i=0; $i < 10; $i++) { 
    //         $cows += min($secarr[$i], $guearr[$i]);
    //     }
    //     return sprintf('%sA%sB', $bulls, $cows);
    // }
    /**
     * 解法3：
     * 针对于解法2的优化
     * @param String $secret
     * @param String $guess
     * @return String
     */
    function getHint($secret, $guess) {
       $bulls = $cows = 0;
       $bucket = new SplFixedArray(10);
       for ($i=0; $i < strlen($secret); $i++) { 
           if ($secret[$i] == $guess[$i]) {
               $bulls++;
           }else {
            isset($bucket[$secret[$i]]) ? $bucket[$secret[$i]]+=1 : $bucket[$secret[$i]] = 1;
            isset($bucket[$guess[$i]]) ? $bucket[$guess[$i]]-=1 : $bucket[$guess[$i]] = -1;
           }
       }
       for ($i=0; $i < 10; $i++) { 
           if ($bucket[$i] > 0) {
                $cow += $bucket[$i];
           }
       }
       $cows = strlen($secret) - $cow - $bulls;
       return sprintf('%sA%sB', $bulls, $cows);
    }
}
// @lc code=end

