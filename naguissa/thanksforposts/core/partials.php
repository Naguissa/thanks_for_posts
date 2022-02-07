<?php

// Trick taken from https://thepizzy.net/blog/2020/01/phpbb-extension-template-partials/

namespace naguissa\thanksforposts\core;

use phpbb\template\twig\twig;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Class template
 * Adds functionality for rendering template partials
 * @package tsn\tsn\framework\logic
 */
class partials extends twig
{

	// Directories
	const TEMPLATE_DIR = '@naguissa_thanksforposts/';
	const PARTIALS_DIR = self::TEMPLATE_DIR . 'partials/';

	/**
	 * @param string $templateConstant A template path name or constant
	 *
	 * @return false|string|null
	 */
	public function renderPartial($templateConstant)
	{
		try
		{

			$output = $this->twig->render($templateConstant, $this->get_template_vars());
			// Usually this is via AJAX, so compress the whitespace
			$output = preg_replace('/\s+/', ' ', $output);
		} catch (LoaderError $e)
		{
			$output = 'A';
			error_log('Template Loader error: ' . $e->getMessage() . ' :: ' . $e->getCode());
		} catch (RuntimeError $e)
		{
			$output = 'B';
			error_log('Template Runtime error: ' . $e->getMessage() . ' :: ' . $e->getCode());
		} catch (SyntaxError $e)
		{
			$output = 'C';
			error_log('Template Syntax error: ' . $e->getMessage() . ' :: ' . $e->getCode());
		}

		return $output;
	}

}
