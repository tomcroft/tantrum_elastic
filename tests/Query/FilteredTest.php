<?php

namespace tantrum_elastic\tests\Query;

use tantrum_elastic\tests;
use tantrum_elastic\Query;
use tantrum_elastic\Filter;

class FilteredTest extends tests\TestCase
{
    /**
     * @var tantrum_elastic\Query\Filtered $element
     */
    private $element;

    /**
     * @test
     */
    public function constructSucceeds()
    {
        $expected = json_encode([
            'filtered' => [
                'query'  => ['match_all' => new \stdClass()],
                'filter' => ['match_all' => new \stdClass()],
            ],
        ]);
        self::assertEquals($expected, json_encode($this->element));
    }

    /**
     * @test
     */
    public function setQuerySucceeds()
    {
        $field = uniqid();
        $value = uniqid();

        $query = new Query\Term();
        $query->setField($field);
        $query->setValue($value);

        $this->element->setQuery($query);

        $expected = json_encode([
            'filtered' => [
                'query' => [
                    'term' => [$field => $value],
                ],
                'filter' => ['match_all' => new \stdClass()],
            ],
        ]);
        self::assertEquals($expected, json_encode($this->element));
    }

    /**
     * @test
     */
    public function setFilterSucceeds()
    {
        $field = uniqid();
        $value = uniqid();

        $filter = new Filter\Term();
        $filter->setField($field);
        $filter->setValue($value);

        $this->element->setFilter($filter);

        $expected = json_encode([
            'filtered' => [
                'query' => ['match_all' => new \stdClass()],
                'filter' => [
                    'term' => [$field => $value],
                ],
            ],
        ]);
        self::assertEquals($expected, json_encode($this->element));
    }

    // Utils
    
    public function setUp()
    {
        $this->element = new Query\Filtered();
    }
}