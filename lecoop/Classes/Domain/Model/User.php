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
 *  the Free Software Foundation; either version 3 of the License, or
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
 *
 *
 * @package lecoop
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_Lecoop_Domain_Model_User extends Tx_Extbase_Domain_Model_FrontendUser {

	/**
	 * The schedule for the user (timetable)
	 *
	 * @var Tx_Lecoop_Domain_Model_Schedule
	 * @lazy
	 */
	protected $scheduleid;

	/**
	 * subscriptions
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Course>
	 * @lazy
	 */
	protected $subscriptions;

	/**
	 * viewed
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Viewed>
	 * @lazy
	 */
	protected $viewed;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all Tx_Extbase_Persistence_ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->subscriptions = new Tx_Extbase_Persistence_ObjectStorage();
		
		$this->viewed = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Returns the scheduleid
	 *
	 * @return Tx_Lecoop_Domain_Model_Schedule $scheduleid
	 */
	public function getScheduleid() {
		return $this->scheduleid;
	}

	/**
	 * Sets the scheduleid
	 *
	 * @param Tx_Lecoop_Domain_Model_Schedule $scheduleid
	 * @return void
	 */
	public function setScheduleid(Tx_Lecoop_Domain_Model_Schedule $scheduleid) {
		$this->scheduleid = $scheduleid;
	}

	/**
	 * Adds a Course
	 *
	 * @param Tx_Lecoop_Domain_Model_Course $subscription
	 * @return void
	 */
	public function addSubscription(Tx_Lecoop_Domain_Model_Course $subscription) {
		$this->subscriptions->attach($subscription);
	}

	/**
	 * Removes a Course
	 *
	 * @param Tx_Lecoop_Domain_Model_Course $subscriptionToRemove The Course to be removed
	 * @return void
	 */
	public function removeSubscription(Tx_Lecoop_Domain_Model_Course $subscriptionToRemove) {
		$this->subscriptions->detach($subscriptionToRemove);
	}

	/**
	 * Returns the subscriptions
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Course> $subscriptions
	 */
	public function getSubscriptions() {
		return $this->subscriptions;
	}

	/**
	 * Sets the subscriptions
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Course> $subscriptions
	 * @return void
	 */
	public function setSubscriptions(Tx_Extbase_Persistence_ObjectStorage $subscriptions) {
		$this->subscriptions = $subscriptions;
	}

	/**
	 * Adds a Viewed
	 *
	 * @param Tx_Lecoop_Domain_Model_Viewed $viewed
	 * @return void
	 */
	public function addViewed(Tx_Lecoop_Domain_Model_Viewed $viewed) {
		$this->viewed->attach($viewed);
	}

	/**
	 * Removes a Viewed
	 *
	 * @param Tx_Lecoop_Domain_Model_Viewed $viewedToRemove The Viewed to be removed
	 * @return void
	 */
	public function removeViewed(Tx_Lecoop_Domain_Model_Viewed $viewedToRemove) {
		$this->viewed->detach($viewedToRemove);
	}

	/**
	 * Returns the viewed
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Viewed> $viewed
	 */
	public function getViewed() {
		return $this->viewed;
	}

	/**
	 * Sets the viewed
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Viewed> $viewed
	 * @return void
	 */
	public function setViewed(Tx_Extbase_Persistence_ObjectStorage $viewed) {
		$this->viewed = $viewed;
	}

}
?>