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
class Tx_Lecoop_Controller_CourseController extends Tx_Lecoop_Controller_AbstractController {

    /**
     * courseRepository
     *
     * @var Tx_Lecoop_Domain_Repository_CourseRepository
     */
    protected $courseRepository;

    /**
     * injectCourseRepository
     *
     * @param Tx_Lecoop_Domain_Repository_CourseRepository $courseRepository
     * @return void
     */
    public function injectCourseRepository(Tx_Lecoop_Domain_Repository_CourseRepository $courseRepository) {
	$this->courseRepository = $courseRepository;
    }

    public function initializeView(Tx_Extbase_MVC_View_ViewInterface $view) {
	parent::initializeView($view);

	$this->view->assign('userGrp', $this->usergroupRepository->findByUid($this->settings['userGrp']));
	$this->view->assign('tutorGrp', $this->usergroupRepository->findByUid($this->settings['tutorGrp']));
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction() {
	$courses = $this->courseRepository->findAll();
	$this->view->assign('courses', $courses);
    }

    /**
     * action show
     *
     * @param $course
     * @return void
     */
    public function showAction(Tx_Lecoop_Domain_Model_Course $course = NULL) {
	if ($course === NULL) {
	    $this->flashMessageContainer->add('Requested course does not exist.', null, t3lib_FlashMessage::WARNING);
	    $this->redirect('featured');
	}

	$this->view->assign('course', $course);
    }

    /**
     * action new
     *
     * @param $newCourse
     * @dontvalidate $newCourse
     * @return void
     */
    public function newAction(Tx_Lecoop_Domain_Model_Course $newCourse = NULL) {
	$permissions = $this->getPermissions($newCourse);
	if ($permissions['login'] !== true) {
	    $this->flashMessageContainer->add(Tx_Lecoop_Controller_AbstractController::PERMISSION_DENIED, null, t3lib_FlashMessage::ERROR);
	    $this->redirect(null, null, null, null, '24');
	}

	if ($newCourse === NULL) {
	    $newCourse = t3lib_div::makeInstance('Tx_Lecoop_Domain_Model_Course');
	}

	if ($newCourse->getOwnerid() === NULL) {
	    // get instance of Tx_Lecoop_Domain_Model_User for the owner
	    $owner = $this->userRepository->findByUid($GLOBALS['TSFE']->fe_user->user['uid']);

	    if ($owner == NULL) {
		$this->flashMessageContainer->add('You discovered a bug, yay! Theoretically you should never see this.. oh well >_> here, have a cookie!');
		$this->redirect('featured');
	    }

	    $newCourse->setOwnerid($owner);
	}

	$this->view->assign('newCourse', $newCourse);
    }

    /**
     * action create
     *
     * @param $newCourse
     * @return void
     */
    public function createAction(Tx_Lecoop_Domain_Model_Course $newCourse) {
	$permissions = $this->getPermissions($newCourse);
	if ($permissions['create'] !== true) {
	    $this->flashMessageContainer->add(Tx_Lecoop_Controller_AbstractController::PERMISSION_DENIED, null, t3lib_FlashMessage::ERROR);
	    $this->redirect(null, null, null, null, '24');
	}

	$this->courseRepository->add($newCourse);
	$this->flashMessageContainer->add('Your new Course was created.');

	// we have to persist the object at this point to be able to redirect to edit
	$persistenceManager = t3lib_div::makeInstance('Tx_Extbase_Persistence_Manager');
	$persistenceManager->persistAll();

	$this->redirect('edit', null, null, array('course' => $newCourse));
    }

    /**
     * action edit
     *
     * @param $course
     * @param int $activeTab
     * @dontvalidate $course
     * @dontvalidate $activeTab
     * @return void
     */
    public function editAction(Tx_Lecoop_Domain_Model_Course $course, $activeTab = 1) {
	$permissions = $this->getPermissions($course);
	if ($permissions['update'] !== true) {
	    $this->flashMessageContainer->add(Tx_Lecoop_Controller_AbstractController::PERMISSION_DENIED, null, t3lib_FlashMessage::ERROR);
	    $this->redirect(null, null, null, null, '24');
	}

	$this->view->assign('course', $course);
	$this->view->assign('tab', intval($activeTab));
    }

    /**
     * action update
     *
     * @param $course
     * @return void
     */
    public function updateAction(Tx_Lecoop_Domain_Model_Course $course) {
	$permissions = $this->getPermissions($course);
	if ($permissions['update'] !== true) {
	    $this->flashMessageContainer->add(Tx_Lecoop_Controller_AbstractController::PERMISSION_DENIED, null, t3lib_FlashMessage::ERROR);
	    $this->redirect('edit', null, null, array('course' => $course));
	}

	$this->courseRepository->update($course);
	$this->flashMessageContainer->add('Your Course was updated.');

	//$this->redirect('list');
	$this->redirect('edit', null, null, array('course' => $course));
    }

    /**
     * action delete
     *
     * @param $course
     * @return void
     */
    public function deleteAction(Tx_Lecoop_Domain_Model_Course $course) {
	$permissions = $this->getPermissions($course);
	if ($permissions['delete'] !== true) {
	    $this->flashMessageContainer->add(Tx_Lecoop_Controller_AbstractController::PERMISSION_DENIED, null, t3lib_FlashMessage::ERROR);
	    $this->redirect(null, null, null, null, '24');
	}

	$this->courseRepository->remove($course);
	$this->flashMessageContainer->add('Your Course was removed.');
	$this->redirect('ucp', 'User', 'Ucp', null, '13');
    }

    /**
     * action rate
     * 
     * @param Tx_Lecoop_Domain_Model_Course $course
     * @param Tx_Lecoop_Domain_Model_Rating $rating
     * @todo Move validation up to the abstract class
     * @return void 
     */
    public function rateAction(Tx_Lecoop_Domain_Model_Course $course = NULL, Tx_Lecoop_Domain_Model_Rating $rating = NULL) {
	if ($course === NULL || $rating === NULL)
	    $this->redirect('featured');

	if (!$course->canRate($rating->getUserid()) || $rating->getUserid()->getUid() != $GLOBALS['TSFE']->fe_user->user['uid']) {
	    $this->flashMessageContainer->add(Tx_Lecoop_Controller_AbstractController::PERMISSION_DENIED, null, t3lib_FlashMessage::ERROR);
	    $this->redirect('show', null, null, array('course' => $course));
	}

	$course->addRating($rating);
	$this->flashMessageContainer->add('You\'ve successfully rated the course.');
	$this->redirect('show', null, null, array('course' => $course));
    }

    /**
     * action subscribe
     * 
     * @param Tx_Lecoop_Domain_Model_Course $course
     * @param Tx_Lecoop_Domain_Model_User $user
     * @todo Move validation up to the abstract class
     * @return void
     */
    public function subscribeAction(Tx_Lecoop_Domain_Model_Course $course = NULL, Tx_Lecoop_Domain_Model_User $user = NULL) {
	if ($course === NULL || $user === NULL)
	    $this->redirect('featured');

	if (!$course->canSubscribe($user) || $user->getUid() != $GLOBALS['TSFE']->fe_user->user['uid']) {
	    $this->flashMessageContainer->add(Tx_Lecoop_Controller_AbstractController::PERMISSION_DENIED, null, t3lib_FlashMessage::ERROR);
	    $this->redirect('show', null, null, array('course' => $course));
	}

	$course->addSubscription($user);
	$this->flashMessageContainer->add('You\'ve subscribed to the course.');
	$this->redirect('show', null, null, array('course' => $course));
    }

    /**
     * action addTag
     * 
     * @param Tx_Lecoop_Domain_Model_Course $course
     * @param Tx_Lecoop_Domain_Model_Tag $tag
     * 
     * @return void 
     */
    public function addTagAction(Tx_Lecoop_Domain_Model_Course $course = NULL, Tx_Lecoop_Domain_Model_Tag $tag = NULL) {
	if ($course === NULL || $tag === NULL)
	    $this->redirect('featured');

	$permissions = $this->getPermissions($course);
	if ($permissions['update'] !== true) {
	    $this->flashMessageContainer->add(Tx_Lecoop_Controller_AbstractController::PERMISSION_DENIED, null, t3lib_FlashMessage::ERROR);
	    $this->redirect(null, null, null, null, '24');
	}

	$course->addTag($tag);
	$this->flashMessageContainer->add('Your Tag has been added.');
	$this->redirect('edit', null, null, array('course' => $course));
    }

    /**
     * action featured
     *
     * @return void
     */
    public function featuredAction() {
//	$featured = $this->courseRepository->findFeatured();
//	$this->view->assign('courses', $featured);
	
	$this->forward('list');
    }

    /**
     * action search
     *
     * @return void
     */
    public function searchAction() {
	
    }

    /**
     * action upcoming
     *
     * @return void
     */
    public function upcomingAction() {
	$courses = $this->courseRepository->findUpcoming();

	$this->view->assign('courses', $courses);
    }

    /**
     * action usercourses
     *
     * @return void
     */
    public function usercoursesAction() {
	
    }

}

?>