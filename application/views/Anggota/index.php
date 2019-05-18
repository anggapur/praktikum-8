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
                                     <h2>Data Anggota</h2>
                                    <p>Daftar Anggota Di Perpustakaan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <a href="<?= base_url('Anggota/create')?>" data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i> Tambah Data Anggota</a>
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
                    <div class="alert alert-success" style="display: none;">
                    
                    </div>
                    <div class="alert alert-danger" style="display: none;">
                        
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list">
                        <div class="bsc-tbl">
                            <form method='post' action="<?= base_url() ?>Anggota/index">
                                <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="nk-int-st">
                                            <input type="text" name="search" class="form-control input-sm" placeholder="Cari" value="<?=$search?>">
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <input type="submit" name="submit" class="btn btn-success notika-btn-success btn-sm" value="Cari">
                                        <input type="submit" name="reload" class="btn btn-warning notika-btn-warning btn-sm" value="Reload">
                                    </div>
                                </div>
                            </div>
                            </form>
                            <table class="table table-sc-ex">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Prodi</th>
                                        <th>Jenjang</th>
                                        <th>Alamat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach ($listBuku as $key => $value) { ?>
                                    <tr id="row<?=$value->kd_anggota?>">
                                        <td><?= $i++?></td>
                                        <td><?= $value->nama ?></td>
                                        <td><?= $value->prodi ?></td>
                                        <td><?= $value->jenjang ?></td>
                                        <td><?= $value->alamat ?></td>
                                        <td>
                                            <a href="<?= base_url('Anggota/edit/'.$value->kd_anggota)?>" class="btn btn-sm btn-warning notika-btn-success waves-effect">Edit</a>
                                            
                                              <a data-id="row<?=$value->kd_anggota?>" href="<?= base_url('Anggota/delete/'.$value->kd_anggota)?>" class="delete-btn btn btn-sm btn-danger notika-btn-success waves-effect">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                    
                                </tbody>
                            </table>
                            <?= $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

     <script type="text/javascript">
        $(document).ready(function(e){
            $('.delete-btn').click(function(e){
                e.preventDefault();
                urls = $(this).attr('href');
                // alert(urls);
                dataId = $(this).attr('data-id');

                $.ajax({
                method : 'GET',
                url : urls,
                dataType : 'json',
                success : function(data){
                    if(data.status == 'success')
                    {
                        $('#'+dataId).fadeOut(300);
                        $('.alert-success').html(data.message);
                        $('.alert-success').fadeIn();
                        setTimeout(function(){
                            $('.alert-success').fadeOut();
                        },3000);
                        
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

                return false;
            });
        });
    </script>