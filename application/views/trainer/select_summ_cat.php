<?php $this->load->view('header');?>
<div class="row">
<form id="comp_form">
    <input type="hidden" name="comp_id" value="<?php echo $comp_id;?>">
</form>
<div class="col-md-3">
    <form id="dancers_form">
        <table class="table">
            <tbody>
                <?php echo $dancers; ?>
            </tbody>
        </table>
    </form>
    <button id="add_but" class="btn btn-success">
        Зарегистрировать в категориях
    </button>
</div>

    <div class="col-md-8">
        <table class="table table-condensed">
            <tbody>
                <?php echo $list; ?>
            </tbody>
            <thead>
                <tr>
                    <th>Категория</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<?php $this->load->view('footer'); ?>