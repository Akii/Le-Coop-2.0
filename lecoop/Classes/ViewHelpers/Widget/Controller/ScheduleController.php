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
 * @license    http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_Lecoop_ViewHelpers_Widget_Controller_ScheduleController extends Tx_Fluid_Core_Widget_AbstractWidgetController {

    /**
     * @var array
     */
    protected $configuration = array('monthOffset' => 0);

    /**
     * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Event>
     */
    protected $events;

    /**
     * Initialize Action of the widget controller
     *
     * @return void
     */
    public function initializeAction() {
	$this->events = $this->widgetConfiguration['events'];
	$this->configuration = t3lib_div::array_merge_recursive_overrule($this->configuration, $this->widgetConfiguration['configuration'], TRUE);
    }

    /**
     * Index action of the widget controller
     *
     *
     * @return void
     */
    public function indexAction() {
	$year = date('Y');
	$month = date('n');
	$today = date('m/d/Y');
	
	if($this->configuration['monthOffset'] != 0) {
	    $month += intval($this->configuration['monthOffset']);
	    
	    //@todo: this doesn't work for offsets less than 1 so rewrite this with DateTime intervals
	    if($month > 12) {
		$month = 1;
		$year++;
	    }
	}

	$dates = array();
	foreach ($this->events as $event) {
	    foreach ($event->findEvents() as $date) {
		$dates[$date->format('m/d/Y')][] = array(
		    'length' => $event->getLength()->format('H:i'),
		    'date' => $date,
		    'description' => $event->getDescription()
		);
	    }
	}
	
	$schedule = array(
	    'year'  => $year,
	    'month' => $month,
	    'today' => $today,
	    'calendar' => $this->getCalendar($year, $month, $dates)
	);
	
	$this->view->assign('schedule', $schedule);
    }

    /**
     * Fills an array with days of the month and events
     * 
     * @param int $year
     * @param int $month 
     * @param array $events
     * @return array
     */
    protected function getCalendar($year, $month, $events) {
	$week_day = date('w', mktime(0, 0, 0, $month, 1, $year));
	$week_day = ($week_day == 0) ? 6 : $week_day - 1;

	$days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));
	$week = 0;
	$days_in_week = 0;

	$dates = array();

	// build up zero dates of last month
	for ($i = 0; $i < $week_day; $i++) {
	    $dates[$week][$i] = array();
	    $days_in_week++;
	}

	// build up the month
	for ($curr_day = 1; $curr_day <= $days_in_month; $curr_day++) {
	    
	    $date = date('m/d/Y', mktime(0, 0, 0, $month, $curr_day, $year));
	    
	    $dates[$week][$days_in_week] = array(
		'day' => $date,
		'date' => new DateTime($date),
		'events' => $events[$date]
	    );


	    if ($days_in_week == 6) {
		$days_in_week = -1;
		$week++;
	    }

	    $days_in_week++;
	}

	// build up zero for the next month
	for ($i = $days_in_week; $i <= 6; $i++) {
	    $dates[$week][$i] = array();
	}
	
	return $dates;
    }

}

?>