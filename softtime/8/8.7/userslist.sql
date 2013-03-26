CREATE TABLE userslist (
  id_user int(11) NOT NULL auto_increment,
  name tinytext NOT NULL,
  pass tinytext NOT NULL,
  email tinytext NOT NULL,
  url tinytext NOT NULL,
  PRIMARY KEY  (id_user)
) TYPE=MyISAM;
