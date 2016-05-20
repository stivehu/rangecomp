<?php

/**
 * @link http://www.yiiframework.com/
 *
 */

namespace stivehu\rangecomp;

/**
 *
 * @author Gábor István
 */
class Rangecomp
{
    /**
     * decompress compressed array php version
     * @param type $sourceArray compressed items
     * @return array all item
     */
    public static function rangeDeCompress($sourceArray)
    {
        $result = [];
        if (empty($sourceArray)) {
            return [];
        }
        foreach ($sourceArray as $_sourceArray) {
            if (is_numeric($_sourceArray)) {
                array_push($result, $_sourceArray);
            } else {

                $separator = strpos($_sourceArray, "-");
                for ($j = substr($_sourceArray, 0, $separator); $j <= substr($_sourceArray, $separator + 1, strlen($_sourceArray)); $j++) {
                    array_push($result, $j);
                }
            }
        }
        return $result;
    }

    /**
     * compress compressed array php version
     * @param type $sourceArray all item
     * @return array compressed items
     */
    public static function rangeCompress($sourceArray)
    {
        if (empty($sourceArray)) {
            return [];
        }
        sort($sourceArray, SORT_NUMERIC);
        $result = [];
        $first = $sourceArray[0];
        $more = false;
        for ($i = 0; $i < count($sourceArray); $i++) {
            $current = $sourceArray[$i];
            $next = count($sourceArray) == $i + 1 ? $sourceArray[$i] : $sourceArray[$i + 1]; //túl csordulás ellen védelem
            if ($current + 1 == $next) {
                $more = FALSE;
            } else {
                $more = TRUE;
            }
            if ($more) {
                $more = FALSE;
                if ($first == $current) {
                    $result[] = $current;
                } else {
                    $result[] = "$first-$current";
                }
                $first = $next;
            }
        }
        return $result;
    }

}
