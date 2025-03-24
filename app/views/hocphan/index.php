<?php include __DIR__ . '/../layouts/header.php'; ?>

<h2>DANH SÁCH HỌC PHẦN</h2>
<table class="table">
    <thead>
        <tr>
            <th>Mã Học Phần</th>
            <th>Tên Học Phần</th>
            <th>Số Tín Chỉ</th>
            <th>Hành Động</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?= $row['MaHocPhan'] ?></td>
                <td><?= $row['TenHocPhan'] ?></td>
                <td><?= $row['SoTinChi'] ?></td>
                <td><button class="btn btn-success">Đăng Ký</button></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
