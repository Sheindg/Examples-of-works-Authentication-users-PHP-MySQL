CREATE DATABASE user;

CREATE TABLE `usertbl` (
`id` int(11) NOT NULL auto_increment,
`fullName` varchar(40) collate utf8_unicode_ci NOT NULL default '',
`email` varchar(40) collate utf8_unicode_ci NOT NULL default '',
`username` varchar(40) collate utf8_unicode_ci NOT NULL default '',
`password` varchar(40) collate utf8_unicode_ci NOT NULL default '',
PRIMARY KEY  (`id`),
UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;