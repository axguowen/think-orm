<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2019 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

namespace think\db\concern;

/**
 * 事务支持
 */
trait Transaction
{

    /**
     * 执行数据库Xa事务
     * @access public
     * @param  callable $callback 数据操作方法回调
     * @param  array    $dbs      多个查询对象或者连接对象
     * @return mixed
     * @throws PDOException
     * @throws \Exception
     */
    public function transactionXa($callback, array $dbs = [])
    {
        return $this->connection->transactionXa($callback, $dbs);
    }

    /**
     * 执行数据库事务
     * @access public
     * @param callable $callback 数据操作方法回调
     * @return mixed
     */
    public function transaction($callback)
    {
        return $this->connection->transaction($callback);
    }

    /**
     * 启动事务
     * @access public
     * @return void
     */
    public function startTrans()
    {
        $this->connection->startTrans();
    }

    /**
     * 用于非自动提交状态下面的查询提交
     * @access public
     * @return void
     * @throws PDOException
     */
    public function commit()
    {
        $this->connection->commit();
    }

    /**
     * 事务回滚
     * @access public
     * @return void
     * @throws PDOException
     */
    public function rollback()
    {
        $this->connection->rollback();
    }

    /**
     * 启动XA事务
     * @access public
     * @param  string $xid XA事务id
     * @return void
     */
    public function startTransXa($xid)
    {
        $this->connection->startTransXa($xid);
    }

    /**
     * 预编译XA事务
     * @access public
     * @param  string $xid XA事务id
     * @return void
     */
    public function prepareXa($xid)
    {
        $this->connection->prepareXa($xid);
    }

    /**
     * 提交XA事务
     * @access public
     * @param  string $xid XA事务id
     * @return void
     */
    public function commitXa($xid)
    {
        $this->connection->commitXa($xid);
    }

    /**
     * 回滚XA事务
     * @access public
     * @param  string $xid XA事务id
     * @return void
     */
    public function rollbackXa($xid)
    {
        $this->connection->rollbackXa($xid);
    }
}
