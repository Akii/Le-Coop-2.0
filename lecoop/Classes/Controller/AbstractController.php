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
abstract class Tx_Lecoop_Controller_AbstractController extends Tx_Extbase_MVC_Controller_ActionController {
    
    const PERMISSION_DENIED = 'You have insufficient permissions to perform the requested action.';
    
    /**
     * usergroupRepository
     *
     * @var Tx_Extbase_Domain_Repository_FrontendUserGroupRepository
     */
    protected $usergroupRepository;

    /**
     * userRepository
     *
     * @var Tx_Lecoop_Domain_Repository_UserRepository
     */
    protected $userRepository;

    /**
     * injectUsergroupRepository
     *
     * @var Tx_Extbase_Domain_Repository_FrontendUserGroupRepository $usergroupRepository
     * @return void
     */
    public function injectUsergroupRepository(Tx_Extbase_Domain_Repository_FrontendUserGroupRepository $usergroupRepository) {
            $this->usergroupRepository = $usergroupRepository;
    }

    /**
     * injectUserRepository
     *
     * @var Tx_Lecoop_Domain_Repository_UserRepository $userRepository
     * @return void
     */
    public function injectUserRepository(Tx_Lecoop_Domain_Repository_UserRepository $userRepository) {
            $this->userRepository = $userRepository;
    }
    
    public function __construct() {
        parent::__construct();
        
        $this->injectUsergroupRepository(
                t3lib_div::makeInstance('Tx_Extbase_Domain_Repository_FrontendUserGroupRepository')
        );

        $this->injectUserRepository(
                t3lib_div::makeInstance('Tx_Lecoop_Domain_Repository_UserRepository')
        );
    }

    protected function getErrorFlashMessage() {
	switch ($this->actionMethodName) {
	    case "createAction":
	    case "createEventAction";
		return 'Validating user input failed. Please make sure to fill in all required forms and try again.';
		break;
	    default:
		return false;
	}
    }
    
    /**
     * Tests permissions for a course
     * 
     * @param Tx_Lecoop_Domain_Model_Course $course
     * @return mixed array $permissions
     */
    protected function getPermissions(Tx_Lecoop_Domain_Model_Course $course) {
        $permissions = array(
            'read'      => true,    // we never restrict read access as of now
	    'create'	=> false,
            'update'    => false,
            'delete'    => false,
        );
	
	$user = $course->getOwnerid();
	
	if($user !== NULL) {
	    // only an owner might edit the course at all
	    // @TODO: should we have fe admins in the future this needs to be altered
	    if($user->getUid() === intval($GLOBALS['TSFE']->fe_user->user['uid'])) {
		$permissions['delete']	= true;
		
		// comma separated lists, you gotta love them :)
		$grps = explode(',', $GLOBALS['TSFE']->fe_user->user['usergroup']);
		
		// if the user attempts to create a Tx_Lecoop_Domain_Model_Course::COURSE
		// we have to check if he is in the required group.
		if($course->getType() === Tx_Lecoop_Domain_Model_Course::COURSE) {
		    if(array_search($this->settings['tutorGrp'], $grps) !== false) {
			$permissions['create']	= true;
			$permissions['update']	= true;
		    }
		} elseif($course->getType() === Tx_Lecoop_Domain_Model_Course::LGRP) {
		    if(array_search($this->settings['userGrp'], $grps) !== false) {
			$permissions['create']	= true;
			$permissions['update']	= true;
		    }
		}
	    }
	}
	
	return $permissions;
    }
}
?>
