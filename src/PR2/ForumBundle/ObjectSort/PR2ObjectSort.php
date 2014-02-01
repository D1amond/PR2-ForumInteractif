<?php
// src/Sdz/BlogBundle/Antispam/PR2ObjectSort.php

namespace PR2\ForumBundle\ObjectSort;

class PR2ObjectSort
{
	/**
	 * Sort an array of objects.
	 *
	 * You can pass in one or more properties on which to sort.  If a
	 * string is supplied as the sole property, or if you specify a
	 * property without a sort order then the sorting will be ascending.
	 *
	 * If the key of an array is an array, then it will sorted down to that
	 * level of node.
	 *
	 * Example usages:
	 *
	 * osort($items, 'size');
	 * osort($items, array('size', array('time' => SORT_DESC, 'user' => SORT_ASC));
	 * osort($items, array('size', array('user', 'forname'))
	 *
	 * @param array $array
	 * @param string|array $properties
	 */
	public static function osort(&$array, $properties)
	{
	    if (is_string($properties)) {
	        $properties = array($properties => SORT_ASC);
	    }
	    uasort($array, function($a, $b) use ($properties) {
	        foreach($properties as $k => $v) {
	            if (is_int($k)) {
	                $k = $v;
	                $v = SORT_ASC;
	            }
	            $collapse = function($node, $props) {
	                if (is_array($props)) {
	                    foreach ($props as $prop) {
	                        $node = (!isset($node->$prop)) ? null : $node->$prop;
	                    }
	                    return $node;
	                } else {
	                    return (!isset($node->$props)) ? null : $node->$props;
	                }
	            };
	            $aProp = $collapse($a, $k);
	            $bProp = $collapse($b, $k);
	            if ($aProp != $bProp) {
	                return ($v == SORT_ASC)
	                    ? strnatcasecmp($aProp, $bProp)
	                    : strnatcasecmp($bProp, $aProp);
	            }
	        }
	        return 0;
	    });
	}
}