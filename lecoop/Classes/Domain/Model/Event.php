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
class Tx_Lecoop_Domain_Model_Event extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * start
	 *
	 * @var DateTime
	 * @validate Tx_Lecoop_Validation_Validator_DatetimeValidator
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

}
?>