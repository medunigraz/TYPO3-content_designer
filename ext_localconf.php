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
$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['formDataGroup']['tcaDatabaseRecord'][\KERN23\ContentDesigner\Backend\Form\FormDataProvider\AbstractItemProvider::class] = array(
	'depends' => array(
		\TYPO3\CMS\Backend\Form\FormDataProvider\AbstractItemProvider::class,
	)
);

// TypoScriptTemplate Hook
// @todo find a way to read typoscript if needed to create the tca feature, maybe on new/edit content elements?
#$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tstemplate.php']['includeStaticTypoScriptSourcesAtEnd'][] =
#	'EXT:content_designer/Classes/Hooks/TemplateService.php:KERN23\\ContentDesigner\\Hooks\\TemplateService->includeStaticTypoScriptSourcesAtEnd';

// @todo test the IRRE functionality

// @todo extend any tt_content element

// ContentRendererObject Hook for pages flexform
$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_content.php']['postInit'][] =
	'EXT:content_designer/Classes/Hooks/ContentRendererObject.php:KERN23\\ContentDesigner\\Hooks\\ContentRendererObject';

?>