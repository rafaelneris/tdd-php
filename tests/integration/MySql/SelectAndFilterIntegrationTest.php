<?php


use PHPUnit\Framework\TestCase;
use RafaelNeris\QueryBuilder\MySql\Filter;
use RafaelNeris\QueryBuilder\MySql\Select;

class SelectAndFilterIntegrationTest extends TestCase
{
    public function testSelectComFiltroWhereEOrder()
    {
        $select = new Select();
        $select->setTable('users');
        $select->fields(['name', 'email']);

        $filters = new Filter();
        $filters->where('id', '=', 1);
        $filters->orderBy('created', 'desc');

        $select->filter($filters);

        $actual = $select->getSql();
        $expected = "SELECT name, email FROM users WHERE id = 1 ORDER BY created desc;";

        $this->assertEquals($expected, $actual);
    }
}