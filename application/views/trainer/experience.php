<?php $this->load->view('header');?>
<h1 class="h1 text-success">Опыт танцоров</h1>
<div id="addmodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Добавление опыта</h4>
            </div>
            <div class="modal-body">
                <p>Танцор: <span id="dancer_name"></span></p>
                <p>Направление: <span id="way"></span></p>
                <form id="formmodal">
                    <input type="hidden" id="dancer_id" name="dancer_id" value="<?php echo $dancer['id'];?>">
                    <input type="hidden" id="way_id" name="way_id">
                    <div class="form-group">
                        <label>
                            Лига
                            <select class="form-control" name="lig_id" id="lig_id">
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Очки
                            <input type="number" id="points" name="points" placeholder="очки..." class="form-control" value="0">
                        </label>
                    </div>
                </form>
            </div>
            <br>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal" id="savemodal">ДОБАВИТЬ</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
<?php $this->load->view('trainer/menu'); ?>
        
<div class="row">
    <div class="col-md-3">
        <p>
            <strong>Танцор:</strong>
            <span id="name"><?php echo $dancer['last_name'].' '.$dancer['first_name'];?></span>
        </p>
        <p>
            E-mail: 
            <span id="email"><?php echo $dancer['email'];?></span>
        </p>
        <p>
            Телефон: 
            <span id="phone"><?php echo $dancer['phone'];?></span>
        </p>
        <p>
            Дата рождения: 
            <span id="birthdate"><?php echo $dancer['birthdate'];?></span>
        </p>
        <input type="hidden" id="dancer_id" name="id" value="<?php echo $dancer['id']; ?>">
               
    </div>
    <div class="col-md-5">
        <table class="table table-striped">
            <tbody id='main_table'>
                <?php echo $exp; ?>
            </tbody>
            <thead>
                <tr>
                    <th>Направление</th>
                    <th>Лига</th>
                    <th>Очки</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script src="<?php echo base_url(); ?>js/trainer/experience.js"></script>
<?php $this->load->view('footer'); ?>