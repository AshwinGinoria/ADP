CREATE TABLE temp(
    customerNumber int(11) NOT NULL PRIMARY KEY,
    Value VARCHAR(255)
);

DROP PROCEDURE IF EXISTS cpBonus;
DELIMITER $$
CREATE PROCEDURE cpBonus()
BEGIN

DECLARE v_finished INTEGER DEFAULT 0;
DECLARE v_num INT(11) DEFAULT NULL;
DECLARE v_cLimit DECIMAL(10,2) DEFAULT NULL;
DECLARE Total_amount INTEGER;

DECLARE customer_cursor CURSOR FOR
SELECT customerNumber, creditLimit FROM customers;

DECLARE CONTINUE HANDLER
FOR NOT FOUND SET v_finished = 1;

OPEN customer_cursor;

get_customer: LOOP

FETCH customer_cursor INTO v_num, v_cLimit;

IF v_finished = 1 THEN
    LEAVE get_customer;
END IF;

SET Total_amount = (SELECT SUM(amount) FROM payments WHERE customerNumber = v_num );

IF Total_amount < v_cLimit THEN
    INSERT INTO temp VALUES(v_num, "below limit");
ELSE
    INSERT INTO temp VALUES(v_num, "limit exceeded");
END IF;

END LOOP get_customer;

CLOSE customer_cursor;

END $$
DELIMITER ;

CALL cpBonus();

SELECT * FROM temp;
