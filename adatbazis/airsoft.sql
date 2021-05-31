CREATE DATABASE airsoft
	CHARACTER SET utf8
	COLLATE utf8_hungarian_ci;


#---Táblák létrehozása---
#BerlokTabla
CREATE TABLE airsoft.berlok (
  id INT(11) NOT NULL AUTO_INCREMENT,
  berloNev VARCHAR(50) NOT NULL,
  accesslevel TINYINT(4) DEFAULT 1,
  jelszo VARCHAR(100) NOT NULL,
  telefonszam VARCHAR(20) NOT NULL,
  szemelyigaz VARCHAR(10) NOT NULL,
  irszam VARCHAR(4) NOT NULL,
  lakhely VARCHAR(50) NOT NULL,
  cim VARCHAR(50) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_hungarian_ci;

#tipusok
  CREATE TABLE airsoft.tipusok (
  id INT(11) NOT NULL AUTO_INCREMENT,
  tipus VARCHAR(15) NOT NULL,
  tipusDijPerNap DECIMAL(10, 2) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_hungarian_ci;

#fegyverek
  CREATE TABLE airsoft.fegyverek (
  id INT(11) NOT NULL AUTO_INCREMENT,
  fegyverNev VARCHAR(55) NOT NULL,
  sorozatSzam VARCHAR(5) NOT NULL,
  bpm INT(11) DEFAULT NULL,
  bulletVelocity INT(11) DEFAULT NULL,
  tipusId INT(11) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_hungarian_ci;

ALTER TABLE airsoft.fegyverek 
  ADD CONSTRAINT FK_fegyverek_tipusok_id FOREIGN KEY (tipusId)
    REFERENCES airsoft.tipusok(id) ON DELETE NO ACTION ON UPDATE NO ACTION;

#berles
  CREATE TABLE airsoft.berles (
  id INT(11) NOT NULL AUTO_INCREMENT,
  fegyverId INT(11) NOT NULL,
  berloId INT(11) NOT NULL,
  berbeadasDatuma DATE NOT NULL,
  visszahozasDatuma DATE DEFAULT NULL,
  berletiDij DECIMAL(10, 2) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_hungarian_ci;

ALTER TABLE airsoft.berles 
  ADD CONSTRAINT FK_berles_berlok_id FOREIGN KEY (berloId)
    REFERENCES airsoft.berlok(id) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE airsoft.berles 
  ADD CONSTRAINT FK_berles_fegyverek_id FOREIGN KEY (fegyverId)
    REFERENCES airsoft.fegyverek(id) ON DELETE NO ACTION ON UPDATE NO ACTION;

#---Teszt adatok---
#Táblák törlése
  DELETE FROM berles;
  DELETE FROM berlok;
  DELETE FROM fegyverek;
  DELETE FROM tipusok;
#tipus adatok

INSERT INTO tipusok
  (id,tipus,tipusDijPerNap)
  VALUES
  (1,'elektromos',5000),
  (2,'gazos',3500);

#Berlok
  INSERT INTO berlok
    (id,berloNev,jelszo,accesslevel,telefonszam,szemelyigaz,irszam
    ,lakhely,cim)
    VALUES
    (1,'Toth Karoly','$2y$10$k/TCbDbDQycBMYbOUlTSb.fGaunZH1TTYu20IpNvhEOVlX8ukJQsG',1, '06-202234168','345676AT',5065,'Janoshida','Zalai ut 24'),
    (2,'Szabo Janos','$2y$10$k/TCbDbDQycBMYbOUlTSb.fGaunZH1TTYu20IpNvhEOVlX8ukJQsG',2, '06-303677432', '353328ZA',6000,'Kecskemet','Kinizsi utca 15');

#Fegyverek
  INSERT INTO  fegyverek
    (id,fegyverNev,sorozatSzam,bpm,bulletVelocity,tipusId)
    VALUES
    (1,'HK-416-C',32456,750,400,2),
    (2,'HK-416-C',32523,750,400,2),
    (3,'HK-416-C',32487,750,400,2),
    (4,'G-36',22913,900,550,1),
    (5,'G-36',22356,900,550,1),
    (6,'G-36',24481,900,550,1);


#Berles
  INSERT INTO berles
    (id,fegyverId,berloId,berbeadasDatuma,visszahozasDatuma,berletiDij)
    VALUES
    (1,1,1,'2021.06.22','21.07.23',70000),
    (2,4,2,'2021.06.12','21.06.15',10500);

#---Táblák lekérdezése---
SELECT * FROM tipusok;
SELECT * FROM berles;
SELECT * FROM fegyverek;
SELECT * FROM berlok;

#TesztAdatok generálása
CALL airsoftTesztAdatok();

#---Lekérdezések---

#FegyverNev-Sorozatszam
SELECT id, CONCAT(fegyverNev,' (',sorozatSzam,') ') fegyverek FROM fegyverek
  ORDER BY id;


#BérlõkNeve és bérelt fegyver(sorozatszammal)
  SELECT bk.id ,bk.berloNev , bl.fegyverId ,CONCAT(fegyverNev,' (',sorozatSzam,') ') fegyver FROM berlok bk
    INNER JOIN berles bl on bl.berloId = bk.id
    INNER JOIN fegyverek f on f.id = bl.fegyverId
    ORDER BY bk.berloNev;

#FegyverekInsertInto
  INSERT INTO fegyverek
    (fegyverNev,sorozatSzam,bpm,bulletVelocity,tipusId)
    VALUES
    ('?',?,?,?,?);

#BerlokInstertInto
  INSERT INTO berlok
    (id,berloNev,telefonszam,szemelyigaz,irszam,lakhely,cim)
    VALUES
    ('?','?',?,?,'?','?');

#BerlesInsertInto
  INSERT INTO berles
    (id,fegyverId,berloId,berbeadasDatuma,visszahozasDatuma,berletiDij)
    VALUES
    (?,?,?,?,?,?);
#Fegyverek
  SELECT * FROM fegyverek;

#Tipusok
SELECT * FROM tipusok;