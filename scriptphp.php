<?php
echo $action = $_REQUEST['action'];

parse_str($_REQUEST['dataku'], $hasil);  
echo "Nama Lengkap: ".$hasil['namalengkap']."<br/>";
echo "First Name: ".$hasil['namadepan']."<br/>";
echo "Last Name: ".$hasil['namabelakang']."<br/>";
echo "Username: ".$hasil['username']."<br/>";

//$hasil = $_REQUEST;

$gambarku = $_FILES["fotoku"];	

$username = trim($hasil['username']);
if (!empty($gambarku["name"]) and !empty($username)){
	$namafile = $gambarku["name"];		//nama filenya
	preg_match("/([^\.]+$)/", $namafile, $ext);		//Regex: mencari string sesudah titik terakhir, saved in array ext
	$file_ext = strtolower($ext[1]);
	$namafilebaru = $hasil['username'].".".$ext[1];	//nama file barunya [ccnumber].png
    $file = $gambarku["tmp_name"];						//source filenya 
    //perform the upload operation
	$extensions= array("jpeg","jpg","png");				//extensi file yang diijinkan
	//Kirim pesan error jika extensi file yang diunggah tidak termasuk dalam extensions
	$errors = array();
	if(in_array($file_ext,$extensions) === false)
	 $errors[] = "Extensi yang diperbolehkan jpeg atau png.";
	
	//Kirim pesan error jika ukuran file > 500kB
	$file_size = $gambarku['size'];
	if($file_size > 2097152)
	 $errors[] = "Ukuran file harus lebih kecil dari 2MB.";
    
	//Upload file
	if(empty($errors)){
		if(move_uploaded_file($file, "uploads/" . $namafilebaru))
			echo "Uploaded dengan nama $namafilebaru";
	}
}else echo $errors[] = "Lengkapi username dan gambarnya. ";
echo "<br/>";

if(!empty($errors)){
	echo "Error : ";
	foreach ($errors as $val)
		echo $val;
}

/* SQL: select, update, delete */
if(empty($errors)){
	if($action == 'create')
		$syntaxsql = "insert into tabel_daftar values (null,'$hasil[namalengkap]','$hasil[namadepan]', '$hasil[namabelakang]', '$hasil[paymentMethod]',
		'$hasil[username]', '$hasil[email]', '$hasil[kotaasal]', '$hasil[address]', '$hasil[tanggallahir]', '$hasil[jenistempat]', '$hasil[jurusan]',
		'$hasil[angkatan]',now(), '$namafilebaru')";
	elseif($action == 'update')
		$syntaxsql = "update tabel_daftar set Nama_Lengkap = '$hasil[namalengkap]', Nama_Depan = '$hasil[namadepan]', Nama_Belakang = '$hasil[namabelakang]',
		Jenis_Kelamin = '$hasil[paymentMethod]', Username = '$hasil[username]', Email = '$hasil[email]', Kota_Asal = '$hasil[kotaasal]',
		Alamat = '$hasil[address]', tanggal_lahir = '$hasil[tanggallahir]', Jenis_tempat_tinggal = '$hasil[jenistempat]', jurusan = '$hasil[jurusan]', tahun_angkatan = '$hasil[angkatan]', foto = '$namafilebaru' where username = '$hasil[username]'";
	elseif($action == 'delete')
		$syntaxsql = "delete from tabel_daftar where username = '$hasil[username]'";
	elseif($action == 'read')
		$syntaxsql = "select * from tabel_daftar";
	
//eksekusi syntaxsql 
	$conn = new mysqli("localhost","root","23september","pendaftaran"); //dbhost, dbuser, dbpass, dbname
	if ($conn->connect_errno) {
	  echo "Failed to connect to MySQL: " . $conn -> connect_error;
	  exit();
	}else{
		echo "Database connected. ";
	}
//create, update, delete query($syntaxsql) -> true false
	if ($conn->query($syntaxsql) === TRUE) {
		echo "Query $action with syntax $syntaxsql suceeded !";
	}
	elseif ($conn->query($syntaxsql) === FALSE){
		echo "Error: $syntaxsql" .$conn->error;
	}
//khusus read query($syntaxsql) -> semua associated array
	else{
		$result = $conn->query($syntaxsql); //bukan true false tapi data array asossiasi
		if($result->num_rows > 0){
			echo "<table id='tresult' class='table table-striped table-bordered'>";
			echo "<thead><th>Nama_Lengkap</th><th>Nama_Depan</th><th>Nama_Belakang</th><th>Jenis_Kelamin</th><th>Username</th><th>Email</th><th>Kota_Asal</th> 
			<th>Alamat</th><th>tanggal_lahir</th><th>Jenis_tempat_tinggal</th><th>jurusan</th><th>tahun_angkatan</th><th>foto</th></thead>";
			echo "<tbody>";
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row['Nama_Lengkap']."</td><td>". $row['Nama_Depan']."</td><td>". $row['Nama_Belakang']."</td><td>". $row['Jenis_Kelamin']."</td>
				<td>". $row['Username']."</td><td>". $row['Email']."</td><td>". $row['Kota_Asal']."</td><td>". $row['Alamat']."</td>
				<td>". $row['tanggal_lahir']."</td><td>". $row['Jenis_tempat_tinggal']."</td><td>". $row['jurusan']."</td><td>". $row['tahun_angkatan']."</td><td>". $row['foto']."</td></tr>";
			}
			echo "</tbody>";
			echo "</table>";
		}
	}
	$conn->close();
}
?>