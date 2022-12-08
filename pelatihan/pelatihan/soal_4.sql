SELECT AVG(Sales) FROM toko.pesanan;

SELECT 
    Category,
    SUM(Sales) AS total 
FROM toko.pesanan
GROUP BY Category
HAVING total > (SELECT AVG(Sales) FROM toko.pesanan);


