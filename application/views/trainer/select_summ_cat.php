<?php $this->load->view('header');?>
<div class="row">
    <form id="comp_form">
        <input type="hidden" id="comp_id" name="comp_id" value="<?php echo $comp_id;?>">
    </form>
    <div class="col-md-2">
        <form id="dancers_form">
            <table class="table">
                <tbody>
                    <?php echo $dancers; ?>
                </tbody>
                <thead>
                    <tr>
                        <th>Танцор</th>
                        <th>Дата рожд.</th>
                    </tr>
                </thead>
            </table>
        </form>
        <button id="add_but" class="btn btn-success">
            Зарегистрировать
        </button>
    </div>
    <div class="col-md-4">
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
    <div class="col-md-6">
        <table class="table">
            <tbody id="comp_list">
            </tbody>
            <thead>
                <tr>
                    <th>Танцор</th>
                    <th>Категория</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script src="<?php echo base_url(); ?>js/trainer/select_sum_cat.js"></script>
<?php $this->load->view('footer'); ?>