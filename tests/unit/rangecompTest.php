<?php

class rangecompTest extends \Codeception\Test\Unit {

    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before() {

    }

    protected function _after() {

    }

    /**
     * @group compress
     * @group range-compress-default
     */
    public function testRangeCompressDefault() {
        $this->assertEmpty(stivehu\rangecomp\Rangecomp::rangeCompress([]));
    }

    /**
     * @group compress
     * @group range-compress-normal
     */
    public function testRangeCompressNormail() {
        $source = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $this->assertEquals(stivehu\rangecomp\Rangecomp::rangeCompress($source), ['1-10']);
    }

    /**
     * @group compress
     * @group range-compress-one-value
     */
    public function testRangeCompressOneValue() {
        $source = [10];
        $this->assertEquals(stivehu\rangecomp\Rangecomp::rangeCompress($source), [10]);
    }

    /**
     * @group compress
     * @group range-compress-big-range
     */
    public function testRangeCompressBigRange() {

        $source = [];
        for ($i = 10; $i <= 1000000; $i++) {
            $source[] = $i;
        }
        $this->assertEquals(stivehu\rangecomp\Rangecomp::rangeCompress($source), ['10-1000000']);
    }

    /**
     * @group compress
     * @group range-compress-big-uncomressable
     */
    public function testRangeCompressUncomressable() {

        $source = [];
        for ($i = 10; $i < 1000000; $i = $i + 2) {
            $source[] = $i;
        }
        $this->assertEquals(stivehu\rangecomp\Rangecomp::rangeCompress($source), $source);
    }

}
