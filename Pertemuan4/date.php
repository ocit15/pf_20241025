<?php 
    //date
    //menampilkan anggal dengan format tertentu
    //echo date ("l, d-M-Y");

    //time
    //echo time();
    //echo date ("l d M Y", time ()-60*60*24*1000716);

    //mktime
    // echo mktime(0,0,0,8,28,2002);
    // echo date("l d M Y",  mktime(0,0,0,8,28,2002));

    //strtotime
    $date = strtotime("28 jul 2002");
    echo date ("l d M Y", strtotime("now"));
?>