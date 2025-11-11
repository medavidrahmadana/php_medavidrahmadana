<?php
// Soal 1a (input)
if (!isset($_POST['step'])) {
?>
    <form method="POST">
        <input type="hidden" name="step" value="2">
        <label>Inputkan Jumlah Baris:</label>
        <input type="number" name="baris" required> (contoh: 1)
        <br><br>
        <label>Inputkan Jumlah Kolom:</label>
        <input type="number" name="kolom" required> (contoh: 3)
        <br><br>
        <button type="submit">SUBMIT</button>
    </form>
<?php
    exit;
}

// Soal 1b (Generate Text field dan sesuai baris)
if ($_POST['step'] == 2) {
    $baris = $_POST['baris'];
    $kolom = $_POST['kolom'];
?>
    <form method="POST">
        <input type="hidden" name="step" value="3">
        <input type="hidden" name="baris" value="<?= $baris ?>">
        <input type="hidden" name="kolom" value="<?= $kolom ?>">

        <?php
        for ($i = 1; $i <= $baris; $i++) {
            for ($j = 1; $j <= $kolom; $j++) {
                echo "<label>$i.$j:</label> ";
                echo "<input type='text' name='data[$i][$j]' required> &nbsp;&nbsp;";
            }
            echo "<br>";
        }
        ?>
        <br>
        <button type="submit">SUBMIT</button>
    </form>
<?php
    exit;
}

// Soal 1c (HASIL)
if ($_POST['step'] == 3) {
    $data = $_POST['data'];

    foreach ($data as $i => $baris) {
        foreach ($baris as $j => $value) {
            echo "$i.$j : $value <br>";
        }
    }
    echo "<br><br>";
    echo "<form method='POST'>";
    echo "<button type='submit'>Back to Step 1</button>";
    echo "</form>";
}
?>