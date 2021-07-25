<?php
    
    $conn = mysqli_connect('localhost', 'root','') or die("Hibás csatlakozás!");
	
    mysqli_query($conn, 'SET NAMES UTF-8'); 
    mysqli_query($conn, "SET character_set_results=utf8"); 
    mysqli_set_charset($conn, 'utf-8'); 
          
    if ( mysqli_select_db($conn, 'iskolaiorarend') ) {      
         
		//Név
		echo '<p style="text-align: right; margin-right: 3%"> <b> Száva Mihály Demeter <br> Órarend adatbázis lekérdezései <br> 2018. november </b></p>';


		echo '<h2>1. lekérdezés</h2>'; //1. lekérdezés
		echo '<b> Adjuk meg az órarendben szereplő matematika órák számát allekérdezés használatával, ahol az órák számát "db"-nak nevezzük el: </b>';
		echo '<p style="margin-left:3%;"> Megoldásban az alábbi sql kódot használtam:</p>';
	
		//a matematika szót dupla aposztrófba írtam mert az echo lezártnak vette az első apsztróf előtti részt és hibát dobott, de lekérdezésben a megfelelő aposztrófot írtam.
		echo '<p style="margin-left:3%;"> SELECT COUNT(tantargy_id) AS db FROM orarend WHERE tantargy_id = (SELECT tantargy_id FROM tantargy WHERE nev = "matematika") </p>  '; 
		 
        $sql = "SELECT COUNT(tantargy_id) AS db FROM orarend WHERE tantargy_id = (SELECT tantargy_id FROM tantargy WHERE nev = 'matematika')"; 
	
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!'); 
		
		
        echo '<table border=1 style="margin-left:10%; margin-top:2%; width:3%;">'; 
        echo '<tr>';             
        echo '<th style="text-align:center; ">db</th>';   
        echo '</tr>'; 
         
        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {   
            echo '<tr>'; 
            echo '<td style="text-align:center; ">' . $current_row["db"] . '</td>'; 
            echo '</tr>'; 
        } 
        echo '</table>'; 
		
		//PIROS VONAL
		echo '<br><table style="border-bottom: 1px solid red; width:80%;"> </table>';
		
		echo '<h2>2. lekérdezés</h2>'; //2. lekérdezés
		echo '<b> Listázzuk ki az első napon tanított osztályok osztályfőnökeit. Eredménytáblában tüntessük fel az osztályfőnökök nevét 1x, és azok id-jét id szerint növekvő sorrendben. </b>';
		echo '<p style="margin-left:3%;"> Megoldásban az alábbi sql kódot használtam:</p>';
		echo '<p style="margin-left:3%; margin-right:10%;"> SELECT pedagogus.ped_nev, pedagogus.ped_id FROM pedagogus,osztaly,orarend
				WHERE osztaly.ped_id = pedagogus.ped_id AND orarend.osztaly_id = osztaly.osztaly_id AND orarend.nap = 1 GROUP BY ped_nev ORDER BY ped_id ASC </p>  ';
				
		$sql = "SELECT pedagogus.ped_nev, pedagogus.ped_id FROM pedagogus,osztaly,orarend
				WHERE osztaly.ped_id = pedagogus.ped_id AND orarend.osztaly_id = osztaly.osztaly_id AND orarend.nap = 1 GROUP BY ped_nev ORDER BY ped_id ASC"; 
	
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!'); 
		
		
        echo '<table border=1 style="margin-left:10%; margin-top:2%; width:15%;">'; 
        echo '<tr>';           
        echo '<th style="text-align:center; ">ped_nev</th>'; 
        echo '<th style="text-align:center; ">ped_id</th>'; 
        echo '</tr>'; 
         
        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {    
            echo '<tr>'; 
            echo '<td style="text-align:center; ">' . $current_row["ped_nev"] . '</td>'; 
			echo '<td style="text-align:center; ">' . $current_row["ped_id"] . '</td>';
            echo '</tr>'; 
        } 
        echo '</table>'; 
		
		//PIROS VONAL
		echo '<br><table style="border-bottom: 1px solid red; width:80%;"> </table>';
	
		echo '<h2>3. lekérdezés</h2>'; //3. lekérdezés
		echo '<b> Adjuk meg, hogy hány üres hely maradt 1. nap 1. órákon, és mi volt a tantárgyak neve, üres helyek szerint csökkenő sorrendben. </b>';
		echo '<p style="margin-left:3%;"> Megoldásban az alábbi sql kódot használtam:</p>';
		echo '<p style="margin-left:3%; margin-right:10%;"> SELECT  tantargy.nev AS "tantargy neve", termek.ferohely-osztaly.letszam AS "ures hely" FROM 
		tantargy,termek,osztaly,orarend WHERE orarend.terem_id = termek.terem_id 
		AND orarend.nap=1 AND orarend.osztaly_id=osztaly.osztaly_id AND orarend.hanyadik_ora=1 AND orarend.tantargy_id=tantargy.tantargy_id </p>  ';
				
		$sql = "SELECT  tantargy.nev AS 'tantargy neve', termek.ferohely-osztaly.letszam AS 'ures hely' FROM tantargy,termek,osztaly,orarend WHERE orarend.terem_id 
		= termek.terem_id AND orarend.nap=1 AND orarend.osztaly_id=osztaly.osztaly_id AND orarend.hanyadik_ora=1 AND orarend.tantargy_id=tantargy.tantargy_id 
		ORDER BY termek.ferohely-osztaly.letszam DESC "; 
	
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');  
		
		
          
       
        echo '<table border=1 style="margin-left:10%; margin-top:2%; width:15%;">'; 
        echo '<tr>';       
        echo '<th style="text-align:center; ">tantargy neve</th>'; 
        echo '<th style="text-align:center; ">ures hely</th>'; 
        echo '</tr>'; 
         
        
        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {  
            echo '<tr>'; 
            echo '<td style="text-align:center; ">' . $current_row["tantargy neve"] . '</td>'; 
			echo '<td style="text-align:center; ">' . $current_row["ures hely"] . '</td>';
            echo '</tr>'; 
        } 
        echo '</table>'; 
		
		//PIROS VONAL
		echo '<br><table style="border-bottom: 1px solid red; width:80%;"> </table>';
		
        mysqli_free_result($res);    
    } else {                                    
        die('Nem sikerült csatlakozni az adatbázishoz.'); 
    } 
 
    mysqli_close($conn); 
	
	echo'<br> <form method="get" action="index.html"> <button type="submit"> Vissza</button> </form>';
 
?>