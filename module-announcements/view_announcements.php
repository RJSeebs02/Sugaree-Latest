<div class="row">
    <?php foreach ($news as $announcement): ?>
        <div class="col-md-4 mb-4">
        <div class="announcement-item p-3 border rounded">
        <h3><?php echo htmlspecialchars($announcement['news_title']); ?></h3>
        <p><?php echo htmlspecialchars($announcement['news_description']); ?></p>
    </div>
</div>
<?php endforeach; ?>
</div>