<?php 
  include('koneksi.php');
  $id = $_GET['id'];
  $query = "SELECT * FROM tbl_parkir WHERE id_parkir = $id LIMIT 1";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_array($result);

  $jenis_kendaraan_options = array("Mobil", "Motor");
  $jenis_kendaraan_selected = isset($row['jenis_kendaraan']) ? $row['jenis_kendaraan'] : '';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Siswa</title>
  </head>

  <body>
    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              UPDATE PARKIR
            </div>
            <div class="card-body">
              <form action="update-parkir.php" method="POST">
                
                <div class="form-group">
                  <label>Plat</label>
                  <input type="text" name="plat_nomor" value="<?php echo $row['plat_nomor'] ?>" placeholder="Masukkan Plat" class="form-control">
                  <input type="hidden" name="id_parkir" value="<?php echo $row['id_parkir'] ?>">
                </div>

                <div class="form-group">
                  <label>Jenis Kendaraan</label>
                  <select name="jenis_kendaraan" class="form-control">
                    <?php foreach ($jenis_kendaraan_options as $option) : ?>
                    <option value="<?php echo $option; ?>" <?php echo ($jenis_kendaraan_selected == $option) ? 'selected' : ''; ?>>
                    <?php echo ucfirst($option); ?>
                    </option>
                    <?php endforeach; ?>
                  </select> 
                </div>

                <button type="submit" class="btn btn-success">UPDATE</button>
                <button type="reset" class="btn btn-warning">RESET</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>
