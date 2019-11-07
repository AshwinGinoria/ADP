SET @path = "/home/ashwin/Documents/College/ADP/MiniProject/PollutionDataCS207.csv";

CREATE DATABASE IF NOT EXISTS miniProject;

use miniProject;

CREATE TABLE Pollution(
    time TIMESTAMP,
    co DECIMAL(15 , 5 ) NULL,
    h DECIMAL(15 , 5 ) NULL,
    no2 DECIMAL(15 , 5 ) NULL,
    o3 DECIMAL(15 , 5 ) NULL,
    p DECIMAL(15 , 5 ) NULL,
    pm_10 DECIMAL(15 , 5 ) NULL,
    pm_1_0 DECIMAL(15 , 5 ) NULL,
    pm_2_5 DECIMAL(15 , 5 ) NULL,
    so2 DECIMAL(15 , 5 ) NULL,
    t DECIMAL(15 , 5 ) NULL,
    ws DECIMAL(15 , 5 ) NULL
);

LOAD DATA LOCAL INFILE "/home/ashwin/Documents/College/ADP/MiniProject/PollutionDataCS207.csv"
INTO TABLE Pollution
FIELDS TERMINATED BY ',' ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(@time,co,h,no2,o3,p,pm_10,pm_1_0,pm_2_5,so2,t,ws)
SET time= STR_TO_DATE(@time, '%m/%d/%Y %k:%i');
