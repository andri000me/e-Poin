<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Beranda</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Beranda</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

            <div class="content m-6">
              <div class="row m-4">
                <div class="col-sm-12">
                  <h2>Selamat datang, <?php echo $data['nama_pengguna'];?>.</h2>
                  <h3>Hari ini adalah tanggal <?php echo date("d/m/Y") ?> </h3>
                </div>
              </div>

              <div class="row m-4">
                  <div class="col-sm-6">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Piket</h5>
                            <p class="card-text">Digunakan untuk menambahkan pelanggaran dan pencatatan izin keluar masuk sekolah.</p>
                            <div style="text-align:center;">
                            <a href="http://n3ts-lms.tk:2018/index.php?halaman=piket" class="btn btn-primary"><i class="fa fa-sign-in"></i> Piket</a>
                            </div>
                          </div>
                        </div>
                  </div>

                  <div class="col-sm-6">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Admin</h5>
                            <p class="card-text">Digunakan untuk menambahkan user, jenis pelanggaran, dan fitur management database lainnya.</p>
                            <div style="text-align:center;">
                            <a href="http://n3ts-lms.tk:2018/index.php?halaman=guru" class="btn btn-primary"><i class="fa fa-sign-in"></i> Guru</a>
                            <a href="http://n3ts-lms.tk:2018/index.php?halaman=pelajar" class="btn btn-primary"><i class="fa fa-sign-in"></i> Pelajar</a>
                            <a href="http://n3ts-lms.tk:2018/index.php?halaman=pelanggaran" class="btn btn-primary"><i class="fa fa-sign-in"></i> Pelanggaran</a>
                          </div>
                        </div>
                          </div>
                        </div>
                </div>
                <div class="row m-4">
                  <div class="col-sm-12">
                      <div class="card">
                          <div class="card-header">
                              <strong class="card-title">Pelanggaran Terbaru</strong>
                          </div>
                          <div class="card-body card-block" style="overflow:auto;">
                          <table id="bootstrap-data-table" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Pelanggar</th>
                                  <th>Pelanggaran</th>
                                  <th>Keterangan</th>
                                  <th>Poin</th>
                                  <th>Tanggal</th>
                                  <th>Petugas</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  $no   = 1;
                                  $x  = $koneksi->query("SELECT * FROM tb_datapelanggar, tb_pelanggaran, tb_pengguna, tb_pelajar
                                  WHERE tb_datapelanggar.id_pelajar =  tb_pelajar.id_pelajar
                                  AND tb_datapelanggar.id_pelanggaran = tb_pelanggaran.id_pelanggaran
                                  AND tb_datapelanggar.id_guru = tb_pengguna.id_pengguna ORDER by tanggal_pelanggaran DESC LIMIT 20");
                                  while ($pelanggaran = $x->fetch_assoc()) {
                                  ?>
                              <tr>
                                  <td><?php echo $no++;?></td>
                                  <td><?php echo $pelanggaran['nama_pelajar']?></td>
                                  <td><?php echo $pelanggaran['nama_pelanggaran']?></td>
                                  <td><?php echo $pelanggaran['keterangan_pelanggaran']?></td>
                                  <td><?php echo $pelanggaran['poin_pelanggaran']?></td>
                                  <td><?php echo $pelanggaran['tanggal_pelanggaran']?></td>
                                  <td><?php echo $pelanggaran['nama_pengguna']?></td>
                                </tr>
                                  <?php } ?>
                              </tbody>
                            </table>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="row m-4">
                  <div class="col-lg-12">
                      <div class="card" style="overflow:auto;">
                          <div class="card-header">
                              <strong class="card-title">Dispensasi Terbaru</strong>
                          </div>
                          <div class="card-body card-block">
                          <table id="bootstrap-data-table2" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Siswa/i</th>
                                  <th>Dispen</th>
                                  <th>Deskripsi</th>
                                  <th>Tanggal</th>
                                  <th>Petugas</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  $no   = 1;
                                  $y  = $koneksi->query("SELECT * FROM tb_datadispen, tb_pengguna, tb_pelajar
                                  WHERE tb_datadispen.id_pelajar = tb_pelajar.id_pelajar
                                  AND tb_datadispen.id_guru = tb_pengguna.id_pengguna ORDER by tgl_dibuat DESC LIMIT 10");
                                  while ($pelanggaran = $y->fetch_assoc()){
                                  ?>
                              <tr>
                                  <td><?php echo $no++;?></td>
                                  <td><?php echo $pelanggaran['nama_pelajar']?></td>
                                  <td><?php echo $pelanggaran['nama_dispen']?></td>
                                  <td><?php echo $pelanggaran['deskripsi_dispen']?></td>
                                  <td><?php echo $pelanggaran['tgl_dibuat']?></td>
                                  <td><?php echo $pelanggaran['nama_pengguna']?></td>
                                </tr>
                                  <?php } ?>
                              </tbody>
                            </table>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
  </div>
