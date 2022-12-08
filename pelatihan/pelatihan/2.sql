-- SUBQUERY --
SELECT 
	productCode,
    AVG(quantityOrdered) AS avg_qty
FROM belajar.orderdetails
GROUP BY productCode
HAVING 	avg_qty > (SELECT AVG (quantityOrdered) FROM belajar.orderdetails);

-- membuat taberl total product orders
CREATE TABLE belajar.product_total (
	productCode VARCHAR (32),
    productName VARCHAR (50),
    total FLOAT
);
-- JOIN 
SELECT 
	A.productCode,
    B.productName,
    SUM(A.quantityOrdered * A.priceEach) AS total
FROM belajar.orderdetails A
JOIN belajar.products B
ON A.productCode = B.productCode
GROUP BY A.productCode
ORDER BY total DESC;

-- Memasukka data pada tabel menggubnakan subquery 
INSERT INTO belajar.product_total
	SELECT 
	A.productCode,
    B.productName,
    SUM(A.quantityOrdered * A.priceEach) AS total
	FROM belajar.orderdetails A
	JOIN belajar.products B
	ON A.productCode = B.productCode
	GROUP BY A.productCode
	ORDER BY total DESC;
    
-- Menamplkan data pada tabel 
SELECT * FROM belajar.product_total;

-- Membuat view table
CREATE VIEW belajar.summary_product_total AS
	SELECT 
	A.productCode,
    B.productName,
    SUM(A.quantityOrdered * A.priceEach) AS total
	FROM belajar.orderdetails A
	JOIN belajar.products B
	ON A.productCode = B.productCode
	GROUP BY A.productCode
	ORDER BY total DESC;
    
-- Menampilkan data pada view table
SELECT * FROM belajar.summary_product_total;

-- Melakukan perintaj subquery pada perinah from
SELECT 
	A.productCode,
    B.productName,
    SUM(A.quantityOrdered * A.priceEach) AS total
	FROM (SELECT * FROM (SELECT * FROM belajar.orderdetails)AA) A
	JOIN belajar.products B
	ON A.productCode = B.productCode
	GROUP BY A.productCode
	ORDER BY total DESC;
    
-- tampilkan cus
SELECT 
	A.customerNumber,
    B.customerName,
    AVG(A.amount) AS avg_amount
FROM belajar.payments A
Join belajar.customers B
ON A.customerNumber = B.customerNumber
GROUP BY customerNumber
HAVING 	avg_amount > (SELECT AVG (amount) FROM belajar.payments)
ORDER BY avg_amount DESC;

CREATE VIEW belajar.summary_avg_amount AS
	SELECT 
	A.customerNumber,
    B.customerName,
    AVG(A.amount) AS avg_amount
	FROM belajar.payments A
	Join belajar.customers B
	ON A.customerNumber = B.customerNumber
	GROUP BY customerNumber
	HAVING 	avg_amount > (SELECT AVG (amount) FROM belajar.payments)
	ORDER BY avg_amount DESC;
SELECT * FROM  belajar.summary_avg_amount;

-- Menambhakna kolom pada table
ALTER TABLE belajar.customers
ADD customer_level VARCHAR (32);



SELECT 
	customerNumber
FROM belajar.payments
GROUP BY customerNumber
HAVING AVG(amount) > 32431.64;

SELECT AVG (amount) FROM belajar.payments;

SELECT 
	customerName,
    phone,
    customer_level
FROM belajar.customers;

-- MELAKUKAN SUBQUERY MENGGUNKAN UPDATE
SET SQL_SAFE_UPDATES = 0;
UPDATE belajar.customers SET
	customer_level = "High Level Customer"
WHERE customerNumber IN (
	SELECT 
		customerNumber
	FROM belajar.payments
	GROUP BY customerNumber
	HAVING AVG(amount) > 32431.64
);

UPDATE belajar.customers SET
	customer_level = "Low Level Customer"
WHERE customerNumber IN (
	SELECT 
		customerNumber
	FROM belajar.payments
	GROUP BY customerNumber
	HAVING AVG(amount) < 32431.64
);

UPDATE belajar.customers SET
	customer_level = "Mid Level Customer"
WHERE customer_level IS NULL;

-- Membuat tabel backup
CREATE TABLE belajar.customer_backup (
	customerNumber INT,
    customerName TEXT,
	phone TEXT,
    addressLine1 TEXT,
    creditLimit FLOAT
);

-- Memasukkan data pada tabel backup 
INSERT INTO belajar.customer_backup 
SELECT
	customerNumber,
    customerName,
	phone,
    addressLine1,
    creditLimit
FROM belajar.customers;

-- Melakukan delete pada subquery
DELETE FROM belajar.customer_backup
WHERE customerNumber IN (
	SELECT 
		customerNumber
	FROM belajar.payments
	GROUP BY customerNumber
    HAVING 	AVG(amount) > (SELECT AVG (amount) FROM belajar.payments)
);

SELECT * FROM belajar.customer_backup;




-- Chalenge
-- buat kolom product_level pada tabel product 
-- hitung rata-rata keseluruhan AVG(quantityOrdered)
-- pada tabel orderdetails
-- lakukan update pada kolom product_level, berdasarkan level 
-- < avg_qty ==> low level 
-- > avg_qty ==> high level 


ALTER TABLE belajar.productS
ADD product_level VARCHAR (50);

SELECT AVG(quantityOrdered) FROM belajar.orderdetails;

SET SQL_SAFE_UPDATES = 0;
UPDATE belajar.products SET
	product_level = "High Level Product"
WHERE productCode IN (
	SELECT 
		productCode
	FROM belajar.orderdetails
    GROUP BY productCode
    HAVING AVG(quantityOrdered) > (SELECT AVG(quantityOrdered) FROM belajar.orderdetails)
);

UPDATE belajar.products SET
	product_level = "Low Level Product"
WHERE productCode IN (
	SELECT 
		productCode
	FROM belajar.orderdetails
    GROUP BY productCode
    HAVING AVG(quantityOrdered) < (SELECT AVG(quantityOrdered) FROM belajar.orderdetails)
);


SELECT 
	productCode,
	product_level
FROM belajar.products;



