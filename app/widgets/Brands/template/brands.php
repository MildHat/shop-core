<?php if($this->data): ?>
    <div class="sidebar-widget">
        <div class="sidebar-title"><h2>Brands</h2></div>
        <ul class="category-list">
            <?php foreach ($this->data as $brand): ?>
                <li>
                    <a href="/brand/<?= $brand['alias'] ?>">
                        <?= ucwords($brand['title']) ?>
                        <?php if ($brand['amountOfProducts'] > 0): ?>
                            <span>(<?= $brand['amountOfProducts'] ?>)</span>
                        <?php endif; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>