<?php


namespace RafaelNeris\QueryBuilder\MySql;


class Select
{
    private $table;

    private $fields = [];

    private $filter;

    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param $table
     * @return $this
     */
    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    public function getSql()
    {
        $fields = '*';
        if (!empty($this->fields)) {
            $fields = implode(', ', $this->fields);
        }

        $filter = '';
        if (!empty($this->filter)) {
            $filter = ' '. $this->filter;
        }

        return sprintf("SELECT %s FROM %s%s;", $fields, $this->table, $filter);
    }

    public function fields(array $fields)
    {
        $this->fields = $fields;
        return $this;
    }

    public function filter(Filter $filter)
    {
        $this->filter = $filter->getSql();
        return $this;
    }

}