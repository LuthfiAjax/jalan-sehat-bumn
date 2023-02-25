<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="row mb-3">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="table-responsive p-3">
                    <h1 class="btn btn-primary mb-4">Data Peserta Instansi</h1>
                    <a class="btn btn-danger mb-4" href="<?= base_url('download/instansi-data'); ?>">Download</a>
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Nomor Peserta</th>
                                <th>Nama Peserta</th>
                                <th>Kategori</th>
                                <th>Asal</th>
                                <th>Nomor HP</th>
                                <th>Present</th>
                                <th>QR Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($hadir as $row) : ?>
                                <tr>
                                    <td><b><?= $row['nomor_urut']; ?></b></td>
                                    <td><?= $row['nama_peserta']; ?></td>
                                    <?php $kategori = ($row['kategori'] == 1) ? 'Instansi' : 'Umum'; ?>
                                    <td><?= $kategori; ?></td>
                                    <td><?= $row['alamat']; ?></td>
                                    <td><?= $row['nomor_hp']; ?></td>
                                    <td><?= date('d-m-Y H:i', $row['time_hadir']); ?> wib</td>
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

    <?php foreach ($hadir as $row) : ?>
        <div class="modal fade" id="qrcode_<?= $row['id_peserta']; ?>" tabindex="-1" role="dialog" aria-labelledby="add_sliderLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <img src="<?= base_url('assets/images/barcode/' . $row['barcode']); ?>" alt="qrcode">
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>