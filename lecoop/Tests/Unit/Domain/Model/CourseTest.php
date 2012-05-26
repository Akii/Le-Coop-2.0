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
 * Test case for class Tx_Lecoop_Domain_Model_Course.
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
class Tx_Lecoop_Domain_Model_CourseTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Lecoop_Domain_Model_Course
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Lecoop_Domain_Model_Course();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() { 
		$this->fixture->setTitle('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitle()
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
	
	/**
	 * @test
	 */
	public function getTypeReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getType()
		);
	}

	/**
	 * @test
	 */
	public function setTypeForIntegerSetsType() { 
		$this->fixture->setType(12);

		$this->assertSame(
			12,
			$this->fixture->getType()
		);
	}
	
	/**
	 * @test
	 */
	public function getFeatstartReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setFeatstartForDateTimeSetsFeatstart() { }
	
	/**
	 * @test
	 */
	public function getFeatendReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setFeatendForDateTimeSetsFeatend() { }
	
	/**
	 * @test
	 */
	public function getNexteventReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setNexteventForDateTimeSetsNextevent() { }
	
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
	public function getUpdatesReturnsInitialValueForObjectStorageContainingTx_Lecoop_Domain_Model_Updates() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getUpdates()
		);
	}

	/**
	 * @test
	 */
	public function setUpdatesForObjectStorageContainingTx_Lecoop_Domain_Model_UpdatesSetsUpdates() { 
		$update = new Tx_Lecoop_Domain_Model_Updates();
		$objectStorageHoldingExactlyOneUpdates = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneUpdates->attach($update);
		$this->fixture->setUpdates($objectStorageHoldingExactlyOneUpdates);

		$this->assertSame(
			$objectStorageHoldingExactlyOneUpdates,
			$this->fixture->getUpdates()
		);
	}
	
	/**
	 * @test
	 */
	public function addUpdateToObjectStorageHoldingUpdates() {
		$update = new Tx_Lecoop_Domain_Model_Updates();
		$objectStorageHoldingExactlyOneUpdate = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneUpdate->attach($update);
		$this->fixture->addUpdate($update);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneUpdate,
			$this->fixture->getUpdates()
		);
	}

	/**
	 * @test
	 */
	public function removeUpdateFromObjectStorageHoldingUpdates() {
		$update = new Tx_Lecoop_Domain_Model_Updates();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($update);
		$localObjectStorage->detach($update);
		$this->fixture->addUpdate($update);
		$this->fixture->removeUpdate($update);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getUpdates()
		);
	}
	
	/**
	 * @test
	 */
	public function getTagsReturnsInitialValueForObjectStorageContainingTx_Lecoop_Domain_Model_Tag() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getTags()
		);
	}

	/**
	 * @test
	 */
	public function setTagsForObjectStorageContainingTx_Lecoop_Domain_Model_TagSetsTags() { 
		$tag = new Tx_Lecoop_Domain_Model_Tag();
		$objectStorageHoldingExactlyOneTags = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneTags->attach($tag);
		$this->fixture->setTags($objectStorageHoldingExactlyOneTags);

		$this->assertSame(
			$objectStorageHoldingExactlyOneTags,
			$this->fixture->getTags()
		);
	}
	
	/**
	 * @test
	 */
	public function addTagToObjectStorageHoldingTags() {
		$tag = new Tx_Lecoop_Domain_Model_Tag();
		$objectStorageHoldingExactlyOneTag = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneTag->attach($tag);
		$this->fixture->addTag($tag);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneTag,
			$this->fixture->getTags()
		);
	}

	/**
	 * @test
	 */
	public function removeTagFromObjectStorageHoldingTags() {
		$tag = new Tx_Lecoop_Domain_Model_Tag();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($tag);
		$localObjectStorage->detach($tag);
		$this->fixture->addTag($tag);
		$this->fixture->removeTag($tag);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getTags()
		);
	}
	
	/**
	 * @test
	 */
	public function getRatingReturnsInitialValueForObjectStorageContainingTx_Lecoop_Domain_Model_Rating() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getRating()
		);
	}

	/**
	 * @test
	 */
	public function setRatingForObjectStorageContainingTx_Lecoop_Domain_Model_RatingSetsRating() { 
		$rating = new Tx_Lecoop_Domain_Model_Rating();
		$objectStorageHoldingExactlyOneRating = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneRating->attach($rating);
		$this->fixture->setRating($objectStorageHoldingExactlyOneRating);

		$this->assertSame(
			$objectStorageHoldingExactlyOneRating,
			$this->fixture->getRating()
		);
	}
	
	/**
	 * @test
	 */
	public function addRatingToObjectStorageHoldingRating() {
		$rating = new Tx_Lecoop_Domain_Model_Rating();
		$objectStorageHoldingExactlyOneRating = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneRating->attach($rating);
		$this->fixture->addRating($rating);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneRating,
			$this->fixture->getRating()
		);
	}

	/**
	 * @test
	 */
	public function removeRatingFromObjectStorageHoldingRating() {
		$rating = new Tx_Lecoop_Domain_Model_Rating();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($rating);
		$localObjectStorage->detach($rating);
		$this->fixture->addRating($rating);
		$this->fixture->removeRating($rating);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getRating()
		);
	}
	
}
?>