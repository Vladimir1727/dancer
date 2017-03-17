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
                    <input type="text" class="form-control" id="modalval" name="way">
                    <input type="hidden" id="modaltype">
                    <input type="hidden" id="modalid">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal" id="savemodal">СОХРАНИТЬ</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<h1 class="h4 text-success">Направления</h1>
<?php $this->load->view('admin/menu');?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-4">
        <table class="table table-striped" id="ways">
            <tbody>
                <?php echo $ways; ?>
            </tbody>
            <thead>
                <tr>
                    <td>
                        Название
                    </td>
                    <td>
                        действия
                    </td>
                </tr>
            </thead>
        </table>
        <form id="add_form">
            <div class="input-group">
                <input type="text" placeholder="название..." id="new_way" class="form-control" name="way">
                <div class="input-group-btn">
                    <input type="submit" value="добавить" class="btn btn-success" id="new_but">
                </div>
            </div>
        </form>
    </div>
</div>
<?php $this->load->view('footer'); ?>
<script src="<?php echo base_url(); ?>/js/admin_ways.js"></script>