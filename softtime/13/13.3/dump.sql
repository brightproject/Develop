CREATE TABLE bill (
  total DECIMAL(8,2) NOT NULL
);
INSERT INTO bill VALUES (2100.00);

CREATE TABLE users (
  id_user INT(11) NOT NULL AUTO_INCREMENT,
  fio TINYTEXT NOT NULL,
  money DECIMAL(8,2) NOT NULL,
  total INT(11) NOT NULL,
  PRIMARY KEY (id_user)
);
INSERT INTO users VALUES (1, 'Корнеев Е.Г.', 500.00, 0);
INSERT INTO users VALUES (2, 'Марычев А.А.', 0.00, 0);
INSERT INTO users VALUES (3, 'Андреев С.В.', 200.00, 1);

CREATE TABLE warehouse (
  id_position INT(11) NOT NULL AUTO_INCREMENT,
  total INT(11) NOT NULL,
  price DECIMAL(8,2) NOT NULL,
  PRIMARY KEY (id_position)
);
INSERT INTO warehouse VALUES (1, 6, 100.00);
