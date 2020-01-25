<?php if ($this->data): ?>
    <div class="sidebar-widget categories">
        <div class="sidebar-title"><h2>Categories</h2></div>
        <ul class="category-list">
            <?php foreach ($this->data as $category): ?>
                <li>
                    <a href="/category/<?= $category['alias'] ?>">
                        <?= ucwords($category['title']) ?>
                        <?php if ($category['amountOfProducts'] > 0): ?>
                            <span>(<?= $category['amountOfProducts'] ?>)</span>
                        <?php endif; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>