DROP PROCEDURE IF EXISTS Display2;
DELIMITER $$
CREATE PROCEDURE Display2()
BEGIN
DECLARE eu, af int;
SET eu = ( SELECT MAX(Population) from country WHERE Continent = "EUROPE" );
SET af = ( SELECT MAX(Population) from country WHERE Continent = "AFRICA" );
SELECT Name, Continent from country WHERE Population = eu and Continent = "EUROPE"
UNION
SELECT Name, Continent from country WHERE Population = af and Continent = "AFRICA";
END $$
DELIMITER ;
