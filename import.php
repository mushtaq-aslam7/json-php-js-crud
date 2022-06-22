<?php
$storagename = "backend-cemetery.csv";

if ( isset($_POST["submit"]) ) {

    if ( isset($_FILES["file"])) {
 
             //if there was an error uploading the file
         if ($_FILES["file"]["error"] > 0) {
             echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
 
         }
         else {
                //if file already exists then overwrite
              if (file_exists("uploads/" . $_FILES["file"]["name"])) {
                unlink("uploads/".$_FILES["file"]["name"]);
                move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/".$storagename);
              }
              else {
                     //Store file in directory "upload" with the name of "uploaded_file.txt"
                    move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $storagename);
                  }
         }
      } else {
              echo "No file selected <br />";
      }
 }
  // open csv file
    
    if (($fopen = fopen( "uploads/" . $storagename, 'r')) === false) {
        die('Error opening file');
            }
            //json decode
            $json = file_get_contents('data.json');
            $array = json_decode($json, true);
            //read csv headers and write to json
            $headers = fgetcsv($fopen, 1024, ',');
            $tArray = array();
            //read csv rows and write to json
            while ($row = fgetcsv($fopen, 1024, ',')) {
            $tArray = array_combine($headers, $row);
            //filter duplicates
            $filter=array_search($tArray['id'], array_column($array, 'id'));
            if (!empty($filter)||$filter === 0){
            unset($tArray);
            }
             else {
             $array[]=$tArray;
            }
            }
            fclose($fopen);
            //json encode
            $final=json_encode($array);
            //json write
        if(file_put_contents('data.json', $final))
        {
           header("location:index.php");
        }

?>