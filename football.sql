-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Po 25.Máj 2020, 16:01
-- Verzia serveru: 10.4.6-MariaDB
-- Verzia PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `football`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `calendar_events`
--

CREATE TABLE `calendar_events` (
  `ID` int(11) NOT NULL,
  `description` varchar(120) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `city`
--

CREATE TABLE `city` (
  `idcity` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country_idcountry` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `city`
--

INSERT INTO `city` (`idcity`, `city`, `country_idcountry`) VALUES
(1, 'Barcelona', 1),
(2, 'London', 2),
(3, 'Liverpool', 2),
(4, 'Madrid', 1),
(5, 'Manchester', 2),
(6, 'Paris', 8),
(7, 'Milan', 7),
(8, 'Turin', 7),
(9, 'Sevilla', 1),
(10, 'Munich', 6),
(11, 'Dortmund', 6),
(12, 'Amsterdam', 9),
(13, 'Birmingham', 2),
(14, 'Leicester', 2),
(16, 'Berlin', 6),
(17, 'Rome', 7);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `country`
--

CREATE TABLE `country` (
  `idcountry` int(11) NOT NULL,
  `country` varchar(45) NOT NULL,
  `flag` blob NOT NULL,
  `capital_city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `country`
--

INSERT INTO `country` (`idcountry`, `country`, `flag`, `capital_city_id`) VALUES
(1, 'Spain', 0x63343162652d737061696e2e706e67, 4),
(2, 'England', 0x64333739632d656e676c616e642e706e67, 2),
(6, 'Germany', 0x38653838382d6765726d616e792e706e67, 16),
(7, 'Italy', 0x33313939302d6974616c795f666c61672e706e67, 17),
(8, 'France', 0x33613638372d6672616e63652e706e67, 6),
(9, 'Netherlands', 0x64396432302d6e65746865726c616e64732e706e67, 12);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `league`
--

CREATE TABLE `league` (
  `idleague` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `country_idcountry` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `league`
--

INSERT INTO `league` (`idleague`, `name`, `country_idcountry`) VALUES
(1, 'La Liga', 1),
(2, 'Premier League', 2),
(3, 'Championship', 2),
(4, 'Ligue 1', 8),
(5, 'Bundesliga', 6),
(6, '2. Bundesliga', 6),
(7, 'Seria A', 7),
(8, 'Seria B', 7),
(9, 'La Liga 2', 1),
(10, 'Eredivisie', 9),
(11, 'Ligue 2', 8);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `match`
--

CREATE TABLE `match` (
  `idmatch` int(11) NOT NULL,
  `home_team_id` int(11) NOT NULL,
  `away_team_id` int(11) NOT NULL,
  `result` varchar(5) NOT NULL,
  `attendance` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `match`
--

INSERT INTO `match` (`idmatch`, `home_team_id`, `away_team_id`, `result`, `attendance`, `date`) VALUES
(1, 7, 14, '1:2', 80000, '2019-03-20 12:00:00'),
(2, 1, 9, '5:0', 98000, '2018-10-24 16:00:00'),
(3, 9, 1, '0:1', 89000, '2019-03-02 15:00:00'),
(4, 10, 8, '1:0', 54000, '2019-09-24 10:00:00'),
(5, 11, 2, '1:4', 62000, '2019-10-24 12:00:00'),
(6, 12, 13, '1:1', 81000, '2019-11-22 16:00:00'),
(7, 1, 5, '2:0', 96000, '2019-09-28 14:00:00'),
(8, 9, 5, '3:1', 87000, '2019-11-02 15:00:00'),
(9, 7, 10, '2:2', 79000, '2019-10-12 12:00:00'),
(10, 8, 2, '0:1', 81000, '2019-11-10 12:00:00'),
(11, 14, 13, '1:3', 82000, '2019-11-30 16:00:00');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `team`
--

CREATE TABLE `team` (
  `idteam` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `logo` blob NOT NULL,
  `alias` varchar(40) NOT NULL,
  `establishment` date NOT NULL,
  `stadium` varchar(60) NOT NULL,
  `league_idleague` int(11) NOT NULL,
  `city_idcity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `team`
--

INSERT INTO `team` (`idteam`, `name`, `logo`, `alias`, `establishment`, `stadium`, `league_idleague`, `city_idcity`) VALUES
(1, 'FC Barcelona', 0x61313435312d62617263612e706e67, 'Blaugranas', '1899-11-29', 'Nou Camp', 1, 1),
(2, 'Liverpool', 0x38373939612d6c69762e706e67, 'The Reds', '1892-06-03', 'Anfield', 2, 3),
(5, 'Sevilla FC', 0x61633430302d61736576756c6c6b612e706e67, 'Rojiblancos', '1980-01-25', 'Ramón Sánchez Pizjuán', 1, 9),
(6, 'Ajax', 0x65303839382d616a61782e706e67, 'Godenzonen', '1900-03-25', 'Johan Cruyff Arena', 10, 12),
(7, 'Arsenal', 0x64393464362d617273656e616c5f6c6f676f2e706e67, 'The Gunners', '1886-03-09', 'Emirates Stadium', 2, 2),
(8, 'Chelsea', 0x32643538372d616368656c73652e706e67, 'The Blues', '1905-01-17', 'Stamford Bridge', 2, 2),
(9, 'Real Madrid', 0x64346464612d726d612e706e67, 'Los Blancos', '1902-03-13', 'Santiago Bernabéu', 1, 4),
(10, 'Aston Villa', 0x37303964362d6173746f6e2d76696c6c612e706e67, 'Villans', '1874-11-21', 'Villa Park', 2, 13),
(11, 'Leicester City', 0x37313366342d6c65737465722e706e67, 'The Foxes', '1884-10-10', 'King Power', 2, 14),
(12, 'Tottenham Hotspur', 0x39633265612d746f7474656e2e706e67, 'Spurs', '1882-09-05', 'Tottenham Hotspur', 2, 2),
(13, 'Manchester United', 0x39336535382d7574642e706e67, 'Red Devils', '1878-09-06', 'Old Trafford', 2, 5),
(14, 'Manchester City', 0x39633462652d636974792e706e67, 'The Blues', '1880-07-21', 'City of Manchester', 2, 5),
(15, 'Paris Saint-Germain FC', 0x36663064352d7073672e706e67, 'The Parisians', '1970-08-12', 'Parc des Princes', 4, 6);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `calendar_events`
--
ALTER TABLE `calendar_events`
  ADD PRIMARY KEY (`ID`);

--
-- Indexy pre tabuľku `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`idcity`);

--
-- Indexy pre tabuľku `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`idcountry`);

--
-- Indexy pre tabuľku `league`
--
ALTER TABLE `league`
  ADD PRIMARY KEY (`idleague`);

--
-- Indexy pre tabuľku `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`idmatch`);

--
-- Indexy pre tabuľku `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`idteam`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `calendar_events`
--
ALTER TABLE `calendar_events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pre tabuľku `city`
--
ALTER TABLE `city`
  MODIFY `idcity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pre tabuľku `country`
--
ALTER TABLE `country`
  MODIFY `idcountry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pre tabuľku `league`
--
ALTER TABLE `league`
  MODIFY `idleague` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pre tabuľku `match`
--
ALTER TABLE `match`
  MODIFY `idmatch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pre tabuľku `team`
--
ALTER TABLE `team`
  MODIFY `idteam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
