-- Création des éléments de la base de donnée

-- Création des tables

-- Création de la table "utilisateur"

CREATE TABLE utilisateur (
	ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	Nom VARCHAR(50) NOT NULL,
	Prenom VARCHAR(50) NOT NULL,
	IDTel INT(10) NOT NULL);

-- Création de la table "telephone"

CREATE TABLE telephone (
	IDTel INT(10) PRIMARY KEY,
	MarqueTel VARCHAR(50) NOT NULL,
	LangueTel VARCHAR(50) NOT NULL,
	NomQRCODE VARCHAR(50) NOT NULL);

-- Création de la table "qrcode"

CREATE TABLE qrcode (
	IDQRCODE INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	NomQRCODE VARCHAR(50) NOT NULL,
	URLQRCODE VARCHAR(50) NOT NULL,
	NumTable INT(3) NOT NULL,
	Dates DATETIME NOT NULL);

-- Création de la table "tableResto"

CREATE TABLE tableResto (
	NumTable INT(3) PRIMARY KEY,
	NombreChaises INT(3) NOT NULL,
	Exposition ENUM('Soleil', 'Ombre') NOT NULL,
	Lieu ENUM('Intérieur', 'Terrasse') NOT NULL);

-- Insersion des valeurs pour chaques tables

-- Insersion des VALUES pour la table "utilisateur"

INSERT INTO utilisateur (Nom, Prenom, IDTel) VALUES
	('Palette', 'Jacky', '1234567890'),
	('Pernaud', 'Jean-Pierre', '1527392683'),
	('Walker', 'Alan', '1311417653'),
	('le Pâté', 'Joe', '1644070508'),
	('Sarkozy', 'Nicolas', '1903641668'),
	('Van Damme', 'Jean-Claude', '1708406975'),
	('Norris', 'Chuck', '1927609060'),
	('Lama', 'Serge', '1443930336'),
	('Bové', 'José', '1817783277'),
	('Boulette', 'Gregory', '1436995005'),
	('Sayer', 'Yannick', '1969019725'),
	('Mélenchon', 'Jean-Luc', '1822812152'),
	('Coffe', 'Jean-Pierre', '1810876109'),
	('Raoult', 'Didier', '1991718973'),
	('Orton', 'Randy', '1274323473'),
	('Zemmour', 'Eric', '1370737739'),
	('le Pen', 'Jean-Marie', '1096527560'),
	('de Lesquens', 'Henry', '1899342355'),
	('Brogniard', 'Denis', '1565969215'),
	('Bigard', 'Jean-Marie', '1432965492'),
	('Zimmer', 'Hans', '1917996014');

-- Insersion des VALUES pour la table "telephone"

INSERT INTO telephone (IDTel, MarqueTel, LangueTel, NomQRCODE) VALUES
	('1234567890', 'Nokia', 'Français', 'TableC'),
	('1527392683', 'Nokia', 'Français', 'TableA'),
	('1311417653', 'Nokia', 'Anglais', 'TableK'),
	('1644070508', 'Nokia', 'Français', 'TableD'),
	('1903641668', 'Nokia', 'Français', 'TableF'),
	('1708406975', 'Nokia', 'Anglais', 'TableF'),
	('1927609060', 'Nokia', 'Anglais', 'TableG'),
	('1443930336', 'Nokia', 'Français', 'TableJ'),
	('1817783277', 'Nokia', 'Français', 'TableL'),
	('1436995005', 'Nokia', 'Français', 'TableG'),
	('1969019725', 'Nokia', 'Français', 'TableA'),
	('1822812152', 'Nokia', 'Français', 'TableL'),
	('1810876109', 'Nokia', 'Français', 'TableA'),
	('1991718973', 'Nokia', 'Français', 'TableL'),
	('1274323473', 'Nokia', 'Anglais', 'TableB'),
	('1370737739', 'Nokia', 'Français', 'TableE'),
	('1096527560', 'Nokia', 'Français', 'TableE'),
	('1899342355', 'Nokia', 'Français', 'TableH'),
	('1565969215', 'Nokia', 'Français', 'TableJ'),
	('1432965492', 'Samsung', 'Français', 'TableI'),
	('1917996014', 'Samsung', 'Allemand', 'TableK');

-- Insersion des VALUES pour la table "qrcode"

INSERT INTO qrcode (NomQRCODE, URLQRCODE, NumTable, Dates) VALUES
	('TableC', 'www.a-table.fr/table-interieur-3', '3', '2020-03-12 12:32:24'),
	('TableA', 'www.a-table.fr/table-interieur-1', '1', '2020-03-12 12:32:24'),
	('TableK', 'www.a-table.fr/table-extérieure-5', '11', '2020-03-12 12:32:24'),
	('TableD', 'www.a-table.fr/table-interieur-4', '4', '2020-03-12 12:32:24'),
	('TableF', 'www.a-table.fr/table-interieur-6', '6', '2020-03-12 12:32:24'),
	('TableF', 'www.a-table.fr/table-interieur-6', '6', '2020-03-12 12:32:24'),
	('TableG', 'www.a-table.fr/table-extérieure-1', '7', '2020-03-12 12:32:24'),
	('TableJ', 'www.a-table.fr/table-extérieure-4', '10', '2020-03-12 12:32:24'),
	('TableL', 'www.a-table.fr/table-extérieure-6', '12', '2020-03-12 12:32:24'),
	('TableG', 'www.a-table.fr/table-extérieure-1', '7', '2020-03-12 12:32:24'),
	('TableA', 'www.a-table.fr/table-interieur-1', '1', '2020-03-12 12:32:24'),
	('TableL', 'www.a-table.fr/table-extérieure-6', '12', '2020-03-12 12:32:24'),
	('TableA', 'www.a-table.fr/table-interieur-1', '1', '2020-03-12 12:32:24'),
	('TableL', 'www.a-table.fr/table-extérieure-6', '12', '2020-03-12 12:32:24'),
	('TableB', 'www.a-table.fr/table-interieur-2', '2', '2020-03-12 12:32:24'),
	('TableE', 'www.a-table.fr/table-interieur-5', '5', '2020-03-12 12:32:24'),
	('TableE', 'www.a-table.fr/table-interieur-5', '5', '2020-03-12 12:32:24'),
	('TableH', 'www.a-table.fr/table-extérieure-2', '8', '2020-03-12 12:32:24'),
	('TableJ', 'www.a-table.fr/table-extérieure-4', '10', '2020-03-12 12:32:24'),
	('TableI', 'www.a-table.fr/table-extérieure-3', '9', '2020-03-12 12:32:24'),
	('TableK', 'www.a-table.fr/table-extérieure-5', '11', '2020-03-12 12:32:24');

	/*
	-- Mémoire des valeurs dans l'ordre
	('TableA', 'www.a-table.fr/table-interieur-1', '1', '2020-03-12 12:32:24'),
	('TableB', 'www.a-table.fr/table-interieur-2', '2', '2020-03-12 12:32:24'),
	('TableC', 'www.a-table.fr/table-interieur-3', '3', '2020-03-12 12:32:24'),
	('TableD', 'www.a-table.fr/table-interieur-4', '4', '2020-03-12 12:32:24'),
	('TableE', 'www.a-table.fr/table-interieur-5', '5', '2020-03-12 12:32:24'),
	('TableF', 'www.a-table.fr/table-interieur-6', '6', '2020-03-12 12:32:24'),
	('TableG', 'www.a-table.fr/table-extérieure-1', '7', '2020-03-12 12:32:24'),
	('TableH', 'www.a-table.fr/table-extérieure-2', '8', '2020-03-12 12:32:24'),
	('TableI', 'www.a-table.fr/table-extérieure-3', '9', '2020-03-12 12:32:24'),
	('TableJ', 'www.a-table.fr/table-extérieure-4', '10', '2020-03-12 12:32:24'),
	('TableK', 'www.a-table.fr/table-extérieure-5', '11', '2020-03-12 12:32:24'),
	('TableL', 'www.a-table.fr/table-extérieure-6', '12', '2020-03-12 12:32:24');
	*/
	

-- Insersion des VALUES pour la table "tableResto"

INSERT INTO tableResto (NumTable, NombreChaises, Exposition, Lieu) VALUES
	('1', '2', 'Ombre', 'Intérieur'),
	('2', '2', 'Ombre', 'Intérieur'),
	('3', '2', 'Ombre', 'Intérieur'),
	('4', '2', 'Soleil', 'Intérieur'),
	('5', '2', 'Soleil', 'Intérieur'),
	('6', '6', 'Soleil', 'Intérieur'),
	('7', '2', 'Ombre', 'Terrasse'),
	('8', '2', 'Ombre', 'Terrasse'),
	('9', '6', 'Ombre', 'Terrasse'),
	('10', '6', 'Soleil', 'Terrasse'),
	('11', '2', 'Soleil', 'Terrasse'),
	('12', '2', 'Soleil', 'Terrasse');

-- Ajouts des index pour les tables


-- Index de la table "utilisateur"

ALTER TABLE `utilisateur`
	ADD PRIMARY KEY (`ID`),
	ADD KEY (`IDTel`);

-- Index de la table "telephone"

ALTER TABLE `telephone`
	ADD PRIMARY KEY (`IDTel`),
	ADD KEY (`NomQRCODE`);

-- Index de la table "qrcode"

ALTER TABLE `qrcode`
	ADD PRIMARY KEY (`NomQRCODE`),
	ADD KEY (`NumTable`);

-- Index de la table "tableResto"

ALTER TABLE `tableResto`
	ADD PRIMARY KEY (`NumTable`);
	