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
class Tx_Lecoop_ViewHelpers_RatingViewHelper extends Tx_Fluid_Core_ViewHelper_TagBasedViewHelper {

    /**
     * @var string
     */
    protected $tagName = 'span';

    /**
     * Initialize arguments
     *
     * @return void
     */
    public function initializeArguments() {
	parent::initializeArguments();

	$this->registerUniversalTagAttributes();
    }

    /**
     * Does things…
     * @param int $rating Rating from 0 to 5
     */
    public function render($rating) {
	if($rating < 0) {
	    $this->tag->setContent('<span>not rated</span>');
	    return $this->tag->render();
	} elseif($rating > 5) {
	    $rating = 5;
	}
	$out = "";
	
	for($i=0; $i < 5; $i++) {
	    if($rating <= $i) {
		$out .= '<i class="icon-star-empty"></i>' . "\n";
	    } else {
		$out .= '<i class="icon-star"></i>' . "\n";
	    }
	}
	
	
	$this->tag->setContent($out);
	return $this->tag->render();
    }

}

?>