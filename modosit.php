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

function tantargynev_modosit($nev, $modosit) {
	
	
	if ( !($conn = iskolaiorarend_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"UPDATE tantargy SET nev = '$modosit' WHERE nev = '$nev'");
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "ss", $nev, $modosit );
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
	
}

$v_nev = $_POST['nev'];
$v_modosit = $_POST['modosit'];
if ( isset($v_nev) && isset($v_modosit) ) {

	tantargynev_modosit($v_nev, $v_modosit);
	
	header("Location: index.html");

} else {
	error_log("Nincs beállítva valamely érték");
	
}
function tantargyid_modosit($id, $modositid) {
	
	
	if ( !($conn = iskolaiorarend_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"UPDATE tantargy SET tantargy_id = '$modositid' WHERE tantargy_id = '$id'");
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "ss", $id, $modositid );
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
	
}

$v_id = $_POST['id'];
$v_modositid = $_POST['modositid'];
if ( isset($v_id) && isset($v_modositid) ) {

	tantargyid_modosit($v_id, $v_modositid);
	
	header("Location: index.html");

} else {
	error_log("Nincs beállítva valamely érték");
	
}

function osztalyletszam_modosit($id, $letszam) {
	
	
	if ( !($conn = iskolaiorarend_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"UPDATE osztaly SET letszam = $letszam WHERE osztaly_id = $id");
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "dd", $letszam, $id );
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
	
}

$v_id = $_POST['idl'];
$v_letszam = $_POST['letszam'];
if ( isset($v_id) && isset($v_letszam) ) {

	osztalyletszam_modosit($v_id, $v_letszam);
	
	
	header("Location: index.html");

} else {
	error_log("Nincs beállítva valamely érték");
	
}

function osztalyid_modosit($id, $modid) {
	
	
	if ( !($conn = iskolaiorarend_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"UPDATE osztaly SET osztaly_id = '$modid' WHERE osztaly_id = $id");
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "ss", $modid, $id );
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
	
}

$v_id = $_POST['idoszt'];
$v_modid = $_POST['modositidoszt'];
if ( isset($v_id) && isset($v_modid )) {

	osztalyid_modosit($v_id, $v_modid);
	
	
	header("Location: index.html");

} else {
	error_log("Nincs beállítva valamely érték");
	
}

