<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Maier Philipp <Zedd@akii.de>
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class Tx_Lecoop_Domain_Model_Events.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Le COOP 2.0
 *
 * @author Maier Philipp <Zedd@akii.de>
 */
class Tx_Lecoop_Domain_Model_EventsTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Lecoop_Domain_Model_Events
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Lecoop_Domain_Model_Events();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getStartReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setStartForDateTimeSetsStart() { }
	
	/**
	 * @test
	 */
	public function getEndReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setEndForDateTimeSetsEnd() { }
	
	/**
	 * @test
	 */
	public function getLengthReturnsInitialValueForInt() { }

	/**
	 * @test
	 */
	public function setLengthForIntSetsLength() { }
	
	/**
	 * @test
	 */
	public function getSteplengthReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getSteplength()
		);
	}

	/**
	 * @test
	 */
	public function setSteplengthForIntegerSetsSteplength() { 
		$this->fixture->setSteplength(12);

		$this->assertSame(
			12,
			$this->fixture->getSteplength()
		);
	}
	
	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription() { 
		$this->fixture->setDescription('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getDescription()
		);
	}
	
}
?>