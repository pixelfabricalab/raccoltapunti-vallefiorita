<?php

function ocrFile($imagefile) {
  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://89.148.181.23:9090/analizza',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('image'=> new CURLFILE($imagefile),'modo' => '3','engine' => '3'),
));

$response = curl_exec($curl);

curl_close($curl);
  return $response;
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["formFileLg"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["formFileLg"]["tmp_name"]);
  if($check !== false) {
    echo "Il file caricato è un'immagine. - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "Il file non è un'immagine.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Il file esiste.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["formFileLg"]["size"] > 500000) {
  echo "Ops. Sembra che il tuo file sia troppo grande.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Attenzione! Sono permessi solo file di tipo: JPG, PNG, GIF.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Il tuo file non è stato caricato.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["formFileLg"]["tmp_name"], $target_file)) {
    //echo "Il file ". htmlspecialchars(basename( $_FILES["formFileLg"]["name"])). " è stato caricato.";
    header("Location: ./file-caricato-con-successo.php");
  } else {
    echo "Non è stato possibile caricare il tuo file.";
  }
}
?>