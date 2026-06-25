<?php
$areia_restante = 100 - $percentual;
?>

<div class="ampulheta-container">
    <div class="ampulheta" style="--areia-cheia: <?= $percentual; ?>%; --areia-vazia: <?= $areia_restante; ?>%;"></div>
</div>

<style>
    .ampulheta-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100px;
    }

    .ampulheta {
        --c1: #673b14;
        --c2: #f8b13b;
        --areia-cheia: 0%;
        --areia-vazia: 100%;

        width: 40px;
        height: 80px;
        border-top: 4px solid var(--c1);
        border-bottom: 4px solid var(--c1);
        background: linear-gradient(90deg, var(--c1) 2px, var(--c2) 0 5px, var(--c1) 0) 50%/7px 8px no-repeat;
        display: grid;
        overflow: hidden;
    }

    .ampulheta::before,
    .ampulheta::after {
        content: "";
        grid-area: 1/1;
        width: 75%;
        height: calc(50% - 4px);
        margin: 0 auto;
        border: 2px solid var(--c1);
        border-top: 0;
        box-sizing: content-box;
        border-radius: 0 0 40% 40%;
        mask-composite: exclude;
        background: linear-gradient(var(--c2) 50%, #0000 0) bottom /100% 205%,
            linear-gradient(var(--c2) 0 0) center/0 100%;
        background-repeat: no-repeat;
        transition: background-size 0.5s ease-in-out;
    }
    
    .ampulheta::before {
        background-size: 100% var(--areia-vazia);
        background-position: bottom;
    }

    .ampulheta::after {
        transform-origin: 50% calc(100% + 2px);
        transform: scaleY(-1);
        background-size: 100% var(--areia-cheia);
        background-position: top;
    }
</style>