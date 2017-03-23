<?php $this->load->view('header');?>
<div class="row">
<form method="POST" action="..\..\cabinet\compreglist">
    <input type="hidden" name="comp_id" value="<?php echo $comp_id;?>">
    <div class="col-md-2">
        <button class="btn btn-success">
            Добавить
        </button>
    </div>
    <div class="col-md-8">
        
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
</form>
</div>
<?php $this->load->view('footer'); ?>