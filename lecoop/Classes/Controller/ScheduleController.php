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
class Tx_Lecoop_Controller_ScheduleController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * action show
	 *
	 * @param $schedule
	 * @return void
	 */
	public function showAction(Tx_Lecoop_Domain_Model_Schedule $schedule) {
		$this->view->assign('schedule', $schedule);
	}

	/**
	 * action new
	 *
	 * @param $newSchedule
	 * @dontvalidate $newSchedule
	 * @return void
	 */
	public function newAction(Tx_Lecoop_Domain_Model_Schedule $newSchedule = NULL) {
		$this->view->assign('newSchedule', $newSchedule);
	}

	/**
	 * action create
	 *
	 * @param $newSchedule
	 * @return void
	 */
	public function createAction(Tx_Lecoop_Domain_Model_Schedule $newSchedule) {
		$this->scheduleRepository->add($newSchedule);
		$this->flashMessageContainer->add('Your new Schedule was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param $schedule
	 * @return void
	 */
	public function editAction(Tx_Lecoop_Domain_Model_Schedule $schedule) {
		$this->view->assign('schedule', $schedule);
	}

	/**
	 * action update
	 *
	 * @param $schedule
	 * @return void
	 */
	public function updateAction(Tx_Lecoop_Domain_Model_Schedule $schedule) {
		$this->scheduleRepository->update($schedule);
		$this->flashMessageContainer->add('Your Schedule was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param $schedule
	 * @return void
	 */
	public function deleteAction(Tx_Lecoop_Domain_Model_Schedule $schedule) {
		$this->scheduleRepository->remove($schedule);
		$this->flashMessageContainer->add('Your Schedule was removed.');
		$this->redirect('list');
	}

}
?>