-- phpMyAdmin SQL Dump
-- version 3.0.0
-- http://www.phpmyadmin.net

-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--

-- --------------------------------------------------------

--
-- Table structure for table `archivos`
--

CREATE TABLE IF NOT EXISTS `archivos` (
  `id_archivos` int(11) NOT NULL auto_increment,
  `categoria_archivos` int(11) default NULL,
  `tipo_archivos` varchar(11) default NULL,
  `id_tipo_archivos` int(11) default NULL,
  `nombre_archivos` varchar(255) default NULL,
  `archivo_archivos` varchar(255) default NULL,
  `extension_archivos` varchar(255) default NULL,
  `portada_archivos` int(11) default NULL,
  `fecha_archivos` datetime default NULL,
  PRIMARY KEY  (`id_archivos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;




