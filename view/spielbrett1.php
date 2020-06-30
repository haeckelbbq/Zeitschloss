<?php echo 'Was tust du? (WASD-Tasten bewegen)</br>
<form action="index.php" method="post">
    <input type="hidden" name="action" value="updaten">
    <input type="hidden" name="id" value="1">
    <table>
        <tbody>
            <tr>
                <td>Eingabe: </td>
                <td><input name="spielfeld_id" type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submitname" value="bestätigen"></td>
            </tr>
        </tbody>
    </table>
</form>';
?>
<?php echo '<pre>';
print_r($spielbrett);
echo '</pre>';