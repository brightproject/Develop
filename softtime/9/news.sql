CREATE TABLE news (
  id_news INT(11) NOT NULL AUTO_INCREMENT,
  name TINYTEXT NOT NULL,
  description TEXT NOT NULL,
  putdate DATETIME NOT NULL,
  PRIMARY KEY (id_news)
);
