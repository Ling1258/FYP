<?php
include("dataconnection.php");
if (isset($_GET['d'])) {
    $r_id = $_GET['d'];
    $stmt = mysqli_query($con, "SELECT r_vehicle_pic FROM request_list WHERE r_id = '$r_id'");
    $count = mysqli_num_rows($stmt);
    if ($count > 0) {
        $row = mysqli_fetch_array($stmt);
        $image = $row['r_vehicle_pic'];
        if (headers_sent()) {
            echo 'HTTP header already sent';
        } else {
            ob_end_clean();
            header("Content-Type: application/image");
            header("Content-Disposition: attachment; filename=\"" . basename($image) . "\"");
            readfile($image);
            exit;
        }
        echo "<script>window.close();</script>";
    } else {
        echo 'File not found';
    }
}
?>
