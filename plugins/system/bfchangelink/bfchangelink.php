<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.Highlight
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * System plugin to highlight terms.
 *
 * @since  2.5
 */
class PlgSystemBfchangelink extends JPlugin
{
	/**
	 * Method to catch the onAfterDispatch event.
	 *
	 * This is where we setup the click-through content highlighting for.
	 * The highlighting is done with JavaScript so we just
	 * need to check a few parameters and the JHtml behavior will do the rest.
	 *
	 * @return  boolean  True on success
	 *
	 * @since   2.5
	 */
	private function writeToLog($url,$redirect){
	    $file = '301s.txt';
        // Open the file to get existing content
        $current = file_get_contents($file);
        // Append a new person to the file
        $current .= "\n" . $url . '---' . $redirect . '----'. date("H:i:s");
        // Write the contents back to the file
        file_put_contents($file, $current);
	}
	
	//changed by KB 21-11-19 to try and stop the redirects being so resource intensive.
	//public function onAfterDispatch()
	public function onAfterInitialise()
	{
		
		$plugin = JPluginHelper::getPlugin('system', 'bfchangelink');
	    $params = new JRegistry($plugin->params);
		
		$currenturl = $_SERVER['REQUEST_URI'];
		
		
		if ($params->get('findterm1', '') != '') {
			$pos = strrpos($currenturl, $params->get('findterm1', ''));
			if ($pos !== false) { 
				
				if ($params->get('redirecttype1', '301') == '301') {	
	                $this->writeToLog($currenturl,$params->get('redirectURL1', ''));
					header("HTTP/1.1 301 Moved Permanently");
					header("Location: " . $params->get('redirectURL1', ''));
					die();
				} else {
					header("HTTP/1.1 404 Not Found");
					echo file_get_contents($params->get('redirectURL1', ''));
					die();
				}
				
			}
		}
		
		if ($params->get('findterm2', '') != '') {
			$pos = strrpos($currenturl, $params->get('findterm2', ''));
			if ($pos !== false) { 
				if ($params->get('redirecttype2', '301') == '301') {			
				    $this->writeToLog($currenturl,$params->get('redirectURL2', ''));
					header("HTTP/1.1 301 Moved Permanently");
					header("Location: " . $params->get('redirectURL2', ''));
					die();
				} else {
					header("HTTP/1.1 404 Not Found");
					echo file_get_contents($params->get('redirectURL2', ''));
					die();
				}
			}
		}
		
		if ($params->get('findterm3', '') != '') {
			$pos = strrpos($currenturl, $params->get('findterm3', ''));
			if ($pos !== false) { 
				if ($params->get('redirecttype3', '301') == '301') {		
				    $this->writeToLog($currenturl,$params->get('redirectURL3', ''));
					header("HTTP/1.1 301 Moved Permanently");
					header("Location: " . $params->get('redirectURL3', ''));
					die();
				} else {
					header("HTTP/1.1 404 Not Found");
					echo file_get_contents($params->get('redirectURL3', ''));
					die();
				}
			}
		}
		
		if ($params->get('findterm4', '') != '') {
			$pos = strrpos($currenturl, $params->get('findterm4', ''));
			if ($pos !== false) { 
				if ($params->get('redirecttype4', '301') == '301') {
				    $this->writeToLog($currenturl,$params->get('redirectURL4', ''));
					header("HTTP/1.1 301 Moved Permanently");
					header("Location: " . $params->get('redirectURL4', ''));
					die();
				} else {
					header("HTTP/1.1 404 Not Found");
					echo file_get_contents($params->get('redirectURL4', ''));
					die();
				}
			}
		}
		
		if ($params->get('findterm5', '') != '') {
			$pos = strrpos($currenturl, $params->get('findterm5', ''));
			if ($pos !== false) { 
				if ($params->get('redirecttype5', '301') == '301') {	
				    $this->writeToLog($currenturl,$params->get('redirectURL5', ''));
					header("HTTP/1.1 301 Moved Permanently");
					header("Location: " . $params->get('redirectURL5', ''));
					die();
				} else {
					header("HTTP/1.1 404 Not Found");
					echo file_get_contents($params->get('redirectURL5', ''));
					die();
				}
			}
		}

		
		if ($params->get('findterm6', '') != '') {
			$pos = strrpos($currenturl, $params->get('findterm6', ''));
			if ($pos !== false) { 
				if ($params->get('redirecttype6', '301') == '301') {	
				    $this->writeToLog($currenturl,$params->get('redirectURL6', ''));
					header("HTTP/1.1 301 Moved Permanently");
					header("Location: " . $params->get('redirectURL6', ''));
					die();
				} else {
					header("HTTP/1.1 404 Not Found");
					echo file_get_contents($params->get('redirectURL6', ''));
					die();
				}
			}
		}
		
		if ($params->get('findterm7', '') != '') {
			$pos = strrpos($currenturl, $params->get('findterm7', ''));
			if ($pos !== false) { 
				if ($params->get('redirecttype7', '301') == '301') {		
				    $this->writeToLog($currenturl,$params->get('redirectURL7', ''));
					header("HTTP/1.1 301 Moved Permanently");
					header("Location: " . $params->get('redirectURL7', ''));
					die();
				} else {
					header("HTTP/1.1 404 Not Found");
					echo file_get_contents($params->get('redirectURL7', ''));
					die();
				}
			}
		}
		
		if ($params->get('findterm8', '') != '') {
			$pos = strrpos($currenturl, $params->get('findterm8', ''));
			if ($pos !== false) { 
				if ($params->get('redirecttype8', '301') == '301') {	
				    $this->writeToLog($currenturl,$params->get('redirectURL8', ''));
					header("HTTP/1.1 301 Moved Permanently");
					header("Location: " . $params->get('redirectURL8', ''));
					die();
				} else {
					header("HTTP/1.1 404 Not Found");
					echo file_get_contents($params->get('redirectURL8', ''));
					die();
				}
			}
		}
		
		if ($params->get('findterm9', '') != '') {
			$pos = strrpos($currenturl, $params->get('findterm9', ''));
			if ($pos !== false) { 
				if ($params->get('redirecttype9', '301') == '301') {		
				    $this->writeToLog($currenturl,$params->get('redirectURL9', ''));
					header("HTTP/1.1 301 Moved Permanently");
					header("Location: " . $params->get('redirectURL9', ''));
					die();
				} else {
					header("HTTP/1.1 404 Not Found");
					echo file_get_contents($params->get('redirectURL9', ''));
					die();
				}
			}
		}
		
		if ($params->get('findterm10', '') != '') {
			$pos = strrpos($currenturl, $params->get('findterm10', ''));
			if ($pos !== false) { 
				if ($params->get('redirecttype10', '301') == '301') {		
				    $this->writeToLog($currenturl,$params->get('redirectURL10', ''));
					header("HTTP/1.1 301 Moved Permanently");
					header("Location: " . $params->get('redirectURL10', ''));
					die();
				} else {
					header("HTTP/1.1 404 Not Found");
					echo file_get_contents($params->get('redirectURL10', ''));
					die();
				}
			}
		}

		return true;
		
	}
}
