<?php


use PHPUnit\Framework\TestCase;
use RafaelNeris\QueryBuilder\MySql\Filter;
use RafaelNeris\QueryBuilder\MySql\Select;

/**
 * Teste Integrado de Select com Filtro
 */
class SelectAndFilterIntegrationTest extends TestCase
{
    /**
     * Teste de Select Com Filtro e Order
     */
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

    /**
     * Teste de Select Com Filtro e Sem Order
     */
    public function testSelectComFiltroWhereSemOrder()
    {
        $select = new Select();
        $select->setTable('users');
        $select->fields(['name', 'email']);

        $filters = new Filter();
        $filters->where('id', '=', 1);

        $select->filter($filters);

        $actual = $select->getSql();
        $expected = "SELECT name, email FROM users WHERE id = 1;";

        $this->assertEquals($expected, $actual);
    }

    /**
     * Teste de Select Com Order
     */
    public function testSelectComOrder()
    {
        $select = new Select();
        $select->setTable('users');
        $select->fields(['name', 'email']);

        $filters = new Filter();
        $filters->orderBy('created', 'desc');

        $select->filter($filters);

        $actual = $select->getSql();
        $expected = "SELECT name, email FROM users ORDER BY created desc;";

        $this->assertEquals($expected, $actual);
    }
}