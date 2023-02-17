<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEK Rekening / E-wallet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<?php
ini_set('display_errors', 0);
$url = "https://cekrek.heirro.dev/api/check";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($_POST));
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
curl_close($curl);
$result = json_decode($result, true);
// var_dump($result["data"][0]["accountNumber"]);
// return json_encode($result);

?>
<body>
<nav class="navbar bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand"><b>Cek Rekening Online</b></a>
  </div>
</nav>
<div class="container d-flex justify-content-center">
    <form action="" method="post">
        <h5 class="mt-2 text-center">Welcome!</h5>
        <br><label for="">Bank/E-wallet</label><br>
            <select class="form-select" name="accountBank" aria-label="Default select example">
  <option selected>===Pilih===</option>
  <option value="bca">BCA</option>
  <option value="bca">Blu By BCA</option>
  <option value="permata">Bank Permata</option>
  <option value="danamon">Bank Danamon</option>
  <option value="dki">Bank DKI</option>
  <option value="cimb">CIMB Niaga</option>
  <option value="tabungan_pensiunan_nasional">BTPN/Jenius</option>
  <option value="nationalnobu">Bank NOBU</option>
  <option value="bni">BNI</option>
  <option value="artos">Bank Jago</option>
  <option value="hana">Line Bank</option>
  <option value="gopay">gopay</option>
  <option value="ovo">ovo</option>
  <option value="dana">dana</option>
</select>
        <label for="">No Rek/ E-wallet</label><br>
        <input type="number" class="form-control" name="accountNumber">
        <button type="submit" class="btn btn-primary mt-2">
            Submit
        </button><br>
    <?php
    if($result != NULL){

    ?>
     Bank/ E-Wallet : <b><?= $result["data"][0]["accountBank"]; ?></b><br>
     Nomor : <b><?= $result["data"][0]["accountNumber"]; ?></b><br>
     Nasabah : <b><?= $result["data"][0]["accountName"]; ?></b>
     <?php
    }else{
        echo "<br>Data Tidak Ditemukan";
    }
     ?>
    </form>
     </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
