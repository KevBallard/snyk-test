DROP TABLE IF EXISTS `#__seo_glossary_terms`;

DELETE FROM `#__content_types` WHERE (type_alias LIKE 'com_seo_glossary.%');