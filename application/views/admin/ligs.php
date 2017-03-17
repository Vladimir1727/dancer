<?php $this->load->view('header');?>

<div id="editmodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Редактирование</h4>
            </div>
            <div class="modal-body">
                <form id="formmodal">
                    <input type="hidden" id="id" name="id">
                    <div class="col-md-2">
                        <input type="number" placeholder="№..." id="edit_number" class="form-control" name="number">
                    </div>
                    <div class="col-md-4">
                        <input type="text" placeholder="название..." id="edit_name" class="form-control" name="name">
                    </div>
                    <div class="col-md-3">
                        <input type="number" id="edit_points" class="form-control" name="points" placeholder="очки">
                    </div>
                    <div class="col-md-3">
                        <input type="number" id="edit_days" class="form-control" name="days" placeholder="дни">
                    </div>
                    <input type="hidden" id="modaltype">
                    <input type="hidden" id="modalid">
                </form>
            </div>
            <br>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal" id="savemodal">СОХРАНИТЬ</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<h1 class="h4 text-success">Лиги</h1>
<?php $this->load->view('admin/menu');?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-7">
        <select class="form-control" id="way_select">
            <?php echo $ways; ?>
        </select>
        <div id="ligs_block">
            <table class="table table-striped" id="ligs">
                <tbody>

                </tbody>
                <thead>
                    <tr>
                        <td>
                            Номер
                        </td>
                        <td>
                            Название
                        </td>
                        <td>
                            Очки
                        </td>
                        <td>
                            Дни до след.
                        </td>
                    </tr>
                </thead>
            </table>
            <form id="add_form" class="form-horizontal">
                <input type="hidden" name="way_id" id="way_id">
                <div class="col-md-2">
                    <input type="number" placeholder="№..." id="new_number" class="form-control" name="number">
                </div>
                <div class="col-md-4">
                    <input type="text" placeholder="название..." id="new_name" class="form-control" name="name">
                </div>
                <div class="col-md-2">
                    <input type="number" id="new_points" class="form-control" name="points" placeholder="Очки...">
                </div>
                <div class="col-md-2">
                    <input type="number" id="new_days" class="form-control" name="days" placeholder="Дни...">
                </div>
                <div class="col-md-2">
                    <input type="submit" value="добавить" class="btn btn-success" id="new_but">
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>
<script src="<?php echo base_url(); ?>/js/admin_ligs.js"></script>