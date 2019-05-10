<div class="breadcomb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="notika-icon notika-form"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                     <h2>Data Peminjaman Buku</h2>
                                    <p>-</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <a href="<?= base_url('Peminjaman/create')?>" data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i> Tambah Pinjam Buku</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="normal-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php if($this->session->flashdata('state')) { ?>
                    <div class="alert alert-<?=$this->session->flashdata('state')?>">
                        <?= $this->session->flashdata('message')?>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list">
                        <div class="bsc-tbl">
                            <table class="table table-sc-ex">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Buku</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Anggota</th>
                                        <th>Petugas</th>                                        
                                        <th>Action</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach ($listBuku as $key => $value) { ?>
                                    <tr>
                                        <td><?= $i++?></td>
                                        <td>
                                            <b><?= $value->judul_buku ?></b><br>
                                            <?= $value->pengarang ?><br>
                                            <?= $value->penerbit ?><br>
                                            <?= $value->tahun_terbit ?><br>
                                        </td>
                                        <td><?= $value->tanggal_pinjam ?></td>
                                        <td>
                                            <?php
                                                if($value->tanggal_kembali == "" or $value->tanggal_kembali == null)
                                                    echo '<span class="label label-danger">BELUM KEMBALI</span>';
                                                else
                                                    echo '<span class="label label-success">'.$value->tanggal_kembali.'</span>';
                                            ?>
                                                
                                            </td>
                                        <td><?= $value->namaAnggota?></td>
                                        <td><?= $value->namaPetugas?></td>
                                        <td>
                                            <a href="<?= base_url('Peminjaman/edit/'.$value->kd_pinjam)?>" class="btn btn-sm btn-warning notika-btn-success waves-effect">Edit</a>
                                            <a href="<?= base_url('Peminjaman/delete/'.$value->kd_pinjam)?>" class="btn btn-sm btn-danger notika-btn-success waves-effect">Delete</a>
                                        </td>
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