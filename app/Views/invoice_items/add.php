<tr>
    <td>
        <select name="product" id="product" class="form-control">
            <option value="0">Select Product</option>
            <?php foreach ($product as $p) : ?>
            <option value="<?= $p['id'] ?>"><?= $p['id']; ?></option>
            <?php endforeach; ?>
        </select>
    </td>

    <td>
        <select name="product" id="product" class="form-control">
            <option value="0">Select Product</option>
            <?php foreach ($items as $i) : ?>
            <option value="<?= $i['id'] ?>"><?= $i['id']; ?></option>
            <?php endforeach; ?>
        </select>
    </td>

    <td>
        <input type="text" class="form-control" id="" name="quantity">
    </td>

    <td>
        <input type="text" class="form-control" id="" name="unit_rate">
    </td>

    <td>
        <input type="text" class="form-control" id="" name="amount">
    </td>
    <td>
        <button class="btn btn-danger" id="delete-row"><i class="fa fa-times"></i></button>
    </td>
</tr>