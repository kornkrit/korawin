-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.45
-- รุ่นของ PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `db_korawin`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `member`
-- 

CREATE TABLE `member` (
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `user` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- dump ตาราง `member`
-- 

INSERT INTO `member` VALUES (1, "Kornkrit", "Supayanant", "kornkrit.s", "08102535", "kornkrit.s@hotmail.com", "0894514236");
INSERT INTO `member` VALUES (2, "Vasu", "Supayanant", "vasu_sup", "vs1120", "vasu_sup@yahoo.com", "0863673863");
INSERT INTO `member` VALUES (3, "Srisuwan", "Supayanant", "srisuwan", "d36u84bg", "srisuwan@hotmail.com", "086-367-3863");
INSERT INTO `member` VALUES (4, "kornkrit", "supayanant", "kornkrit.sup", "k08102535", "kornkrit.sup@student.mahidol.ac.th", "089-451-4236");
INSERT INTO `member` VALUES (5, "Laddawan", "Sae-Lee", "onedayni", "l131235", "oneday@hotmail.com", "087-320-8447");
