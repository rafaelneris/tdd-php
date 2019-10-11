<?php


namespace RafaelNeris\QueryBuilder\MySql;


class Filter
{
    private $sql;

    public function where($column, $operation, $value)
    {
        $where = 'WHERE %s %s %s';
        $this->sql[] = sprintf($where, $column,$operation, $value);
        return $this;
    }

    public function getSql()
    {
        return implode(' ', $this->sql);

    }

    public function orderBy(string $field, string $order)
    {
        $this->sql[] = "ORDER BY $field $order";
        return $this;
    }
}