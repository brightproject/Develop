CREATE TABLE catalogs (
  id_catalog int(11) NOT NULL auto_increment,
  name tinytext NOT NULL,
  PRIMARY KEY  (id_catalog),
  FULLTEXT KEY name (name)
);
INSERT INTO catalogs VALUES (1,'Процессоры');
INSERT INTO catalogs VALUES (2,'Материнские платы');
INSERT INTO catalogs VALUES (3,'Видеоадаптеры');
INSERT INTO catalogs VALUES (4,'Жёсткие диски');
INSERT INTO catalogs VALUES (5,'Оперативная память');
CREATE TABLE products (
  id_product int(11) NOT NULL auto_increment,
  name tinytext NOT NULL,
  price decimal(7,2) default '0.00',
  count int(11) default '0',
  mark float(4,1) NOT NULL default '0.0',
  description text,
  id_catalog int(11) NOT NULL default '0',
  PRIMARY KEY  (id_product),
  KEY id_catalog (id_catalog),
  FULLTEXT KEY search (name,description)
);
INSERT INTO products VALUES (1,'Celeron 1.8','1595.00',10,3.6,'Процессор CeleronR 1.8GHz, 128kb, 478-PGA, 400Mhz, OEM 0.18',1);
INSERT INTO products VALUES (2,'Celeron 2.0GHz','1969.00',2,3.7,'Процессор CeleronR 2.0GHz, 128KB, 478-PGA, 400MHz, OEM ',1);
INSERT INTO products VALUES (3,'Celeron 2.4GHz','2109.00',4,3.9,'Процессор CeleronR 2.4GHz, 128kb, 478-PGA, 400Mhz, OEM ',1);
INSERT INTO products VALUES (4,'Celeron D 320 2.4GHz','1962.00',1,4.1,'Процессор CeleronR D 320 2.4GHz, 256kb, 478-PGA, 533Mhz, OEM',1);
INSERT INTO products VALUES (5,'Celeron D 325 2.53GHz','2747.00',6,4.1,'Процессор CeleronR D 325 2.53GHz, 256kb, 478-PGA, 533Mhz, OEM ',1);
INSERT INTO products VALUES (6,'Celeron D 315 2.26GHz','1880.00',6,4.1,'Процессор CeleronR D 315 2.26GHz, 256kb, 478-PGA, 533Mhz, OEM ',1);
INSERT INTO products VALUES (7,'Intel Pentium 4 3.2GHz','7259.00',5,4.5,'Процессор IntelR PentiumR4 3.2GHz, 1Mb, 478-PGA, 800Mhz, Hyper-Threading, OEM ',1);
INSERT INTO products VALUES (8,'Intel Pentium 4 3.0GHz','6147.00',1,4.6,'Процессор IntelR PentiumR4 3.0GHz, 512Kb, 478-PGA, 800Mhz, Hyper-Threading, OEM ',1);
INSERT INTO products VALUES (9,'Intel Pentium 4 3.0GHz','5673.00',12,4.5,'Процессор IntelR PentiumR4 3.0GHz, 1Mb, 478-PGA, 800Mhz, Hyper-Treading, OEM ',1);
INSERT INTO products VALUES (10,'Gigabyte GA-8I848P-RS','1896.00',4,3.9,'Материнская плата SOCKET-478 Gigabyte GA-8I848P-RS i848, (800Mhz), DDR, AGP 8x, ATA100, SATA , Sound 6ch, USB2.0, ATX',2);
INSERT INTO products VALUES (11,'Gigabyte GA-8IG1000','2420.00',2,3.8,'Материнская плата SOCKET-478 Gigabyte GA-8IG1000 i865g,FSB800/533/400,2chDDR400/333/266(4слота),Video,AGP,5PCI,ATA-100,S-ATA',2);
INSERT INTO products VALUES (12,'Gigabyte GA-8IPE1000G','2289.00',6,3.7,'Материнская плата Socket-478 Gigabyte GA-8IPE1000G i865PE(800/533/400Mhz),2ch400/333/266DDR,PCI/AGP,U-100,AC`97,Lan(1Gb),S-ATA,USB 2.0, ATX',2);
INSERT INTO products VALUES (13,'Asustek P4C800-E Delux','5395.00',4,4.1,'Материнская плата Socket-478 Asustek P4C800-E Delux i875P,FSB800/533Mhz,2chDDR400/333,AGP,6PCI,iEEE1394, Raid, U-133,S-ATA, AC`97, Lan(1000), ATX',2);
INSERT INTO products VALUES (14,'Asustek P4P800-VM\\L i865G','2518.00',6,4.0,'Материнская плата Socket-478 Asustek P4P800-VM\\L i865G FSB800/533/400, 2chDDR400/333/266(4слота),AGP,video,3PCI,ATA-100,S-ATA,lan ,M-ATX',2);
INSERT INTO products VALUES (15,'Epox EP-4PDA3I','2289.00',5,4.0,'Материнская плата Socket-478 Epox EP-4PDA3I i865PE(800Mhz), 2chDDR, PCI/AGP, SATA, Lan, U-100, RAID, AC`97, LAN, ATX',2);
INSERT INTO products VALUES (16,'ASUSTEK A9600XT/TD','5156.00',2,4.7,'Видеоадаптер ASUSTEK A9600XT/TD 128Mb DDR SDRAM, 2x400MHz DAC, AGP8x, ATI Radeon 9600XT, DVI, TV- out, BOX ',3);
INSERT INTO products VALUES (17,'ASUSTEK V9520X','1602.00',6,4.0,'Видеоадаптер ASUSTEK V9520X 128Mb DDR SDRAM, 400MHz DAC, AGP 8x, GeForce FX 5200, TV- out, BOX ',3);
INSERT INTO products VALUES (18,'SAPPHIRE 256MB RADEON 9550','2730.00',3,3.8,'ВИДЕОКАРТА SAPPHIRE 256MB RADEON 9550, TV-out, DVI, OEM ',3);
INSERT INTO products VALUES (19,'GIGABYTE AGP GV-N59X128D','5886.00',6,3.6,'ВИДЕОКАРТА GIGABYTE AGP GV-N59X128D FX5900XT OEM ',3);
INSERT INTO products VALUES (20,'Maxtor 6Y120P0','2456.00',6,4.5,'Винчестер 120 GB Maxtor 6Y120P0, UDMA-133, 7200rpm, 8MB ',4);
INSERT INTO products VALUES (21,'Maxtor 6B200P0','3589.00',4,4.0,'Винчестер 200 GB Maxtor 6B200P0, UDMA-133, 7200rpm, 8Mb ',4);
INSERT INTO products VALUES (22,'Samsung SP0812C','2093.00',5,4.0,'Винчестер 80 GB Samsung SP0812C, SATA, 7200rpm SpinPoint P80 SerialATA Буферная кэш-память 8 MB  7200об/мин  Интерфейс Serial ATA 1.0',4);
INSERT INTO products VALUES (23,'Seagate Barracuda ST3160023A','3139.00',3,4.1,'Винчестер 160 GB Seagate Barracuda ST3160023A, UDMA-100, 7200rpm, 8Mb ',4);
INSERT INTO products VALUES (24,'Seagate ST3120026A','2468.00',8,4.2,'Винчестер 120 GB Seagate ST3120026A, UDMA-100, 7200rpm, 8MB ',4);
INSERT INTO products VALUES (25,'DDR-400 256MB Kingston','1085.00',20,4.8,'Оперативная память DDR-400 256MB Kingston ',5);
INSERT INTO products VALUES (26,'DDR-400 256MB Hynix Original ','1179.00',15,4.6,'Оперативная память DDR-400 256MB Hynix Original ',5);
INSERT INTO products VALUES (27,'DDR-400 256MB PQI','899.00',10,4.2,'Оперативная память DDR-400 256MB PQI ',5);
INSERT INTO products VALUES (28,'DDR-400 512MB Kingston','1932.00',20,4.8,'Оперативная память DDR-400 512MB Kingston ',5);
INSERT INTO products VALUES (29,'DDR-400 512MB PQI','1690.00',12,4.2,'Оперативная память DDR-400 512MB PQI ',5);
INSERT INTO products VALUES (30,'DDR-400 512MB Hynix','1717.00',8,4.5,'Оперативная память DDR-400 512MB Hynix ',5);