<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-5 text-gray-800">Overview Data <?=$section?></h1>
<?=$this->session->flashdata('flash') ?>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
      <div>
        <span class="m-0 font-weight-bold text-primary">Data <?=$section ?></span>
      </div>
      <div class="ml-auto">
        <a class="btn btn-sm btn-primary text-light" href="#" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> <b>Tambah</b></a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th width="10px">NO</th>
              <th>Nama Komisariat</th>
              <th width="100px" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($tampil as $t){ 
              $id = str_replace(['=','+','/'], ['-','_','~'], $this->encrypt->encode($t->idKomisariat));
              $idd=$t->idKomisariat
              ?>
            <tr>
              <td><?=$no ?></td>
              <td><?=$t->namaKomisariat ?></td>
              <td><a href="" class="btn btn-sm btn-warning" title="Edit" data-toggle="modal" data-target="#editModal<?=$idd?>">Edit</a>
                  <button href="" onclick="deleteConfirm('<?=base_url('admin/komisariat/delete/'.$id) ?>')" class="btn btn-sm btn-danger" title="Hapus" data-target="#modalDelete" data-toggle="modal">Hapus</button>
              </td>
            </tr>
          <?php $no++; };  ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>


<!-- Modal Delete -->
  <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Anda Yakin ingin Menghapus Data?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
          <a type="button" class="btn btn-danger btn-sm" id="hapus">Hapus</a>
        </div>
      </div>
    </div>
  </div>
<!-- End Modal Delete -->


<!-- Modal add -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="<?=base_url('admin/komisariat/add')?>">
          
          <div class="modal-body">
            <div>          
              <input type="text" name="nama" placeholder="Nama Komisariat..." class="form-control" id="nama">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-info" id="add">Tambah</button>
        </form>
          </div>
      </div>
    </div>
  </div>
<!-- End Modal add -->


<!-- Modal Edit -->
  <?php foreach ($tampil as $tm) { 
    $a    = $tm->idKomisariat;
    $iid   = str_replace(['=','+','/'], ['-','_','~'], $this->encrypt->encode($a));
    ?>
    <div class="modal fade" id="editModal<?=$a?>" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="<?=base_url('admin/komisariat/edit')?>">
            
            <div class="modal-body">
              <div> 
                <input type="hidden" name="oldNama" value="<?=$tm->namaKomisariat?>">
                <input type="text" name="namaEdit" placeholder="Nama Komisariat..." class="form-control" id="nama" value="<?=$tm->namaKomisariat ?>" autocomplete="off">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-sm btn-info" id="add">Update</button>
          </form>
            </div>
        </div>
      </div>
    </div>
  <?php } ?>
<!-- End Modal edit -->



<script>
  function deleteConfirm(url)
  {
    $('#hapus').attr('href',url);
    $('#modalDelete').modal();
  }

</script>