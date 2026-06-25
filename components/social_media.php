<style>
    .post-card {
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .user-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

    .post-image {
        max-width: 100%;
        border-radius: 8px;
    }

    .action-buttons a {
        text-decoration: none;
        color: #65676b;
        font-weight: bold;
    }

    .action-buttons .fa-heart-o {
        font-size: 1.25rem;
        margin-right: 5px;
        color: #65676b;
    }

    .action-buttons .fa-heart {
        font-size: 1.25rem;
        margin-right: 5px;
        color: red;
    }

    .action-buttons .fa-heart-o:hover {
        font-size: 1.25rem;
        margin-right: 5px;
        color: #2b2b2bff;
    }

    .action-buttons .fa-heart:hover {
        font-size: 1.25rem;
        margin-right: 5px;
        color: darkred;
    }

    .comments-list .comment-item {
        margin-bottom: 0.5rem;
    }

    .comment-input-container {
        margin-top: 0.5rem;
        display: flex;
        gap: 0.5rem;
    }

    .comment-input-container input {
        flex: 1;
    }

    #imagePopup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        justify-content: center;
        align-items: center;
        z-index: 99999;
    }

    .card-body img {
        cursor: pointer;
    }

    #imagePopup img {
        max-width: 90%;
        max-height: 90%;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
        animation: zoomIn 0.3s ease;
    }

    @keyframes zoomIn {
        from {
            transform: scale(0.8);
            opacity: 0;
        }

        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    #imagePopupClose {
        position: absolute;
        top: 20px;
        right: 30px;
        font-size: 35px;
        color: white;
        cursor: pointer;
        transition: 0.2s;
    }

    #imagePopupClose:hover {
        color: #ff4d4d;
        transform: scale(1.2);
    }
</style>



<div class="row justify-content-center">
    <div class="col-md-10">
        <?php
        $post_id = $linha['id'];

        // Verifica se o usuário curtiu
        $curtido = mysql_fetch_array(mysql_query("SELECT * FROM curtidas WHERE post_id=$post_id AND cd_usuario=$user_id"));
        $liked_class = $curtido ? 'fa-heart' : 'fa-heart-o';

        // Pega comentários
        $SQL = "SELECT * FROM comentarios cm JOIN usuarios u ON u.cd_usuario=cm.cd_usuario WHERE cm.post_id=$post_id ORDER BY cm.data_criacao ASC";
        // echo $SQL;
        $RS_COM = mysql_query($SQL);
        ?>
        <div class="card post-card mb-4" id="post-<?= $post_id ?>">
            <div class="card-body">
                <!-- Header -->
                <div class="d-flex align-items-center mb-3">
                    <img loading="lazy" src="images/bandeiras/portal-moderno.png" class="user-avatar me-3">
                    <div>
                        <h6 class="mb-0 fw-bold"><?= htmlspecialchars($linha['nome_autor']) ?></h6>
                        <?php
                        $data_criacao = new DateTime($linha['data_criacao']);
                        $data_atual = new DateTime();
                        $interval = $data_criacao->diff($data_atual);

                        // Formatar tempo decorrido
                        if ($interval->y > 0) {
                            $tempo_passado = $interval->y . ' ano' . ($interval->y > 1 ? 's' : '');
                        } elseif ($interval->m > 0) {
                            $tempo_passado = $interval->m . ' mês' . ($interval->m > 1 ? 'es' : '');
                        } elseif ($interval->d > 0) {
                            $tempo_passado = $interval->d . ' dia' . ($interval->d > 1 ? 's' : '');
                        } elseif ($interval->h > 0) {
                            $tempo_passado = $interval->h . ' hora' . ($interval->h > 1 ? 's' : '');
                        } elseif ($interval->i > 0) {
                            $tempo_passado = $interval->i . ' minuto' . ($interval->i > 1 ? 's' : '');
                        } else {
                            $tempo_passado = 'agora mesmo';
                        }
                        ?>
                        <small class="text-muted d-block"><?= date('d/m/Y H:i', strtotime($linha['data_criacao'])) ?></small>
                        <small class="text-muted d-block" style="text-align: left;">Há <?= $tempo_passado ?></small>
                    </div>
                </div>

                <p style="text-align: left;"><?= nl2br($linha['conteudo_texto']) ?></p>

                <!-- Mídias -->
                <?php if (!empty($midias)) { ?>
                    <?php if (count($midias) > 1) { ?>
                        <div id="carouselPost<?= $post_id ?>" class="carousel slide mb-2" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php foreach ($midias as $key => $m) {
                                    $ext = pathinfo($m, PATHINFO_EXTENSION);
                                    $active = ($key === 0) ? 'active' : '';
                                    if (in_array($ext, ['mp4', 'mov', 'avi', 'webm'])) { ?>
                                        <div class="carousel-item <?= $active ?>">
                                            <video src="https://portal.muffatao.com.br/campanhas/cvm/feed/<?= $m ?>" class="d-block w-100" controls></video>
                                        </div>
                                    <?php } else { ?>
                                        <div class="carousel-item <?= $active ?>">
                                            <img loading="lazy" src="https://portal.muffatao.com.br/campanhas/cvm/feed/<?= $m ?>" class="d-block w-100 post-image">
                                        </div>
                                <?php }
                                } ?>
                            </div>
                            <button class="carousel-control-prev d-flex align-items-center justify-content-center"
                                type="button"
                                data-bs-target="#carouselPost<?= $post_id ?>"
                                data-bs-slide="prev"
                                style="
                                    width:50px;
                                    height:50px;
                                    background-color:rgba(0,0,0,0.6);
                                    border-radius:50%;
                                    top:50%;
                                    transform:translateY(-50%);
                                ">
                                <span class="carousel-control-prev-icon" aria-hidden="true"
                                    style="width:25px;height:25px;filter:brightness(0) invert(1);">
                                </span>
                            </button>

                            <button class="carousel-control-next d-flex align-items-center justify-content-center"
                                type="button"
                                data-bs-target="#carouselPost<?= $post_id ?>"
                                data-bs-slide="next"
                                style="
                                    width:50px;
                                    height:50px;
                                    background-color:rgba(0,0,0,0.6);
                                    border-radius:50%;
                                    top:50%;
                                    transform:translateY(-50%);
                                ">
                                <span class="carousel-control-next-icon" aria-hidden="true"
                                    style="width:25px;height:25px;filter:brightness(0) invert(1);">
                                </span>
                            </button>
                        </div>
                    <?php } else { ?>
                        <?php foreach ($midias as $m) {
                            $ext = pathinfo($m, PATHINFO_EXTENSION);
                            if (in_array($ext, ['mp4', 'mov', 'avi', 'webm'])) {
                                echo "<video src='https://portal.muffatao.com.br/campanhas/cvm/feed/$m' class='img-fluid mb-2' controls></video>";
                            } else {
                                echo "<img loading='lazy' src='https://portal.muffatao.com.br/campanhas/cvm/feed/$m' class='img-fluid post-image mb-2'>";
                            }
                        } ?>
                    <?php } ?>
                <?php } ?>

                <!-- Curtidas e comentários -->
                <div class="d-flex justify-content-between align-items-center text-muted small mb-2 action-buttons">
                    <?php // include "botoes_iterativos.php" ?>
                    <a href="#" class="like-btn" data-post="<?= $post_id ?>">
                        <i class="fa <?= $liked_class ?>"></i> <span class="like-count"><?= $linha['total_curtidas'] ?></span> curtidas
                    </a>
                    <span class="comentarios-span"><?= $linha['total_comentarios'] ?> comentários</span>
                </div>


                <!-- Comentários -->
                <div class="comments-list">
                    <?php while ($com = mysql_fetch_array($RS_COM)) {
                        $data_formatada = date('d/m/Y H:i', strtotime($com['data_criacao']));
                    ?>
                        <div class="d-flex comment-item mb-2 p-2 bg-light rounded shadow-sm text-start" id="comment-<?= $com['id'] ?>">
                            <?php if (!empty($com['foto'])) {
                                $img_usuario = $com['foto'];
                            } elseif (!empty($com['avatar_url'])) {
                                $img_usuario = $com['avatar_url'];
                            } else{
                                $img_usuario = '';
                            }
                            if ($img_usuario) { ?>
                                <img loading="lazy" src="<?= $img_usuario ?>" alt="Avatar" style="width:40px; height:40px; border-radius:50%; object-fit:cover; margin-right:10px;">
                            <?php } else { ?>
                                <i class="fa fa-user me-3 text-secondary" style="font-size:40px;"></i>
                            <?php } ?>
                            <div class="w-100">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <h6 class="mb-0 fw-bold small"><?= htmlspecialchars($com['ds_usuario']) ?></h6>
                                    <div class="d-flex align-items-center">
                                        <small class="text-muted me-2"><?= $data_formatada ?></small>
                                        <?php if ($_SESSION['CD_PERFIL'] == 6 || $com['cd_usuario'] == $_SESSION['CD_USUARIO']) { ?>
                                            <button class="btn btn-sm btn-outline-danger btn-delete-comment" data-comment="<?= $com['id'] ?>">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        <?php } ?>
                                    </div>
                                </div>
                                <p class="mb-0" style="font-size:0.9rem; color:#555; text-align:left;"><?= htmlspecialchars($com['texto']) ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <!-- Input comentário -->
                <div class="comment-input-container">
                    <input type="text" class="form-control comment-input" placeholder="Escreva um comentário..." data-post="<?= $post_id ?>">
                    <button class="btn btn-primary btn-comment" data-post="<?= $post_id ?>">Enviar</button>
                </div>
            </div>
        </div>
    </div>
</div>