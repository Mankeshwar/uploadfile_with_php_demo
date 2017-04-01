<?php
$allowedExts = array("pdf", "jpeg");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ((($_FILES["file"]["type"] == "application/pdf")
|| ($_FILES["file"]["type"] == "image/jpeg")
)
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } else {
    
    if (file_exists("pdf/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "pdf/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "pdf/" . $_FILES["file"]["name"];
    }
  }
} else {
  echo "Invalid file";
}
?>
<a href="pdf/<?php echo $_FILES["file"]["name"] ;?>">download pdf</a>
