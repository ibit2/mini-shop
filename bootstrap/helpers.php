<?php

/**
 * @param $data 原始数据
 * @param $field_id 字段id
 * @param $field_pid 父字段id
 * @param int $pid 父字段值
 * @return array
 */
function getTree($data, $field_id, $field_pid, $pid = 0) {
    $arr = array();
    foreach ($data as $k=>$v) {
        if ($v[$field_pid] == $pid) {
            $v['child']=getTree($data, $field_id, $field_pid, $v[$field_id] );
            $arr[] = $v;
        }
    }
    return $arr;
}