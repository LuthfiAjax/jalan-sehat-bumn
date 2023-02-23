<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="row mb-3">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="table-responsive p-3">
                    <h1 class="btn btn-lg btn-primary mb-4">Data Seluruh Peserta</h1>
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Nomor Peserta</th>
                                <th>Nama Peserta</th>
                                <th>Instansi</th>
                                <th>Nomor HP</th>
                                <th>Registrasi</th>
                                <th>Status</th>
                                <th>QR Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($peserta as $row) : ?>
                                <tr>
                                    <td><b><?= $row['nomor_urut']; ?></b></td>
                                    <td><?= $row['nama_peserta']; ?></td>
                                    <td><?= $row['instansi']; ?></td>
                                    <td><?= $row['nomor_hp']; ?></td>
                                    <td><?= date('d-m-Y H:i', $row['created']); ?> wib</td>
                                    <?php
                                    $text = ($row['hadir'] == 1) ? 'Hadir' : 'Belum';
                                    $color = ($row['hadir'] == 1) ? 'success' : 'warning';
                                    ?>
                                    <td><span class="btn btn-sm btn-<?= $color; ?>"> <?= $text; ?></span></td>
                                    <td>
                                        <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#qrcode_<?= $row['id_peserta']; ?>" href="#">View</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->

    <!-- Modal add slider -->
    <?php foreach ($peserta as $row) : ?>
        <div class="modal fade" id="qrcode_<?= $row['id_peserta']; ?>" tabindex="-1" role="dialog" aria-labelledby="add_sliderLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <img src="<?= base_url('assets/images/barcode/' . $row['barcode']); ?>" alt="qrcode">
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>