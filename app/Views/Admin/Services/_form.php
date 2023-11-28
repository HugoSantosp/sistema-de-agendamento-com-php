
        <div class="row">
            <div class="form-gourp col-md-3">
              <label for="name" class="form-label">Nome</label>
              <input type="text" class="form-control " name="name" value="<?php  echo old('name', $service->name); ?>" id="name" aria-describedby="nameHelp">
              <?php  echo show_error_input('name'); ?>
              
            </div>
        </div>

        <div class="mb-3 form-check">
          <?php echo form_hidden('status', 0) ;?>
          <input type="checkbox" name="status" value="1" <?php if($service->status){ ?> checked <?php } ?>  class="form-check-input" id="status">
          <label class="form-check-label" for="status">Status do Registro</label>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="<?php echo route_to('admin.services'); ?>" class="btn btn-secondary ">Voltar</a>
