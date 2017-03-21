<?php $this->load->view('header');?>
<h1 class="h1 text-success">Кабинет Танцора</h1>
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

<div class="row">
    <div class="col-md-4">
        <p>
            <strong>Мои:</strong>
            <span id="name"><?php echo $contact['dancer_name'];?></span>
        </p>
        <p>
            E-mail: 
            <span id="email"><?php echo $contact['dancer_email'];?></span>
        </p>
        <p>
            Телефон: 
            <span id="phone"><?php echo $contact['dancer_phone'];?></span>
        </p>
        <p>
            Дата рождения: 
            <span id="birthdate"><?php echo $contact['dancer_birthdate'];?></span>
        </p>
        <input type="hidden" id="dancer_id" name="id" value="<?php echo $contact['dancer_id']; ?>">
        <button class="btn btn-warning" data-toggle="modal" data-target="#editmodal" id="edit_but">
            Изменить
        </button>

        
    </div>
    <div class="col-md-4">
        <p>
            <strong>Тренер:</strong>
            <?php echo $contact['trainer_name'];?>
        </p>
        <p>
            E-mail: <?php echo $contact['trainer_email'];?>
        </p>
        <p>
            Телефон: <?php echo $contact['trainer_phone'];?>
        </p>
    </div>
    <div class="col-md-4">
        <p>
            <strong>Клуб:</strong>
            <?php echo $contact['club_title'];?>
        </p>
        <p>
            <strong>Руководитель:</strong>
            <?php echo $contact['club_name'];?>
        </p>
        <p>
            E-mail: <?php echo $contact['club_email'];?>
        </p>
        <p>
            Телефон: <?php echo $contact['club_phone'];?>
        </p>
    </div>
</div>
<script src="<?php echo base_url(); ?>/js/dancer_contact.js"></script>
<?php $this->load->view('footer'); ?>