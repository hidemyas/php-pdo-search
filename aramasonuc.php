<?php require_once "connect.php";

$kelime =   Filtrele($_POST['kelime']);
?>
<!doctype html>
<html lang="tr-TR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arama Uygulaması</title>
</head>
<body>
<form action="aramasonuc.php" method="post">

    <table width="500" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr style="margin: 20px 0px;">
            <td><input type="text" name="kelime" value="<?php echo $kelime;?>" style="width: 100%;height: 30px;padding: 0 20px;"></td>
            <td><input type="submit" value="ARA" style="height: 30px"></td>
        </tr>
    </table>
</form>
<?php
$param  =   "%$kelime%";
$query  =   $db_connect->prepare('SELECT * FROM esyalar WHERE adi LIKE ?  ' );
$query->execute([$param]);

$record_count   =   $query->rowCount();
$records         =   $query->fetchAll(PDO::FETCH_ASSOC);
echo "Bulunan Kayıtlar : <br/>";
foreach ($records as $record){
    echo $record['adi']."<br/>";
}
?>
</body>
</html>