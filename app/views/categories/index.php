<div class="main-box">
    <h3>Управление категориями</h3>
    <hr>
    <p>
        <?php if ($this->currentUser === 'admin123') { ?>
        <a href="<?= self::ROOT ?>/categories/create">Добавить категорию</a>
        <?php } ?>
    </p>
</div>