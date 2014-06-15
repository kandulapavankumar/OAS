<?php
include 'global-const.php';
function uploadFile($file, $path, $allowedExts, $columns){
    $result = array();
    $result['success'] = false;
    if(isset($file)){
        $temp = explode(".", $file["name"]);
        $extension = end($temp);
        $fileNewName = substr($file["name"], 0, strrpos( $file["name"], '.') ).'-'.date('dmyHis').'-'.uniqid().'.'.$extension;
        if ((in_array($extension, $allowedExts))) {
            move_uploaded_file($file["tmp_name"], $path . $fileNewName);
            if(in_array('csv', $allowedExts)){
                $status = verifyFile($fileNewName, $path, $columns);
                if(!$status['success']){
                    $result['errors'] = $status['data']['errors'];
                } else {
                    $result['success'] = true;
                    $result['file_name'] = $fileNewName;
                }
            } else {
                $result['success'] = true;
                $result['file_name'] = $fileNewName;
            }
        } else {
            $result['errors'] = 'Invalid extension';
        }
    } else {
        $result['errors'] = 'Invalid file';
    }

    return $result;
}

function verifyFile($file, $path, $columns){
    $errors = array();

    $handle = fopen($path.'/'.$file, "r");

    if ($handle !== FALSE) {
        $i = 1;
        while (($lineArray = fgetcsv($handle, ',')) !== FALSE) {

            if(isset($lineArray)){

                for($j = 0; $j<$columns; $j++){
                    if(isset($lineArray[$j]) && ($lineArray[$j] == NULL || $lineArray[$j] == '')){
                        array_push($errors, array('row_id' => $i, 'col_id' => $j + 1));
                    } elseif (!isset ($lineArray[$j])) {
                        array_push($errors, array('row_id' => $i, 'col_id' => $j + 1));
                    }
                }
            } else {
                array_push($errors, array('row_id' => $i));
            }

            $i++;
        }
        fclose($handle);
    }

    if(count($errors) == 0){
        $result = array('success' => TRUE);
    } else {
        $result = array('success' => FALSE);
        $result['data']['valid_file'] = FALSE;
        $result['data']['errors'] = $errors;
    }

    return $result;
}

?>
