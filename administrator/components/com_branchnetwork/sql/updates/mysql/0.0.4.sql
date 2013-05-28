DROP TABLE IF EXISTS `#__branchnetwork`;

CREATE TABLE `#__branchnetwork` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `greeting` varchar(25) NOT NULL,
 PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
INSERT INTO `#__branchnetwork` (`greeting`) VALUES
 ('Hello World!'),
 ('Good bye World!');