<style>
  .loading {
    position: fixed;
    left: 0;
    top: 0;
    width: 100vw;
    height: 100vh;
    z-index: 9999;
    background-color: rgba(193, 193, 193, 1);
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
  }

  #logo-container {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 350px;
    height: 350px;
  }

  #logo {
    max-width: 100%;
    height: auto;
    border-radius: 50%;
    animation: bounceInEnhanced 1.5s ease-out infinite ;
  }

  @keyframes bounceInEnhanced {
    0% {
      opacity: 0;
      transform: scale(0.3) rotate(-30deg);
    }

    20% {
      transform: scale(1.2) rotate(10deg);
      opacity: 0.7;
    }

    40% {
      transform: scale(0.9) rotate(-5deg);
    }

    60% {
      transform: scale(1.05) rotate(3deg);
      opacity: 1;
    }

    80% {
      transform: scale(0.97) rotate(-2deg);
    }

    100% {
      transform: scale(1) rotate(0deg);
    }
  }
</style>
<div class="loading" id="loading">
  <div id="logo-container">
    <img id="logo" src="images/logo.png" class="animate__animated animate__bounce">
  </div>
</div>

<script type="text/javascript" src="js/universal/jquery.js"></script>
<script type="text/javascript">
  $(window).on('load', function() {
    document.getElementById("loading").style.display = "none";
  });
  $(document).ready(function() {})
  window.onload = (event) => {
    $('.loader').hide();
    $('.bg-black-layer').hide();
  }
</script>