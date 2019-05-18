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
                                     <h2>Data Buku</h2>
                                    <p>Daftar Buku Di Perpustakaan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <a href="<?= base_url('Buku/create')?>" data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i> Tambah Data Buku</a>
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
                            
                            <table class="dtable table table-sc-ex">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Judul Buku</th>
                                        <th>Pengarang</th>
                                        <th>Penerbit</th>
                                        <th>Tahun Terbit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach ($listBuku as $key => $value) { ?>
                                    <tr>
                                        <td><?= $i++?></td>
                                        <td><?= $value->judul_buku ?></td>
                                        <td><?= $value->pengarang ?></td>
                                        <td><?= $value->penerbit ?></td>
                                        <td><?= $value->tahun_terbit ?></td>
                                        <td>
                                            <a href="<?= base_url('Buku/edit/'.$value->kd_register)?>" class="btn btn-sm btn-warning notika-btn-success waves-effect">Edit</a>
                                            <a href="<?= base_url('Buku/delete/'.$value->kd_register)?>" class="btn btn-sm btn-danger notika-btn-success waves-effect">Delete</a>
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