CREATE TABLE IF NOT EXISTS `#__eckohpages_` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL DEFAULT 1,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT "0000-00-00 00:00:00",
`created_by` INT(11)  NOT NULL ,
`modified_by` INT(11)  NOT NULL ,
`productname` VARCHAR(255)  NOT NULL ,
`visibleproductname` VARCHAR(255)  NOT NULL ,
`subtitle` VARCHAR(255)  NOT NULL ,
`language` VARCHAR(5)  NOT NULL ,
`formtitle` VARCHAR(255)  NOT NULL ,
`formcode` VARCHAR(255)  NOT NULL ,
`introparagraph` TEXT NOT NULL ,
`textboxes` TEXT NOT NULL ,
`iconheading` VARCHAR(255)  NOT NULL ,
`iconcolumns` VARCHAR(255)  NOT NULL ,
`iconboxes` TEXT NOT NULL ,
`middlectatext` TEXT NOT NULL ,
`middlectaheader` VARCHAR(255)  NOT NULL ,
`middlectalink` VARCHAR(255)  NOT NULL ,
`middlectabuttontext` VARCHAR(255)  NOT NULL ,
`middlectabackgroundcolour` VARCHAR(255)  NOT NULL ,
`casestudytitle` VARCHAR(255)  NOT NULL ,
`casestudyquote` TEXT NOT NULL ,
`casestudycite` VARCHAR(255)  NOT NULL ,
`casestudyreadmoretext` VARCHAR(255)  NOT NULL ,
`casestudyreadmore` VARCHAR(255)  NOT NULL ,
`bottomctaheader` VARCHAR(255)  NOT NULL ,
`bottomctatext` TEXT NOT NULL ,
`bottomctabuttonlink` VARCHAR(255)  NOT NULL ,
`bottomctabuttontext` VARCHAR(255)  NOT NULL ,
`bottomboxes` TEXT NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8mb4_unicode_ci;


INSERT INTO `#__content_types` (`type_title`, `type_alias`, `table`, `field_mappings`, `content_history_options`)
SELECT * FROM ( SELECT 'Product','com_eckohpages.product','{"special":{"dbtable":"#__eckohpages_","key":"id","type":"Product","prefix":"EckohpagesTable"}}', CASE 
                                WHEN 'field_mappings' is null THEN ''
                                ELSE ''
                                END as field_mappings, '{"formFile":"administrator\/components\/com_eckohpages\/models\/forms\/product.xml", "hideFields":["checked_out","checked_out_time","params","language" ,"bottomctatext"], "ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time"], "convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"group_id","targetTable":"#__usergroups","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}]}') AS tmp
WHERE NOT EXISTS (
	SELECT type_alias FROM `#__content_types` WHERE (`type_alias` = 'com_eckohpages.product')
) LIMIT 1;
