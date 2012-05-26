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
class Tx_Lecoop_Domain_Model_Schedule extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * start
	 *
	 * @var DateTime
	 * @validate NotEmpty
	 */
	protected $start;

	/**
	 * end
	 *
	 * @var DateTime
	 * @validate NotEmpty
	 */
	protected $end;

	/**
	 * exceptions
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Exception>
	 */
	protected $exceptions;

	/**
	 * events
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Event>
	 */
	protected $events;

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
		$this->exceptions = new Tx_Extbase_Persistence_ObjectStorage();
		
		$this->events = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Returns the start
	 *
	 * @return DateTime $start
	 */
	public function getStart() {
		return $this->start;
	}

	/**
	 * Sets the start
	 *
	 * @param DateTime $start
	 * @return void
	 */
	public function setStart($start) {
		$this->start = $start;
	}

	/**
	 * Returns the end
	 *
	 * @return DateTime $end
	 */
	public function getEnd() {
		return $this->end;
	}

	/**
	 * Sets the end
	 *
	 * @param DateTime $end
	 * @return void
	 */
	public function setEnd($end) {
		$this->end = $end;
	}

	/**
	 * Adds a Exception
	 *
	 * @param Tx_Lecoop_Domain_Model_Exception $exception
	 * @return void
	 */
	public function addException(Tx_Lecoop_Domain_Model_Exception $exception) {
		$this->exceptions->attach($exception);
	}

	/**
	 * Removes a Exception
	 *
	 * @param Tx_Lecoop_Domain_Model_Exception $exceptionToRemove The Exception to be removed
	 * @return void
	 */
	public function removeException(Tx_Lecoop_Domain_Model_Exception $exceptionToRemove) {
		$this->exceptions->detach($exceptionToRemove);
	}

	/**
	 * Returns the exceptions
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Exception> $exceptions
	 */
	public function getExceptions() {
		return $this->exceptions;
	}

	/**
	 * Sets the exceptions
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Exception> $exceptions
	 * @return void
	 */
	public function setExceptions(Tx_Extbase_Persistence_ObjectStorage $exceptions) {
		$this->exceptions = $exceptions;
	}

	/**
	 * Adds a Event
	 *
	 * @param Tx_Lecoop_Domain_Model_Event $event
	 * @return void
	 */
	public function addEvent(Tx_Lecoop_Domain_Model_Event $event) {
		$this->events->attach($event);
	}

	/**
	 * Removes a Event
	 *
	 * @param Tx_Lecoop_Domain_Model_Event $eventToRemove The Event to be removed
	 * @return void
	 */
	public function removeEvent(Tx_Lecoop_Domain_Model_Event $eventToRemove) {
		$this->events->detach($eventToRemove);
	}

	/**
	 * Returns the events
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Event> $events
	 */
	public function getEvents() {
		return $this->events;
	}

	/**
	 * Sets the events
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Event> $events
	 * @return void
	 */
	public function setEvents(Tx_Extbase_Persistence_ObjectStorage $events) {
		$this->events = $events;
	}

	/**
	 * @return boolean
	 */
	public function getNextevent() {
		return NULL;
	}

}
?>