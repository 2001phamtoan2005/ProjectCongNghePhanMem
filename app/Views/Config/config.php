<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>




<!-- The Modal -->
<form id="createForm" action="<?=base_url('config/addconfig') ?>" method="post">
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create New Config</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class="card-body">
    
            <div class="row g-3">
                <div class="col-md-12">
                    <label for="inputType" class="form-label"><?php echo lang('component.Type'); ?></label>
                    <input type="text" list="datalistOptions" name="typeid" class="form-control" id="typeid">
                    <!-- <input id="typeid" type="text" name="typeid"  autocomplete="off"  class="form-control " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                    <input  hidden="hidden" id="type" type="text" name="type"   class="form-control " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" /> -->
                
                    <datalist id="datalistOptions">
                    <?php foreach($type as $item){?>
                        <option value="<?=$item['name_type']?>"><?=$item['name_type']?></option>"
                        <?php }?>
                    </datalist>
                </div>
                <div class="col-md-12">
                    <label for="inputEmail1" class="form-label"><?php echo lang('component.Config'); ?></label>
                    <input type="text"  name="addname" class="form-control" id="addname">
                    <span id="error" class="text-danger"></span>
                </div>
                <div class="col-md-12">
                    <label for="inputEmail2" class="form-label"><?php echo lang('component.ShortNamePosition'); ?></label>
                    <input type="text"  name="addshort_name" class="form-control" id="addshort_name">
                </div>
                
                <div class="col-md-12">
                    <label for="inputEmail2" class="form-label"><?php echo lang('component.NotePosition'); ?></label>
                    <input type="text"  name="addnote" class="form-control" id="addnote">
                </div>                         
                <div class="col-md-12 d-flex justify-content-end mt-5">
                
                </div>
            </div>       
    </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> -->
        <button type="submit" class="btn btn-primary" ><i class="fas fa-plus mr-1"></i> Create </button>
        &nbsp;
        <!-- <button type="button" class="btn btn-close" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancel </button> -->
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</form>

<!-- The Edit Modal -->
<form action="<?= base_url('config/editconfig')?>" method="post">
<div class="modal" id="EditModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Config</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class="card-body">
    
            <div class="row g-3">
                <div class="col-md-12">
                    <label for="inputEmail1" class="form-label"><?php echo lang('component.NamePosition'); ?></label>
                    <input type="text"  name="name" class="form-control" id="name">
                </div>
                <div class="col-md-12">
                    <label for="inputEmail2" class="form-label"><?php echo lang('component.ShortNamePosition'); ?></label>
                    <input type="text"  name="short_name" class="form-control" id="short_name">
                </div>     
                <div class="col-md-12">
                    <label for="inputEmail2" class="form-label"><?php echo lang('component.NotePosition'); ?></label>
                    <input type="text"  name="note" class="form-control" id="note">
                </div>                         
                <div class="col-md-12 d-flex justify-content-end mt-5">
                
                </div>
            </div>       
    </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <input type="text" name="id" id="id" class="id">
        <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> -->
        <button type="submit" class="btn btn-primary" ><i class="fas fa-plus mr-1"></i> Save </button>
        &nbsp;
        <!-- <button type="button" class="btn btn-close" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancel </button> -->
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>
</div>
</form>

<!-- The Delete Modal -->
<form action="<?= base_url('config/deleteconfig')?>" method="post">
<div class="modal" id="DelModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete Config</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class="card-body">
        <p>
            <span>You are going to delete </span>
            <span id="nameps" style="font-weight: bold;"></span>           
            <span><br>Are you sure?</span>
        </p>
                   
    </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <input type="hidden" name="id" id="id" class="id">
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


    <div class="card">
    <div class="card-header">
        <h3 class="card-title">Config List</h3>
    </div>
    <div class="card-body">
    <?php $validation = \Config\Services::validation();
    ?>
    <form class="" action="<?=base_url('config') ?>" method="get">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="inputEmail1" class="form-label"><?php echo lang('component.NamePosition'); ?></label>
                    <input type="text"  name="name" class="form-control" id="name" value='<?= session()->get('search') ? session()->get('search')['name'] : ""?>'>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail2" class="form-label"><?php echo lang('component.ShortNamePosition'); ?></label>
                    <input type="text"  name="short_name" class="form-control" id="short_name" value='<?= session()->get('search') ? session()->get('search')['short_name'] : ""?>'>
                </div>  
                
                
            </div>
            <div class="row g-3">
            <div class="col md-6">
            <label for="inputEmail2" class="form-label"><?php echo lang('component.Type'); ?></label>
                    <select class="form-control" name="type">
                        <option value=""><?php echo lang('component.Type'); ?></option>
                        <?php foreach($type as $item){?>
                            
                        <option value="<?=$item['name_type']?>" <?= session()->get('search') ? (session()->get('search')['type']==$item['name_type']? "selected":""):""?>><?=$item['name_type']?></option>"
                        
                        <?php }?>
                        
                    </select>
              </div>                            
                <div class="col-md-6 d-flex justify-content-end mt-5">        
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search mr-1"></i> <?php echo lang('component.Search'); ?></button>
                    &emsp;
                    <button type="submit" formaction="<?php echo base_url('config/export') ?>" class="btn btn-success" type="submit"
                    style="margin-right:10px;">
                    <i class="fa fa-chevron-circle-left"></i> Export</a></button>
                </div>

            </div>
        </form>
    </div>
</div>
<div class="d-flex justify-content-end">
    <button id="addBtn" type="button" class="btn btn-primary"  style="margin: 20px;align-items:right;margin-bottom: 10px;">
    <i class="fa fa-plus-circle"></i> Add
    </button>   
</div>
<!-- register -->
<div>
<?= session()->getFlashdata('msg') ?>
</div>
<div class="card mt-5">
    <div class="card-body">
        <table id="tableuser" class="table table-striped table-bordered w-100 dt-responsive nowrap">
            <thead class="bg-primary text-white font-weight-bold">
                <tr>
                    <th><?php echo lang('component.NoPosition'); ?> </th>
                    <th>No</th>
                    <th><?php echo lang('component.NoPosition'); ?> </th>
                    <th><?php echo lang('component.Type'); ?> </th>
                    <th><?php echo lang('component.NoPosition'); ?> </th>                     
                    <th><?php echo lang('component.NamePosition'); ?> </th>                   
                    <th><?php echo lang('component.ShortNamePosition'); ?> </th>                                      
                    <th><?php echo lang('component.NotePosition'); ?> </th>
                    <th><center><?php echo lang('component.Action'); ?> </center></th>
                    
                    
                </tr>
            </thead>
            <tbody>
            </tbody>
            
        </table>
    </div>
</div>
    <!-- <?php 
     if($locale = 'vn')
        {
       $link = "//cdn.datatables.net/plug-ins/1.11.3/i18n/vi.json";
     }
     else
     {
         $link = "";
     }
    ?> -->

<?= $this->endSection() ?>


<?= $this->section('style') ?>

<!-- <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css">

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

<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->

<script type="text/javascript" language="javascript">

function autocomplent() {
        console.log($('#typeid').val())
    }

    function searchtype() {

        var keySearch = $("#typeid").val();
        $.ajax({
                url: '<?= base_url('config/gettype') ?>',
                type: 'get',
                data: {
                    key: keySearch
                }
            })
            .done(function(result) {

                var data = JSON.parse(result)
                console.log(data)

                $("#typeid").autocomplete({
                        minLength: 0,
                        source: data,
                        focus: function(event, ui) {
                            $("#typeid").val(ui.item.label);
                            return false;
                        },
                        select: function(event, ui) {
                            $("#typeid").val(ui.item.label);
                            $("#type").val(ui.item.label);
                            console.log($("#typeid").val())
                            return false;
                        }


                    })
                    .autocomplete("instance")._renderItem = function(ul, item) {
                        return $("<li>")
                            .append('<div>'+ item.label+'</div>'  )
                            .appendTo(ul);
                    };


            })
    }

$(document).ready(function() {
    var t=$('#tableuser').DataTable({
        lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],
        bProcessing: true,
        reponsive: true,
        processing: true,
        //serverSide: true,
        //"scrollX": true,
        "scrollCollapse": true,
        "ordering":true,
        "deferRender": true,
        columnDefs: [ { "defaultContent": "-", "targets": "_all" } ],
        orderable: true,

            ajax: {
                "url": "<?php echo base_url('config/searchconfig')?>",
                "type": "GET",
                "datatype": "json",
                "data": {
                    "name": "<?=(!empty($input["name"]))?$input["name"]:""?>",
                    
                    "short_name": "<?=(!empty($input["short_name"]))?$input["short_name"]:""?>",

                    "type": "<?=(!empty($input["type"]))?$input["type"]:""?>",
                }
            },
            columnDefs: [{                  
                    "data": null,
                    "targets": [8]
                }],
                columns: [
                {
                    data:null,
                    orderable: false,
                },
                {
                    data:"id",
                    "visible": false,
                },
                {
                    data:null,
                    "visible": false,
                },
                {
                    data: "name_type"
                },
                {
                    data: "id_type_child"
                },
                { 
                    data: "name"
                },
                {
                    data: "short_name"
                },         
                {
                    data: "note"
                },
                {
                    orderable: false,
                    "defaultContent": '<center>'
                    +'<button id="editBtn" class="btn btn-success"><i class="fa fa-edit mr-1"><?php echo lang('component.Edit'); ?></i></button>'
                    +'&ensp;'
                    +'<button id="delBtn" class="btn btn-danger"><i class="fa fa-edit mr-1"><?php echo lang('component.Delete'); ?></i></button>'
                    +'</center>'
                },
                
            ],
        dom: '<"row"<"col-6"l><"col-6 d-flex justify-content-end"B>><tr><"row"<"col-6"i><"col-6 d-flex justify-content-end"p>>',
        "bFilter": false,
        

        
    });
    t.on( 'draw.dt', function () {
    var PageInfo = $('#tableuser').DataTable().page.info();
         t.column(0, { page: 'current' }).nodes().each( function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        } );
    } );

    $(this).on( 'click', '#addBtn', function () {
        $('#myModal #error').html('');
        $('#myModal').modal('show');    
    } );

    $('#tableuser tbody ').on( 'click', '#editBtn', function () {
        var data = t.row( $(this).parents('tr') ).data();
        $('#id').val(data.id); 
        $('#EditModal #name').val(data.name); 
        $('#short_name').val(data.short_name); 
        $('#note').val(data.note);
        $('#EditModal').modal('show');
        
    } );


    $('#tableuser tbody').on( 'click', '#delBtn', function () {
        var data = t.row( $(this).parents('tr') ).data();
        $('#DelModal #id').val(data.id); 
        $('#DelModal #nameps').text(data.name);      
        $('#DelModal').modal('show');
        
    } );

    
        function createManageBtn(id) {
        return '<center>'        
        +'<button id="editbtn" type="button" class="btn btn-success "  ><i class="fa fa-edit mr-1"><?php echo lang('component.Edit'); ?></i>'
        +'</button> <button id="manageBtn" type="button"  class="btn btn-danger "><i class="fas fa-backspace mr-1"> <?php echo lang('component.Delete'); ?></i></button>'
        +'</center>';
    }

    $('#createForm').submit(function(e){
        
        $.ajax({
        url: "<?=base_url('config/addconfig') ?>",
        type: "POST",
        data: $(this).serializeArray(),
        beforeSend: function( xhr ) {
            xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
            
        }
        })
        .done(function( data ) {
            if ( data=='ok' ) {
                location.reload();
            }
            else
            {
                $('#error').html(data);
            }
        });
        e.preventDefault();
    })

    $("#typeid").keyup( function() {
            searchtype()
        })
    //$("#short_name").val=<? $this->input->get('short_name')?>;
    
});
</script>
<?= $this->endSection() ?>


