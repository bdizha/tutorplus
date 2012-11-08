<?php if (count($books) == 0): ?>
    <div class="no-result">There's currently no books specified.</div>
<?php endif; ?>
<?php foreach ($books as $book): ?>
    <div class="even-row">
        <?php echo $book->getTitle() ?> by <span class="author"><?php echo $book->getAuthor() ?></span>
    </div>
<?php endforeach; ?>