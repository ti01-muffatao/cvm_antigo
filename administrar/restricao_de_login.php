<?php 
$paginaAtual = basename($_SERVER['PHP_SELF']);

if ($paginaAtual == 'login.php' || $paginaAtual == 'conecta.php') {
    return;
}

if (!isset($_SESSION['CD_PERFIL'])|| !in_array($_SESSION['CD_PERFIL'], ['5', '6'])) {
    
    session_destroy();
    
    echo "<script>
            alert('Site em manutenção! Voltaremos em Breve!');
            window.location.href = 'login.php';
        </script>";
    exit;
}

if(!in_array($_SESSION['CD_PERFIL'],['1','2','3','4','5','6'])){
    echo "<script>
            alert('Perfil não cadastrado, tente logar novamente');
            window.location.href = 'login.php';
        </script>";
}
?>