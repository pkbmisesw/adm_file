<?php
ini_set('display_errors', 0);
include "../config.php";
session_start();

$op = $_GET['op'];
if($op == "tambah"){
    $id_kat = $_POST['id_kat'];
    $nama = $_POST['nama'];
    $des = $_POST['des'];
    $url = $_POST['url'];
    $status = $_POST['status'];
    $created_at = $_POST['created_at'];

    try {
        $sql = "INSERT INTO m_file SET
                id_kat = :id_kat,
                nama = :nama,
                des = :des,
                url = :url,
                status = :status,
                created_at = :created_at";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_kat', $id_kat);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':des', $des);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':created_at', $created_at);
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }

    if($stmt){
        echo "<script>alert('Berhasil Tambah'); document.location.href=('../view/m_file')</script>";
    }else{
        echo "<script>alert('Gagal Tambah'); document.location.href=('../view/m_file')</script>";
    }
}else if($op == "hapus"){
    $id = $_GET['id'];

    $sql = "DELETE FROM m_file WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if($stmt){
        echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_file/')</script>";
    }else{
        echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_file/')</script>";
    }

}