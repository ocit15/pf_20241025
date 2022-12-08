-- Perintah untuk membuat database --
CREATE DATABASE ocit; 

-- Pernt5ah untuk membuat tabel --
CREATE TABLE ocit.customers (
	id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR (16) NOT NULL,
    last_name VARCHAR (16) NOT NULL,
    email VARCHAR (32) UNIQUE NOT NULL,
    birth_fate DATE,
    balance FLOAT DEFAULT 0.0
);

-- Memasukkan data ke dalam table (sesuai urutan table)  --
INSERT INTO ocit.customers VALUES (
	NULL,
    "Pame",
    "Bokev",
    "pamebokev@gmail.com",
    "1990-07-15",
    100.000
);
INSERT INTO ocit.customers VALUES (
	NULL,
    "oyik",
    "Bokev",
    "oyikbokev@gmail.com",
    "1991-04-25",
    100.000
);

-- Menampilkan data pada table --
SELECT * FROM ocit.customers;

-- Memperbaharui data --
UPDATE ocit.customers SET 
	email = "pameebkev@gmail.com"
WHERE id = 1;
        


-- Mengahapus data 
DELETE FROM ocit.customers WHERE ID = 2;

-- Menambahkan kolom pada tabel
ALTER TABLE ocit.customers ADD username TEXT NOT NULL;

DESCRIBE ocit.customers;

-- Mengubah nama kolom
ALTER TABLE ocit.customers
CHANGE birth_fate birth_date DATE;

-- Menghapus kolom pada tabel
ALTER TABLE ocit.customers
DROP COLUMN username;

-- Menampilkan data pada tabel (seluruh kolom)
SELECT * FROM ocit.customers;

-- Menampilkan data pada kolom tertentu 
SELECT 
	productCode,
    quantityOrdered,
    priceEach
FROM belajar.orderdetails;

-- Menarik data dengan jumlah data ternteu
SELECT 
	productCode,
    quantityOrdered,
    priceEach
FROM belajar.orderdetails
LIMIT 20;

-- Membuat alias pada kolom 
SELECT 
	productCode AS "kode produk",
    quantityOrdered AS jumlah,
    priceEach AS "harga satuan"
FROM belajar.orderdetails;

-- Sorting pada kolom (MENURUN)
SELECT 
	productCode AS "kode produk",
    quantityOrdered AS jumlah,
    priceEach AS "harga satuan"
FROM belajar.orderdetails
ORDER BY quantityOrdered DESC;

-- Sorting pada kolom (Menaik)
SELECT 
	productCode AS "kode produk",
    quantityOrdered AS jumlah,
    priceEach AS "harga satuan"
FROM belajar.orderdetails
ORDER BY quantityOrdered ASC;

-- Filtering pada kolom  angka
SELECT 
	productCode AS "kode produk",
    quantityOrdered AS jumlah,
    priceEach AS "harga satuan"
FROM belajar.orderdetails
WHERE quantityOrdered >50;

-- Filtering pada kolom  karakter
SELECT 
	productCode AS "kode produk",
    quantityOrdered AS jumlah,
    priceEach AS "harga satuan"
FROM belajar.orderdetails
WHERE productCode LIKE "S10_%";

-- Operasi antar kolom 
SELECT 
	productCode AS "kode produk",
    quantityOrdered AS jumlah,
    priceEach AS "harga satuan",
	(quantityOrdered * priceEach) AS total
FROM belajar.orderdetails;

-- Melakukan operasi filtering pada kolom operasi
SELECT 
	productCode AS "kode produk",
    quantityOrdered AS jumlah,
    priceEach AS "harga satuan",
    (quantityOrdered * priceEach) AS total
FROM belajar.orderdetails
HAVING total > 4000;

-- Melakukan agregasi 
SELECT
	SUM(quantityOrdered) AS "total jumlah",
    AVG(quantityOrdered) AS "rata-rata jumlah",
    MIN(quantityOrdered) AS "pembelian terkecil",
    MAX(quantityOrdered) AS "pembelian terbesar",
    SUM(quantityOrdered * priceEach) AS "total revenue"
FROM belajar.orderdetails;

-- Merlakukan grouping 
SELECT 
	productCode AS "kode produk",
    SUM(quantityOrdered * priceEach) AS total
FROM belajar.orderdetails
GROUP BY productCode
ORDER BY productCode DESC;

-- Tampilkan top 10 proudct code dengan total trerbesar
SELECT 
	productCode AS "kode produk",
    SUM(quantityOrdered * priceEach) AS total
FROM belajar.orderdetails
GROUP BY productCode
ORDER BY productCode DESC;
LIMIT 10;

-- MENGGUNAKAN FUNGSI
SELECT 
	paymentDate,
    YEAR(paymentDate),
    MONTH(paymentDate),
    DATE_FORMAT(paymentDate, "%d/%m/%Y"),
    amount
FROM belajar.payments;

-- menghitung total transaksi berdasarkan tahun
SELECT
    YEAR(paymentDate) AS tahun,
    SUM(amount) AS total 
FROM belajar.payments
GROUP BY tahun; 

-- Melakukan join pada tabel 
SELECT 
	A.productCode AS "kode produk",
    B.productName AS "nama produk",
    SUM(A.quantityOrdered * A.priceEach) AS total
FROM belajar.orderdetails A
INNER JOIN belajar.products B
ON A.productCode =  B.productCode
GROUP BY A.productCode
ORDER BY total DESC
LIMIT 10;

SELECT * FROM belajar.payments;

SELECT 
	A.customerName AS "nama",
    B.customerNumber AS "nomor",
    SUM(B.amount) AS total
FROM belajar.customers A
INNER JOIN belajar.payments B
ON A.customerNumber =  B.customerNumber
GROUP BY A.customerNumber
ORDER BY total DESC
LIMIT 10;

