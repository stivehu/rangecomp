<?php

class rangedecompTest extends \Codeception\Test\Unit {

    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before() {

    }

    protected function _after() {

    }

    /**
     * @group deCompress
     * @group range-deCompress-default
     */
    public function testRangeDeCompressDefault() {
        $this->assertEmpty(stivehu\rangecomp\Rangecomp::rangeDeCompress([]));
    }

    /**
     * @group deCompress
     * @group range-deCompress-normal
     */
    public function testRangeDeCompressNormail() {
        $source = [1, 2, 3, '4-10'];
        $this->assertEquals(stivehu\rangecomp\Rangecomp::rangeDeCompress($source), [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
    }

    /**
     * @group deCompress
     * @group range-deCompress-one-value
     */
    public function testRangeDeCompressOneValue() {
        $source = [10];
        $this->assertEquals(stivehu\rangecomp\Rangecomp::rangeDeCompress($source), [10]);
    }

    /**
     * @group deCompress
     * @group range-deCompress-big-range
     */
    public function testRangeDeCompressBigRange() {

        $source = [];
        for ($i = 10; $i < 1000000; $i++) {
            $source[] = $i;
        }
        $this->assertEquals(stivehu\rangecomp\Rangecomp::rangeDeCompress($source), $source);
    }

    /**
     * @group deCompress
     * @group range-deCompress-big-uncomressable
     */
    public function testRangeDeCompressUncomressable() {

        $source = [];
        for ($i = 10; $i < 10000000; $i = $i + 2) {
            $source[] = $i;
        }
        $this->assertEquals(stivehu\rangecomp\Rangecomp::rangeDeCompress($source), $source);
    }

}
