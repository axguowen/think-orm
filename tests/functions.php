<?php

namespace tests;

use think\db\ConnectionInterface;
use think\facade\Db;
use function array_column;
use function array_combine;
use function array_map;
use function call_user_func;
use function is_callable;
use function is_int;
use function sort;

function array_column_ex($arr, $column, $key = null)
{
    $result = array_map(function ($val) use ($column) {
        $item = [];
        foreach ($column as $index => $key) {
            if (is_callable($key)) {
                $item[$index] = call_user_func($key, $val);
            } elseif (is_int($index)) {
                $item[$key] = $val[$key];
            } else {
                $item[$key] = $val[$index];
            }
        }
        return $item;
    }, $arr);

    if (!empty($key)) {
        $result = array_combine(array_column($arr, 'id'), $result);
    }

    return $result;
}

function array_value_sort($arr)
{
    foreach ($arr as &$value) {
        sort($value);
    }
}

function query_mysql_connection_id(ConnectionInterface $connect)
{
    $cid = $connect->query('SELECT CONNECTION_ID() as cid')[0]['cid'];
    return (int) $cid;
}

function mysql_kill_connection($name, $cid)
{
    Db::connect($name)->execute("KILL {$cid}");
}