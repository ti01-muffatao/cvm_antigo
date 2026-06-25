<style>
    .reaction-bar {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        gap: 8px;
        padding: 8px;
        border-radius: 9999px;
        transition: transform 0.3s ease;
        z-index: 10;
        font-size: 1.5rem;
    }

    .reaction {
        position: relative;
        background: white;
        border: none;
        border-radius: 9999px;
        padding: 8px 12px;
        cursor: pointer;
        transition: transform 0.3s ease;
        font-size: 1.5rem;
    }

    .reaction::before {
        content: attr(data-label);
        position: absolute;
        top: -28px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0, 0, 0, 0.5);
        color: white;
        font-size: 0.6rem;
        padding: 2px 6px;
        border-radius: 6px;
        opacity: 0;
        pointer-events: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .reaction:hover {
        transform: translateY(-5px) scale(1.25);
    }

    .reaction:hover::before {
        opacity: 1;
    }

    @media (prefers-color-scheme: dark) {
        .reaction-bar {
            background-color: #191818;
        }

        .reaction {
            background-color: #191818;
            color: white;
        }

        .reaction::before {
            background-color: white;
            color: black;
        }
    }
</style>
<div class="reaction-bar">
    <button class="reaction" data-label="Like">👍</button>
    <button class="reaction" data-label="Palminha">👏🏻</button>
    <button class="reaction" data-label="Confete">🎉</button>
    <button class="reaction" data-label="Sorriso">🙂</button>
</div>