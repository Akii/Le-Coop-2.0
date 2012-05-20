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
 * Test case for class Tx_Lecoop_Domain_Model_User.
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
class Tx_Lecoop_Domain_Model_UserTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Lecoop_Domain_Model_User
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Lecoop_Domain_Model_User();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getScheduleidReturnsInitialValueForTx_Lecoop_Domain_Model_Schedule() { 
		$this->assertEquals(
			NULL,
			$this->fixture->getScheduleid()
		);
	}

	/**
	 * @test
	 */
	public function setScheduleidForTx_Lecoop_Domain_Model_ScheduleSetsScheduleid() { 
		$dummyObject = new Tx_Lecoop_Domain_Model_Schedule();
		$this->fixture->setScheduleid($dummyObject);

		$this->assertSame(
			$dummyObject,
			$this->fixture->getScheduleid()
		);
	}
	
	/**
	 * @test
	 */
	public function getSubscriptionsReturnsInitialValueForObjectStorageContainingTx_Lecoop_Domain_Model_Course() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getSubscriptions()
		);
	}

	/**
	 * @test
	 */
	public function setSubscriptionsForObjectStorageContainingTx_Lecoop_Domain_Model_CourseSetsSubscriptions() { 
		$subscription = new Tx_Lecoop_Domain_Model_Course();
		$objectStorageHoldingExactlyOneSubscriptions = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneSubscriptions->attach($subscription);
		$this->fixture->setSubscriptions($objectStorageHoldingExactlyOneSubscriptions);

		$this->assertSame(
			$objectStorageHoldingExactlyOneSubscriptions,
			$this->fixture->getSubscriptions()
		);
	}
	
	/**
	 * @test
	 */
	public function addSubscriptionToObjectStorageHoldingSubscriptions() {
		$subscription = new Tx_Lecoop_Domain_Model_Course();
		$objectStorageHoldingExactlyOneSubscription = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneSubscription->attach($subscription);
		$this->fixture->addSubscription($subscription);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneSubscription,
			$this->fixture->getSubscriptions()
		);
	}

	/**
	 * @test
	 */
	public function removeSubscriptionFromObjectStorageHoldingSubscriptions() {
		$subscription = new Tx_Lecoop_Domain_Model_Course();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($subscription);
		$localObjectStorage->detach($subscription);
		$this->fixture->addSubscription($subscription);
		$this->fixture->removeSubscription($subscription);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getSubscriptions()
		);
	}
	
	/**
	 * @test
	 */
	public function getViewedReturnsInitialValueForObjectStorageContainingTx_Lecoop_Domain_Model_Viewed() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getViewed()
		);
	}

	/**
	 * @test
	 */
	public function setViewedForObjectStorageContainingTx_Lecoop_Domain_Model_ViewedSetsViewed() { 
		$viewed = new Tx_Lecoop_Domain_Model_Viewed();
		$objectStorageHoldingExactlyOneViewed = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneViewed->attach($viewed);
		$this->fixture->setViewed($objectStorageHoldingExactlyOneViewed);

		$this->assertSame(
			$objectStorageHoldingExactlyOneViewed,
			$this->fixture->getViewed()
		);
	}
	
	/**
	 * @test
	 */
	public function addViewedToObjectStorageHoldingViewed() {
		$viewed = new Tx_Lecoop_Domain_Model_Viewed();
		$objectStorageHoldingExactlyOneViewed = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneViewed->attach($viewed);
		$this->fixture->addViewed($viewed);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneViewed,
			$this->fixture->getViewed()
		);
	}

	/**
	 * @test
	 */
	public function removeViewedFromObjectStorageHoldingViewed() {
		$viewed = new Tx_Lecoop_Domain_Model_Viewed();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($viewed);
		$localObjectStorage->detach($viewed);
		$this->fixture->addViewed($viewed);
		$this->fixture->removeViewed($viewed);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getViewed()
		);
	}
	
}
?>