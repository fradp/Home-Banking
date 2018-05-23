-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generato il: Mag 23, 2018 alle 08:17
-- Versione del server: 5.5.27-log
-- Versione PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banca`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `contocorrente`
--

CREATE TABLE IF NOT EXISTS `contocorrente` (
  `ID_ContoCorrente` int(2) NOT NULL AUTO_INCREMENT,
  `PIN` int(5) NOT NULL,
  `Saldo` int(5) NOT NULL,
  PRIMARY KEY (`ID_ContoCorrente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `contocorrente`
--

INSERT INTO `contocorrente` (`ID_ContoCorrente`, `PIN`, `Saldo`) VALUES
(1, 123, 1000),
(2, 321, 1500);

-- --------------------------------------------------------

--
-- Struttura della tabella `possiede`
--

CREATE TABLE IF NOT EXISTS `possiede` (
  `ID_Utente` int(2) NOT NULL,
  `ID_ContoCorrente` int(2) NOT NULL,
  PRIMARY KEY (`ID_ContoCorrente`),
  KEY `ID_Utente` (`ID_Utente`,`ID_ContoCorrente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `possiede`
--

INSERT INTO `possiede` (`ID_Utente`, `ID_ContoCorrente`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE IF NOT EXISTS `utente` (
  `ID_Utente` int(2) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_Utente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`ID_Utente`, `Nome`, `Cognome`, `Username`, `Password`) VALUES
(1, 'Vincenzo', 'Romito', 'vincenzo.romito', '12345'),
(2, 'Francesco', 'Di Pietro', 'francesco.dipietro', '12345');

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `possiede`
--
ALTER TABLE `possiede`
  ADD CONSTRAINT `possiede_ibfk_1` FOREIGN KEY (`ID_Utente`) REFERENCES `utente` (`ID_utente`),
  ADD CONSTRAINT `possiede_ibfk_2` FOREIGN KEY (`ID_ContoCorrente`) REFERENCES `contocorrente` (`ID_ContoCorrente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
