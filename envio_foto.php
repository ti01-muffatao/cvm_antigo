<?php
include "administrar/conexao.php";
include "administrar/restricao_de_login.php";
if ($_SESSION["CD_USUARIO"] == "") {
    echo "<script language='javascript'>window.open('login.php', '_self');</script>";
}
include "includes.php";

// === SALVAR AVATAR OU FOTO ===
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_SESSION["CD_CODIGO"];

    // Se enviou foto
    if (!empty($_FILES['foto']['name'])) {
        $dir = "upload/fotos_usuarios/";
        if (!file_exists($dir)) mkdir($dir, 0777, true);

        $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $novoNome = $usuario . "." . strtolower($ext);
        $destino = $dir . $novoNome;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $destino)) {
            $SQL = "UPDATE usuarios SET foto = '$destino', avatar_url = NULL WHERE cd_codigo = '$usuario'";
            mysql_query($SQL);
            echo "<script>alert('Foto enviada com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao enviar a foto.');</script>";
        }
    }

    // Se salvou avatar
    if (isset($_POST['avatar_url']) && $_POST['avatar_url'] !== '') {
        $avatarUrl = $_POST['avatar_url'];
        $SQL = "UPDATE usuarios SET avatar_url = '$avatarUrl', foto = NULL WHERE cd_codigo = '$usuario'";
        mysql_query($SQL);
        echo "<script>alert('Avatar salvo com sucesso!');</script>";
    }
}
?>

<body>
    <?php include "loading.php"; ?>
    <?php include "menu.php"; ?>

    <?php
    $SQL = "select * from usuarios where cd_codigo = '" . $_SESSION['CD_CODIGO'] . "'";
    $RSS = mysql_query($SQL, $conexao);
    $RS = mysql_fetch_array($RSS);
    $deuAceite = $RS['cd_aceite'];
    if (!empty($RS['foto'])) {
        $img_usuario = $RS['foto'];
    } elseif (!empty($RS['avatar_url'])) {
        $img_usuario = $RS['avatar_url'];
    }
    ?>

    <div class="container" style="margin-top: 70px; display: flex; flex-direction: column; align-items: center;">

        <div style="text-align: center;">
            <?php if (!$img_usuario) { ?>
                <h2 style="color: green;">Você ainda não cadastrou foto nem avatar</h2>
            <?php } else { ?>
                <h2 style="color: red;">Você já tem foto ou avatar cadastrado</h2>
            <?php } ?>
        </div>

        <h3>Foto de Perfil</h3>
        <p>Você pode enviar uma foto ou criar um avatar personalizado.</p>

        <!-- Envio de foto -->
        <form method="POST" enctype="multipart/form-data" style="margin-bottom: 40px; text-align: center;">
            <div class="mb-3">
                <label for="foto" class="form-label">Envie uma foto ou tire na hora:</label>
                <input
                    type="file"
                    name="foto"
                    accept="image/*"
                    capture="environment"
                    class="form-control form-control-lg"
                    id="fotoInput">
                <small class="text-muted">No celular, você pode tirar uma foto ou escolher da galeria.</small>
            </div>

            <!-- Pré-visualização -->
            <div id="previewContainer" style="margin-top:15px; display:none;">
                <p>Pré-visualização:</p>
                <img id="previewImg" src="" alt="Preview" style="max-width: 50%; border: 2px solid #ccc;">
            </div>

            <br>
            <button type="submit" class="btn btn-primary btn-lg">Enviar Foto</button>
        </form>

        <div style="text-align: center;">
            <h2 style="margin-top:20px;">Ou crie seu Avatar Personalizado</h2>
        </div>

        <div>
            <div id="avatar-preview" style="width: 150px; height: 150px; border: 2px solid #ccc; border-radius: 50%; margin-bottom: 20px; overflow: hidden;">
                <img id="avatar-img" src="https://api.dicebear.com/9.x/avataaars/svg?seed=defaultUser&top=shortCurly&hairColor=724133&eyebrows=default&eyes=happy&mouth=smile&skinColor=edb98a&backgroundColor=ffffff&clothing=blazerAndShirt&clothesColor=d6b370" style="width:100%;height:100%;">
            </div>
        </div>

        <div class="row g-3 mb-4">
            <!-- Roupas -->
            <div class="col-md-3">
                <label>Roupas :</label><br>
                <select id="clothing" class="form-select w-100 h-50" onchange="updateAvatar()">
                    <option value="blazerAndSweater">Blazer</option>
                    <option value="collarAndSweater">Gola e Suéter</option>
                    <option value="hoodie">Moletom</option>
                    <option value="shirtCrewNeck">Camisa Gola</option>
                </select>
            </div>

            <!-- Cor da roupa -->
            <div class="col-md-3">
                <label>Cor da Roupa :</label><br>
                <select id="clothesColor" class="form-select w-100 h-50" onchange="updateAvatar()">
                    <option value="d6b370">Amarelo Claro</option>
                    <option value="724133">Marrom</option>
                    <option value="c93305">Vermelho</option>
                    <option value="e8e1e1">Cinza Claro</option>
                    <option value="ecdcbf">Bege</option>
                    <option value="f59797">Rosa</option>
                </select>
            </div>

            <!-- Topo / Tipo de Cabelo -->
            <div class="col-md-3">
                <label>Tipo de Cabelo :</label><br>
                <select id="top" class="form-select w-100 h-50" onchange="updateAvatar()">
                    <option value="shortCurly">Curto 1</option>
                    <option value="shortRound">Curto 2</option>
                    <option value="shortFlat">Curto 3</option>
                    <option value="bob">Curto 4</option>
                    <option value="bigHair">Longo 1</option>
                    <option value="curvy">Longo 2</option>
                    <option value="straight01">Longo 3</option>
                    <option value="sides">Calvo</option>
                </select>
            </div>

            <!-- Cor do Cabelo -->
            <div class="col-md-3">
                <label>Cor do Cabelo :</label><br>
                <select id="hairColor" class="form-select w-100 h-50" onchange="updateAvatar()">
                    <option value="724133">Moreno</option>
                    <option value="2c1b18">Preto</option>
                    <option value="c93305">Ruivo</option>
                    <option value="d6b370">Loiro</option>
                    <option value="e8e1e1">Cinza</option>
                    <option value="ecdcbf">Bege</option>
                </select>
            </div>

            <!-- Sobrancelhas -->
            <div class="col-md-3">
                <label>Tipo de Sobrancelha :</label><br>
                <select id="eyebrows" class="form-select w-100 h-50" onchange="updateAvatar()">
                    <option value="default">Padrão</option>
                    <option value="angry">Bravo</option>
                    <option value="flatNatural">Reta</option>
                    <option value="raisedExcited">Animada</option>
                </select>
            </div>

            <!-- Olhos -->
            <div class="col-md-3">
                <label>Olhos :</label><br>
                <select id="eyes" class="form-select w-100 h-50" onchange="updateAvatar()">
                    <option value="happy">Feliz</option>
                    <option value="default">Padrão</option>
                    <option value="wink">Piscando</option>
                </select>
            </div>

            <!-- Boca -->
            <div class="col-md-3">
                <label>Boca :</label><br>
                <select id="mouth" class="form-select w-100 h-50" onchange="updateAvatar()">
                    <option value="smile">Sorriso</option>
                    <option value="default">Padrão</option>
                    <option value="serious">Sério</option>
                    <option value="tongue">Língua de fora</option>
                    <option value="twinkle">Brilhando</option>
                </select>
            </div>

            <!-- Cor da Pele -->
            <div class="col-md-3">
                <label>Cor da Pele :</label><br>
                <select id="skinColor" class="form-select w-100 h-50" onchange="updateAvatar()">
                    <option value="edb98a">Branca</option>
                    <option value="614335">Preta</option>
                    <option value="B58E66">Parda</option>
                    <option value="E1C16E">Amarela</option>
                </select>
            </div>

            <!-- Cor da Pele -->
            <div class="col-md-3">
                <label>Cor de Fundo :</label><br>
                <select id="backgroundColor" class="form-select w-100 h-50" onchange="updateAvatar()">
                    <option value="ffffff">Branco</option>
                    <option value="ffdfbf">Laranja</option>
                    <option value="ff4906">Vermelho</option>
                    <option value="005afc">Azul</option>
                    <option value="d240fe">Rosa</option>
                    <option value="6600fe">Roxo</option>
                </select>
            </div>
        </div>

        <br>
        <form method="POST">
            <input type="hidden" id="avatar_url" name="avatar_url">
            <button type="submit" class="btn btn-secondary btn-lg">Salvar Avatar</button>
        </form>
        <br>

    </div>

    <?php include "footer.php"; ?>

    <style>
        .form-select {
            border-radius: 12px;
            border: 2px solid #ccc;
            padding: 10px;
            transition: all 0.3s ease;
        }

        .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        .col-md-3 {
            padding: 5px;
        }
    </style>

    <script>
        let avatarParams = {
            top: 'shortCurly',
            hairColor: '724133',
            eyebrows: 'default',
            eyes: 'happy',
            mouth: 'smile',
            skinColor: 'edb98a',
            backgroundColor: 'ffffff',
            clothing: 'blazerAndShirt',
            clothesColor: 'd6b370',
        };

        function updateAvatar() {
            avatarParams.top = document.getElementById('top')?.value || avatarParams.top;
            avatarParams.hairColor = document.getElementById('hairColor')?.value || avatarParams.hairColor;
            avatarParams.eyebrows = document.getElementById('eyebrows')?.value || avatarParams.eyebrows;
            avatarParams.eyes = document.getElementById('eyes')?.value || avatarParams.eyes;
            avatarParams.mouth = document.getElementById('mouth')?.value || avatarParams.mouth;
            avatarParams.skinColor = document.getElementById('skinColor')?.value || avatarParams.skinColor;
            avatarParams.backgroundColor = document.getElementById('backgroundColor')?.value || avatarParams.backgroundColor;
            avatarParams.clothing = document.getElementById('clothing')?.value || avatarParams.clothing;
            avatarParams.clothesColor = document.getElementById('clothesColor')?.value || avatarParams.clothesColor;

            const seed = '<?php echo $_SESSION["CD_USUARIO"]; ?>';
            const style = 'avataaars';
            const url = `https://api.dicebear.com/9.x/${style}/svg?seed=${seed}` +
                `&top=${avatarParams.top}` +
                `&hairColor=${avatarParams.hairColor}` +
                `&eyebrows=${avatarParams.eyebrows}` +
                `&eyes=${avatarParams.eyes}` +
                `&mouth=${avatarParams.mouth}` +
                `&skinColor=${avatarParams.skinColor}` +
                `&backgroundColor=${avatarParams.backgroundColor}` +
                `&clothing=${avatarParams.clothing}` +
                `&clothesColor=${avatarParams.clothesColor}`;

            document.getElementById('avatar-img').src = url;
            document.getElementById('avatar_url').value = url;
        }


        // Parte do envio da foto
        const fotoInput = document.getElementById('fotoInput');
        const previewContainer = document.getElementById('previewContainer');
        const previewImg = document.getElementById('previewImg');

        fotoInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewContainer.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                previewContainer.style.display = 'none';
            }
        });
    </script>