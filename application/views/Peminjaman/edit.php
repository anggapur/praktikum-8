<div class="form-example-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form method="POST" action="<?= base_url('Peminjaman/update/'.$dataBuku[0]->kd_pinjam)?>">
                    <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Edit Peminjaman Buku</h2>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Judul Buku</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <select name="kd_register" class="form-control">
                                               <?php foreach($listBuku as $val) { 
                                                    if($dataBuku[0]->kd_register == $val->kd_register)
                                                        echo '<option value="'.$val->kd_register.'" selected>'.$val->judul_buku.'</option>';
                                                    else
                                                        echo '<option value="'.$val->kd_register.'" >'.$val->judul_buku.'</option>';
                                                 } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Anggota</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <select name="kd_anggota" class="form-control">
                                                <?php foreach($listAnggota as $val) { 
                                                    if($dataBuku[0]->kd_anggota == $val->kd_anggota)
                                                        echo '<option value="'.$val->kd_anggota.'" selected>'.$val->nama.'</option>';
                                                    else
                                                        echo '<option value="'.$val->kd_anggota.'" >'.$val->nama.'</option>';
                                                 } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"> Tanggal Pinjam</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="date" name="tanggal_pinjam" class="form-control input-sm" placeholder="Masukan Tanggal Pinjam" value="<?=$dataBuku[0]->tanggal_pinjam?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Tanggal Kembali</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="date" name="tanggal_kembali" class="form-control input-sm" placeholder="Masukan Tanggal Pinjam" value="<?=$dataBuku[0]->tanggal_kembali?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int mg-t-15">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <button class="btn btn-success notika-btn-success">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>