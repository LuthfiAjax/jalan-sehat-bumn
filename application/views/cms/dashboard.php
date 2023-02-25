<div class="container-fluid" id="container-wrapper">
    <?= $this->session->flashdata('message'); ?>
    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <a href="#" id="scan" style="text-decoration: none;">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs text-dark font-weight-bold text-uppercase mb-1">Kehadiran</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Scan QR Code</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-camera fa-5x text-primary"></i>
                            </div>
                        </div>
                    </a>
                    <div id="reader"></div>
                    <div class="alert" style="display: none;">QR Code berhasil diproses!</div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <a href="#" data-toggle="modal" data-target="#undian" style="text-decoration: none;">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs text-dark font-weight-bold text-uppercase mb-1">Setting Undian</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Time</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clock fa-4x text-warning"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- New User Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <a href="<?= base_url('cms/all-peserta'); ?>" style="text-decoration: none;">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs text-dark font-weight-bold text-uppercase mb-1">Total Seluruh Peserta</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $this->db->get('peserta')->num_rows(); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-4x text-info"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <a href="<?= base_url('cms/peserta-hadir'); ?>" style="text-decoration: none;">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs text-dark font-weight-bold text-uppercase mb-1">Total Peserta Hadir</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $this->db->get_where('peserta', ['hadir' => 1])->num_rows(); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-4x text-success"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <a href="<?= base_url('cms/peserta-instansi'); ?>" style="text-decoration: none;">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs text-dark font-weight-bold text-uppercase mb-1">Total Peserta Instansi</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $this->db->get_where('peserta', ['kategori' => 1])->num_rows(); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-4x text-primary"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <a href="<?= base_url('cms/peserta-umum'); ?>" style="text-decoration: none;">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs text-dark font-weight-bold text-uppercase mb-1">Total Peserta Umum</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $this->db->get_where('peserta', ['kategori' => 2])->num_rows(); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-4x text-danger"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="table-responsive p-3">
                    <h3 class="text-primary mb-3"><b>Daily Report Peserta</b></h3>
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Nomor Peserta</th>
                                <th>Nama Peserta</th>
                                <th>KTP</th>
                                <th>Kategori</th>
                                <th>Asal</th>
                                <th>Nomor HP</th>
                                <th>Registrasi</th>
                                <th>QR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($current as $row) : ?>
                                <tr>
                                    <td><b><?= $row['nomor_urut']; ?></b></td>
                                    <td><?= $row['nama_peserta']; ?></td>
                                    <td><?= $row['ktp']; ?></td>
                                    <?php $kategori = ($row['kategori'] == 1) ? 'Instansi' : 'Umum'; ?>
                                    <td><?= $kategori; ?></td>
                                    <td><?= $row['alamat']; ?></td>
                                    <td><?= $row['nomor_hp']; ?></td>
                                    <td><?= date('d-m-Y H:i', $row['created']); ?> wib</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#qrcode_<?= $row['id_peserta']; ?>" href="">View</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal add slider -->
    <div class="modal fade" id="undian" tabindex="-1" role="dialog" aria-labelledby="undianLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="undianLabel">Setting Waktu Undian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('cms/undian'); ?>" method="post">
                        <label for="start">Angka Mulai</label>
                        <div class="input-group mb-3">
                            <input type="number" autocomplete="off" class="form-control" id="start" name="start" aria-describedby="basic-addon3" value="<?= $undian->start; ?>">
                        </div>
                        <label for="finish">Angka Berakhir</label>
                        <div class="input-group mb-3">
                            <input type="number" autocomplete="off" class="form-control" id="finish" name="finish" aria-describedby="basic-addon3" value="<?= $undian->finish; ?>">
                        </div>
                        <label for="time">Setting Waktu <small class="text-danger">( Satuan Detik )</small></label>
                        <div class="input-group mb-3">
                            <input type="number" autocomplete="off" class="form-control" id="time" name="time" aria-describedby="basic-addon3" value="<?= $undian->time; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Setting</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal qr code -->
    <?php foreach ($current as $row) : ?>
        <div class="modal fade" id="qrcode_<?= $row['id_peserta']; ?>" tabindex="-1" role="dialog" aria-labelledby="add_sliderLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <img src="<?= base_url('assets/images/barcode/' . $row['barcode']); ?>" alt="qrcode">
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>