<table>
    <?php foreach ($model->attributeLabels() as $key => $attribute): ?>
        <tr>
            <td><?= $attribute ?></td>
            <td><?= $query[$key] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
