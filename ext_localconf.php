<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

// Register base plugin
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'KERN23.' . $_EXTKEY,
	'Pi1',
	array(
		'ContentRenderer' => 'show',
	),
	// non-cacheable actions
	array(

	)
);

// Form processing hook to load and modify the flexForms
// @todo do it also for tca
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_befunc.php']['getFlexFormDSClass'][] =
	'EXT:content_designer/Classes/Hooks/Form/FlexFormDs.php:KERN23\\ContentDesigner\\Hooks\\Form\\FlexFormDs';

// Explicit Allow Hook
$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['formDataGroup']['tcaDatabaseRecord'][\KERN23\ContentDesigner\Backend\Form\FormDataProvider\AbstractItemProvider::class] = [
	'depends' => [
		\TYPO3\CMS\Backend\Form\FormDataProvider\AbstractItemProvider::class,
	]
];

// ContentRendererObject Hook for pages flexform
$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_content.php']['postInit'][] =
	'EXT:content_designer/Classes/Hooks/ContentRendererObject.php:KERN23\\ContentDesigner\\Hooks\\ContentRendererObject';

?>