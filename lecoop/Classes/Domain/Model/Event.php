<?php

/* * *************************************************************
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
 * ************************************************************* */

/**
 *
 *
 * @package lecoop
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_Lecoop_Domain_Model_Event extends Tx_Extbase_DomainObject_AbstractEntity {

    const EVENT_SINGLE = 0;
    const EVENT_MULTI = 1;

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
     */
    protected $end;

    /**
     * length
     *
     * @var DateTime
     * @validate NotEmpty
     */
    protected $length;

    /**
     * steplength
     *
     * @var integer
     */
    protected $steplength;

    /**
     * description
     *
     * @var string
     */
    protected $description;

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
     * Returns the length
     *
     * @return DateTime $length
     */
    public function getLength() {
	return $this->length;
    }

    /**
     * Sets the length
     *
     * @param DateTime $length
     * @return void
     */
    public function setLength($length) {
	$this->length = $length;
    }

    /**
     * Returns the steplength
     *
     * @return integer $steplength
     */
    public function getSteplength() {
	return $this->steplength;
    }

    /**
     * Sets the steplength
     *
     * @param integer $steplength
     * @return void
     */
    public function setSteplength($steplength) {
	$this->steplength = $steplength;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription() {
	return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description) {
	$this->description = $description;
    }

    /**
     * Gets the next event date
     * 
     * @return DateTime Returns the next event. Null in case there is no next event.
     */
    public function getNextEvent() {
	if($this->getIsOutdated())
	    return NULL;

	$events = $this->_findEvents();

	// linear search should suffice
	foreach ($events as $event) {
	    if ($event->getTimestamp() > time())
		return $event;
	}

	// shouldn't happen but just in case :)
	return NULL;
    }

    /**
     * Gets the number of events
     * 
     * @param boolean $calc_remain If true will only return the number of events left
     * @return int 
     */
    public function getCalcEvents($calc_remain = false) {
	// if the event is outdated we don't need to calc anything
//	if($this->getIsOutdated())
//	    return 0;

	$events = $this->_findEvents();

	if (!$calc_remain)
	    return count($events);

	foreach ($events as $key => $value) {
	    if ($value->getTimestamp() > time()) {
		// 1st item true = count()
		// 2nd item true = count()-1
		// ...
		// no item true = 0
		return (count($events) - $key);
	    }
	}

	return 0;
    }

    /**
     * Gets the remaining number of events
     * (because i'm incapable of passing params through fluid, someone tell me how plz
     * 
     * @return int 
     */
    public function getCalcRemEvents() {
	return $this->getCalcEvents(true);
    }

    /**
     * Returns whether the event is outdated or not
     * 
     * @return boolean
     */
    public function getIsOutdated() {
	if($this->_getEventType() === Tx_Lecoop_Domain_Model_Event::EVENT_SINGLE) {
	    return $this->start->getTimestamp() < time();
	} else {
	    return $this->end->getTimestamp() < time();
	}
    }

    /**
     * Returns the type of event, {single, multi}
     * 
     * @return int 
     */
    protected function _getEventType() {
	if($this->end === NULL || $this->steplength < 1 || $this->start->getTimestamp() >= $this->end->getTimestamp()) {
	    return Tx_Lecoop_Domain_Model_Event::EVENT_SINGLE;
	} else {
	    return Tx_Lecoop_Domain_Model_Event::EVENT_MULTI;
	}
    }

    /**
     * Calculates all events
     * 
     * @return array<DateTime> Sorted array containing all dates
     */
    protected function _findEvents() {
	// in case this is a single event return the one event if it is still in the future
	if($this->_getEventType() === Tx_Lecoop_Domain_Model_Event::EVENT_SINGLE) {
	    return array($this->start);
	}
	
	$start = $this->start->getTimestamp();
	$end = $this->end->getTimestamp();

	$out = array();

	$curr = $start;
	$step = '+' . $this->steplength . ' day';

	while ($curr < $end) {
	    $out[] = new DateTime(date('m/d/y H:i', $curr));
	    $curr = strtotime($step, $curr);
	}

	return $out;
    }
}

?>