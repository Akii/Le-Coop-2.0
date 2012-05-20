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
class Tx_Lecoop_Domain_Model_Exception extends Tx_Extbase_DomainObject_AbstractEntity {

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
	 * allday
	 *
	 * @var boolean
	 * @validate NotEmpty
	 */
	protected $allday = FALSE;

	/**
	 * reason
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $reason;

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
	 * Returns the allday
	 *
	 * @return boolean $allday
	 */
	public function getAllday() {
		return $this->allday;
	}

	/**
	 * Sets the allday
	 *
	 * @param boolean $allday
	 * @return void
	 */
	public function setAllday($allday) {
		$this->allday = $allday;
	}

	/**
	 * Returns the boolean state of allday
	 *
	 * @return boolean
	 */
	public function isAllday() {
		return $this->getAllday();
	}

	/**
	 * Returns the reason
	 *
	 * @return string $reason
	 */
	public function getReason() {
		return $this->reason;
	}

	/**
	 * Sets the reason
	 *
	 * @param string $reason
	 * @return void
	 */
	public function setReason($reason) {
		$this->reason = $reason;
	}

}
?>