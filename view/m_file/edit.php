<?php
include("../../config.php");
$response = [];
if (isset($_POST['id'])){
    $query = $conn->prepare("UPDATE m_file SET id_kat=:id_kat,nama=:nama,des=:des,url=:url,status=:status,created_at=:created_at WHERE id=:id");

    $result = $query->execute([
        ":id_kat" => $_POST['id_kat'],
        ":nama" => $_POST['nama'],
        ":des" => $_POST['des'],
        ":url" => $_POST['url'],
        ":status" => $_POST['status'],
        ":created_at" => $_POST['created_at'],
        ":id" => $_POST['id'],
    ]);

    if ($result){
        $response['code'] = 200;
    }else{
        $response['code'] = 505;
    }
}
echo json_encode($response);
?>