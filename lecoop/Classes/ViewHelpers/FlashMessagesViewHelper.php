<?php

/*                                                                        *
 * This script is backported from the FLOW3 package "TYPO3.Fluid".        *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 *  of the License, or (at your option) any later version.                *
 *                                                                        *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * Standard error msg for forms
 */
class Tx_Lecoop_ViewHelpers_FlashMessagesViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractTagBasedViewHelper {

	const RENDER_MODE_UL = 'ul';
	const RENDER_MODE_DIV = 'div';

	/**
	 * @var tslib_cObj
	 */
	protected $contentObject;

	/**
	 * @var Tx_Extbase_Configuration_ConfigurationManagerInterface
	 */
	protected $configurationManager;

	/**
	 * @param Tx_Extbase_Configuration_ConfigurationManagerInterface $configurationManager
	 * @return void
	 */
	public function injectConfigurationManager(Tx_Extbase_Configuration_ConfigurationManagerInterface $configurationManager) {
		$this->configurationManager = $configurationManager;
		$this->contentObject = $this->configurationManager->getContentObject();
	}

	/**
	 * Initialize arguments
	 *
	 * @return void
	 * @api
	 */
	public function initializeArguments() {
		$this->registerUniversalTagAttributes();
	}

	/**
	 * Renders FlashMessages and flushes the FlashMessage queue
	 * Note: This disables the current page cache in order to prevent FlashMessage output
	 * from being cached.
	 * @see tslib_fe::no_cache
	 *
	 * @param string $renderMode one of the RENDER_MODE_* constants
	 * @return string rendered Flash Messages, if there are any.
	 * @api
	 */
	public function render($renderMode = self::RENDER_MODE_UL) {
		$flashMessages = $this->controllerContext->getFlashMessageContainer()->getAllMessagesAndFlush();
		if ($flashMessages === NULL || count($flashMessages) === 0) {
			return '';
		}
		if (isset($GLOBALS['TSFE']) && $this->contentObject->getUserObjectType() === tslib_cObj::OBJECTTYPE_USER) {
			$GLOBALS['TSFE']->no_cache = 1;
		}

		/*
switch ($renderMode) {
			case self::RENDER_MODE_UL:
				return $this->renderUl($flashMessages);
			case self::RENDER_MODE_DIV:
				return $this->renderDiv($flashMessages);
			default:
				throw new Tx_Fluid_Core_ViewHelper_Exception('Invalid render mode "' . $renderMode . '" passed to FlashMessageViewhelper', 1290697924);
		}
		*/		
		return '<div class="alert"><button class="close" data-dismiss="alert">×</button><strong>Warning!</strong> Validation failed. Please make sure that you filled in all required fields of the form!</div>';
	}

	/**
	 * Renders the flash messages as unordered list
	 *
	 * @param array $flashMessages array<t3lib_FlashMessage>
	 * @return string
	 */
	protected function renderUl(array $flashMessages) {
		$this->tag->setTagName('ul');
		if ($this->hasArgument('class')) {
			$this->tag->addAttribute('class', $this->arguments['class']);
		}
		$tagContent = '';
		foreach ($flashMessages as $singleFlashMessage) {
			$tagContent .= '<li>' . htmlspecialchars($singleFlashMessage->getMessage()) . '</li>';
		}
		$this->tag->setContent($tagContent);
		return $this->tag->render();
	}

	/*
	 * Renders the flash messages as nested divs
	 *
	 * @param array $flashMessages array<t3lib_FlashMessage>
	 * @return string
	 */
	protected function renderDiv(array $flashMessages) {
		$this->tag->setTagName('div');
		if ($this->hasArgument('class')) {
			$this->tag->addAttribute('class', $this->arguments['class']);
		} else {
			$this->tag->addAttribute('class', 'typo3-messages');
		}
		$tagContent = '';
		foreach ($flashMessages as $singleFlashMessage) {
			$tagContent .= $singleFlashMessage->render();
		}
		$this->tag->setContent($tagContent);
		return $this->tag->render();
	}
}

?>
