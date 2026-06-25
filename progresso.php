<style>
@keyframes progress {
  0% { --percentage: 0; }
  100% { --percentage: var(--value); }
}

/* @property --percentage {
  syntax: '<number>';
  inherits: true;
  initial-value: 0;
} */

[role="progressbar"] {
  --percentage: var(--value);
  --primary: #369;
  --secondary: #adf;
  --size: 100px;
  animation: progress 2s 0.5s forwards;
  width: var(--size);
  aspect-ratio: 1;
  border-radius: 50%;
  position: relative;
  overflow: hidden;
  display: grid;
  place-items: center;
}

[role="progressbar"]::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: conic-gradient(var(--primary) calc(var(--percentage) * 1%), var(--secondary) 0);
  mask: radial-gradient(white 55%, transparent 0);
  mask-mode: alpha;
  -webkit-mask: radial-gradient(#0000 55%, #000 0);
  -webkit-mask-mode: alpha;
}

[role="progressbar"]::after {
  counter-reset: percentage var(--value);
  content: counter(percentage) '%';
  font-family: Helvetica, Arial, sans-serif;
  font-size: calc(var(--size) / 5);
  color: var(--primary);
}

body {
  margin: 0;
  display: grid;
  place-items: center;
  height: 100vh;
  grid-template-columns: auto auto;
  gap: 10px;
}

.progress-container {
  display: flex;
  justify-content: center;
  margin: 50px 0 50px 0;
  gap: 20px; /* Espaçamento entre os quadrados */
}

.section {
  display: flex;
  align-items: center; /* Alinha os itens verticalmente */
  border: 2px solid #ccc; /* Borda ao redor da seção */
  padding: 20px; /* Espaçamento interno */
  background: white; /* Fundo branco */
  border-radius: 10px; /* Bordas arredondadas */
  gap: 10px; /* Espaçamento entre os elementos */
}

.section-content {
  display: flex;
  flex-direction: column;
  justify-content: space-between; /* Distribui o espaço verticalmente */
}

h4 {
  margin: 0; /* Remove margem padrão */
  font-size: 16px; /* Ajuste o tamanho da fonte */
  text-align: left; /* Alinha o texto à esquerda */
}

.score-button {
  width: fit-content;
  display: flex;
  padding: 1.2em 1.0rem;
  cursor: pointer;
  gap: 0.8rem;
  font-weight: bold;
  border-radius: 30px;
  text-shadow: 2px 2px 3px rgb(136 0 136 / 50%);
  background: linear-gradient(15deg, #880088, #aa2068, #cc3f47, #de6f3d, #f09f33, #de6f3d, #cc3f47, #aa2068, #880088) no-repeat;
  background-size: 320%;
  color: #fff;
  font-size: 18px;
  border: none;
  background-position: right center;
  box-shadow: 0 30px 10px -20px rgba(0,0,0,.2);
  transition: background .3s ease;
}

.score-button:hover {  
  background-size: 320%;
  background-position: right center;
}

.score-button:hover svg {
  fill: #fff;
}

.score-button svg {
  width: 28px;
  fill: #f09f33;
  transition: .3s ease;
}

</style>

<div class="progress-container">
  <div class="section">
    <div class="section-content">
      <h4>Meta mínima:</h4>
      <h4>Valor</h4>
    </div>
    <div role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="--value: 67"></div>
  </div>
  <div class="section">
    <div class="section-content">
      <h4>Meta geral:</h4>
      <h4>Valor</h4>
    </div>
    <div role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="--value: 85"></div>
  </div>
  <div class="section">
    <div class="section-content">
      <h4>Meus pontos:</h4>
    </div>
    <button class="score-button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 24">
            <path d="m18 0 8 12 10-8-4 20H4L0 4l10 8 8-12z"></path>
        </svg>
        Valor
    </button>
  </div>
</div>