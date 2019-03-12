<?php

namespace EasyPHP\Tools;


class SortHelper
{
    /**
     * 快速排序
     * @param array $arr
     * @return array
     * @author 柳琛
     * @日期 2019/2/27
     */
    public static function quickSort(array $arr) {
        $length = count($arr);
        if($length <= 1) {
            return $arr;
        }
        //选择第一个元素作为基准
        $baseNum = $arr[0];
        //遍历除了标尺外的所有元素，按照大小关系放入两个数组内
        //初始化两个数组
        $leftArray = [];  //小于基准的
        $rightArray = [];  //大于基准的
        for($i=1; $i<$length; $i++) {
            if($baseNum > $arr[$i]) {
                //放入左边数组
                $leftArray[] = $arr[$i];
            } else {
                //放入右边
                $rightArray[] = $arr[$i];
            }
        }
        //再分别对左边和右边的数组进行相同的排序处理方式递归调用这个函数
        $leftArray = self::quickSort($leftArray);
        $rightArray = self::quickSort($rightArray);
        //合并
        return array_merge($leftArray, [$baseNum], $rightArray);
    }



}