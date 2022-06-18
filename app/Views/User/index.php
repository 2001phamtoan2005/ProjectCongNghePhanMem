<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>

<div style="color:black" class="card">
    <div class="card-header">
        <h3 class="card-title">User List</h3>
    </div>
    <div class="card-body">
        <?php $validation = \Config\Services::validation();?>
        <form class="" action="<?=base_url('userlist') ?>" method="get">
            <div class="row g-3">
            <div class="col-md-2">
                </div>
                <div class="col-md-4">
                    <label for="inputEmail1" class="form-label"><?php echo lang('component.Login_iD'); ?></label>
                    <input type="text" name="id" class="form-control" id="inputEmail1">
                </div>
                <div class="col-md-4">
                    <label for="inputEmail2" class="form-label"><?php echo lang('component.Mail'); ?></label>
                    <input type="email" name="email" class="form-control" id="inputEmail2">
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-4">
                    <label for="inputEmail3" class="form-label"><?php echo lang('component.Name'); ?></label>
                    <input type="text" name="name" class="form-control" id="inputEmail3">
                </div>
                <div class="col-md-4">
                    <label for="inputEmail2" class="form-label"><?php echo lang('component.Department'); ?></label>
                    <select class="form-control" name="department_id">
                        <option value="">Select Department</option>
                        <?php foreach($department as $depar){?>
                        <option value="<?=$depar['id']?>"><?=$depar['name']?></option>"
                        <?php }?>
                    </select>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-4">
                    <label for="inputEmail3" class="form-label"><?php echo lang('component.Position'); ?></label>
                    <select class="form-control" name="position_id">
                    <option value="">Select Position</option>
                    <?php foreach($position as $depar){?>x
                        <option value="<?=$depar['id']?>"><?=$depar['name']?></option>"
                        <?php }?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="inputEmail" class="form-label"><?php echo lang('component.Status'); ?></label>
                    <div class="row mt-2 ml-2">
                        <div class="col-4">
                            <input class="form-check-input" type="radio" name="status" value="1" id="enable"
                                <?=(!empty($input["status"]) && $input["status"] == "1")?"checked":""?>>
                            <label class="form-check-label ml-2" for="flexRadioDefault1">
                                <?php echo lang('component.Available'); ?>
                            </label>
                        </div>
                        <div class="col-8">
                            <input class="form-check-input" type="radio" name="status" value="0" id="dishable"
                                <?=(isset($input["status"]) && $input["status"] == "0")?"checked":""?>>
                            <label class="form-check-label ml-2" for="flexRadioDefault2">
                                <?php echo lang('component.Unavailable'); ?>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                </div>
                
            </div>
            <div class="col-md-3">
            </div>
            <div class="col-md-12 d-flex justify-content-end mt-5">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search mr-1"></i>
                    <?php echo lang('component.Search'); ?></button>
            </div>
    </div>
    </form>
</div>
<!-- register -->
<div class="card mt-5">
    <div class="card-body">
        <table id="tableuser" class="table table-striped table-bordered w-100 dt-responsive nowrap">
            <thead class="bg-primary text-white font-weight-bold">
                <tr>
                    <th><?php echo lang('component.Login_iD'); ?> </th>
                    <th><?php echo lang('component.Employee_ID'); ?> </th>
                    <th><?php echo lang('component.Name'); ?> </th>
                    <th><?php echo lang('component.Image'); ?> </th>
                    <th><?php echo lang('component.Gender'); ?> </th>
                    <th><?php echo lang('component.Birthday'); ?> </th>
                    <th><?php echo lang('component.Mail'); ?> </th>
                    <th><?php echo lang('component.Position'); ?> </th>
                    <th><?php echo lang('component.Department'); ?> </th>
                    <th><?php echo lang('component.official_date'); ?> </th>
                    <th><?php echo lang('component.probation_date'); ?> </th> 
                    <th><?php echo lang('component.Status'); ?> </th>
                    <th><?php echo lang('component.Action'); ?> </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                
            </tfoot>
        </table>
    </div>
</div>

<?= $this->endSection() ?>


<?= $this->section('style') ?>

<!-- <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css">
<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
    $('#department').change(function() {
        var id = $('#department').val();
        if (id != null) {
            $.ajax({
                "url": "<?php echo base_url('fulldepa')?>",
                "type": "POST",
                data: {
                    id: id
                },
                "datatype": "json",
                success: function(data) {

                }
            });
        }
    });
    $('#tableuser').DataTable({
        bProcessing: true,
        reponsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            "url": "<?php echo base_url('user/list/search')?>",
            "type": "GET",
            "datatype": "json",
            "data": {
                "name": "<?=(!empty($input["name"]))?$input["name"]:""?>",
                "id": "<?=(!empty($input["id"]))?$input["id"]:""?>",
                "email": "<?=(!empty($input["email"]))?$input["email"]:""?>",
                "department_id": "<?=(!empty($input["department_id"]))?$input["department_id"]:""?>",
                "position_id": "<?=(!empty($input["position_id"]))?$input["position_id"]:""?>",
            }
        },
        pageLength: 10,
        lengthMenu: [
            [10, 25, 50, 100],
            [10, 25, 50, 100]
        ],
        columnDefs: [{
            "render": createManageBtn,
            "data": null,
            "targets": [12],

        }],
        columns: [{
                data: "id"
            },
            {

                data: "employee_id"

            },
            {
                data: "name"

            },
            {
                data: "image",
                render: function(data, type, row) {
                    return `<img class="rounded-circle" style="width:60px; height:60px;" src="${data}"/>`;
                }
            },
            {
                data: "gender"
            },
            {

                data: "birthday"
            },
            {
                data: "email"
            },
            {
                data: "position_name"

            },
            {
                data: "department_name"
            },
            {
                data: "official_date"
            },
            {
                data: "probation_date"
            },
            {
                data: "status"
            },
            {
                data: "id",
                render: function(data, type, row) {
                    return `<a href="<?= base_url('user/edit/') ?>/${data}" class="btn btn-success"><i class="fa fa-edit mr-1"></i><?=lang('component.Edit')?></a>`;
                }
            },
        ],
        dom: '<"row"<"col-6"l><"col-6 d-flex justify-content-end"B>><tr><"row"<"col-6"i><"col-6 d-flex justify-content-end"p>>',
        "bFilter": false,
        // buttons: [{
        //     text: '<i class="fas fa-user-plus"></i> <?php echo lang('component.Register'); ?>',
        //     attr: {
        //         class: "btn btn-primary"
        //     },
        //     action: function(e, dt, node, config) {
        //         alert('Button activated');
        //     }
        // }],
        //  "language": {
        //     "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/vi.json"
        // }
    });

    function createManageBtn(id) {
        return '<button id="manageBtn" type="button" onclick="Myclick(' + id +
            ')" class="btn btn-success "><i class="fa fa-edit mr-1"><?php echo lang('component.Edit'); ?></i></button>';
    }
});
</script>
<?= $this->endSection() ?>