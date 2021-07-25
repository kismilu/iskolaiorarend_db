
<?php
	
	echo'<br> <form method="get" action="index.html"> <button type="submit"> Vissza</button> </form>';
	
    // csatlakozás az adatbázishoz 
    $conn = mysqli_connect('localhost', 'root','') or die("Hibás csatlakozás!");


    // a karakterek helyes megjelenítése miatt be kell állítani a karakterkódolást! 
    mysqli_query($conn, 'SET NAMES UTF-8'); 
    mysqli_query($conn, "SET character_set_results=utf8"); 
    mysqli_set_charset($conn, 'utf-8'); 
          
    if ( mysqli_select_db($conn, 'iskolaiorarend') ) {    // ha sikeres az adatbázis kiválasztása     
		 
        $sqla = "SELECT * FROM tantargy";
        $res = mysqli_query($conn, $sqla) or die ('Hibás utasítás!');
		
		echo '<h2> Tantárgy tábla</h2>';
		
        echo '<table border=1 style="margin-left:7%; margin-top:2%; width:35%;">'; 
        echo '<tr>'; 
        echo '<th style="text-align:center; ">nev</th>';
        echo '<th style="text-align:center; ">targy_id</th>';
        echo '<th style="text-align:center; ">heti_oraszam</th>';		
        echo '</tr>'; 
         
        // a táblázat sorai 
        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {    // most asszociatív tömbként kezeljük a sorokat 
            echo '<tr>'; 
            echo '<td style="text-align:center; ">' . $current_row["nev"] . '</td>';
            echo '<td style="text-align:center; ">' . $current_row["tantargy_id"] . '</td>';
            echo '<td style="text-align:center; ">' . $current_row["heti_oraszam"] . '</td>';
            echo '</tr>'; 
        } 
        echo '</table>'; 

		$sqla = "SELECT * FROM osztaly";
        $res = mysqli_query($conn, $sqla) or die ('Hibás utasítás!');
		
		echo '<h2> Osztály tábla</h2>';
		
        echo '<table border=1 style="margin-left:7%; margin-top:2%; width:35%;">'; 
        echo '<tr>'; 
        echo '<th style="text-align:center; ">osztaly_id</th>';
        echo '<th style="text-align:center; ">letszam</th>';
        echo '<th style="text-align:center; ">ped_id</th>';		
        echo '</tr>'; 
         
        // a táblázat sorai 
        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {    // most asszociatív tömbként kezeljük a sorokat 
            echo '<tr>'; 
            echo '<td style="text-align:center; ">' . $current_row["osztaly_id"] . '</td>';
            echo '<td style="text-align:center; ">' . $current_row["letszam"] . '</td>';
            echo '<td style="text-align:center; ">' . $current_row["ped_id"] . '</td>';
            echo '</tr>'; 
        } 
        echo '</table>';
		
mysqli_free_result($res);    // felszabadítjuk a lefoglalt memóriát 
    } else {                                    // nem sikerült csatlakozni az adatbázishoz 
        die('Nem sikerült csatlakozni az adatbázishoz.'); 
    } 
 
    mysqli_close($conn); // lezárjuk az adatbázis-kapcsolatot
	
	echo'<br> <form method="get" action="index.html"> <button type="submit"> Vissza</button> </form>';
?>





