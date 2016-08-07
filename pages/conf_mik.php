<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <section class="panel">
            <header class="panel-heading">
                 Configuración RouterBoard
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-cog"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <?php if(isset($_POST['change_mik'])){
                    $ip_mik         = mysqli_real_escape_string($link,$_POST['ip_mik']);
                    $username_mik   = mysqli_real_escape_string($link,$_POST['username_mik']);
                    $password_mik   = mysqli_real_escape_string($link,$_POST['password_mik']);
                    $change_mik = mysqli_query($link,"UPDATE mik SET ip_mik='$ip_mik', username_mik='$username_mik' ,  password_mik='$password_mik' WHERE id_mik='1'") or die(mysqli_error());
                    if($change_mik){
                        echo '<div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <strong>Todo corresto!</strong> Se ha cambiado correctamente las credenciales del Mikrotik. </div>';
                    }
                }?>
                <?php
                    $perintah = mysqli_query($link,"SELECT * FROM mik WHERE id_mik='1'") or die(mysqli_error());
                    $row = mysqli_fetch_assoc($perintah);
                ?>
                <form accept="" method="post">
                    <div class="form-group">
                      <label>Dirección IP :</label>
                      <input type="text" class="form-control" name="ip_mik" value="<?=$row['ip_mik'];?>">
                    </div>
                    <div class="form-group">
                      <label>Usuario :</label>
                      <input type="text" class="form-control" name="username_mik" value="<?=$row['username_mik'];?>">
                    </div>
                    <div class="form-group">
                      <label>Contraseña :</label>
                      <input type="password" class="form-control" name="password_mik" value="<?=$row['password_mik'];?>">
                    </div>
                    <div align="center"><button type="submit" class="btn btn-primary" name="change_mik">Guardar</button></div>
                </form>  
            </div>
        </section>
    </div>
</div>