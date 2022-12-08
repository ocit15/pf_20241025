UPDATE toko.pesanan SET 
	category = "Barang Furniture"
WHERE category = 'furniture';

SELECT category FROM toko.pesanan
WHERE Category = "Barang Furniture";

DELETE FROM toko.pesanan WHERE Sales < 10;
SELECT Sales FROM toko.pesanan;