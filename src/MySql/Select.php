<?php


namespace RafaelNeris\QueryBuilder\MySql;

/**
 * Class Select
 * @package RafaelNeris\QueryBuilder\MySql
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class Select
{
    /** @var string */
    private $table;

    /** @var array  */
    private $fields = [];

    /** @var string */
    private $filter;

    /**
     * @return string
     */
    public function getTable() : string
    {
        return $this->table;
    }

    /**
     * @param string $table
     * @return $this
     */
    public function setTable(string $table) : Select
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @return string
     */
    public function getSql() : string
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

    /**
     * @param array $fields
     * @return $this
     */
    public function fields(array $fields) : Select
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @param Filter $filter
     * @return Filter
     */
    public function filter(Filter $filter) : Select
    {
        $this->filter = $filter->getSql();
        return $this;
    }

}