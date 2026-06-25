<style>
.slider2 {
  overflow: hidden;
  background-color: white;
  position: relative;
  padding: 0;
}

.slider-track2 {
  display: flex;
  width: max-content;
  animation: scroll 100s linear infinite;
}

.clint_logo2 {
  background-color: white;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 130px;
  height: 130px;
  overflow: hidden;
  margin: 0 20px;
  flex-shrink: 0;
}

.clint_logo2 img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
  transition: transform 0.3s ease;
}

.clint_logo2:hover img {
  transform: scale(1.1);
}

/* Movimento contínuo da faixa */
@keyframes scroll {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-50%);
  }
}
</style>

<section class="slider2">
  <div class="slider-track2" id="logoTrack2">
    <?php 
    $SQL = "select * from usuarios where foto <> ' '";
    $RSS = mysql_query($SQL, $conexao);
    while($RS = mysql_fetch_array($RSS)){ ?>
    <div class="clint_logo2"><img loading="lazy" src="<?= $RS['foto'] ?>" style="width:80px;"></div>
    <?php } ?>

    <!-- Precisa ser duplicado para ter o efeito de infinito -->
    <?php 
    $SQL = "select * from usuarios where foto <> ' '";
    $RSS = mysql_query($SQL, $conexao);
    while($RS = mysql_fetch_array($RSS)){ ?>
    <div class="clint_logo2"><img loading="lazy" src="<?= $RS['foto'] ?>" style="width:80px;"></div>
    <?php } ?>

  </div>
</section>
