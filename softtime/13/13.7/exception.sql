CREATE TABLE exception (
  id_exception INT(11) NOT NULL AUTO_INCREMENT,
  message TEXT NOT NULL,
  code INT(11) NOT NULL,
  file TINYTEXT NOT NULL,
  line INT(11) NOT NULL,
  trace TEXT NOT NULL,
  putdate DATETIME NOT NULL,
  PRIMARY KEY (id_exception)
);
