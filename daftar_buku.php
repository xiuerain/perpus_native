<?php
    include "header.php";
?>
<h2>Daftar Buku</h2>
<div class="row">
    <?php
    include "koneksi.php";
    $qry_buku=mysqli_query($conn,"select * from buku");
 while($dt_buku=mysqli_fetch_array($qry_buku)){
    ?>
    <div class="col-md-3">
        <div class="card">
            <img src="" alt="">
            <div class="card-body">
                <h5 class="card-title"><?=$dt_buku['nama buku']?></h5>
                <p class="card-text"><?=substr($dt_buku['dekripsi'],0,20)?></p>
                <a href="pinjam_buku.php?id_buku=<?=$dt_buku['id_buku']?>" class="btn btnprimary">Pinjam</a>
            </div>
        </div>
    </div>
    <?php
 }
    ?>
    include "footer.php";
</div>