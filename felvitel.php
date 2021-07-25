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

function tantargy_beszur($nev, $tantargy_id, $heti_oraszam) {
	
	
	if ( !($conn = iskolaiorarend_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"INSERT INTO tantargy(nev,tantargy_id, heti_oraszam) VALUES (?, ?, ?)");
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "ssd", $nev, $tantargy_id, $heti_oraszam );
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
	
}
// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$v_nev = $_POST['nev'];
$v_id = $_POST['tantargy_id'];
$v_oraszam = $_POST['heti_oraszam'];

if ( isset($v_nev) && isset($v_id) && 
     isset($v_oraszam) ) {

	// beszúrjuk az új rekordot az adatbázisba
	tantargy_beszur($v_nev, $v_id, $v_oraszam);
	
	// visszatérünk az index.php-re
	header("Location: index.html");

} else {
	error_log("Nincs beállítva valamely érték");
	
}

function osztalyok_beszur($osztaly_id, $letszam, $ped_id, $ped_nev, $lakcim) {
	
	
	if ( !($conn = iskolaiorarend_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"INSERT INTO osztaly(osztaly_id,letszam, ped_id) VALUES (?, ?, ?)");
	$stmt2 = mysqli_prepare( $conn,"INSERT INTO pedagogus(ped_nev,ped_id, lakcim) VALUES (?, ?, ?)");
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "sdd", $osztaly_id, $letszam, $ped_id );
	mysqli_stmt_bind_param($stmt2, "sds", $ped_nev, $ped_id, $lakcim );
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt);
	$sikeres2 = mysqli_stmt_execute($stmt2);
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres2;
	
}
// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$v_osztaly_id = $_POST['osztaly_id'];
$v_letszam = $_POST['letszam'];
$v_ped_id = $_POST['ped_id'];
$v_ped_nev = $_POST['ped_nev'];
$v_lakcim = $_POST['lakcim'];

if ( isset($v_osztaly_id) && isset($v_ped_id) && 
     isset($v_letszam) && isset($v_ped_nev ) && isset($v_lakcim )) {

	// beszúrjuk az új rekordot az adatbázisba
	osztalyok_beszur($v_osztaly_id, $v_letszam, $v_ped_id, $v_ped_nev, $v_lakcim);
	
	// visszatérünk az index.php-re
	header("Location: index.html");

} else {
	error_log("Nincs beállítva valamely érték");
	
}

?>

