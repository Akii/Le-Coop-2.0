<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Course',
	'Course Plugin'
);

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Upcoming',
	'Upcoming Courses'
);

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Ucp',
	'User Control Panel'
);

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Settings',
	'User Settings'
);

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Usercourses',
	'User Courses'
);

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Listcourses',
	'[TEST] List Courses'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Le COOP 2.0');

			t3lib_extMgm::addLLrefForTCAdescr('tx_lecoop_domain_model_course', 'EXT:lecoop/Resources/Private/Language/locallang_csh_tx_lecoop_domain_model_course.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_lecoop_domain_model_course');
			$TCA['tx_lecoop_domain_model_course'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_course',
					'label' => 'title',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Course.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_lecoop_domain_model_course.gif'
				),
			);

			t3lib_extMgm::addLLrefForTCAdescr('tx_lecoop_domain_model_updates', 'EXT:lecoop/Resources/Private/Language/locallang_csh_tx_lecoop_domain_model_updates.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_lecoop_domain_model_updates');
			$TCA['tx_lecoop_domain_model_updates'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_updates',
					'label' => 'updateline',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Updates.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_lecoop_domain_model_updates.gif'
				),
			);

			t3lib_extMgm::addLLrefForTCAdescr('tx_lecoop_domain_model_tag', 'EXT:lecoop/Resources/Private/Language/locallang_csh_tx_lecoop_domain_model_tag.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_lecoop_domain_model_tag');
			$TCA['tx_lecoop_domain_model_tag'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_tag',
					'label' => 'name',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Tag.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_lecoop_domain_model_tag.gif'
				),
			);

t3lib_div::loadTCA('fe_users');
if (!isset($TCA['fe_users']['ctrl']['type'])) {
	// no type field defined, so we define it here. This will only happen the first time the extension is installed!!
	$TCA['fe_users']['ctrl']['type'] = 'tx_extbase_type';
	$tempColumns = array();
	$tempColumns[$TCA['fe_users']['ctrl']['type']] = array(
		'exclude' => 1,
		'label'   => 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_user.tx_extbase_type',
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_user.tx_extbase_type.0','0'),
			),
			'size' => 1,
			'maxitems' => 1,
			'default' => 'Tx_Lecoop_User'
		)
	);
	t3lib_extMgm::addTCAcolumns('fe_users', $tempColumns, 1);
}

$TCA['fe_users']['types']['Tx_Lecoop_User']['showitem'] = $TCA['fe_users']['types']['Tx_Extbase_Domain_Model_FrontendUser']['showitem'];
$TCA['fe_users']['columns'][$TCA['fe_users']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_user','Tx_Lecoop_User');
t3lib_extMgm::addToAllTCAtypes('fe_users', $TCA['fe_users']['ctrl']['type'],'','after:hidden');

$tmp_lecoop_columns = array(

	'scheduleid' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_user.scheduleid',
		'config' => array(
			'type' => 'inline',
			'foreign_table' => 'tx_lecoop_domain_model_schedule',
			'minitems' => 0,
			'maxitems' => 1,
			'appearance' => array(
				'collapse' => 0,
				'levelLinksPosition' => 'top',
				'showSynchronizationLink' => 1,
				'showPossibleLocalizationRecords' => 1,
				'showAllLocalizationLink' => 1
			),
		),
	),
	'subscriptions' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_user.subscriptions',
		'config' => array(
			'type' => 'select',
			'foreign_table' => 'tx_lecoop_domain_model_course',
			'MM' => 'tx_lecoop_user_course_mm',
			'size' => 10,
			'autoSizeMax' => 30,
			'maxitems' => 9999,
			'multiple' => 0,
			'wizards' => array(
				'_PADDING' => 1,
				'_VERTICAL' => 1,
				'edit' => array(
					'type' => 'popup',
					'title' => 'Edit',
					'script' => 'wizard_edit.php',
					'icon' => 'edit2.gif',
					'popup_onlyOpenIfSelected' => 1,
					'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
					),
				'add' => Array(
					'type' => 'script',
					'title' => 'Create new',
					'icon' => 'add.gif',
					'params' => array(
						'table' => 'tx_lecoop_domain_model_course',
						'pid' => '###CURRENT_PID###',
						'setValue' => 'prepend'
						),
					'script' => 'wizard_add.php',
				),
			),
		),
	),
	'viewed' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_user.viewed',
		'config' => array(
			'type' => 'inline',
			'foreign_table' => 'tx_lecoop_domain_model_viewed',
			'foreign_field' => 'user',
			'maxitems'      => 9999,
			'appearance' => array(
				'collapse' => 0,
				'levelLinksPosition' => 'top',
				'showSynchronizationLink' => 1,
				'showPossibleLocalizationRecords' => 1,
				'showAllLocalizationLink' => 1
			),
		),
	),
);

t3lib_extMgm::addTCAcolumns('fe_users',$tmp_lecoop_columns);

$TCA['fe_users']['columns'][$TCA['fe_users']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:fe_users.tx_extbase_type.Tx_Lecoop_User','Tx_Lecoop_User');

$TCA['fe_users']['types']['Tx_Lecoop_User']['showitem'] = $TCA['fe_users']['types']['Tx_Extbase_Domain_Model_FrontendUser']['showitem'];
$TCA['fe_users']['types']['Tx_Lecoop_User']['showitem'] .= ',--div--;LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_user,';
$TCA['fe_users']['types']['Tx_Lecoop_User']['showitem'] .= 'scheduleid, subscriptions, viewed';

			t3lib_extMgm::addLLrefForTCAdescr('tx_lecoop_domain_model_schedule', 'EXT:lecoop/Resources/Private/Language/locallang_csh_tx_lecoop_domain_model_schedule.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_lecoop_domain_model_schedule');
			$TCA['tx_lecoop_domain_model_schedule'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_schedule',
					'label' => 'start',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Schedule.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_lecoop_domain_model_schedule.gif'
				),
			);

			t3lib_extMgm::addLLrefForTCAdescr('tx_lecoop_domain_model_exception', 'EXT:lecoop/Resources/Private/Language/locallang_csh_tx_lecoop_domain_model_exception.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_lecoop_domain_model_exception');
			$TCA['tx_lecoop_domain_model_exception'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_exception',
					'label' => 'start',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Exception.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_lecoop_domain_model_exception.gif'
				),
			);

			t3lib_extMgm::addLLrefForTCAdescr('tx_lecoop_domain_model_event', 'EXT:lecoop/Resources/Private/Language/locallang_csh_tx_lecoop_domain_model_event.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_lecoop_domain_model_event');
			$TCA['tx_lecoop_domain_model_event'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_event',
					'label' => 'start',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Event.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_lecoop_domain_model_event.gif'
				),
			);

			t3lib_extMgm::addLLrefForTCAdescr('tx_lecoop_domain_model_rating', 'EXT:lecoop/Resources/Private/Language/locallang_csh_tx_lecoop_domain_model_rating.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_lecoop_domain_model_rating');
			$TCA['tx_lecoop_domain_model_rating'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_rating',
					'label' => 'rating',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Rating.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_lecoop_domain_model_rating.gif'
				),
			);

			t3lib_extMgm::addLLrefForTCAdescr('tx_lecoop_domain_model_viewed', 'EXT:lecoop/Resources/Private/Language/locallang_csh_tx_lecoop_domain_model_viewed.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_lecoop_domain_model_viewed');
			$TCA['tx_lecoop_domain_model_viewed'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_viewed',
					'label' => 'timestamp',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Viewed.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_lecoop_domain_model_viewed.gif'
				),
			);

?>