-- create database
CREATE DATABASE locationdb;

CREATE PROCEDURE UDP_CREATE_TABLES
AS 
    BEGIN
        DROP TABLE IF EXISTS points;
        DROP TABLE IF EXISTS polygons;
        DROP TABLE IF EXISTS linestrings;

    END
GO


