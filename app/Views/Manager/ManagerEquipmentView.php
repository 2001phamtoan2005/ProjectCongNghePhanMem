<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>

<!-- The Delete Modal -->
<form action="<?= base_url('manager/reomveEquip')?>" method="post" id="deleteModal">
<div class="modal" id="DelModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" style="color:black">Delete Equipment</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class="card-body">
        <p style="color:black">
            <span>You are going to delete  equipment</span>
            <span id="nameps" style="font-weight: bold;"></span>   
            <span> from this user.</span>        
            <span><br>Are you sure?</span>
        </p>
        <span id="error" class="text-danger"></span>
                   
    </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <input type="hidden"  name="id" id="id" class="id" style="color:black">
      <input type="hidden"  name="iduser" id="iduser" class="id" style="color:black">
        <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> -->
        <button type="submit" class="btn btn-primary" >  Yes  </button>
        &nbsp;
        <!-- <button type="button" class="btn btn-close" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancel </button> -->
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>
</div>
</form>

<!-- The Add Modal -->
<form action="<?= base_url('manager/addEquip')?>" method="post" id="addModel">
<div class="modal" id="AddModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" style="color:black">Add equipment</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class="card-body">
        <p style="color:black">
            <span>You are going to add equipment</span>
            <span id="nameps" style="font-weight: bold;"></span>      
            <span> to this user.</span>
            <span><br>Are you sure?</span>
        </p>
        <span id="error2" class="text-danger"></span>
    </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <input type="hidden" name="id" id="id" class="id">
      <input type="hidden" name="iduser" id="iduser" class="id">
        <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> -->
        <button type="submit" class="btn btn-primary" >  Yes  </button>
        &nbsp;
        <!-- <button type="button" class="btn btn-close" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancel </button> -->
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>
</div>
</form>



<div style="display: flex; flex-direction: column; width: 100%; height: 100%">
    <h3 class="text-center " style="color:black"><?php echo lang('component.managerequipment'); ?></h3>

    <div class="row" style="width: 100%; height: 100%; color: #333">
        <div class="col col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center"><?php echo lang('component.allocationDevices'); ?></h3>
                </div>
                <div class="card-body" style="display:flex;flex-direction:column;height:500px">
                    <div class="d-flex">
                        <!-- form here -->
                        <form class="w-100" action="<?=base_url('manager/getuser') ?>" method="post">
                            <div class="row">
                                <div class="col col-6">
                                    <!-- fint id NV -->
                                    <div class="input-group mb-3">
                                        <input
                                            type="text"
                                            id="userID"
                                            name="userID"
                                            value="<?= $id ?>"
                                            class="form-control"
                                            placeholder="Enter ID"
                                            aria-label="Recipient's username"
                                            aria-describedby="button-addon2"
                                        />
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                            Search
                                        </button>
                                    </div>
                                    <!-- info NV -->
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Name</span>
                                        <input
                                            id="name"
                                            value="<?= $name ?>"
                                            type="text"
                                            class="form-control"
                                            placeholder=""
                                            aria-label="Username"
                                            aria-describedby="basic-addon1"
                                            readonly
                                        />
                                    </div>
                                </div>
                                <div class="col col-6">
                                    <!-- info NV -->
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Position</span>
                                        <input
                                            id="position"
                                            value="<?= $position ?>"
                                            type="text"
                                            class="form-control"
                                            placeholder=""
                                            aria-label="Username"
                                            aria-describedby="basic-addon1"
                                            readonly
                                        />
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Departments</span>
                                        <input
                                            id="department"
                                            value="<?= $department ?>"
                                            type="text"
                                            class="form-control"
                                            placeholder=""
                                            aria-label="Username"
                                            aria-describedby="basic-addon1"
                                            readonly
                                        />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php if(session()->getFlashdata('msgNull')):?>
                    <div id="alertStateUser" class="alert alert-warning" style="color:red; padding-left:15px">
                        <?= session()->getFlashdata('msgNull') ?>
                    </div>
                    <?php endif;?>
                    <!-- table cap phat thiet bi -->
                    <div class="" style="overflow-y: scroll; flex:1">
                        <table class="table w-100" id="tableuser">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col"><?php echo lang('component.equipmentid'); ?></th>
                                    <th scope="col"><?php echo lang('component.Name'); ?></th>
                                    <th scope="col"><?php echo lang('component.NotePosition'); ?></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center"><?php echo lang('component.typeDevices'); ?></h3>
                </div>
                <div class="card-body" style="overflow-y:scroll;height: 500px">
                    <div class="d-flex">
                        <!-- form  -->
                        
                    </div>
                    <!-- table cap phat thiet bi -->
                    <div >
                    <table class="table w-100" id="table_equip">
                            <thead class="table-dark">
                                <tr>
                                <th scope="col"><?php echo lang('component.equipmentid'); ?></th>
                                    <th scope="col"><?php echo lang('component.Name'); ?></th>
                                    <th scope="col"><?php echo lang('component.NotePosition'); ?></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('style') ?>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css" />

        <?= $this->endSection() ?>

        <?= $this->section('script') ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <!-- <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script> -->
        <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

        <script type="text/javascript" language="javascript">

            $(document).ready( function () {
              var t=$('#tableuser').DataTable({
                    //bProcessing: true,
                    reponsive: true,
                    processing: true,
                    //serverSide: true,
                    "ordering":true,
                    orderable: true,
                    data: <?= json_encode($data)?>,
                        columnDefs: [{
                                //"render": createManageBtn,
                                "data": null,
                                "targets": [3]
                            }],
                            columns: [
                            {
                                data:"equipment_id",
                            },
                            {
                                data: "name"
                            },

                            {
                                data: "note"
                            },
                            {
                                orderable: false,
                                "defaultContent": '<center>'                   
                                +'<button id="delBtn" class="btn btn-danger"><i class="fa-solid fa-trash-can mr-1"></i><?php echo lang('component.Delete'); ?></button>'
                                +'</center>'
                            },
                        ],
                });
                
                var t2=$('#table_equip').DataTable({
                    //bProcessing: true,
                    reponsive: true,
                    processing: true,
                    //serverSide: true,
                    "ordering":true,
                    orderable: true,
                    data: <?= json_encode($data_equip)?>,
                        columnDefs: [{
                                //"render": createManageBtn,
                                "data": null,
                                "targets": [3]
                            }],
                            columns: [
                            {
                                data:"equipment_id",
                            },
                            {
                                data: "name"
                            },

                            {
                                data: "note"
                            },
                            {
                                orderable: false,
                                "defaultContent": '<center>'
                    +'<button id="editBtn" class="btn btn-success"><i class="fa fa-edit mr-1"></i><?php echo lang('component.Register'); ?></button>'
                    +'</center>'
                            },
                        ],
                });
                //load modal del
                $('#tableuser tbody').on( 'click', '#delBtn', function () {
                var data = t.row( $(this).parents('tr') ).data();
                var user=$('#userID').val();
                console.log(user);
                $('#DelModal #id').val(data.equipment_id); 
                $('#DelModal #iduser').val(user); 
                $('#DelModal #nameps').text(data.equipment_id);  
                $('#DelModal #error').text("");  
                $('#DelModal').modal('show');
                } );
                //load modal add
                $('#table_equip tbody').on( 'click', '#editBtn', function () {
                var data = t2.row( $(this).parents('tr') ).data();
                var user=$('#userID').val();
                console.log(user);
                $('#AddModal #id').val(data.equipment_id); 
                $('#AddModal #iduser').val(user);
                $('#AddModal #nameps').text(data.equipment_id);      
                $('#AddModal #error').text("");  
                $('#AddModal').modal('show');
                } );
                $('#deleteModal').submit(function(e){       
                    $.ajax({
                    url: "<?=base_url('manager/reomveEquip') ?>",
                    type: "POST",
                    data: $(this).serializeArray(),
                    beforeSend: function( xhr ) {
                        xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
                        
                    }
                    })
                    .done(function( data ) {
                        if ( data!='Please enter user!' ) {
                            location.reload();
                        }
                        else
                        {
                            $('#error').html(data);
                        }
                    });
                    e.preventDefault();
                });
                
                $('#addModel').submit(function(e){       
                    $.ajax({
                    url: "<?=base_url('manager/addEquip') ?>",
                    type: "POST",
                    data: $(this).serializeArray(),
                    beforeSend: function( xhr ) {
                        xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
                        
                    }
                    })
                    .done(function( data ) {
                        if ( data!='Please enter user!' ) {
                            location.reload();
                        }
                        else
                        {
                            $('#error2').html(data);
                        }
                    });
                    e.preventDefault();
                });
            
            } );
        </script>


<?= $this->endSection() ?>

