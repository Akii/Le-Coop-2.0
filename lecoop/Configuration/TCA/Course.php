<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$TCA['tx_lecoop_domain_model_course'] = array(
    'ctrl' => $TCA['tx_lecoop_domain_model_course']['ctrl'],
    'interface' => array(
	'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, ownerid, title, description, type, featstart, featend, nextevent, scheduleid, updates, tags, rating, subscriptions',
    ),
    'types' => array(
	'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, ownerid, title, description, type, featstart, featend, nextevent, scheduleid, updates, tags, rating, subscriptions, --div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
    ),
    'palettes' => array(
	'1' => array('showitem' => ''),
    ),
    'columns' => array(
	'sys_language_uid' => array(
	    'exclude' => 1,
	    'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
	    'config' => array(
		'type' => 'select',
		'foreign_table' => 'sys_language',
		'foreign_table_where' => 'ORDER BY sys_language.title',
		'items' => array(
		    array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
		    array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
		),
	    ),
	),
	'l10n_parent' => array(
	    'displayCond' => 'FIELD:sys_language_uid:>:0',
	    'exclude' => 1,
	    'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
	    'config' => array(
		'type' => 'select',
		'items' => array(
		    array('', 0),
		),
		'foreign_table' => 'tx_lecoop_domain_model_course',
		'foreign_table_where' => 'AND tx_lecoop_domain_model_course.pid=###CURRENT_PID### AND tx_lecoop_domain_model_course.sys_language_uid IN (-1,0)',
	    ),
	),
	'l10n_diffsource' => array(
	    'config' => array(
		'type' => 'passthrough',
	    ),
	),
	't3ver_label' => array(
	    'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
	    'config' => array(
		'type' => 'input',
		'size' => 30,
		'max' => 255,
	    )
	),
	'hidden' => array(
	    'exclude' => 1,
	    'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
	    'config' => array(
		'type' => 'check',
	    ),
	),
	'starttime' => array(
	    'exclude' => 1,
	    'l10n_mode' => 'mergeIfNotBlank',
	    'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
	    'config' => array(
		'type' => 'input',
		'size' => 13,
		'max' => 20,
		'eval' => 'datetime',
		'checkbox' => 0,
		'default' => 0,
		'range' => array(
		    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
		),
	    ),
	),
	'endtime' => array(
	    'exclude' => 1,
	    'l10n_mode' => 'mergeIfNotBlank',
	    'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
	    'config' => array(
		'type' => 'input',
		'size' => 13,
		'max' => 20,
		'eval' => 'datetime',
		'checkbox' => 0,
		'default' => 0,
		'range' => array(
		    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
		),
	    ),
	),
	'ownerid' => array(
	    'exclude' => 0,
	    'label' => 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_course.ownerid',
	    'config' => array(
		'type' => 'inline',
		'foreign_table' => 'fe_users',
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
	'title' => array(
	    'exclude' => 0,
	    'label' => 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_course.title',
	    'config' => array(
		'type' => 'input',
		'size' => 30,
		'eval' => 'trim,required'
	    ),
	),
	'description' => array(
	    'exclude' => 0,
	    'label' => 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_course.description',
	    'config' => array(
		'type' => 'text',
		'cols' => 40,
		'rows' => 15,
		'eval' => 'trim,required'
	    ),
	),
	'type' => array(
	    'exclude' => 0,
	    'label' => 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_course.type',
	    'config' => array(
		'type' => 'input',
		'size' => 4,
		'eval' => 'int,required'
	    ),
	),
	'featstart' => array(
	    'exclude' => 1,
	    'label' => 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_course.featstart',
	    'config' => array(
		'type' => 'input',
		'size' => 10,
		'eval' => 'datetime',
		'checkbox' => 1,
		'default' => time()
	    ),
	),
	'featend' => array(
	    'exclude' => 1,
	    'label' => 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_course.featend',
	    'config' => array(
		'type' => 'input',
		'size' => 10,
		'eval' => 'datetime',
		'checkbox' => 1,
		'default' => time()
	    ),
	),
	'nextevent' => array(
	    'exclude' => 1,
	    'label' => 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_course.nextevent',
	    'config' => array(
		'type' => 'input',
		'size' => 10,
		'eval' => 'datetime',
		'checkbox' => 1,
		'default' => time()
	    ),
	),
	'scheduleid' => array(
	    'exclude' => 0,
	    'label' => 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_course.scheduleid',
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
	'updates' => array(
	    'exclude' => 0,
	    'label' => 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_course.updates',
	    'config' => array(
		'type' => 'inline',
		'foreign_table' => 'tx_lecoop_domain_model_updates',
		'foreign_field' => 'course',
		'maxitems' => 9999,
		'appearance' => array(
		    'collapse' => 0,
		    'levelLinksPosition' => 'top',
		    'showSynchronizationLink' => 1,
		    'showPossibleLocalizationRecords' => 1,
		    'showAllLocalizationLink' => 1
		),
	    ),
	),
	'tags' => array(
	    'exclude' => 0,
	    'label' => 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_course.tags',
	    'config' => array(
		'type' => 'inline',
		'foreign_table' => 'tx_lecoop_domain_model_tag',
		'foreign_field' => 'course',
		'maxitems' => 9999,
		'appearance' => array(
		    'collapse' => 0,
		    'levelLinksPosition' => 'top',
		    'showSynchronizationLink' => 1,
		    'showPossibleLocalizationRecords' => 1,
		    'showAllLocalizationLink' => 1
		),
	    ),
	),
	'rating' => array(
	    'exclude' => 0,
	    'label' => 'LLL:EXT:lecoop/Resources/Private/Language/locallang_db.xml:tx_lecoop_domain_model_course.rating',
	    'config' => array(
		'type' => 'inline',
		'foreign_table' => 'tx_lecoop_domain_model_rating',
		'foreign_field' => 'course',
		'maxitems' => 9999,
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
		'foreign_table' => 'fe_users',
		'foreign_field' => 'uid_foreign',
		'foreign_selector' => 'uid_local',
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
			    'table' => 'fe_users',
			    'pid' => '###CURRENT_PID###',
			    'setValue' => 'prepend'
			),
			'script' => 'wizard_add.php',
		    ),
		),
	    ),
	),
    ),
);
?>