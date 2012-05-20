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
class Tx_Lecoop_Controller_CourseController extends Tx_Extbase_MVC_Controller_ActionController {

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
	public function showAction(Tx_Lecoop_Domain_Model_Course $course) {
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
		$this->view->assign('newCourse', $newCourse);
	}

	/**
	 * action create
	 *
	 * @param $newCourse
	 * @return void
	 */
	public function createAction(Tx_Lecoop_Domain_Model_Course $newCourse) {
		$this->courseRepository->add($newCourse);
		$this->flashMessageContainer->add('Your new Course was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param $course
	 * @return void
	 */
	public function editAction(Tx_Lecoop_Domain_Model_Course $course) {
		$this->view->assign('course', $course);
	}

	/**
	 * action update
	 *
	 * @param $course
	 * @return void
	 */
	public function updateAction(Tx_Lecoop_Domain_Model_Course $course) {
		$this->courseRepository->update($course);
		$this->flashMessageContainer->add('Your Course was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param $course
	 * @return void
	 */
	public function deleteAction(Tx_Lecoop_Domain_Model_Course $course) {
		$this->courseRepository->remove($course);
		$this->flashMessageContainer->add('Your Course was removed.');
		$this->redirect('list');
	}

	/**
	 * action featured
	 *
	 * @return void
	 */
	public function featuredAction() {

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