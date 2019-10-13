
CREATE TABLE customer_audit(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    customerID INT(11) NOT NULL ,
    user_name VARCHAR(50) NOT NULL ,
    ContactName VARCHAR(100) NOT NULL,
    changedat DATETIME,
    Action VARCHAR(50);

CREATE TRIGGER employee_aft_del AFTER DELETE
ON customers
FOR EACH ROW
    INSERT INTO customer_audit 
    SET Action = "DELETE",
    customerID = OLD.CustomerID,
    ContactName = OLD.ContactName,
    changedat = NOW(),
    user_name = USER();
