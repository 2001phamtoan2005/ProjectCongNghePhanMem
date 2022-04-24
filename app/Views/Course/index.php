<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>





<div class="card">
    <div class="card-header">
        <h3 class="card-title">Course List</h3>
    </div>
    <div class="card-body">

        <?php $validation = \Config\Services::validation();
        ?>
        <form class="" action="<?php echo 'course' ?>" method="post">
            <?= csrf_field() ?>
            <div class="search" style=" margin-bottom: 10px;padding-top: 40px;">
                <table style="width: 100%;">
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
                                    <span style="width:150px;"><?php echo lang('component.Startdatefrom'); ?></span>
                                    <div id="input">
                                        <div class='input-group date' >
                                            <input id="startform" type="text" name="Startfrom" value="<?php echo set_value('Startfrom'); ?>" class="form-control datetimepicker1" />
                                            
                                        </div>
                                    </div>
                                </div>


                            </td>
                            <td>
                                <div class="form-group row mb-4">
                                    <span style="width:150px;"><?php echo lang('component.Startdateto'); ?></span>
                                    <div id="input">
                                        <div class='input-group date' >
                                            <input id="startto" type="text" name="Startto" value="<?php echo set_value('Startto'); ?>" class="form-control datetimepicker3" />
                                           
                                        </div>
                                    </div>
                                </div>


                            </td>
                            
                        </tr>

                        <tr>
                            <td>
                                <div class="form-group row mb-4">
                                    <span style="width:150px;"><?php echo lang('component.Coursetype'); ?> </span>
                                    <!-- <input id="coursetype" type="text" name="Coursetype"  value="<?php echo set_value('Coursetype'); ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                            -->
                                    <div id="input">
                                        <select class="form-control" id="coursetype" name="Coursetype" value="<?php echo set_value('Coursetype'); ?>">

                                            <option value="" <?php echo (set_value('Coursetype') == '') ? 'selected' : ''; ?>> <?php echo lang('component.Choosecoursetype'); ?></option>
                                            <?php foreach($type as $item){?>                            
                                                <option value="<?=$item['name']?>"><?=$item['name']?></option>"                        
                                            <?php }?>
                                        </select>
                                    </div>


                                </div>


                            </td>
                            <td>
                                <div class="form-group row mb-4">
                                    <span style="width:150px;"><?php echo lang('component.Enddatefrom'); ?></span>
                                    <div id="input">
                                        <div class='input-group date' >
                                            <input id="endform" type="text" name="Endfrom" value="<?php echo set_value('Endfrom'); ?>" class="form-control datetimepicker2" />
                                            
                                        </div>
                                    </div>

                                </div>


                            </td>
                            
                            <td>
                                <div class="form-group row mb-4">
                                    <span style="width:150px;"><?php echo lang('component.Enddateto'); ?></span>
                                    <div id="input">
                                        <div class='input-group date'>
                                            <input id="endto" type="text" name="Endto" value="<?php echo set_value('Endto'); ?>" class="form-control datetimepicker4" />
                                           
                                        </div>
                                    </div>

                                </div>


                            </td>
                        </tr>


                        <tr>
                            <td>
                                <div class="form-group row mb-4">
                                    <span style="width:150px;"><?php echo lang('component.Weekdays'); ?></span>
                                    <div id="input">
                                        <input id="weekdays" type="text" name="Weekdays" value="<?php echo set_value('Weekdays'); ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                                    </div>
                                </div>


                            </td>
                            <td>
                                <div class="form-group row mb-4">
                                    <span style="width:150px;"><?php echo lang('component.Time'); ?></span>
                                    <div id="input">
                                        <div class='input-group date' >
                                            <input id="time" type="text" name="Time" value="<?php echo set_value('Time'); ?>" class="form-control datetimepicker5" />
                                            
                                        </div>
                                    </div>
                                </div>


                            </td>
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
        <div class="d-flex justify-content-end">
            <form action="<?php echo base_url('course/createcourse') ?>">

                <button class="btn btn-primary btnregister" style="margin: 20px;align-items:right;margin-bottom:10px;display: none;"><i class="fa fa-plus-circle"></i> <?php echo lang('component.Startdatefrom'); ?>Register
                </button>
            </form>
        </div>
        <!-- list -->
        <div class="list" style="overflow-x:auto;">




            <table id="tablelist" class="table table-striped table-bordered" style="width:100%">
                <thead class="bg-primary text-white font-weight-bold">
                    <tr>
                        <th style="width:3%;"><?php echo lang('component.STT'); ?></th>
                        <th><?php echo lang('component.Name'); ?></th>
                        <th ><?php echo lang('component.Coursetype'); ?></th>
                        <th><?php echo lang('component.Startdate'); ?></th>
                        <th ><?php echo lang('component.Enddate'); ?></th>
                        <th ><?php echo lang('component.Weekdays'); ?></th>
                        <th ><?php echo lang('component.Time'); ?></th>
                        <th><?php echo lang('component.Note'); ?></th>
                        <th style="width:10%;"><?php echo lang('component.Action'); ?></th>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

    .list::-webkit-scrollbar {
        width: 0 !important;
        display: none;
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
        $('.datetimepicker5').timepicker({
            uiLibrary: 'bootstrap4',
            format: 'hh-MM-ss'
        });

    });

    function searchcourse() {
        console.log( $('#startform').val());
        console.log( $('#endform').val());
        console.log($('#endform').val()); 
        console.log( $('#name').val()); 
        
        console.log( $('#endform').val())
        console.log( $('#coursetype').val())
        console.log( $('#startto').val())
        console.log( $('#endto').val())
        console.log($('#weekdays').val())
        console.log($('#time').val())
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
                "url": "<?php echo base_url('course/searchcourse') ?>",
                "type": "get",
                "data": {
                    name: $('#name').val(),
                    Startfrom: $('#startform').val(),
                    Endfrom: $('#endform').val(),
                    Coursetype: $('#coursetype').val(),
                    Startto: $('#startto').val(),
                    Endto: $('#endto').val(),
                    Weekdays: $('#weekdays').val(),
                    Time: $('#time').val()

                }


            },

            columnDefs: [{
                "render": createManageBtn,
                "data": null,
                "targets": [8]
            }],
            columns: [{
                    data: "row"
                },
                {
                    data: "name"
                },
                {
                    data: "course_type"
                },
                {
                    data: "start_date"
                },
                {
                    data: "end_date"
                },
                {
                    data: "weekdays"
                },
                {
                    data: "time"
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
                    $('.btnregister').trigger('click');
                }

            }],
            "language": {
                "url":  " <?php echo lang('component.languagedatatable'); ?>"
            }


        });
    }

    function createManageBtn(id) {
        return '<div class="d-flex justify-content-center"><a href="<?= base_url('course/editcourse/') ?>/id=' + id + '"><button id="manageBtn" type="button"  class="btn btn-success"><i class="fa fa-edit"></i></button></a>' +
            '<a href="<?= base_url('course/deletecourse/') ?>/id=' + id + '" onclick=" return checkdelete(' + id + ');"><button class="btn btn-danger btndelete" style="margin-left:10px;" onclick=" return false"><i class="fa fa-trash"></i></button></a>' +
            '<a href="<?php echo base_url('course/paticipant') ?>/id=' + id + '" class="btn btn-info" type="submit" style="margin-left:10px;"> <i class="fa fa-address-card-o"></i></a></div>';
    }
    $(document).ready(function() {
        console.log($('#coursetype').val());
        searchcourse()


    });

    function checkdelete(id) {
        $(".modal").css('display', 'block');


        $("#confirmyes").on("click", function() {

            $(".modal").css('display', 'none');
            $.ajax({
                url: '<?= base_url('course/deletecourse/') ?>/id=' + id,
                type: 'get',
            });
            location.reload();
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