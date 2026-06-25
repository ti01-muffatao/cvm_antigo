<?php include "administrar/conexao.php";

$user_id = $_SESSION['CD_USUARIO'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$post_id = intval($_POST['post_id']);

	// CURTIDAS
	if (isset($_POST['action']) && $_POST['action'] === 'like') {
		$curtida = mysql_fetch_array(mysql_query("SELECT * FROM curtidas WHERE post_id=$post_id AND cd_usuario=$user_id"));
		if ($curtida) {
			mysql_query("DELETE FROM curtidas WHERE post_id=$post_id AND cd_usuario=$user_id");
		} else {
			mysql_query("INSERT INTO curtidas (post_id, cd_usuario, data_criacao) VALUES ($post_id, $user_id, NOW())");
		}
		$total = mysql_fetch_array(mysql_query("SELECT COUNT(*) as total FROM curtidas WHERE post_id=$post_id"))['total'];
		echo json_encode(['success' => true, 'total_curtidas' => $total]);
		exit;
	}

	// COMENTÁRIOS
	if (isset($_POST['action']) && $_POST['action'] === 'comment') {
		$texto = mysql_real_escape_string($_POST['texto']);
		mysql_query("INSERT INTO comentarios (post_id, cd_usuario, texto, data_criacao) VALUES ($post_id, $user_id, '$texto', NOW())");

		$user = mysql_fetch_array(mysql_query("SELECT * FROM usuarios WHERE cd_usuario=$user_id"));
		$total_comentarios = mysql_fetch_array(mysql_query("SELECT COUNT(*) as total FROM comentarios WHERE post_id=$post_id"))['total'];

		if (!empty($user['foto'])) {
			$img_usuario = $user['foto'];
		} elseif (!empty($user['avatar_url'])) {
			$img_usuario = $user['avatar_url'];
		}

		echo json_encode([
			'success' => true,
			'nome' => htmlspecialchars($user['ds_usuario']),
			'texto' => htmlspecialchars($texto),
			'total_comentarios' => $total_comentarios,
			'img_usuario' => $img_usuario,
		]);
		exit;
	}

	// DELETAR COMENTÁRIO
	if (isset($_POST['action']) && $_POST['action'] === 'delete_comment') {
		$comment_id = intval($_POST['comment_id']);
		
		// Verifica se o usuário tem permissão (perfil 6)
		if ($_SESSION['CD_PERFIL'] == 6) {
			mysql_query("DELETE FROM comentarios WHERE id = $comment_id");
			echo json_encode(['success' => true, 'comment_id' => $comment_id]);
		} else {
			echo json_encode(['success' => false, 'error' => 'Permissão negada']);
		}
		exit;
	}

}