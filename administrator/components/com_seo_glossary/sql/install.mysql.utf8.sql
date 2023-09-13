CREATE TABLE IF NOT EXISTS `#__seo_glossary_terms` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL DEFAULT 0,
`state` TINYINT(1)  NOT NULL DEFAULT 1,
`checked_out` INT(11)  NOT NULL DEFAULT 0,
`checked_out_time` DATETIME NOT NULL DEFAULT "0000-00-00 00:00:00",
`created_by` INT(11)  NOT NULL DEFAULT 0,
`modified_by` INT(11)  NOT NULL DEFAULT 0,
`term` VARCHAR(255)  NOT NULL ,
`intro` TEXT NOT NULL ,
`definition` TEXT NOT NULL ,
`languages` VARCHAR(5)  NOT NULL ,
`alias` VARCHAR(255) COLLATE utf8_bin NOT NULL ,
`metatitle` VARCHAR(255)  NOT NULL ,
`metakeywords` TEXT NOT NULL ,
`metadescription` TEXT NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8mb4_unicode_ci;


INSERT INTO `#__content_types` (`type_title`, `type_alias`, `table`, `field_mappings`, `content_history_options`)
SELECT * FROM ( SELECT 'Glossary term','com_seo_glossary.glossaryterm','{"special":{"dbtable":"#__seo_glossary_terms","key":"id","type":"Glossaryterm","prefix":"Seo_glossaryTable"}}', CASE 
                                WHEN 'field_mappings' is null THEN ''
                                ELSE ''
                                END as field_mappings, '{"formFile":"administrator\/components\/com_seo_glossary\/models\/forms\/glossaryterm.xml", "hideFields":["checked_out","checked_out_time","params","language" ,"metadescription"], "ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time"], "convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"group_id","targetTable":"#__usergroups","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}]}') AS tmp
WHERE NOT EXISTS (
	SELECT type_alias FROM `#__content_types` WHERE (`type_alias` = 'com_seo_glossary.glossaryterm')
) LIMIT 1;
