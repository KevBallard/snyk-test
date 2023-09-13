<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Bfsearch
 * @author     Shaun Dobie <shaun@bluefrontier.co.uk>
 * @copyright  2019 Shaun Dobie
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use \Joomla\CMS\Factory;
use \Joomla\CMS\Language\Text;

jimport('joomla.application.component.modellist');


class BfsearchModelResults extends \Joomla\CMS\MVC\Model\ListModel
{
	
	public function getSearchArticles()
	{
		
		$jinput = JFactory::getApplication()->input;		
		//$searchterm = $jinput->get('searchterm');
		$searchterm = $_REQUEST["searchterm"];
		
		$searchterm = str_replace("'","",$searchterm);
		$searchterm = str_replace('"','',$searchterm);
		$searchterm = str_replace('=','',$searchterm);
		$matchsearchterm = $searchterm;
		$searchterm = str_replace(" ","%",$searchterm);
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query = "SELECT 
						SIGN(LOCATE('" . $matchsearchterm . "',c.title)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',m.title)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',c.introtext)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',c.`fulltext`)) as matchcount,
					m.id, m.title, m.menutype, m.`language`, c.introtext, m.path FROM tnvr0_content c
					LEFT JOIN tnvr0_menu m ON (m.params LIKE concat('%\"item_id\":\"', c.id, '\"%') OR m.link LIKE concat('%id=', c.id, ''))
					WHERE (c.title LIKE \"%" . $searchterm . "%\" 
					OR m.title LIKE \"%" . $searchterm . "%\" 
					OR c.introtext LIKE \"%" . $searchterm . "%\" 
					OR c.`fulltext` LIKE \"%" . $searchterm . "%\") 
					AND  c.state = 1 
					AND  m.published = 1 
					ORDER BY matchcount DESC, m.menutype";
		
		$db->setQuery($query);
		$results = $db->loadAssocList();

		return $results;
                
	}
	
	
	public function getSearchLevel2or3()
	{
		
		$jinput = JFactory::getApplication()->input;		
		//$searchterm = $jinput->get('searchterm');
		$searchterm = $_REQUEST["searchterm"];
		
		$searchterm = str_replace("'","",$searchterm);
		$searchterm = str_replace('"','',$searchterm);
		$searchterm = str_replace('=','',$searchterm);
		$matchsearchterm = $searchterm;
		$searchterm = str_replace(" ","%",$searchterm);
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query = "SELECT 
						SIGN(LOCATE('" . $matchsearchterm . "',c.visibleproductname)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',c.productname)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',c.subtitle)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',c.`language`)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',c.introparagraph)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',c.featurearea)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',c.minicalltoactionboxtext)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',c.casestudytext)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',c.featurearea2)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',m.title)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',c.bottomboxes)) as matchcount,
					m.id, m.title, m.menutype, m.`language`, c.introparagraph, m.path  FROM tnvr0_eckohproducts_level2or3 c
					LEFT JOIN tnvr0_menu m ON m.component_id = 10057 AND m.params LIKE concat('%\"item_id\":\"', c.id, '\"%') AND m.link LIKE '%view=level2or3%'
					WHERE (c.visibleproductname LIKE \"%" . $searchterm . "%\" 
					OR c.productname LIKE \"%" . $searchterm . "%\" 
					OR c.subtitle LIKE \"%" . $searchterm . "%\" 
					OR c.`language` LIKE \"%" . $searchterm . "%\"
					OR c.introparagraph LIKE \"%" . $searchterm . "%\"
					OR c.featurearea LIKE \"%" . $searchterm . "%\"
					OR c.minicalltoactionboxtext LIKE \"%" . $searchterm . "%\"
					OR c.casestudytext LIKE \"%" . $searchterm . "%\"
					OR c.featurearea2 LIKE \"%" . $searchterm . "%\"
					OR m.title LIKE \"%" . $searchterm . "%\" 
					OR c.bottomboxes LIKE \"%" . $searchterm . "%\") 
					AND  c.state = 1 
					AND  m.published = 1 
					ORDER BY matchcount DESC, m.menutype";

		$db->setQuery($query);
		$results = $db->loadAssocList();

		return $results;
                
	}
	
	
	public function getSearchLevel2Plus()
	{
		
		$jinput = JFactory::getApplication()->input;		
		//$searchterm = $jinput->get('searchterm');
		$searchterm = $_REQUEST["searchterm"];
		
		$searchterm = str_replace("'","",$searchterm);
		$searchterm = str_replace('"','',$searchterm);
		$searchterm = str_replace('=','',$searchterm);
		$matchsearchterm = $searchterm;
		$searchterm = str_replace(" ","%",$searchterm);
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query = "SELECT 
						SIGN(LOCATE('" . $matchsearchterm . "',c.visibleproductname)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',c.productname)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',c.subtitle)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',c.`language`)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',c.introparagraph)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',c.featurearea)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',c.minicalltoactionboxtext)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',c.casestudytext)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',c.featurearea2)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',m.title)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',c.bottomboxes)) as matchcount,
					m.id, m.title, m.menutype, m.`language`, c.introparagraph, m.path  FROM tnvr0_eckohproducts_level2plus c
					LEFT JOIN tnvr0_menu m ON m.component_id = 10057 AND m.params LIKE concat('%\"item_id\":\"', c.id, '\"%') AND m.link LIKE '%view=level2plus%'
					WHERE (c.visibleproductname LIKE \"%" . $searchterm . "%\" 
					OR c.productname LIKE \"%" . $searchterm . "%\" 
					OR c.subtitle LIKE \"%" . $searchterm . "%\" 
					OR c.`language` LIKE \"%" . $searchterm . "%\"
					OR c.introparagraph LIKE \"%" . $searchterm . "%\"
					OR c.featurearea LIKE \"%" . $searchterm . "%\"
					OR c.minicalltoactionboxtext LIKE \"%" . $searchterm . "%\"
					OR c.casestudytext LIKE \"%" . $searchterm . "%\"
					OR c.featurearea2 LIKE \"%" . $searchterm . "%\"
					OR m.title LIKE \"%" . $searchterm . "%\" 
					OR c.bottomboxes LIKE \"%" . $searchterm . "%\") 
					AND c.state = 1 
					AND m.published = 1 
					ORDER BY matchcount DESC, m.menutype";

		$db->setQuery($query);
		$results = $db->loadAssocList();

		return $results;
                
	}
	
	
	public function getSearchDocman()
	{
		
		$jinput = JFactory::getApplication()->input;		
		//$searchterm = $jinput->get('searchterm');
		$searchterm = $_REQUEST["searchterm"];
		
		$searchterm = str_replace("'","",$searchterm);
		$searchterm = str_replace('"','',$searchterm);
		$searchterm = str_replace('=','',$searchterm);
		$matchsearchterm = $searchterm;
		$searchterm = str_replace(" ","%",$searchterm);
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query = "SELECT 
						SIGN(LOCATE('" . $matchsearchterm . "',d.title)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',d.description)) as matchcount,
					d.docman_document_id, d.title, d.slug, d.docman_category_id, d.description, d.enabled, c.slug as catslug, cp.slug as parentslug
					FROM tnvr0_docman_documents d
					LEFT JOIN tnvr0_docman_categories c ON c.docman_category_id = d.docman_category_id
					LEFT JOIN tnvr0_docman_category_relations cr ON cr.descendant_id = c.docman_category_id AND cr.level=1
					LEFT JOIN tnvr0_docman_categories cp ON cp.docman_category_id = cr.ancestor_id
					WHERE d.enabled=1 
					AND c.slug NOT LIKE \"%white-paper%\" 
					AND (d.title LIKE \"%" . $searchterm . "%\" OR d.description LIKE \"%" . $searchterm . "%\") 
					ORDER BY matchcount DESC";				
					

		$db->setQuery($query);
		$results = $db->loadAssocList();

		return $results;
                
	}
	
	
	public function getSearchZoo()
	{
		
		$jinput = JFactory::getApplication()->input;		
		//$searchterm = $jinput->get('searchterm');
		$searchterm = $_REQUEST["searchterm"];
		
		$searchterm = str_replace("'","",$searchterm);
		$searchterm = str_replace('"','',$searchterm);
		$searchterm = str_replace('=','',$searchterm);
		$matchsearchterm = $searchterm;
		$searchterm = str_replace(" ","%",$searchterm);
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query = "SELECT 
						SIGN(LOCATE('" . $matchsearchterm . "',name)) + 
						SIGN(LOCATE('" . $matchsearchterm . "',elements)) as matchcount,
					id, name, alias, elements, application_id
					FROM tnvr0_zoo_item
					WHERE (name LIKE \"%" . $searchterm . "%\" OR elements LIKE \"%" . $searchterm . "%\")
					AND state = 1 
					ORDER BY matchcount DESC";

		$db->setQuery($query);
		$results = $db->loadAssocList();

		return $results;
                
	}


}


