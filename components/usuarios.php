<style>
.slider {
  overflow: hidden;
  background: linear-gradient(to right, #0009BD , #4CDAFF);
  position: relative;
  padding: 0;
}

.slider-track {
  display: flex;
  width: max-content;
  animation: scroll 50s linear infinite;
}

.clint_logo {
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

.clint_logo img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
  transition: transform 0.3s ease;
}

.clint_logo:hover img {
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

<section class="slider">
  <div class="slider-track" id="logoTrack">
    <div class="clint_logo"><img loading="lazy" src="images/fornecedores/Colgate.png" style="width:80px;"></div>
    <div class="clint_logo"><img loading="lazy" src="images/fornecedores/Havaianas.png" style="width:100px;"></div>
    <div class="clint_logo"><img loading="lazy" src="images/fornecedores/Italy.png" style="width:100px;"></div>
    <div class="clint_logo"><img loading="lazy" src="images/fornecedores/Movi.png" style="width:70px;"></div>
    <div class="clint_logo"><img loading="lazy" src="images/fornecedores/Reckitt.png" style="width:100px;"></div>
    <div class="clint_logo"><img loading="lazy" src="images/fornecedores/Santher.png" style="width:100px;"></div>
    <div class="clint_logo"><img loading="lazy" src="images/fornecedores/Unilever.png" style="width:70px;"></div>
    <div class="clint_logo"><img loading="lazy" src="images/fornecedores/Ypê.png" style="width:80px;"></div>
    <div class="clint_logo"><img loading="lazy" src="images/fornecedores/Flora.png" style="width:80px;"></div>

    <!-- DUPLICAÇÃO para efeito infinito -->
    <div class="clint_logo"><img loading="lazy" src="images/fornecedores/Colgate.png" style="width:80px;"></div>
    <div class="clint_logo"><img loading="lazy" src="images/fornecedores/Havaianas.png" style="width:100px;"></div>
    <div class="clint_logo"><img loading="lazy" src="images/fornecedores/Italy.png" style="width:100px;"></div>
    <div class="clint_logo"><img loading="lazy" src="images/fornecedores/Movi.png" style="width:70px;"></div>
    <div class="clint_logo"><img loading="lazy" src="images/fornecedores/Reckitt.png" style="width:100px;"></div>
    <div class="clint_logo"><img loading="lazy" src="images/fornecedores/Santher.png" style="width:100px;"></div>
    <div class="clint_logo"><img loading="lazy" src="images/fornecedores/Unilever.png" style="width:70px;"></div>
    <div class="clint_logo"><img loading="lazy" src="images/fornecedores/Ypê.png" style="width:80px;"></div>
    <div class="clint_logo"><img loading="lazy" src="images/fornecedores/Flora.png" style="width:80px;"></div>
  </div>
</section>
