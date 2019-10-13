/*
USE classicmodels;

Question 1 i:
*/

SELECT customers.customerNumber, SUM(orderdetails.quantityOrdered) FROM customers
LEFT JOIN orders ON customers.customerNumber = orders.customerNumber
LEFT JOIN orderdetails ON orderdetails.orderNumber = orders.orderNumber
GROUP BY customers.customerNumber;

/*
Question 1 ii:
*/

SELECT customers.customerNumber FROM customers
LEFT JOIN orders ON customers.customerNumber = orders.customerNumber
WHERE orders.orderNumber IS NULL;

/*
Question 1 iii:
*/
