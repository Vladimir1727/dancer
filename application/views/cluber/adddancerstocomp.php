<?php $this->load->view('header');?>
<h3>Скачать в формате CSV:</h3>
<?php
 foreach($files as $file){
     echo '<a href="'.base_url().$file['file'].'" class="btn btn-link">'.$file['name'].'</a><br>';
 }
?>
<div class="row">
<form method="POST" action="..\..\cabinet\compreglist2">
    <input type="hidden" name="comp_id" id="comp_id" value="<?php echo $comp_id;?>">
    <div class="col-md-1">
        <button class="btn btn-success">
            Добавить
        </button>
    </div>
    <div class="col-md-3">
        
            <table>
                <tbody>
                    <?php echo $dancers; ?>
                </tbody>
                <thead>
                    <tr>
                        <th>Имя</th>
                    </tr>
                </thead>
            </table>
    </div>
    <div class="col-md-6">
        <table class="table table-condensed">
            <tbody id="comp_list">
                <?php echo $comp_list;?>
            </tbody>
            <thead>
                <tr>
                    <th>Танцор</th>
                    <th>Регистрация</th>
                    <th>Взнос</th>
                    <th>Номер на печать</th>
                </tr>
            </thead>
        </table>
    </div>
</form>
</div>
<script src="<?php echo base_url(); ?>/js/trainer/adddacerstocomp.js"></script>
<?php $this->load->view('footer'); ?>