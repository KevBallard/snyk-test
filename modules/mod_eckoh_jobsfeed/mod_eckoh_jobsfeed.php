<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
/*
SimpleXMLElement Object
(
    [item0] => SimpleXMLElement Object
        (
            [id] => 17619
            [job_title] => Junior Developer
            [job_title_id] => 251300
            [job_description] => SimpleXMLElement Object
                (
                )

            [responsibilities] => SimpleXMLElement Object
                (
                )

            [qualifications] => SimpleXMLElement Object
                (
                )

            [competencies] => SimpleXMLElement Object
                (
                )

            [experience] => SimpleXMLElement Object
                (
                )

            [benefits] => SimpleXMLElement Object
                (
                )

            [reports_to] => SimpleXMLElement Object
                (
                )

            [department_name] => Technical
            [job_type] => Permanent
            [active] => 1
            [archived] => 0
            [approved] => 1
            [location] => Hemel Hempstead
            [salary_range] => £25k-£35k + excellent benefits
            [closing_date] => 0000-00-00
            [go_live_date] => 2021-05-24
            [start_date] => 2099-12-31
            [contact_name] => Lisa Kemp
            [contact_email] => Jobs@eckoh.com
            [contact_phone] => SimpleXMLElement Object
                (
                )

            [internal_reference] => Test Requisition 1
            [comments] => Internal comments section in Job Requisition. How can we use this. Who can see this? HR, Hiring Manager?
        )

)
*/

$url = 'https://www.naturalhr.net/hr/jobs/c447091548856f007af44714683a4de0.xml';
$xml = simplexml_load_file($url) or die("feed not loading");

require JModuleHelper::getLayoutPath('mod_eckoh_jobsfeed', $params->get('layout', 'default'));
