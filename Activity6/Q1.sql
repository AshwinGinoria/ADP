/*
USE classicmodels;

CREATE TABLE employee_audit(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    employeeNumber INT(11) NOT NULL ,
    lastname VARCHAR(50) NOT NULL ,
    changedat DATETIME,
    Act VARCHAR(50) 
);
*/

CREATE TRIGGER employee_before_upd BEFORE UPDATE
ON employees
FOR EACH ROW
    INSERT INTO employee_audit 
    SET Action = "Update",
    employeeNumber = NEW.employeeNumber,
    lastname = NEW.lastname,
    changedat = NOW();

UPDATE employees SET extension = "x100" WHERE extension = "x101";

SELECT * FROM employee_audit;
