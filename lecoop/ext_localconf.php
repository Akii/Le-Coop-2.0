<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Featured',
	array(
		'Course' => 'featured',
		
	),
	// non-cacheable actions
	array(
		'Course' => 'create, update, delete, ',
		'User' => '',
		'Schedule' => 'create, update, delete',
		
	)
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Search',
	array(
		'Course' => 'search',
		
	),
	// non-cacheable actions
	array(
		'Course' => 'search',
		
	)
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Create',
	array(
		'Course' => 'new, create',
		
	),
	// non-cacheable actions
	array(
		'Course' => 'new, create',
		
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
		'User' => 'ucp',
		
	),
	// non-cacheable actions
	array(
		'User' => 'ucp',
		
	)
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Settings',
	array(
		'User' => 'settings',
		
	),
	// non-cacheable actions
	array(
		'User' => 'settings',
		
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