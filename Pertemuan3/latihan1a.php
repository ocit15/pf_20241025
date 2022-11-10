<!DOCTYPE html>
<html lang="en">
<head>
    <title>Latihan1a</title>
    <style>
        .warna_baris {
            background-color: silver;
        }
    </style>
</head>
<body>
    <!-- <table border="1" cellpadding="10" cellspacing="0">
        <?php 
            for($i = 1; $i <= 3; $i++) {
                echo "<tr>";
                for ($j = 1; $j <= 3; $j++) {
                    echo "<td>$i,$j</td>";
                }
                echo "</tr>";
            }
         ?>
    </table> -->
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <?php for($i = 1; $i <=3; $i++) :?>
            <tr>
                <?php for($j=1; $j<=3; $j++) :?>
                    <td><?= "$i,$j"; ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
    <br>

    <table border="1" cellpadding="10" cellspacing="0">
      <?php for($i = 1; $i <=3; $i++) :?>
        <?php if($i % 2 == 1) :?>
            <tr class="warna_baris">
        <?php else : ?>
            <tr>
        <?php  ?>
            </tr>

            </tr>
    </table>
    
    
</body>
</html>