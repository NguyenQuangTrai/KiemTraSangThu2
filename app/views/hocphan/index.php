

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
    <?php foreach ($result as $row) { ?>
            <tr>
                <td><?= $row['MaHP'] ?></td>
                <td><?= $row['TenHP'] ?></td>
                <td><?= $row['SoTinChi'] ?></td>
                <td><button class="btn btn-success">Đăng Ký</button></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

