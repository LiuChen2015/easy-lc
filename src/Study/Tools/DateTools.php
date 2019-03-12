<?php
/**
 * @版本号：v0.0.2
 * @功能描述：日期处理
 * @创建时间：2019/2/26
 * @创建人：柳琛
 * Date: 2019/2/26
 * Time: 16:18
 */

namespace EasyPHP\Tools;

define('ONE_DAY_SECOND_COUNT', 86400);

class DateTools
{

    /**
     * 判断一个日期字符串是否满足格式要求
     * @param string $date 日期字符串
     * @param string $date_eol 日期分隔符 -
     * @param string $time_eol 时间分隔符 :
     * @return bool
     */
    public static function isDateStr(string $date, $date_eol = '-', $time_eol = ':')
    {
        if (date("Y{$date_eol}m{$date_eol}d H{$time_eol}i{$time_eol}s", strtotime($date)) === $date) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * 计算两个日期是否是同一天
     * @param $date
     * @param $earlyDate
     * @return bool
     */
    public static function isSameDay($date, $earlyDate)
    {
        return strcmp(date("Y-m-d", $date), date("Y-m-d", $earlyDate))==0;
    }

    /**
     * 计算两个日期相差的天数
     * @param $date
     * @param $earlyDate
     * @return int
     */
    public static function diffDay($date,$earlyDate){
        $day = date("Y-m-d 00:00:00",$date);
        $earlyDay = date("Y-m-d 00:00:00",$earlyDate);
        $dayCount = (int)((strtotime($day)-strtotime($earlyDay))/ONE_DAY_SECOND_COUNT);
        return $dayCount > 0 ? $dayCount : 0;
    }

    /**
     * 获取上个星期一的日期
     * @return false|string
     * @author 柳琛
     * @日期 2019/2/26
     */
    public static function lastMonday(){
        $thisMonday = static::thisMonday();
        return date('Y-m-d',strtotime("$thisMonday -7 days"));
    }

    /**
     * 获取上个星期天的日期
     * @return false|string
     * @author 柳琛
     * @日期 2019/2/26
     */
    public static function lastSunday(){
        $thisSunday = static::thisSunday();
        return date('Y-m-d',strtotime("$thisSunday -7 days"));
    }

    /**
     * 获取当前周的星期一
     * @return false|string
     * @author 柳琛
     * @日期 2019/2/26
     */
    public static function thisMonday(){
        return date('Y-m-d', (time() - ((date('w') == 0 ? 7 : date('w')) - 1) * 24 * 3600));
    }

    /**
     * 获取当前周的星期天
     * @return false|string
     * @author 柳琛
     * @日期 2019/2/26
     */
    public static function thisSunday(){
        return date('Y-m-d', (time() + (7 - (date('w') == 0 ? 7 : date('w'))) * 24 * 3600));
    }

    /**
     * 获取下一个星期一
     * @return false|string
     * @author 柳琛
     * @日期 2019/2/26
     */
    public static function nextMonday(){
        $thisMonday = static::thisMonday();
        return date('Y-m-d',strtotime("$thisMonday +7 days"));
    }

    /**
     * 获取下一个星期天
     * @return false|string
     * @author 柳琛
     * @日期 2019/2/26
     */
    public static function nextSunday(){
        $thisSunday = static::thisSunday();
        return date('Y-m-d',strtotime("$thisSunday +7 days"));
    }

    /**
     * 将一个日期字符串转为毫秒时间戳
     * @param $date
     * @return float|int
     * @author 柳琛
     * @日期 2019/2/26
     */
    public static function millisecond($date){
        return strtotime($date)*1000;
    }

    /**
     * 将一个毫秒时间转化为小时分钟
     * @param $millisecond
     * @return string
     * @author 柳琛
     * @日期 2019/2/26
     */
    public static function convertToHourMinute($millisecond){
        $secs = $millisecond/1000;
        return floor($secs/60/60)."小时".floor($secs%3600/60)."分钟";
    }

    /**
     * 获得一个日期是星期几
     * @param $time
     * @return mixed
     * @author 柳琛
     * @日期 2019/2/26
     */
    public static function getWeek($time){
        $weekArray = ["星期日","星期一","星期二","星期三","星期四","星期五","星期六"];
        return $weekArray[date("w", $time)];
    }

    /**
     * 获取昨天的日期
     * @param $time
     * @return false|string
     * @author 柳琛
     * @日期 2019/2/26
     */
    public static function getYesterday($time){
        return date("Y-m-d", $time - ONE_DAY_SECOND_COUNT);
    }

}