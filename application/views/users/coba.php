<section class="msger">
    <header class="msger-header">
        <div class="msger-header-title">
            <i class="fas fa-comment-alt"></i> SimpleChat
        </div>
        <div class="msger-header-options">
            <span><i class="fas fa-cog"></i></span>
        </div>
    </header>

    <main class="msger-chat">
        <?php foreach ($diskusi as $a) : ?>
            <?php if ($a['nama'] == $user['nama']) : ?>
                <div class="msg right-msg">
                    <div class="msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/327/327779.svg)"></div>

                    <div class="msg-bubble">
                        <div class="msg-info">
                            <div class="msg-info-name"><?= $a['nama'] ?></div>
                            <div class="msg-info-time"><?= $a['time'] ?></div>
                        </div>

                        <div class="msg-text">
                            <?= $a['diskusi'] ?>
                        </div>
                    </div>
                </div>

            <?php else : ?>
                <div class="msg left-msg">
                    <div class="msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"></div>

                    <div class="msg-bubble">
                        <div class="msg-info">
                            <div class="msg-info-name"><?= $a['nama'] ?></div>
                            <div class="msg-info-time"><?= $a['time'] ?></div>
                        </div>

                        <div class="msg-text">
                            <?= $a['diskusi'] ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </main>

    <form class="msger-inputarea">
        <input type="text" class="msger-input" placeholder="Enter your message...">
        <button type="submit" class="msger-send-btn">Send</button>
    </form>
</section>