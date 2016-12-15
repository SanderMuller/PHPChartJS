<?php

namespace Options;

use Halfpastfour\PHPChartJS\Options\Legend;
use Test\TestUtils;

/**
 * Class LegendTest
 * @package Options
 */
class LegendTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var Legend
	 */
	private $legend;

	/**
	 * @var array
	 */
	private $data_types = [
		'display'   => false,
		'position'  => '',
		'fullWidth' => false,
		'onClick'   => '',
		'onHover'   => '',
		'reverse'   => false,
	];

	/**
	 * @var array
	 */
	private $input_data = [
		'display'   => true,
		'position'  => 'position',
		'fullWidth' => true,
		'onClick'   => 'onClick',
		'onHover'   => 'onData',
		'reverse'   => true,
	];

	/**
	 * @var array
	 */
	private $empty_data = [
		'display'   => null,
		'position'  => null,
		'fullWidth' => null,
		'onClick'   => null,
		'onHover'   => null,
		'reverse'   => null,
	];

	/**
	 *
	 */
	public function setUp()
	{
		$this->legend = new Legend();
	}

	/**
	 *
	 */
	public function testEmpty()
	{
		$expected = $this->empty_data;
		$result   = TestUtils::getAttributes( $this->legend, $this->data_types );
		self::assertSame( $expected, $result );
	}

	/**
	 *
	 */
	public function testGetAndSet()
	{
		$expected = $this->input_data;
		TestUtils::setAttributes( $this->legend, $this->input_data );
		$result = TestUtils::getAttributes( $this->legend, $this->data_types );
		self::assertSame( $expected, $result );
	}

	public function testJsonSerialize() {
		$result = json_decode( $this->legend->jsonSerialize() );
		self::assertSame( [], $result );
		$jsClosure = "function() { console.log( 'test' )}";
		$this->legend->setOnHover( $jsClosure );
		$result = json_decode( $this->legend->jsonSerialize(), true );
		self::assertSame( [ 'onHover' => $jsClosure ], $result );
	}
}
