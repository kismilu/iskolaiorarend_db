-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2018. Nov 25. 22:17
-- Kiszolgáló verziója: 10.1.36-MariaDB
-- PHP verzió: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `iskolaiorarend`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orarend`
--

CREATE TABLE `orarend` (
  `terem_id` varchar(4) COLLATE utf8_hungarian_ci NOT NULL,
  `tantargy_id` varchar(4) COLLATE utf8_hungarian_ci NOT NULL,
  `osztaly_id` varchar(4) COLLATE utf8_hungarian_ci NOT NULL,
  `nap` int(2) NOT NULL,
  `hanyadik_ora` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `orarend`
--

INSERT INTO `orarend` (`terem_id`, `tantargy_id`, `osztaly_id`, `nap`, `hanyadik_ora`) VALUES
('01', '00', '001', 1, 0),
('01', '00', '001', 1, 1),
('01', '00', '001', 1, 2),
('01', '00', '001', 1, 3),
('01', '01', '001', 1, 4),
('01', '01', '001', 1, 5),
('01', '01', '001', 1, 6),
('01', '01', '012', 2, 0),
('01', '01', '012', 2, 1),
('01', '01', '012', 2, 2),
('01', '01', '012', 2, 3),
('01', '14', '012', 2, 4),
('01', '15', '012', 2, 5),
('02', '01', '002', 1, 0),
('02', '01', '002', 1, 1),
('02', '01', '002', 1, 2),
('02', '01', '002', 1, 3),
('02', '13', '002', 1, 4),
('02', '13', '002', 1, 5),
('02', '15', '002', 1, 6),
('03', '16', '011', 1, 1),
('03', '16', '011', 1, 2),
('03', '16', '011', 1, 3),
('03', '16', '011', 1, 4),
('03', '16', '011', 1, 5),
('03', '17', '011', 1, 6),
('05', '02', '052', 2, 1),
('05', '02', '052', 2, 2),
('05', '02', '052', 2, 3),
('05', '01', '052', 2, 4),
('05', '01', '052', 2, 5),
('05', '01', '052', 2, 6),
('05', '01', '052', 2, 7);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `oratartam`
--

CREATE TABLE `oratartam` (
  `hanyadik_ora` int(2) NOT NULL,
  `kezdet` varchar(6) COLLATE utf8_hungarian_ci NOT NULL,
  `vege` varchar(6) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `oratartam`
--

INSERT INTO `oratartam` (`hanyadik_ora`, `kezdet`, `vege`) VALUES
(0, '0710', '0750'),
(1, '0800', '0845'),
(2, '0900', '0945'),
(3, '1000', '1045'),
(4, '1105', '1150'),
(5, '1200', '1245'),
(6, '1300', '1345'),
(7, '1400', '1445');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `osztaly`
--

CREATE TABLE `osztaly` (
  `osztaly_id` varchar(4) COLLATE utf8_hungarian_ci NOT NULL,
  `letszam` int(2) NOT NULL,
  `ped_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `osztaly`
--

INSERT INTO `osztaly` (`osztaly_id`, `letszam`, `ped_id`) VALUES
('001', 14, 1),
('002', 13, 2),
('011', 10, 3),
('012', 10, 4),
('021', 17, 5),
('022', 16, 6),
('031', 10, 7),
('032', 10, 8),
('041', 15, 9),
('042', 15, 10),
('051', 10, 11),
('052', 11, 12),
('061', 11, 13),
('062', 12, 14),
('071', 16, 15),
('072', 14, 16);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pedagogus`
--

CREATE TABLE `pedagogus` (
  `ped_nev` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `ped_id` int(2) NOT NULL,
  `lakcim` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `pedagogus`
--

INSERT INTO `pedagogus` (`ped_nev`, `ped_id`, `lakcim`) VALUES
('Kiss Lilla', 1, 'Budapest'),
('Bodor Ernő', 2, 'Budapest'),
('Sándor Csaba', 3, 'Budapest'),
('Bakó Edward', 4, 'Budapest'),
('Tisza Lajos', 5, 'Budapest'),
('Kossuth Péter', 6, 'Budapest'),
('Lajos Péter', 7, 'Budapest'),
('Bence Ákos', 8, 'Budapest'),
('Csizmadia János', 9, 'Budapest'),
('Virág Lilla', 10, 'Budapest'),
('Favágó Elemér', 11, 'Budapest'),
('Pál Edit', 12, 'Budapest'),
('Szekeres Dávid', 13, 'Budapest'),
('Szekeres Ica', 14, 'Budapest'),
('Széles Kálmán', 15, 'Budapest'),
('Helo Helo', 16, 'Budapest'),
('Far Hát', 17, 'Budapest'),
('Kevin Benedek', 18, 'Budapest'),
('Csiszár Jenő', 19, 'Budapest'),
('Orbán János', 20, 'Budapest'),
('Ruzsa András', 21, 'Budapest'),
('Kovács Ferenc', 22, 'Budapest'),
('Gyurcsány Dávid', 23, 'Budapest'),
('János Károly', 24, 'Budapest'),
('Sándor László', 25, 'Budapest'),
('Kiss László', 26, 'Budapest'),
('Kiss Béla', 27, 'Budapest'),
('Péter Béla', 28, 'Budapest'),
('Mihály Dávid', 29, 'Budapest'),
('Horváth Károly', 30, 'Budapest');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tantargy`
--

CREATE TABLE `tantargy` (
  `nev` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `tantargy_id` varchar(4) COLLATE utf8_hungarian_ci NOT NULL,
  `heti_oraszam` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `tantargy`
--

INSERT INTO `tantargy` (`nev`, `tantargy_id`, `heti_oraszam`) VALUES
('matematika', '00', 4),
('magyar nyelv', '01', 7),
('történelem', '02', 2),
('társadalmi ismeretek', '03', 1),
('erkölcstan', '04', 1),
('környezetismeret', '05', 1),
('kémia', '06', 2),
('fizika', '07', 2),
('biológia', '08', 2),
('földrajz', '09', 1),
('angol', '10', 3),
('német', '11', 3),
('ének-zene', '12', 2),
('vizuális-kultúra', '13', 2),
('technológia és terve', '14', 1),
('digitális technológi', '15', 1),
('testnevelés', '16', 5),
('osztályfőnöki', '17', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termek`
--

CREATE TABLE `termek` (
  `terem_id` varchar(4) COLLATE utf8_hungarian_ci NOT NULL,
  `terem_nev` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `ferohely` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `termek`
--

INSERT INTO `termek` (`terem_id`, `terem_nev`, `ferohely`) VALUES
('00', 'terem0', 20),
('01', 'terem1', 20),
('02', 'terem2', 20),
('03', 'terem3', 20),
('04', 'terem4', 20),
('05', 'terem5', 20),
('06', 'terem6', 20),
('07', 'terem7', 20),
('08', 'terem8', 20),
('09', 'terem9', 20);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `orarend`
--
ALTER TABLE `orarend`
  ADD PRIMARY KEY (`terem_id`,`nap`,`hanyadik_ora`),
  ADD KEY `osztaly_id` (`osztaly_id`),
  ADD KEY `tantargy_id` (`tantargy_id`);

--
-- A tábla indexei `oratartam`
--
ALTER TABLE `oratartam`
  ADD PRIMARY KEY (`hanyadik_ora`);

--
-- A tábla indexei `osztaly`
--
ALTER TABLE `osztaly`
  ADD PRIMARY KEY (`osztaly_id`),
  ADD KEY `ped_id` (`ped_id`);

--
-- A tábla indexei `pedagogus`
--
ALTER TABLE `pedagogus`
  ADD PRIMARY KEY (`ped_id`);

--
-- A tábla indexei `tantargy`
--
ALTER TABLE `tantargy`
  ADD PRIMARY KEY (`tantargy_id`);

--
-- A tábla indexei `termek`
--
ALTER TABLE `termek`
  ADD PRIMARY KEY (`terem_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
