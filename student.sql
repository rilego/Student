-- phpMyAdmin SQL Dump
-- version 3.4.10-rc1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 12 月 06 日 21:57
-- 服务器版本: 5.5.28
-- PHP 版本: 5.4.8

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET time_zone = "+00:00";

--
-- 数据库: `student`
--
-- CREATE DATABASE `student` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
-- USE `student`;

-- --------------------------------------------------------

--
-- 用户登陆信息表
-- 表的结构'user'
-- 

create table user (
	id int unsigned not null auto_increment primary key,
	username varchar(20) not null,
	password varchar(20) not null,
	class varchar(10) not null
);


--
-- 学生信息表
-- 表的结构'student_info'
--

create table student_info (
	id int unsigned not null auto_increment primary key,
	student_id int(20) not null,
	name varchar(12) not null,
	sex varchar(6) not null,
	stu_date varchar(20) not null,
	in_Department varchar(50) not null,
	Id_card int(20) not null,
	photo LongBlob not null,
	description text not null,
	credit int(10)

);

--
-- 课程信息表
-- 表的结构'course_info'
--

create table course_info (
	id int unsigned not null auto_increment primary key,
	CNO int(10) not null,
	course_name varchar(20) not null,
	course_cre int(20) not null,
	course_time varchar(20) not null,
	course_teacher varchar(12) not null,
	limit_num int(10) not null,
	select_num int(10) not null
)type=InnoDb;

--
-- 院系信息表
-- 表的结构'DepartMent_info'
--

 create table DepartMent_info(
	id int unsigned not null auto_increment primary key,
	Dep_name varchar(50) not null,
	Dep_info text not null
 );

--
-- 选课信息表
-- 表的结构'Select_course'
--

create table select_course(
	id int unsigned not null auto_increment primary key,
	select_course varchar(20) not null,
	sid int(10) not null,
	cid int(10) not null,
	select_son int(20) not null,
	select_credit int(20) not null,
	select_time varchar(50) not null,
	select_teacher varchar(20) not null,
	every_course int(20) not null,
	every_name varchar(20) not null,
	index('cid');
	foreign key ('cid') references course_info('id') on delete cascade
) type=InnoDb;

