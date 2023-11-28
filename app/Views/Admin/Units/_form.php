
        <div class="row">
            <div class="form-gourp col-md-3">
              <label for="name" class="form-label">Nome</label>
              <input type="text" class="form-control " name="name" value="<?php  echo old('name', $unit->name); ?>" id="name" aria-describedby="nameHelp">
              <?php  echo show_error_input('name'); ?>
              
            </div>
        
            <div class="form-group col-md-2">
              <label for="phone" class="form-label">Telefone</label>
              <input type="tel" class="form-control phone_with_ddd" name="phone" value="<?php echo old('phone', $unit->phone); ?>" id="phone" aria-describedby="phoneHelp">
              <?php echo show_error_input('phone'); ?>
            </div>
            <div class="form-group col-md-3">
              <label for="coordinator" class="form-label">Coordenador</label>
              <input type="text" class="form-control" name="coordinator" value="<?php  echo old('coordinator', $unit->coordinator); ?>" id="coordinator" aria-describedby="coordinatorHelp">
              <?php echo show_error_input('coordinator'); ?>
            </div>
            <div class="form-group col-md-3">
              <label for="adress" class="form-label">Endereço</label>
              <input type="text" class="form-control" name="adress" value="<?php echo old('adress', $unit->adress); ?>" id="adress" aria-describedby="adressHelp">
              <?php echo show_error_input('adress'); ?>
            </div>
        </div>

        <div class="row">
            <div class="form-gourp col-md-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" name="email" value="<?php echo old('email', $unit->email); ?>" id="email" aria-describedby="emailHelp">
              <?php echo show_error_input('email'); ?>
            </div>
        
            <div class="form-group col-md-2">
              <label for="starttime" class="form-label">Início</label>
              <input type="time" class="form-control" name="starttime" value="<?php echo old('starttime', $unit->starttime); ?>" id="starttime" aria-describedby="starttimeHelp">
              <?php echo show_error_input('starttime'); ?>
            </div>
            <div class="form-group col-md-3">
              <label for="endtime" class="form-label">Término</label>
              <input type="time" class="form-control" name="endtime" value="<?php echo old('endtime', $unit->endtime); ?>" id="endtime" aria-describedby="endtimeHelp">
              <?php echo show_error_input('endtime'); ?>
            </div>
            <div class="form-group col-md-3">
              <label for="servicetime" class="form-label">Tempo de Serviço</label>
              <?php echo $timesInterval; ?>
              <?php echo show_error_input('coordinator'); ?>
            </div>
        </div>

        <div class="mb-3 form-check">
          <?php echo form_hidden('status', 0) ;?>
          <input type="checkbox" name="status" value="1" <?php if($unit->status){ ?> checked <?php } ?>  class="form-check-input" id="status">
          <label class="form-check-label" for="status">Status do Registro</label>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="<?php echo route_to('admin.units'); ?>" class="btn btn-secondary ">Voltar</a>
