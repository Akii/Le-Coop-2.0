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
 * Test case for class Tx_Lecoop_Domain_Model_Schedule.
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
class Tx_Lecoop_Domain_Model_ScheduleTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Lecoop_Domain_Model_Schedule
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Lecoop_Domain_Model_Schedule();
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
	public function getExceptionsReturnsInitialValueForObjectStorageContainingTx_Lecoop_Domain_Model_Exception() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getExceptions()
		);
	}

	/**
	 * @test
	 */
	public function setExceptionsForObjectStorageContainingTx_Lecoop_Domain_Model_ExceptionSetsExceptions() { 
		$exception = new Tx_Lecoop_Domain_Model_Exception();
		$objectStorageHoldingExactlyOneExceptions = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneExceptions->attach($exception);
		$this->fixture->setExceptions($objectStorageHoldingExactlyOneExceptions);

		$this->assertSame(
			$objectStorageHoldingExactlyOneExceptions,
			$this->fixture->getExceptions()
		);
	}
	
	/**
	 * @test
	 */
	public function addExceptionToObjectStorageHoldingExceptions() {
		$exception = new Tx_Lecoop_Domain_Model_Exception();
		$objectStorageHoldingExactlyOneException = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneException->attach($exception);
		$this->fixture->addException($exception);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneException,
			$this->fixture->getExceptions()
		);
	}

	/**
	 * @test
	 */
	public function removeExceptionFromObjectStorageHoldingExceptions() {
		$exception = new Tx_Lecoop_Domain_Model_Exception();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($exception);
		$localObjectStorage->detach($exception);
		$this->fixture->addException($exception);
		$this->fixture->removeException($exception);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getExceptions()
		);
	}
	
	/**
	 * @test
	 */
	public function getEventsReturnsInitialValueForObjectStorageContainingTx_Lecoop_Domain_Model_Event() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getEvents()
		);
	}

	/**
	 * @test
	 */
	public function setEventsForObjectStorageContainingTx_Lecoop_Domain_Model_EventSetsEvents() { 
		$event = new Tx_Lecoop_Domain_Model_Event();
		$objectStorageHoldingExactlyOneEvents = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneEvents->attach($event);
		$this->fixture->setEvents($objectStorageHoldingExactlyOneEvents);

		$this->assertSame(
			$objectStorageHoldingExactlyOneEvents,
			$this->fixture->getEvents()
		);
	}
	
	/**
	 * @test
	 */
	public function addEventToObjectStorageHoldingEvents() {
		$event = new Tx_Lecoop_Domain_Model_Event();
		$objectStorageHoldingExactlyOneEvent = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneEvent->attach($event);
		$this->fixture->addEvent($event);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneEvent,
			$this->fixture->getEvents()
		);
	}

	/**
	 * @test
	 */
	public function removeEventFromObjectStorageHoldingEvents() {
		$event = new Tx_Lecoop_Domain_Model_Event();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($event);
		$localObjectStorage->detach($event);
		$this->fixture->addEvent($event);
		$this->fixture->removeEvent($event);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getEvents()
		);
	}
	
}
?>