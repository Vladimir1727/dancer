<?php $this->load->view('header');?>
<div id="infomodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Информация</h4>
            </div>
            <div class="modal-body">
                <p>Название: <span id="i_name"></span></p>
                <p>Город: <span id="i_city"></span></p>
                <p>Описание: <span id="i_comment"></span></p>
                <p>Направление: <span id="i_way"></span></p>
                <p>Организатор: <span id="i_org"></span></p>
                <p>Контакты: <span id="i_contact"></span></p>
                <p>Регистрация: <span id="i_reg"></span></p>
                <p>Проведение: <span id="i_date"></span></p>
                <p>Статус: <span id="i_status"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<?php include_once 'menu.php';?>
<div class="row">
    <div class="col-md-8">
        <table class="table table-striped" id="main_table">
            <tbody>
                <?php echo $competitions; ?>
            </tbody>
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Город</th>
                    <th>Регистрация</th>
                    <th>Период проведения</th>
                    <th>Статус</th>
                    <th>действия</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script src="<?php echo base_url(); ?>/js/cluber/competitions.js"></script>
<?php $this->load->view('footer'); ?>