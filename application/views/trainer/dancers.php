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
                    <input type="hidden" id="e_id" name="id">
                    <input type="hidden" id="e_user_id" name="user_id">
                    <div class="form-group">
                        <label>
                            Фамилия
                            <input type="text" id="e_last_name" name="last_name" placeholder="фамилия..." class="form-control input-sm">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Имя
                            <input type="text" id="e_first_name" name="first_name" placeholder="имя..." class="form-control input-sm">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Отчество
                            <input type="text" id="e_father_name" name="father_name" placeholder="отчество..." class="form-control input-sm">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Пароль
                            <input type="text" id="e_password" name="password" placeholder="пароль..." class="form-control input-sm">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            E-mail
                            <input type="email" id="e_email" name="email" placeholder="e-mail..." class="form-control input-sm">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Телефон
                            <input type="text" id="e_phone" name="phone" placeholder="телефон..." class="form-control input-sm">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            День рождния
                            <input type="date" id="e_birthdate" name="birthdate" placeholder="дата рождения..." class="form-control input-sm">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Ассоциация
                            <select class="form-control" id="e_bell" name="bell_id">
                                <option value="0" selected>Выберите организацию</option>
                                <?php echo $belly; ?>
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Статус
                            <select class="form-control" id="e_status" name="dancer">
                                <option value="-1">Выберите статус</option>
                                <option value="0">нет</option>
                                <option value="1">запрошен</option>
                                <option value="2">активный</option>
                                <option value="3">закрыт</option>
                            </select>
                        </label>
                    </div>
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

<div id="infomodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Информация</h4>
            </div>
            <div class="modal-body">
                <p>Фамилия: <span id="i_last_name"></span></p>
                <p>Имя: <span id="i_first_name"></span></p>
                <p>Отчество: <span id="i_father_name"></span></p>
                <p>Телефон: <span id="i_phone"></span></p>
                <p>E-mail: <span id="i_email"></span></p>
                <p>Пароль: <span id="i_password"></span></p>
                <p>Организация: <span id="i_bell"></span></p>
                <p>Дата рождения: <span id="i_birthdate"></span></p>
                <p>Полных лет: <span id="i_year"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<?php include_once 'menu.php';?>
<h1 class="h1 text-success">Танцоры</h1>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped" id="dancers_table">
            <tbody>
                <?php echo $dancers; ?>
            </tbody>
            <thead>
                <tr>
                    <th>Ф.И.О.</th>
                    <th>возраст лет</th>
                    <th>статус</th>
                    <th>контакт</th>
                    <th>действия</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script src="<?php echo base_url(); ?>/js/trainer_dancers.js"></script>
<?php $this->load->view('footer'); ?>