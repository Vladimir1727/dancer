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
                <form id="edit_form">
                    <div class="row">
                    <div class="col-md-6">

                    <input type="hidden" id="e_id" name="id">
                    <div class="form-group">
                        <label>
                            Название
                            <input type="text" id="e_name" name="name" placeholder="название..." class="form-control input-sm">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Область
                            <select class="form-control" id="e_regions">
                                <option value="0">Выберите область</option>
                                <?php echo $regions; ?>
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Город
                            <select class="form-control" id="e_city" name=""city_id>
                                
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Организатор
                            <select class="form-control" id="e_org" name="org_id">
                                
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Описание
                            <textarea class="form-control" id="e_comment" name="comment"></textarea>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Направление
                            <select class="form-control" id="e_way"name="way_id">
                                <?php echo $ways; ?>
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Дата начала регистрации
                            <input type="date" id="e_date_reg_open" name="date_reg_open" placeholder="начало регистрации..." class="form-control input-sm">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Дата окончания регистрации
                            <input type="date" id="e_date_reg_close" name="date_reg_close" placeholder="окончание регистрации..." class="form-control input-sm">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Дата начала конкурса
                            <input type="date" id="e_date_open" name="date_open" placeholder="начало конкурса..." class="form-control input-sm">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Дата окончания конкурса
                            <input type="date" id="e_date_close" name="date_close" placeholder="окончание конкурса..." class="form-control input-sm">
                        </label>
                    </div>
                    <div class="form-group">
                        <select id="e_status" class="form-control" name="status_id">
                            <?php echo $statuses;?>
                        </select>
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
    </div>
    </div>
<!-- End Modal -->

<!--New Modal-->
<div id="newmodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Добавление</h4>
            </div>
            <div class="modal-body">
                <form id="add_form">
                    <div class="row">
                        <div class="col-md-6">
                    <div class="form-group">
                        <label>
                            Название
                            <input type="text" id="n_name" name="name" placeholder="название..." class="form-control input-sm">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Область
                            <select class="form-control" id="n_regions">
                                <option value="0">Выберите область</option>
                                <?php echo $regions; ?>
                            </select>
                        </label>
                    </div>
                    <div class="form-group" id="city_block">
                        <label>
                            Город
                            <select class="form-control" id="n_city" name="city_id">
                                
                            </select>
                        </label>
                    </div>
                    <div class="form-group" id="org_block">
                        <label>
                            Организатор
                            <select class="form-control" id="n_org" name="org_id">
                                
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Описание
                            <textarea class="form-control" id="n_comment" name="comment"></textarea>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Направление
                            <select class="form-control" id="n_way"name="way_id">
                                <?php echo $ways; ?>
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Дата начала регистрации
                            <input type="date" id="n_date_reg_open" name="date_reg_open" placeholder="начало регистрации..." class="form-control input-sm">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Дата окончания регистрации
                            <input type="date" id="n_date_reg_close" name="date_reg_close" placeholder="окончание регистрации..." class="form-control input-sm">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Дата начала конкурса
                            <input type="date" id="n_date_open" name="date_open" placeholder="начало конкурса..." class="form-control input-sm">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Дата окончания конкурса
                            <input type="date" id="n_date_close" name="date_close" placeholder="окончание конкурса..." class="form-control input-sm">
                        </label>
                    </div>
                </div>
                </div>
                </form>
            </div>
            <br>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal" id="addmodal">ДОБАВИТЬ</button>
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

<div class="row">
    <div class="col-md-2">
        <!-- <button class="btn btn-success" id="new_but" data-toggle="modal" data-target="#newmodal">Создать</button> -->
    </div>
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
<script src="<?php echo base_url(); ?>/js/admin/competitions.js"></script>
<?php $this->load->view('footer'); ?>