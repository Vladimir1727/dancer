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
                    <div class="col-md-6">
                        <input type="text" placeholder="название..." id="edit_name" class="form-control" name="name">
                    </div>
                    <div class="col-md-3">
                        <input type="number" id="edit_min" class="form-control" name="min_count" placeholder="от">
                    </div>
                    <div class="col-md-3">
                        <input type="number" id="edit_max" class="form-control" name="max_count" placeholder="до">
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

<h1 class="h4 text-success">Категории по колличеству</h1>
<?php $this->load->view('admin/menu');?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-7">
        <table class="table table-striped" id="counts">
            <tbody>
                <?php echo $counts; ?>
            </tbody>
            <thead>
                <tr>
                    <td>
                        Название
                    </td>
                    <td>
                        Мин.кол-во
                    </td>
                    <td>
                        Макс.кол-во
                    </td>
                    <td>
                        действия
                    </td>
                </tr>
            </thead>
        </table>
        <form id="add_form" class="form-horizontal">
            <div class="col-md-5">
                <input type="text" placeholder="название..." id="new_name" class="form-control col-md-4" name="name">
            </div>
            <div class="col-md-2">
                <input type="number" id="new_min" class="form-control" name="min_count" placeholder="от">
            </div>
            <div class="col-md-2">
                <input type="number" id="new_max" class="form-control" name="max_count" placeholder="до">
            </div>
            <div class="col-md-3">
                    <input type="submit" value="добавить" class="btn btn-success" id="new_but">
            </div>
            </div>
        </form>
    </div>
</div>
<?php $this->load->view('footer'); ?>
<script src="<?php echo base_url(); ?>/js/admin_counts.js"></script>