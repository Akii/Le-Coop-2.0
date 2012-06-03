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
class Tx_Lecoop_Domain_Model_Course extends Tx_Extbase_DomainObject_AbstractEntity {

    const LGRP = 0;
    const COURSE = 1;

    /**
     * Owner of the course
     *
     * @var Tx_Lecoop_Domain_Model_User
     * @validate NotEmpty
     */
    protected $ownerid;

    /**
     * Title of the course
     *
     * @var string
     * @validate NotEmpty
     */
    protected $title;

    /**
     * description
     *
     * @var string
     * @validate NotEmpty
     */
    protected $description;

    /**
     * Course/Learning group
     *
     * @var integer
     * @validate NotEmpty
     */
    protected $type;

    /**
     * featstart
     *
     * @var DateTime
     */
    protected $featstart;

    /**
     * featend
     *
     * @var DateTime
     */
    protected $featend;

    /**
     * Schedule for the course
     *
     * @var Tx_Lecoop_Domain_Model_Schedule
     */
    protected $scheduleid;

    /**
     * updates
     *
     * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Updates>
     */
    protected $updates;

    /**
     * tags
     *
     * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Tag>
     */
    protected $tags;

    /**
     * rating
     *
     * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Rating>
     */
    protected $rating;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
	//Do not remove the next line: It would break the functionality
	$this->initStorageObjects();

	// make sure we have a schedule
	$this->scheduleid = new Tx_Lecoop_Domain_Model_Schedule();
    }

    /**
     * Initializes all Tx_Extbase_Persistence_ObjectStorage properties.
     *
     * @return void
     */
    protected function initStorageObjects() {
	/**
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 */
	$this->updates = new Tx_Extbase_Persistence_ObjectStorage();
	$this->tags = new Tx_Extbase_Persistence_ObjectStorage();
	$this->rating = new Tx_Extbase_Persistence_ObjectStorage();
    }

    /**
     * @return Tx_Lecoop_Domain_Model_User
     */
    public function getOwnerid() {
	return $this->ownerid;
    }

    /**
     * @param Tx_Lecoop_Domain_Model_User $owner
     * @return void
     */
    public function setOwnerid(Tx_Lecoop_Domain_Model_User $owner) {
	$this->ownerid = $owner;
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle() {
	return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title) {
	$this->title = $title;
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

    /**
     * Returns the type
     *
     * @return integer $type
     */
    public function getType() {
	return $this->type;
    }

    /**
     * Sets the type
     *
     * @param integer $type
     * @return void
     */
    public function setType($type) {
	$this->type = $type;
    }

    /**
     * Returns the featstart
     *
     * @return DateTime $featstart
     */
    public function getFeatstart() {
	return $this->featstart;
    }

    /**
     * Sets the featstart
     *
     * @param DateTime $featstart
     * @return void
     */
    public function setFeatstart($featstart) {
	$this->featstart = $featstart;
    }

    /**
     * Returns the featend
     *
     * @return DateTime $featend
     */
    public function getFeatend() {
	return $this->featend;
    }

    /**
     * Sets the featend
     *
     * @param DateTime $featend
     * @return void
     */
    public function setFeatend($featend) {
	$this->featend = $featend;
    }

    /**
     * Returns the scheduleid
     *
     * @return Tx_Lecoop_Domain_Model_Schedule $scheduleid
     */
    public function getScheduleid() {
	return $this->scheduleid;
    }

    /**
     * Sets the scheduleid
     *
     * @param Tx_Lecoop_Domain_Model_Schedule $scheduleid
     * @return void
     */
    public function setScheduleid(Tx_Lecoop_Domain_Model_Schedule $scheduleid) {
	$this->scheduleid = $scheduleid;
    }

    /**
     * Adds a Updates
     *
     * @param Tx_Lecoop_Domain_Model_Updates $update
     * @return void
     */
    public function addUpdate(Tx_Lecoop_Domain_Model_Updates $update) {
	$this->updates->attach($update);
    }

    /**
     * Removes a Updates
     *
     * @param Tx_Lecoop_Domain_Model_Updates $updateToRemove The Updates to be removed
     * @return void
     */
    public function removeUpdate(Tx_Lecoop_Domain_Model_Updates $updateToRemove) {
	$this->updates->detach($updateToRemove);
    }

    /**
     * Returns the updates
     *
     * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Updates> $updates
     */
    public function getUpdates() {
	return $this->updates;
    }

    /**
     * Sets the updates
     *
     * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Updates> $updates
     * @return void
     */
    public function setUpdates(Tx_Extbase_Persistence_ObjectStorage $updates) {
	$this->updates = $updates;
    }

    /**
     * Adds a Tag
     *
     * @param Tx_Lecoop_Domain_Model_Tag $tag
     * @return void
     */
    public function addTag(Tx_Lecoop_Domain_Model_Tag $tag) {
	$this->tags->attach($tag);
    }

    /**
     * Removes a Tag
     *
     * @param Tx_Lecoop_Domain_Model_Tag $tagToRemove The Tag to be removed
     * @return void
     */
    public function removeTag(Tx_Lecoop_Domain_Model_Tag $tagToRemove) {
	$this->tags->detach($tagToRemove);
    }

    /**
     * Returns the tags
     *
     * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Tag> $tags
     */
    public function getTags() {
	return $this->tags;
    }

    /**
     * Sets the tags
     *
     * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Tag> $tags
     * @return void
     */
    public function setTags(Tx_Extbase_Persistence_ObjectStorage $tags) {
	$this->tags = $tags;
    }

    /**
     * Adds a Rating
     *
     * @param Tx_Lecoop_Domain_Model_Rating $rating
     * @return void
     */
    public function addRating(Tx_Lecoop_Domain_Model_Rating $rating) {
	$this->rating->attach($rating);
    }

    /**
     * Removes a Rating
     *
     * @param Tx_Lecoop_Domain_Model_Rating $ratingToRemove The Rating to be removed
     * @return void
     */
    public function removeRating(Tx_Lecoop_Domain_Model_Rating $ratingToRemove) {
	$this->rating->detach($ratingToRemove);
    }

    /**
     * Returns the rating
     *
     * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Rating> $rating
     */
    public function getRating() {
	return $this->rating;
    }

    /**
     * Sets the rating
     *
     * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Lecoop_Domain_Model_Rating> $rating
     * @return void
     */
    public function setRating(Tx_Extbase_Persistence_ObjectStorage $rating) {
	$this->rating = $rating;
    }

    /**
     * returns if the course currently is featured
     *
     * @return bool
     */
    public function isFeatured() {
	return ($this->featstart < TIME() && $this->featend > TIME());
    }

}

?>