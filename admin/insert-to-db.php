<?php
function insertStudents($fileName, $path){
    $handle = fopen($path.'/'.$fileName, "r");
    if ($handle !== FALSE) {
        $i = 0;
        while (($lineArray = fgetcsv($handle, ',')) !== FALSE) {
            if($i != 0){
                if(isset($lineArray)){
                    $sql = 'select id from students where roll_no = "'.$lineArray[0].'"';
                    $result = mysql_query($sql);
                    if (mysql_num_rows($result) == 0) {
                        $sql = 'INSERT INTO students(roll_no, name, year, section, password, created_at) VALUES("'.$lineArray[0].'", "'.$lineArray[1].'", "'.$lineArray[2].'", "'.$lineArray[3].'", "'.sha1($lineArray[4]).'", now())';
                        $result = mysql_query($sql);
                    } else {
                        $sql = 'UPDATE students SET name = "'.$lineArray[1].'", year = "'.$lineArray[2].'", section = "'.$lineArray[3].'", password = "'.sha1($lineArray[4]).'" WHERE roll_no = "'.$lineArray[0].'"';
                        $result = mysql_query($sql);
                    }
                }
            } else {
                $i++;
            }
        }
        fclose($handle);
    }
}

function insertLectuers($fileName, $path){
    $handle = fopen($path.'/'.$fileName, "r");
    if ($handle !== FALSE) {
        $i = 0;
        while (($lineArray = fgetcsv($handle, ',')) !== FALSE) {
            if($i != 0){
                if(isset($lineArray)){
                    $sql = 'select id from lecturers where email_id = "'.$lineArray[0].'"';
                    $result = mysql_query($sql);
                    if (mysql_num_rows($result) == 0) {
                        $sql = 'INSERT INTO lecturers(email_id, name, designation, password, created_at) VALUES("'.$lineArray[0].'", "'.$lineArray[1].'", "'.$lineArray[2].'", "'.sha1($lineArray[3]).'", now())';
                        $result = mysql_query($sql);
                    } else {
                        $sql = 'UPDATE lecturers SET name = "'.$lineArray[1].'", designation = "'.$lineArray[2].'", password = "'.sha1($lineArray[3]).'" WHERE email_id = "'.$lineArray[0].'"';
                        $result = mysql_query($sql);
                    }
                }
            } else {
                $i++;
            }
        }
        fclose($handle);
    }
}

function insertSubjects($fileName, $path){
    $handle = fopen($path.'/'.$fileName, "r");
    if ($handle !== FALSE) {
        $i = 0;
        while (($lineArray = fgetcsv($handle, ',')) !== FALSE) {
            if($i != 0){
                if(isset($lineArray)){
                    $sql = 'select id from subjects where code = "'.$lineArray[1].'"';
                    $result = mysql_query($sql);
                    if (mysql_num_rows($result) == 0) {
                        $sql = 'INSERT INTO subjects(name, code, created_at) VALUES("'.$lineArray[0].'", "'.$lineArray[1].'", now())';
                        $result = mysql_query($sql);
                    } else {
                        $sql = 'UPDATE subjects SET name = "'.$lineArray[0].'" WHERE code = "'.$lineArray[1].'"';
                        $result = mysql_query($sql);
                    }
                }
            } else {
                $i++;
            }
        }
        fclose($handle);
    }
}


?>
