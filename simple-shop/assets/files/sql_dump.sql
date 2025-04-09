-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Oct 19, 2008 at 09:57 PM
-- Server version: 5.0.41
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `simpleshop`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `simpleshop_kategorier`
-- 

DROP TABLE IF EXISTS `simpleshop_kategorier`;
CREATE TABLE `simpleshop_kategorier` (
  `id` int(11) NOT NULL auto_increment,
  `navn` varchar(25) NOT NULL,
  `beskrivelse` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `simpleshop_kategorier`
-- 

INSERT INTO `simpleshop_kategorier` (`id`, `navn`, `beskrivelse`) VALUES 
(1, 'ERGO-redskaber', 'Ny forbedret udgave af de velkendte ERGO redskaber.'),
(2, 'Fuglekasser', 'GreenTools fuglekasser en 100% dansk produktserie. Der er lagt stor vægt på en kombination af bæredygtighed og holdbarhed i materialevalget. Fuglekasserne er udført i vejrbestandigt dansk lærketræ, og samlet med uforgængelige rustfristål skruer. Alle kasser overholder de mål der anbefales af Dansk Ornitologisk Forening.'),
(3, 'B�nke', 'Rustikke lærketræsbænke.');

-- --------------------------------------------------------

-- 
-- Table structure for table `simpleshop_produkter`
-- 

DROP TABLE IF EXISTS `simpleshop_produkter`;
CREATE TABLE `simpleshop_produkter` (
  `id` int(11) NOT NULL auto_increment,
  `fk_kategorier_id` int(11) NOT NULL,
  `navn` varchar(50) NOT NULL,
  `beskrivelse_kort` text NOT NULL,
  `beskrivelse` text NOT NULL,
  `pris` decimal(12,2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `simpleshop_produkter`
-- 

INSERT INTO `simpleshop_produkter` (`id`, `fk_kategorier_id`, `navn`, `beskrivelse_kort`, `beskrivelse`, `pris`) VALUES 
(1, 1, 'ERGO havehakke', 'Ergonomisk havehakke med aluminiunsskaft og hærdet hakkeblad', 'Klarer det grove ukrudt i bede. Også velegnet til hypning og jordluftning.', '159.00'),
(2, 1, 'ERGO skuffejern', 'Ergonomisk skuffejern med aluminiumsskaft', 'Perfekt til vedligeholdelse og rengøring af det velplejede bed, samt partier med perlegrus.', '159.00'),
(3, 1, 'ERGO kost', 'Ergonomisk kost', 'God kost til hverdagsbrug, forsynet med ergonomisk formet stålskaft.', '159.00'),
(4, 1, 'ERGO spade', 'Ergonomisk spade', 'Ergonomisk formet spade med hærdet stålblad og solidt D-greb i plast.', '269.00'),
(7, 2, 'Gråspurvekasse', 'Gråspurvekasse samlet med rustfristålskruer. Kassen er fremstillet af dansk lærketræ.', 'En unik fuglekasse lavet i hånden af dansk lærketræ. Den har et flot udtryk der bliver mere rustikt med tiden. Lærketræ er særligt velegnet til fuglekasser da træet er mere modstandsdygtigt overfor rød og svamp end andet træ. Derfor skal den ikke behandles. Det sætter både fugle og miljø pris på. Det indbyggede dræn, tilpas ventilation og den fine ru overflade giver fuglene et tørt og lunt bo med et godt klima sommer som vinter.', '149.00'),
(8, 2, 'Mejsekasse ', 'Mejsekasse samlet med rustfristålskruer. Kassen er fremstillet af dansk lærketræ.', 'En unik fuglekasse lavet i hånden af dansk lærketræ. Den har et flot udtryk der bliver mere rustikt med tiden. Lærketræ er særligt velegnet til fuglekasser da træet er mere modstandsdygtigt overfor rød og svamp end andet træ. Derfor skal den ikke behandles. Det sætter både fugle og miljø pris på. Det indbyggede dræn, tilpas ventilation og den fine ru overflade giver fuglene et tørt og lunt bo med et godt klima sommer som vinter.', '149.00'),
(9, 1, 'ERGO greb', 'Ergonomisk gravegreb', 'Ergonomisk formet gravegreb med hærdede ståltænder og solidt D-greb i plast.', '270.00'),
(10, 3, 'Naturbænk', 'Rustik naturbænk fremstillet i dansk lærk', 'Rustik naturbænk fremstillet i dansk lærketræ, opsavet på GreenTools eget savværk.', '549.00');

-- --------------------------------------------------------

-- 
-- Table structure for table `simpleshop_produkt_billeder`
-- 

DROP TABLE IF EXISTS `simpleshop_produkt_billeder`;
CREATE TABLE `simpleshop_produkt_billeder` (
  `id` int(11) NOT NULL auto_increment,
  `fk_produkter_id` int(11) NOT NULL,
  `sti` varchar(100) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- 
-- Dumping data for table `simpleshop_produkt_billeder`
-- 

INSERT INTO `simpleshop_produkt_billeder` (`id`, `fk_produkter_id`, `sti`, `position`) VALUES 
(1, 7, '7.jpg', 1),
(2, 7, '7b.jpg', 2),
(3, 7, '7c.jpg', 3),
(4, 8, '8b.jpg', 1),
(5, 8, '8c.jpg', 3),
(6, 8, '8c.jpg', 3),
(7, 1, '1.jpg', 1),
(8, 2, '2.jpg', 1),
(9, 3, '3.jpg', 1),
(10, 4, '4.jpg', 1),
(11, 9, '4.jpg', 1),
(12, 10, '10.jpg', 1),
(13, 10, '10b.jpg', 2);
