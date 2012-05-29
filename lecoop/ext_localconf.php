<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Course',
	array(
		'Course' => 'featured, new, create, edit, show, search',
		
	),
	// non-cacheable actions
	array(
		'Course' => 'new, create, edit, search',
		
	)
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Upcoming',
	array(
		'Course' => 'upcoming',
		
	),
	// non-cacheable actions
	array(
		'Course' => 'upcoming',
		
	)
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Ucp',
	array(
		'User' => 'ucp, schedule, settings',
		
	),
	// non-cacheable actions
	array(
		'User' => 'ucp, schedule, settings',
		
	)
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Usercourses',
	array(
		'Course' => 'usercourses',
		
	),
	// non-cacheable actions
	array(
		'Course' => 'usercourses',
		
	)
);


// for testing purposes only
Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Listcourses',
	array(
		'Course' => 'list',
		
	),
	// non-cacheable actions
	array(
		'Course' => 'list',
		
	)
);

?>