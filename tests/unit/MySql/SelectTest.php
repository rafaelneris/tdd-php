<?php

namespace RafaelNeris\QueryBuilder\MySql;

use PHPUnit\Framework\TestCase;

class SelectTest extends TestCase
{
    public function testSelectSemFiltro()
    {
        $select = new Select();
        $select->setTable('pages');
        $actual = $select->getSql();
        $expected = 'SELECT * FROM pages;';
        $this->assertEquals($expected, $actual);
    }

    public function testSelectSetAndGetTable()
    {
        $select = new Select();
        $setTableReturn = $select->setTable('pages');
        $this->assertInstanceOf(Select::class, $setTableReturn);
        $actual = $select->getTable();
        $expected = 'pages';
        $this->assertEquals($expected, $actual);
    }

    public function testSelectEspecificandoOsCampos()
    {
        $select = new Select();
        $select->setTable('users');
        $select->fields(['name', 'email']);

        $actual = $select->getSql();
        $expected = "SELECT name, email FROM users;";

        $this->assertEquals($expected, $actual);
    }

    public function testSelectComFiltro()
    {
        $select = new Select();
        $select->setTable('users');
        $select->fields(['name', 'email']);

        $stub = $this->getMockBuilder(Filter::class)
            ->disableOriginalConstructor()
            ->getMock();
        $stub->method('getSql')
            ->willReturn('WHERE id = 1 ORDER BY created desc');

        $select->filter($stub);

        $actual = $select->getSql();
        $expected = "SELECT name, email FROM users WHERE id = 1 ORDER BY created desc;";

        $this->assertEquals($expected, $actual);
    }
}