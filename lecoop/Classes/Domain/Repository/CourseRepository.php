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
class Tx_Lecoop_Domain_Repository_CourseRepository extends Tx_Extbase_Persistence_Repository {
    /*
      public function findAll() {
      $query = $this->createQuery();

      return $query
      ->matching(
      $query->greaterThanOrEqual('scheduleid.end', TIME())
      )
      ->execute();
      }
     */

    /**
     * findFeatured
     *
     * finds all featured courses
     */
    public function findFeatured() {
	$query = $this->createQuery();

	return $query
			->matching(
				$query->logicalAnd(
					$query->lessThanOrEqual('featstart', TIME()), $query->greaterThanOrEqual('featend', TIME()), $query->greaterThanOrEqual('scheduleid.end', TIME())
				)
			)
			->execute();
    }

    /**
     * findUpcoming
     *
     * calculates the next event, sorts the result and returns it
     */
    public function findUpcoming() {
	$query = $this->createQuery();
	
	$query->statement('
	    SELECT DISTINCT c.*
	    FROM tx_lecoop_domain_model_course c
	    JOIN (
	    SELECT sh.uid uid, IF(e.start < UNIX_TIMESTAMP(), DATE_ADD(FROM_UNIXTIME(e.start), INTERVAL +((FLOOR((FLOOR(TIMESTAMPDIFF(HOUR, FROM_UNIXTIME(e.start), NOW()) / 24) / e.steplength))) +1) * e.steplength DAY), FROM_UNIXTIME(e.start)) event
	    FROM tx_lecoop_domain_model_event e
	    JOIN tx_lecoop_domain_model_schedule sh ON(e.schedule = sh.uid)
	    WHERE sh.start <= UNIX_TIMESTAMP() AND sh.end >= UNIX_TIMESTAMP()
	    AND (
		(e.start > UNIX_TIMESTAMP() AND (e.end = 0 OR e.steplength = 0)) -- only show single events if start lies in the future
		OR
		(e.steplength > 0 AND e.end > UNIX_TIMESTAMP()) -- show multi when steplength greater and end not yet reached
	    )
	    AND e.hidden = 0 AND e.deleted = 0 AND sh.hidden = 0 AND sh.deleted = 0
	    ) iv ON(c.scheduleid = iv.uid)
	    WHERE c.hidden = 0 AND c.deleted = 0
	    ORDER BY iv.event;
	');
	
	return $query->execute();
    }

}
?>