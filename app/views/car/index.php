<?php foreach ($cars as $car): ?>
<div>
    <p><a href="/car/<?= $car->getId() ?>"><?= $car->getTitle() ?></a></p>
    <p><?= $car->getPrice() ?></p>
    <hr/>
</div>
<?php endforeach; ?>
