<h3>Add car</h3>
<form action="/car/store" method="post">
    <p>Title: <input type="text" name="title" placeholder="title" required/></p>
    <p><textarea name="description" cols="30" rows="10" required></textarea></p>
    <p>
        Color:
        <select name="color" required>
            <?php foreach ($colors as $color): ?>
                <option value="<?= $color ?>"><?= ucfirst($color) ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        Type:
        <select name="type" required>
            <?php foreach ($types as $type): ?>
                <option value="<?= $type ?>"><?= ucfirst($type) ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>Price: <input type="number" name="price" placeholder="price" required/></p>
    <input type="submit" value="add">
</form>
