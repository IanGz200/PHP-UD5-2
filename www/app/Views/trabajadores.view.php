<!--Inicio HTML -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="get" action="/trabajadores">
                <input type="hidden" name="order" value="1" />
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Filtros</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!--<form action="./?sec=formulario" method="post">                   -->
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="username" id="username" value="" />
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="salarioBruto">Salario Bruto:</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="min_salarioBruto" id="min_salarioBruto" value=""
                                               placeholder="Mínimo" />
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="max_salarioBruto" id="max_salarioBruto" value=""
                                               placeholder="Máximo" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <?php var_dump($_GET); ?>
                            <div class="mb-3">
                                <label for="rol">Países:</label>
                                <select name="paises[]" id="paises" class="form-control select2" data-placeholder="países"
                                    multiple>
                                    <option value="">-</option>
                                    <?php foreach ($paises as $pais) { ?>
                                    <option value="<?= $pais['id'] ?>"><?= $pais['country_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="rol">Rol:</label>
                                <select name="rol" id="rol" class="form-control" data-placeholder="rol">
                                    <option value="">-</option>
                                    <?php foreach ($roles as $rol) { ?>
                                    <option value="<?php echo $rol['id_rol']??'' ?>"><?php echo ucfirst($rol['nombre_rol']) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="max_retencionIRPF">Retencion IRPF:</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="min_retencionIRPF" id="min_retencionIRPF" value=""
                                            placeholder="Mínimo" />
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="max_retencionIRPF" id="max_retencionIRPF" value=""
                                            placeholder="Máximo" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="activo">Activo:</label>
                                <select name="rol" id="activo" class="form-control" data-placeholder="activo">
                                    <option value="">-</option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-12 text-right">
                        <a href="/trabajadores" value="" name="reiniciar" class="btn btn-danger">Reiniciar filtros</a>
                        <input type="submit" value="Aplicar filtros" name="enviar" class="btn btn-primary ml-2" />
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Proveedores</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body" id="card_table">
                <div id="button_container" class="mb-3"></div>
                <!--<form action="./?sec=formulario" method="post">                   -->
                <table id="tabladatos" class="table table-striped">
                    <thead>
                    <tr>
                        <th><a href="/trabajadores?order=1">Username</a> <i class="fas fa-sort-amount-down-alt"></i>
                        </th>
                        <th><a href="/trabajadores?order=2">SalarioBruto</a></th>
                        <th><a href="/trabajadores?order=3">RetencionIRPF</a></th>
                        <th><a href="/trabajadores?order=4">Rol</a></th>
                        <th><a href="/trabajadores?order=5">Pais</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($trabajadores as $trabajador) { ?>
                        <tr class="<?php echo $trabajador['activo'] == 0 ? 'text-danger' : '' ?>">
                            <td><?php echo $trabajador['username'] ?></td>
                            <td><?php echo $trabajador['salarioBruto'] ?></td>
                            <td><?php echo $trabajador['retencionIRPF'] ?></td>
                            <td><?php echo $trabajador['nombre_rol'] ?></td>
                            <td><?php echo $trabajador['country_name'] ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <nav aria-label="Navegacion por paginas">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="/proveedores?page=1&order=1" aria-label="First">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">First</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="/proveedores?page=2&order=1" aria-label="Previous">
                                <span aria-hidden="true">&lt;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>

                        <li class="page-item active"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="/proveedores?page=4&order=1" aria-label="Next">
                                <span aria-hidden="true">&gt;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="/proveedores?page=8&order=1" aria-label="Last">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Last</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--Fin HTML -->