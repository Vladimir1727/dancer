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
                    <input type="text" class="form-control" id="modalval" name="style">
                    <select class="form-control" id="edit_count" name="dancers_count">
                        <option value="0">любое количество участников</option>
                        <option value="1">соло</option>
                        <option value="2">дуэты, трио, формейшен, продакшен</option>
                    </select>
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

<h1 class="h4 text-success">Стили</h1>
<?php $this->load->view('admin/menu');?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-11">
        <select class="form-control" id="way_select">
            <?php echo $ways; ?>
        </select>
        <div id="style_block">
            <table id="style_table" class="table table-striped">
                <tbody></tbody>
                <thead>
                    <tr>
                        <td>Стиль</td>
                        <td>Огр.по кол-ву</td>
                        <td>действия</td>
                    </tr>
                </thead>
            </table>
            <form id="add_form">
                 <div class="col-md-7">
                <select class="form-control" id="new_count" name="dancers_count">
                        <option value="0">любое количество участников</option>
                        <option value="1">соло</option>
                        <option value="2">дуэты, трио, формейшен, продакшен</option>
                </select>
                </div>
                <div class="input-group">
                    <input type="hidden" id="way_id" name="way_id">
                    <input type="text" placeholder="название..." id="new" class="form-control" name="style">
                    <div class="input-group-btn">
                        <input type="submit" value="добавить" class="btn btn-success" id="new_but">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>
<script src="<?php echo base_url(); ?>/js/admin/styles.js"></script>