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
 * Test case for class Tx_Lecoop_Domain_Model_Viewed.
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
class Tx_Lecoop_Domain_Model_ViewedTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Lecoop_Domain_Model_Viewed
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Lecoop_Domain_Model_Viewed();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getTimestampReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setTimestampForDateTimeSetsTimestamp() { }
	
	/**
	 * @test
	 */
	public function getCourseidReturnsInitialValueForTx_Lecoop_Domain_Model_Course() { 
		$this->assertEquals(
			NULL,
			$this->fixture->getCourseid()
		);
	}

	/**
	 * @test
	 */
	public function setCourseidForTx_Lecoop_Domain_Model_CourseSetsCourseid() { 
		$dummyObject = new Tx_Lecoop_Domain_Model_Course();
		$this->fixture->setCourseid($dummyObject);

		$this->assertSame(
			$dummyObject,
			$this->fixture->getCourseid()
		);
	}
	
}
?>