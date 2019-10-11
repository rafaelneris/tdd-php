<?php


namespace RafaelNeris\QueryBuilder\MySql;

/**
 * Class Filter
 * @package RafaelNeris\QueryBuilder\MySql
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class Filter
{
    /** @var array */
    private $sql;

    /**
     * @param string $column
     * @param string $operation
     * @param $value
     * @return Filter
     */
    public function where(string $column, string $operation, $value) : Filter
    {
        $where = 'WHERE %s %s %s';
        $this->sql[] = sprintf($where, $column,$operation, $value);
        return $this;
    }

    /**
     * @return string
     */
    public function getSql() : string
    {
        return implode(' ', $this->sql);

    }

    /**
     * @param string $field
     * @param string $order
     * @return $this
     */
    public function orderBy(string $field, string $order) : Filter
    {
        $this->sql[] = "ORDER BY $field $order";
        return $this;
    }
}