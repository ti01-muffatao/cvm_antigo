<div id="supportContainer">
    <a href="https://wa.me/554791574177" target="_blank" class="support-float">
        <i class="fa fa-phone"></i>
    </a>
    <span class="close-btn" id="closeBtn">&times;</span>
</div>

<style>
#supportContainer {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1000;
}

.support-float {
    width: 60px;
    height: 60px;
    background-color: #0d6efd;
    color: #fff;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 28px;
    text-decoration: none;
    transition: background 0.3s;
    box-shadow: 0px 0px 20px 5px rgba(0, 0, 0, 0.3)
}

.support-float:hover {
    background-color: #0b5ed7;
    color: #fff;
}

.support-float::after {
    content: "Fale Conosco";
    position: absolute;
    bottom: 70px;
    right: 70%;
    transform: translateX(50%);
    background-color: #0d6efd;
    color: #fff;
    padding: 6px 10px;
    border-radius: 5px;
    font-size: 14px;
    white-space: nowrap;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s, bottom 0.3s;
}

.support-float:hover::after,
.support-float:hover::before {
    opacity: 1;
    bottom: 80px;
}

.close-btn {
    position: absolute;
    top: -15px;
    right: -15px;
    background: #dc3545;
    color: #fff;
    width: 20px;
    height: 20px;
    font-size: 14px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    z-index: 1001;
}

@media (max-width: 480px) {
    .support-float {
        width: 50px;
        height: 50px;
        font-size: 24px;
    }
    .support-float::after {
        font-size: 12px;
        bottom: 60px;
    }
    .support-float::before {
        bottom: 52px;
        border-width: 5px;
    }
    .close-btn {
        width: 18px;
        height: 18px;
        font-size: 12px;
        top: -8px;
        right: -8px;
    }
}
</style>

<script>
document.getElementById("closeBtn").addEventListener("click", function() {
    document.getElementById("supportContainer").style.display = "none";
});
</script>
