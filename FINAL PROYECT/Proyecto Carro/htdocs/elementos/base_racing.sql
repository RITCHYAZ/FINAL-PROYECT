-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 23-07-2012 a las 14:21:35
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `reacing`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `archivos`
-- 

CREATE TABLE `archivos` (
  `id_archivos` int(11) NOT NULL auto_increment,
  `categoria_archivos` int(11) default NULL,
  `tipo_archivos` varchar(11) default NULL,
  `id_tipo_archivos` int(11) default NULL,
  `nombre_archivos` varchar(255) default NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `precio` int(50) NOT NULL,
  `archivo_archivos` varchar(255) default NULL,
  `extension_archivos` varchar(255) default NULL,
  `portada_archivos` int(11) default NULL,
  `fecha_archivos` datetime default NULL,
  PRIMARY KEY  (`id_archivos`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

-- 
-- Volcar la base de datos para la tabla `archivos`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `carrito`
-- 

CREATE TABLE `carrito` (
  `id_carro` int(11) NOT NULL auto_increment,
  `id_archivos` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `vandera` int(2) NOT NULL,
  PRIMARY KEY  (`id_carro`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=245 ;

-- 
-- Volcar la base de datos para la tabla `carrito`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cateforias`
-- 

CREATE TABLE `cateforias` (
  `id` int(11) NOT NULL auto_increment,
  `nombre_cat` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

-- 
-- Volcar la base de datos para la tabla `cateforias`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pedido`
-- 

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL auto_increment,
  `nombre_cl` varchar(30) NOT NULL,
  `aps` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `dir` varchar(100) NOT NULL,
  `rfc` varchar(20) NOT NULL,
  `cp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `clave` int(2) NOT NULL,
  PRIMARY KEY  (`id_pedido`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- 
-- Volcar la base de datos para la tabla `pedido`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `subcategoria`
-- 

CREATE TABLE `subcategoria` (
  `id_sb` int(11) NOT NULL auto_increment,
  `id_cat` int(10) NOT NULL,
  `nombre_sub` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_sb`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

-- 
-- Volcar la base de datos para la tabla `subcategoria`
-- 
