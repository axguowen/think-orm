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
 * 数据字段信息
 */
trait TableFieldInfo
{

    /**
     * 获取数据表字段信息
     * @access public
     * @param string $tableName 数据表名
     * @return array
     */
    public function getTableFields($tableName = '')
    {
        if ('' == $tableName) {
            $tableName = $this->getTable();
        }

        return $this->connection->getTableFields($tableName);
    }

    /**
     * 获取详细字段类型信息
     * @access public
     * @param string $tableName 数据表名称
     * @return array
     */
    public function getFields($tableName = '')
    {
        return $this->connection->getFields($tableName ?: $this->getTable());
    }

    /**
     * 获取字段类型信息
     * @access public
     * @return array
     */
    public function getFieldsType()
    {
        if (!empty($this->options['field_type'])) {
            return $this->options['field_type'];
        }

        return $this->connection->getFieldsType($this->getTable());
    }

    /**
     * 获取字段类型信息
     * @access public
     * @param string $field 字段名
     * @return string|null
     */
    public function getFieldType($field)
    {
        $fieldType = $this->getFieldsType();

        return isset($fieldType[$field]) ? $fieldType[$field] : null;
    }

    /**
     * 获取字段类型信息
     * @access public
     * @return array
     */
    public function getFieldsBindType()
    {
        $fieldType = $this->getFieldsType();

        return array_map([$this->connection, 'getFieldBindType'], $fieldType);
    }

    /**
     * 获取字段类型信息
     * @access public
     * @param string $field 字段名
     * @return int
     */
    public function getFieldBindType($field)
    {
        $fieldType = $this->getFieldType($field);

        return $this->connection->getFieldBindType($fieldType ?: '');
    }

}
