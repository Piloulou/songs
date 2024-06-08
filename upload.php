<?php
$target_dir = "../upload/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Vérifier les types de fichiers autorisés
if($fileType != "zip" && $fileType != "rar") {
    echo "Désolé, seuls les fichiers ZIP et RAR sont autorisés.";
    $uploadOk = 0;
}

// Vérifier la taille du fichier
if ($_FILES["file"]["size"] > 5000000) { // 5 Mo maximum
    echo "Désolé, votre fichier est trop volumineux.";
    $uploadOk = 0;
}

// Vérifier si le fichier existe déjà
if (file_exists($target_file)) {
    echo "Désolé, le fichier existe déjà.";
    $uploadOk = 0;
}

// Vérifier si $uploadOk est défini à 0 par une erreur
if ($uploadOk == 0) {
    echo "Désolé, votre fichier n'a pas été uploadé.";
// si tout est ok, essayer d'uploader le fichier
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "Le fichier ". htmlspecialchars( basename( $_FILES["file"]["name"])). " a été uploadé.";
    } else {
        echo "Désolé, une erreur est survenue lors de l'upload de votre fichier.";
    }
}
?>
