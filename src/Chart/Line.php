<?php

namespace Halfpastfour\PHPChartJS\Chart;

use Halfpastfour\PHPChartJS\Chart;
use Halfpastfour\PHPChartJS\ChartInterface;
use Halfpastfour\PHPChartJS\DataSet\LineDataSet;
use Halfpastfour\PHPChartJS\Renderer;

/**
 * Class Line
 * @package Halfpastfour\PHPChartJS\Chart
 */
class Line extends Chart implements ChartInterface
{
	const TYPE = 'line';

	/**
	 * @return LineDataSet
	 */
	public function createDataSet()
	{
		return new LineDataSet();
	}

	/**
	 * @return string
	 */
	public function render()
	{
		$renderer	= new Renderer( $this );
		return $renderer->render();
	}
}