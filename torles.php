<?php

function iskolaiorarend_csatlakozas() {
	
	$conn = mysqli_connect("localhost", "root", "") or die("Csatlakozási hiba");
	if ( false == mysqli_select_db($conn, "iskolaiorarend" )  ) {
		
		return null;
	}
	
	// a karakterek helyes megjelenítése miatt be kell állítani a karakterkódolást!
	mysqli_query($conn, 'SET NAMES UTF-8');
	mysqli_query($conn, 'SET character_set_results=utf8');
	mysqli_set_charset($conn, 'utf-8');
	
	return $conn;
	
}

function osztaly_torles($nev) {
	
	
	if ( !($conn = iskolaiorarend_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"DELETE FROM osztaly WHERE osztaly_id = '$nev' ");
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "s", $nev);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
	
}

$v_onev = $_POST['osztaly_nev'];

if ( isset($v_onev)) {

	// beszúrjuk az új rekordot az adatbázisba
	osztaly_torles($v_onev);
	
	// visszatérünk az index.php-re
	header("Location: index.html");

} else {
	error_log("Nincs beállítva valamely érték");
	
}

function tantargy_torles($nev) {
	
	
	if ( !($conn = iskolaiorarend_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"DELETE FROM tantargy WHERE nev = '$nev' ");
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "s", $nev);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
	
}

$v_nev = $_POST['nev'];

if ( isset($v_nev)) {

	// beszúrjuk az új rekordot az adatbázisba
	tantargy_torles($v_nev);
	
	// visszatérünk az index.php-re
	header("Location: index.html");

} else {
	error_log("Nincs beállítva valamely érték");
	
}

?>