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
 * This view helper uses the technology of paginate widget but works with arrays
 * and the assigned objects don't need the QueryResultInterface.
 *
 * @package    Typo3
 *
 * @author     Armin Rüdiger Vieweg <info@professorweb.de>
 * @author     Benjamin Schulte <benjamin.schulte@diemedialen.de>
 * @license    http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_Lecoop_ViewHelpers_Widget_Controller_ScheduleController extends Tx_Fluid_Core_Widget_AbstractWidgetController {

    /**
     * @var array
     */
    protected $configuration = array();

    /**
     * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Event>
     */
    protected $objects;

    /**
     * Initialize Action of the widget controller
     *
     * @return void
     */
    public function initializeAction() {
	$this->objects = $this->widgetConfiguration['objects'];
	$this->configuration = t3lib_div::array_merge_recursive_overrule($this->configuration, $this->widgetConfiguration['configuration'], TRUE);
    }

    /**
     * Index action of the widget controller
     *
     *
     * @return void
     */
    public function indexAction() {
	
    }

}

?>