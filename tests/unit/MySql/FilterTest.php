<?php

namespace RafaelNeris\QueryBuilder\MySql;

use PHPUnit\Framework\TestCase;

/**
 * Class FilterTest
 * @package RafaelNeris\QueryBuilder\MySql
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class FilterTest extends TestCase
{
    public function testWhere() {
        $filters = new Filter();
        $filters->where('id', '=', 1);

        $actual = $filters->getSql();
        $expected = 'WHERE id = 1';

        $this->assertEquals($expected, $actual);
    }

    public function testOrderBy() {
        $filters = new Filter();
        $filters->orderBy('created', 'desc');

        $actual = $filters->getSql();
        $expected = 'ORDER BY created desc';

        $this->assertEquals($expected, $actual);
    }

    public function testOrderByAndWhere() {
        $filters = new Filter();
        $filters->where('id', '=', 1);
        $filters->orderBy('created', 'desc');

        $actual = $filters->getSql();
        $expected = 'WHERE id = 1 ORDER BY created desc';

        $this->assertEquals($expected, $actual);
    }

}