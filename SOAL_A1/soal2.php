<?php
$connect = new mysqli("localhost", "root", "", "testdb");

// buat handle search
$keyword = $_GET['search'] ?? '';

if ($keyword != '') {
    $sql = "SELECT hobi, COUNT(DISTINCT person_id) AS jumlah_person
            FROM hobi 
            WHERE hobi LIKE '%$keyword%'
            GROUP BY hobi
            ORDER BY jumlah_person DESC";
} else {
    $sql = "SELECT hobi, COUNT(DISTINCT person_id) AS jumlah_person
            FROM hobi 
            GROUP BY hobi
            ORDER BY jumlah_person DESC";
}

$result = $connect->query($sql);
?>

<form method="GET">
    <label>Search by hobi:</label>
    <input type="text" name="search" value="<?= $keyword ?>">
    <button type="submit">Search</button>
</form>

<br>

<table border="1" cellpadding="6">
    <tr>
        <th>Hobi</th>
        <th>Jumlah Person</th>
    </tr>
    <!-- handle jika data tidak ada (misal "ngaji") -->
    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['hobi'] ?></td>
                <td><?= $row['jumlah_person'] ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="2" style="text-align:center;color:red;">
                Data tidak ditemukan
            </td>
        </tr>
    <?php endif; ?>
</table>