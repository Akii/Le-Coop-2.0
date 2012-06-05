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
class Tx_Lecoop_Controller_ScheduleController extends Tx_Lecoop_Controller_AbstractController {

    /**
     * courseRepository
     *
     * @var Tx_Lecoop_Domain_Repository_ScheduleRepository
     */
    protected $scheduleRepository;

    /**
     * injectCourseRepository
     *
     * @param Tx_Lecoop_Domain_Repository_ScheduleRepository $scheduleRepository
     * @return void
     */
    public function injectScheduleRepository(Tx_Lecoop_Domain_Repository_ScheduleRepository $scheduleRepository) {
	$this->scheduleRepository = $scheduleRepository;
    }

    /**
     * action update
     *
     * @param $schedule
     * @param $course
     * @return void
     */
    public function updateAction(Tx_Lecoop_Domain_Model_Schedule $schedule, Tx_Lecoop_Domain_Model_Course $course) {
	$permissions = $this->getPermissions($course);
	if ($permissions['update'] !== true) {
	    $this->flashMessageContainer->add(Tx_Lecoop_Controller_AbstractController::PERMISSION_DENIED, null, t3lib_FlashMessage::ERROR);
	    $this->redirect('featured');
	}

	$this->scheduleRepository->update($schedule);
	$this->flashMessageContainer->add('Your Schedule was updated.');
	$this->redirect('edit', 'Course', NULL, array('course' => $course, 'activeTab' => '2'));
    }

    /**
     * action newEvent
     *
     * @param Tx_Lecoop_Domain_Model_Event $event
     * @param Tx_Lecoop_Domain_Model_Course $course
     * @dontvalidate $event
     * @return void
     */
    public function newEventAction(Tx_Lecoop_Domain_Model_Course $course, Tx_Lecoop_Domain_Model_Event $event = NULL) {
	$permissions = $this->getPermissions($course);
	if ($permissions['update'] !== true) {
	    $this->flashMessageContainer->add(Tx_Lecoop_Controller_AbstractController::PERMISSION_DENIED, null, t3lib_FlashMessage::ERROR);
	    $this->redirect('show', 'Course', NULL, array('course' => $course));
	}

	$this->view->assign('event', $event);
	$this->view->assign('course', $course);
    }

    /**
     * action create
     *
     * @param Tx_Lecoop_Domain_Model_Event $event
     * @param Tx_Lecoop_Domain_Model_Course $course
     * @return void
     */
    public function createEventAction(Tx_Lecoop_Domain_Model_Course $course, Tx_Lecoop_Domain_Model_Event $event) {
	$permissions = $this->getPermissions($course);
	if ($permissions['update'] !== true) {
	    $this->flashMessageContainer->add(Tx_Lecoop_Controller_AbstractController::PERMISSION_DENIED, null, t3lib_FlashMessage::ERROR);
	    $this->redirect('show', 'Course', NULL, array('course' => $course));
	}

	$schedule = $course->getScheduleid();

	$schedule->addEvent($event);
	$this->scheduleRepository->update($schedule);

	$this->flashMessageContainer->add('Your new Event was created.');

	$this->redirect('edit', 'Course', NULL, array('course' => $course, 'activeTab' => '2'));
    }

    /**
     * action editEvent
     *
     * @param $course
     * @dontvalidate $event
     * @return void
     */
    public function editEventAction(Tx_Lecoop_Domain_Model_Course $course, Tx_Lecoop_Domain_Model_Event $event) {
	$permissions = $this->getPermissions($course);
	if ($permissions['update'] !== true) {
	    $this->flashMessageContainer->add(Tx_Lecoop_Controller_AbstractController::PERMISSION_DENIED, null, t3lib_FlashMessage::ERROR);
	    $this->redirect('featured');
	}

	$this->view->assign('event', $event);
	$this->view->assign('course', $course);
    }

    /**
     * action updateEvent
     *
     * @param $course
     * @param $event
     * @return void
     */
    public function updateEventAction(Tx_Lecoop_Domain_Model_Course $course, Tx_Lecoop_Domain_Model_Event $event) {
	$permissions = $this->getPermissions($course);
	if ($permissions['update'] !== true) {
	    $this->flashMessageContainer->add(Tx_Lecoop_Controller_AbstractController::PERMISSION_DENIED, null, t3lib_FlashMessage::ERROR);
	    $this->redirect('edit', 'Course', null, array('course' => $course));
	}
	
	// dirty way to set event.end to null
	$arguments = $this->request->getArguments();
	if($arguments['event']['end'] == "")
	    $event->setEnd(NULL);
	
	$course->getScheduleid()->addEvent($event);
	
	$this->flashMessageContainer->add('Your Event was updated.');
	$this->redirect('edit', 'Course', NULL, array('course' => $course, 'activeTab' => '2'));
    }

    /**
     * action deleteEvent
     * 
     * @param $course
     * @param $event
     * @return void 
     */
    public function deleteEventAction(Tx_Lecoop_Domain_Model_Course $course, Tx_Lecoop_Domain_Model_Event $event) {
	$permissions = $this->getPermissions($course);
	if ($permissions['delete'] !== true) {
	    $this->flashMessageContainer->add(Tx_Lecoop_Controller_AbstractController::PERMISSION_DENIED, null, t3lib_FlashMessage::ERROR);
	    $this->redirect('edit', 'Course', null, array('course' => $course));
	}
	
	$schedule = $course->getScheduleid()->removeEvent($event);
	
	$this->flashMessageContainer->add('Your Event was removed.');
	$this->redirect('edit', 'Course', NULL, array('course' => $course, 'activeTab' => '2'));
    }

}

?>