<?php
$file = $_FILES['fileToUpload'];
$fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
$newFileName = date('Y_m_d_H_i_s') . '.' . $fileExt;

$destinationFolder = 'uploads/';
if (in_array($fileExt, ['png', 'jpg', 'jpeg', 'gif'])) {
    $destinationFolder .= 'image/';
} elseif (in_array($fileExt, ['mp4', 'avi', 'mov'])) {
    $destinationFolder .= 'video/';
} elseif (in_array($fileExt, ['docx', 'pdf', 'xls', 'xlsx'])) {
    $destinationFolder .= 'documents/';
} elseif (in_array($fileExt, ['mp3', 'wav'])) {
    $destinationFolder .= 'audio/';
} elseif (in_array($fileExt, ['ttf', 'otf'])) {
    $destinationFolder .= 'fonts/';
}

move_uploaded_file($file['tmp_name'], $destinationFolder . $newFileName);

echo "Загрузка успешна";
