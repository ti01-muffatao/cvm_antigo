<?php
// Caminho onde o arquivo deve ser salvo

$destino = $_POST['destino'];
$destino = "download/$destino.xlsx";

// Verifica se o arquivo foi enviado
if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] == 0) {
    $extensao = strtolower(pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION));

    // Verifica se é uma planilha válida
    if (in_array($extensao, ['xlsx', 'xls'])) {
        // Move o arquivo para o destino, substituindo o anterior
        if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $destino)) {
            echo "<script>alert('Planilha atualizada com sucesso!'); window.location.href=document.referrer;</script>";
        } else {
            echo "<script>alert('Erro ao salvar o arquivo!'); window.location.href=document.referrer;</script>";
        }
    } else {
        echo "<script>alert('Formato inválido! Envie um arquivo .xlsx ou .xls'); window.location.href=document.referrer;</script>";
    }
} else {
    echo "<script>alert('Nenhum arquivo enviado!'); window.location.href=document.referrer;</script>";
}
?>