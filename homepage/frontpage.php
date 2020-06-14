
<?php
$page_title = 'Skets';
include __DIR__ . '/tpl/head.php';
include __DIR__ . '/tpl/body_start.php';
?>
    <div class="row">
        <div class="column col-9">
            <h1>Canvas</h1>
            <?php
            include __DIR__ . '/../draw/index.php';
            ?>
        </div>
        <div class="column col-3">
            <?php
            include __DIR__ . ' /../chat/index.php';
            ?>
        </div>
    </div>

<?php
include __DIR__ . '/tpl/body_end.php';
?>
