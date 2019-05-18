<div class="form-example-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="alert alert-success" style="display: none;">
                    
                </div>
                <div class="alert alert-danger" style="display: none;">
                    
                </div>
                <form method="POST" action="<?= base_url('Peminjaman/store')?>">
                    <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Tambah Peminjaman Buku</h2>
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
                                                <option value="">-</option>
                                                <?php foreach($listBuku as $val) { ?>
                                                <option value="<?=$val->kd_register?>"><?= $val->judul_buku?></option>
                                                <?php } ?>
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
                                                <option value="">-</option>
                                                <?php foreach($listAnggota as $val) { ?>
                                                <option value="<?=$val->kd_anggota?>"><?= $val->nama?></option>
                                                <?php } ?>
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
                                        <label class="hrzn-fm">Tanggal Pinjam</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="date" name="tanggal_pinjam" class="form-control input-sm" placeholder="Masukan Tanggal Pinjam">
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
<script type="text/javascript">
    $(document).ready(function(){
        $('form').submit(function(e){
            e.preventDefault();
            $.ajax({
                method : $(this).attr('method'),
                url : $(this).attr('action'),
                data : $(this).serializeArray(),
                dataType : 'json',
                success : function(data){
                    if(data.status == 'success')
                    {
                        $('.alert-success').html(data.message);
                        $('.alert-success').fadeIn();
                        setTimeout(function(){
                            $('.alert-success').fadeOut();
                        },3000);
                        $('form').find('input,select').val('');
                    }
                    else
                    {
                        $('.alert-danger').html(data.message);
                        $('.alert-danger').fadeIn();
                        setTimeout(function(){
                            $('.alert-danger').fadeOut();
                        },3000);  
                    }
                }
            });
        });
    });
</script>