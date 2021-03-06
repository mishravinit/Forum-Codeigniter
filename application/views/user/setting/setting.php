<main>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">

                <div class="submenu">
                    <div class="container-fluid">
                        <a class="btn active" href="<?= base_url('Profile/Settings'); ?>">Cuenta</a>
                        <a class="btn" href="<?= base_url('Profile/Settings/avatar'); ?>">Perfil</a>
                    </div>

                </div>

            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="color: #d9534f;border-bottom: 1.5px solid #d9534f;">Información personal <i class="fa fa-id-card pull-right" aria-hidden="true"></i></div>
                        <div class="panel-body">
                            <form id="setting" method="post" action="<?= base_url('profile/Settings/processDataChange'); ?>">
                                <div class="form-group">
                                    <label for="account_email">Correo Electronico</label>
                                    <input class="form-control" type="email" id="account_email" name="account_email" value="<?= $user['email']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="account_nick">Nombre de usuario</label>
                                    <input class="form-control" type="text" id="account_nick" name="account_nick" value="<?= $user['nick']; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="account_gender">Sexo</label>
                                    <select class="form-control" id="account_gender" name="account_gender">
                                        <option value="NULL" selected="selected">- Prefiero no indicarlo -</option>
                                        <option value="0">Chico</option>
                                        <option value="1">Chica</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="account_location">Pais</label>
                                    <input class="form-control" type="text" id="account_location" name="account_location" placeholder="Ubicacion" value="<?= $user['location']; ?>">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" style="width: 100%;">Guardar cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="color: #f0ad4e;border-bottom:1.5px solid #f0ad4e;">Contraseña <i class="fa fa-lock pull-right" aria-hidden="true"></i></div>
                        <div class="panel-body">
                            <form method="post" id="settingPasswd" action="<?= base_url('profile/Settings/processPasswdChange'); ?>">
                                <div class="form-group">
                                    <label for="passwd_current">Contraseña actual</label>
                                    <input class="form-control" type="password" id="passwd_current" name="passwd_current">
                                </div>
                                <div class="form-group">
                                    <label for="passwd_new">Contraseña nueva</label>
                                    <input class="form-control" type="password" id="passwd_new" name="passwd_new">
                                </div>
                                <div class="form-group">
                                    <label for="conf_passwd_new">Repitela</label>
                                    <input class="form-control" type="password" id="conf_passwd_new" name="conf_passwd_new">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" style="width: 100%;">Cambiar contraseña</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>