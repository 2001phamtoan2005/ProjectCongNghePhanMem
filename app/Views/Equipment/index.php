<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>


<div class="card">
    <div class="card-header" style="color:black">
        <h3 class="card-title">Equipment List</h3>
    </div>
    <div class="card-body">


        <?php

        use CodeIgniter\CLI\Console;

        $validation = \Config\Services::validation();
        ?>
        <form class="" action="<?php echo 'equipment' ?>" method="post" style="color:black">
            <?= csrf_field() ?>
            <div class="search" style=" margin-bottom: 10px;padding-top: 40px;">
                <table  style="width: 100%;">
                    <tbody>
                        <tr>
                            <td>

                                <div class="form-group row mb-4">
                                    <span style="width:150px;"><?php echo lang('component.Name'); ?></span>
                                    <div id="input">
                                        <input id="name" type="text" name="Name" value="<?php echo set_value('Name'); ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                                    </div>
                                </div>



                            </td>
                            <td>
                                <div class="form-group row mb-4">
                                    <span style="width:150px;"><?php echo lang('component.purchasedatefrom'); ?></span>
                                    <div id="input">
                                        <div class='input-group date'>
                                            <input id="purchasedatefrom" type="text" name="purchasedatefrom" value="<?php echo set_value('purchasedatefrom'); ?>" class="form-control datetimepicker1" />

                                        </div>
                                    </div>
                                </div>


                            </td>
                            <td>
                                <div class="form-group row mb-4">
                                    <span style="width:150px;"><?php echo lang('component.purchasedateto'); ?></span>
                                    <div id="input">
                                        <div class='input-group date'>
                                            <input id="purchasedateto" type="text" name="purchasedateto" value="<?php echo set_value('purchasedateto'); ?>" class="form-control datetimepicker3" />

                                        </div>
                                    </div>
                                </div>


                            </td>
                            


                        </tr>

                        <tr>
                            <td>
                                <div class="form-group row mb-4">
                                    <span style="width:150px;"><?php echo lang('component.Equipmenttype'); ?> </span>
                                    <!-- <input id="coursetype" type="text" name="Coursetype"  value="<?php echo set_value('Coursetype'); ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                            -->
                                    <div id="input">
                                        <select class="form-control" id="Equipmenttype" name="Equipmenttype" value="<?php echo set_value('Equipmenttype'); ?>">

                                            <option value="" <?php echo (set_value('Equipmenttype') == '') ? 'selected' : ''; ?>> <?php echo lang('component.Chooseoptiontype'); ?></option>
                                            <?php
                                            foreach ($typeequipment as $value) {
                                                $select = (set_value('Equipmenttype') == $value['name']) ? 'selected' : '';
                                                echo
                                                "<option value=" . $value['name'] . " " . $select . ">" . $value['name'] . "</option>";
                                            }
                                            ?>

                                        </select>
                                    </div>


                                </div>


                            </td>
                            
                            <td>
                                <div class="form-group row mb-4">
                                    <span style="width:150px;"><?php echo lang('component.warrantyperiodfrom'); ?></span>
                                    <div id="input">
                                        <div class='input-group date'>
                                            <input id="warrantyperiodfrom" type="text" name="warrantyperiodfrom" value="<?php echo set_value('warrantyperiodfrom'); ?>" class="form-control datetimepicker2" />

                                        </div>
                                    </div>

                                </div>
                            </td>
                            <td>
                                <div class="form-group row mb-4">
                                    <span style="width:150px;"><?php echo lang('component.warrantyperiodto'); ?></span>
                                    <div id="input">
                                        <div class='input-group date'>
                                            <input id="warrantyperiodto" type="text" name="warrantyperiodto" value="<?php echo set_value('warrantyperiodto'); ?>" class="form-control datetimepicker4" />
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group row mb-4">
                                    <span style="width:150px;"><?php echo lang('component.manufacture'); ?></span>
                                    <div id="input">
                                        <select class="form-control" id="manufacture" name="manufacture" value="<?php echo set_value('manufacture'); ?>">

                                            <option value="" <?php echo (set_value('manufacture') == '') ? 'selected' : ''; ?>> <?php echo lang('component.Chooseoptiontype'); ?></option>
                                            <?php
                                            foreach ($Manufacture as $value) {
                                                $select = (set_value('manufacture') == $value->id) ? 'selected' : '';
                                                echo
                                                "<option value=" . $value->id . " " . $select . ">" . $value->name . "</option>";
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>


                            </td>
                            <td>
                                <div class="form-group row mb-4">
                                    <span style="width:150px;"><?php echo lang('component.series'); ?></span>
                                    <div id="input">
                                        <input id="series" type="text" name="series" value="<?php echo set_value('series'); ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                                    </div>
                                </div>


                            </td>
                            <td>
                                <div class="form-group row mb-4">
                                    <span style="width:150px;"><?php echo lang('component.position'); ?></span>
                                    <div id="input">

                                        <input id="position" type="text" name="position" value="<?php echo set_value('position'); ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />

                                    </div>
                                </div>
            </div>


            </td>
           
            </tr>
                                    
            <tr>
            <td>
            <div class="form-group row mb-4">
                                    <span style="width:150px;"><?php echo lang('component.status'); ?> </span>                       
                                    <div id="input">
                                        <select class="form-control" id="status" name="status" value="<?php echo set_value('status'); ?>">

                                            <option value="" <?php echo (set_value('status') == '') ? 'selected' : ''; ?>> <?php echo lang('component.Chooseoptiontype'); ?></option>
                                            <?php foreach($status as $item){?>                            
                                                <option value="<?=$item['name']?>"><?=$item['name']?></option>"                       
                                            <?php }?>

                                        </select>
                                    </div>


                                </div>              
                                        
                                    
            </td>
            <td></td>
            <td>
                <button class="btn btn-primary" type="submit" style="margin-left:110px;"><i class="fa fa-search"></i> <?php echo lang('component.SearchCourse'); ?></button>
            </td>
            </tr>





            </tbody>
            </table>
    </div>

    </form>


    <!-- register -->

    <!-- register -->

    <!-- list -->
    <div class="list" style="overflow-x:auto;">




        <table id="tablelist" class="table table-striped table-bordered" style="width:100%">
            <thead class="table-dark text-white font-weight-bold">
                <tr>
                    <th style="width:3%;"><?php echo lang('component.STT'); ?></th>
                    <th><?php echo lang('component.Name'); ?></th>
                    <th style="min-width:130px;"><?php echo lang('component.Equipmenttype'); ?></th>
                    <th><?php echo lang('component.Image'); ?></th>
                    <th style="min-width:130px;"><?php echo lang('component.manufacture'); ?></th>
                    <th style="min-width:130px;"><?php echo lang('component.profilename'); ?></th>
                    <th style="min-width:130px;"><?php echo lang('component.purchasedate'); ?></th>
                    <th style="min-width:130px;"><?php echo lang('component.warrantyperiod'); ?></th>
                    <th><?php echo lang('component.series'); ?></th>
                    <th><?php echo lang('component.position'); ?></th>
                    <th><?php echo lang('component.Note'); ?></th>
                    <th style="width:10%;"><?php echo lang('component.Action'); ?></th>
                    <th><?php echo lang('component.status'); ?></th>
                </tr>
            </thead>

            <tbody>
            </tbody>

        </table>

    </div>

</div>
</div>
</div>
<!-- confirm delete -->
<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you want to delete ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirmyes" class="btn btn-primary">Yes</button>
                <button type="button" id="confirmnone" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>


<?= $this->section('style') ?>



<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>

<style>
    #input {
        max-width: 300px;
    }
</style>
<script type="text/javascript">
    $(function() {
        $('.datetimepicker1').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
        $('.datetimepicker2').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
        $('.datetimepicker3').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
        $('.datetimepicker4').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });


    });

    function searchequipment() {
        console.log($('#name').val());
        console.log($('#purchasedatefrom').val());
        console.log($('#warrantyperiodfrom').val());
        console.log($('#Equipmenttype').val());

        console.log($('#purchasedateto').val())
        console.log($('#warrantyperiodto').val())
        console.log($('#series').val())
        console.log($('#position').val())
        $('#tablelist').DataTable({

            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ], // page length options
            bProcessing: true,
            searching: false,
            processing: true,
            serverSide: true,
            "order": [
                1, "asc"
            ],
            ajax: {
                "url": "<?php echo base_url('searchequipment') ?>",
                "type": "get",
                "data": {
                    name: $('#name').val(),
                    purchasedatefrom: $('#purchasedatefrom').val(),
                    warrantyperiodfrom: $('#warrantyperiodfrom').val(),
                    Equipmenttype: $('#Equipmenttype').val(),
                    purchasedateto: $('#purchasedateto').val(),
                    warrantyperiodto: $('#warrantyperiodto').val(),
                    series: $('#series').val(),
                    position: $('#position').val(),
                    manufacture:$('#manufacture').val(),
                    status:$('#status').val()
                }


            },

            columnDefs: [{
                "render": createManageBtn,
                "data": null,
                "targets": [11]
            }],
            columns: [{
                    data: "row"
                },
                {
                    data: "name"
                },
                {
                    data: "Equipmenttype"
                },
                {

                    data: "img",
                    render: function(data) {
                        console.log('====================================');
                        console.log(data.length);
                        console.log('====================================');

                        if (data.length > 0) {
                            return `<img class="rounded-circle" style="width:60px; height:60px;" src="data:image/jpeg;base64,${data}"/>`;


                        } else {
                            return '';
                        }

                    }
                },
                {
                    data: "manufacturer"
                },
                {
                    data: "profilename"
                },
                {
                    data: "purchase_date"
                },
                {
                    data: "warranty_period"
                },
                {
                    data: "series"
                },
                {
                    data: "position"

                },
                {
                    data: "note"

                },
                {
                    data: "id"

                },
            ],


            dom: '<"row"<"col-6"l><"col-6 d-flex justify-content-end"B>><tr><"row"<"col-6"i><"col-6 d-flex justify-content-end"p>>',
            "bFilter": false,
            buttons: [{
                text: '<i class="fas fa-user-plus"></i> <?php echo lang('component.Register'); ?>',
                attr: {
                    class: "btn btn-success"
                },
                action: function(e, dt, node, config) {
                    location.replace('<?= base_url('registerEquipment') ?>');
                }

            }],
            "language": {
                "url": " <?php echo lang('component.languagedatatable'); ?>"
            }


        });
    }

    function createManageBtn(id) {
        return '<div class="d-flex justify-content-center"><a href="<?= base_url('Equipment/editEquipment/') ?>/id=' + id + '"><button id="manageBtn" type="button"  class="btn btn-success"><i class="fa fa-edit"></i></button></a>' +
            '<a href="<?= base_url('course/deletecourse/') ?>/id=' + id + '" onclick=" return checkdelete(' + id + ');"><button class="btn btn-danger btndelete" style="margin-left:10px;" onclick=" return false"><i class="fa fa-trash"></i></button></a>';
    }
    $(document).ready(function() {

        searchequipment()

    });

    function checkdelete(id) {
        $(".modal").css('display', 'block');

        $("#confirmyes").on("click", function() {

            $(".modal").css('display', 'none');
            $.ajax({
                url: '<?= base_url('Equipment/deleteequipment/') ?>/id=' + id,
                type: 'get',
            });
            
            window.location.replace('<?= base_url('equipment') ?>')
            return true;
        });

        $("#confirmnone").on("click", function() {

            $(".modal").css('display', 'none');
            return false;
        });
        $(".close").on("click", function() {

            $(".modal").css('display', 'none');
            return false;
        });
    }
</script>


<?= $this->endSection() ?>