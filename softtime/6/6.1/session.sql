CREATE TABLE session ( 
  id_session TINYTEXT NOT NULL, 
  putdate DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00', 
  user TINYTEXT NOT NULL 
);
