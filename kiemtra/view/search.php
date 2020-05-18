<?php
?>
<h2>Danh sách khách hàng</h2>

<br>
<br>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th>STT</th>
        <th>Tên hàng</th>
        <th>Loại hàng</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Ngày Tạo</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $key => $product): ?>
    <tr>
        <td><?php echo ++$key ?></td>
        <td><?php echo $product->name ?></td>
        <td><?php echo $product->category ?></td>
        <td><?php echo $product->price ?></td>
        <td><?php echo $product->quantity ?></td>
        <td><a href="./index.php?page=edit&id=<?php echo $product->id; ?>" class="btn btn-warning btn-sm">Chỉnh sửa</a>
            <a href="./index.php?page=delete&id=<?php echo $product->id; ?>" class="btn btn-danger btn-sm">Xóa</a></td>
        <?php endforeach; ?>
    </tbody>
</table>
