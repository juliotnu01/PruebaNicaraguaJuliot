class DocumentReady {
    async consultApi() {
        try {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "src/php/api.php", true);
            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 300) {
                    let datos = JSON.parse(xhr.responseText);

                    $(document).ready(function () {
                        var tbody = $("#t_body_faker");
                        for (var i = 0; i < datos.length; i++) {
                            tbody.append(fila);
                            var fila = $("<tr>");
                            var celda1 = $("<td>").text(datos[i].nombre);
                            var celda2 = $("<td>").text(datos[i].apellido);
                            var celda3 = $("<td>").text(datos[i].edad);
                            var celda4 = $("<td>");

                            var botonEditar = $("<button>Editar</button>");
                            botonEditar.attr("id", "editar-btn" + i);
                            botonEditar.attr("class", "btn btn-primary");

                            var botonEliminar = $(` 
                            <form  action="./src/php/app.php" method="post"> 
                                <input style="display: none" name="idDelete" value="${
                                datos[i].id
                            }" >
                                <input style="display: none" name="_metodo" value="delete" >
                                <button type="submit" class="btn btn-danger" >Eliminar</button>
                            </form>
                            `);
                            botonEliminar.attr("id", "eliminarForm"+i);

                            celda4.append(botonEditar);
                            celda4.append(botonEliminar);

                            var InputNombre = $("#nombre");
                            var InputApellido = $("#apellido");
                            var InputEdad = $("#edad");
                            var InputIdEdit = $("#idEdit");

                            var modal = $("#modal");

                            (function (index) {
                                botonEditar.on("click", function () {
                                    modal.modal("show");
                                    InputNombre.val(datos[index].nombre);
                                    InputApellido.val(datos[index].apellido);
                                    InputEdad.val(datos[index].edad);
                                    InputIdEdit.val(datos[index].id);
                                });
                            })(i);

                            (function (index) {
                                var _$ = $;
                                botonEliminar.on("submit", function (e) {
                                    e.preventDefault();
                                    var formDelete = _$(`eliminarForm${index}`)
                                    $.ajax({
                                        url: formDelete.attr("action"),
                                        method: formDelete.attr("method"),
                                        data: formDelete.serialize(),
                                        success: function (response) {
                                            tbody.empty();
                                            let datos = JSON.parse(response);
                                            for (var i = 0; i < datos.length; i++) {
                                                tbody.append(fila);
                                                var fila = $("<tr>");
                                                var celda1 = $("<td>").text(datos[i].nombre);
                                                var celda2 = $("<td>").text(datos[i].apellido);
                                                var celda3 = $("<td>").text(datos[i].edad);
                                                var celda4 = $("<td>");

                                                var botonEditar = $("<button>Editar</button>");
                                                botonEditar.attr("id", "editar-btn" + i);
                                                botonEditar.attr("class", "btn btn-primary");

                                                var botonEliminar = $(`
                                        <form  id="formDelete" action="./src/php/app.php" method="post">
                                            <input style="display: none" name="idDelete" value="${
                                                    datos[i].id
                                                }" >
                                            <input style="display: none" name="_metodo" value="delete" >
                                            <button type="submit" class="btn btn-danger" >Eliminar</button>
                                        </form>
                                    `);
                                                botonEliminar.attr("id", "eliminar-btn" + i);

                                                celda4.append(botonEditar);
                                                celda4.append(botonEliminar);

                                                var InputNombre = $("#nombre");
                                                var InputApellido = $("#apellido");
                                                var InputEdad = $("#edad");
                                                var InputIdEdit = $("#idEdit");

                                                var modal = $("#modal");

                                                (function (index) {
                                                    botonEditar.on("click", function () {
                                                        modal.modal("show");
                                                        InputNombre.val(datos[index].nombre);
                                                        InputApellido.val(datos[index].apellido);
                                                        InputEdad.val(datos[index].edad);
                                                        InputIdEdit.val(datos[index].id);
                                                    });
                                                })(i);

                                                fila.append(celda1[0]);
                                                fila.append(celda2[0]);
                                                fila.append(celda3[0]);
                                                fila.append(celda4[0]);
                                                tbody.append(fila[0]);
                                            }
                                        }
                                    });

                                });
                            })(i);

                            fila.append(celda1[0]);
                            fila.append(celda2[0]);
                            fila.append(celda3[0]);
                            fila.append(celda4[0]);
                            tbody.append(fila[0]);
                        }

                        // editar
                        var formEdit = $("#formEdit");

                        formEdit.on("submit", async (e) => {
                            e.preventDefault();

                            $.ajax({
                                url: formEdit.attr("action"),
                                method: formEdit.attr("method"),
                                data: formEdit.serialize(),
                                success: function (response) {
                                    tbody.empty();
                                    let datos = JSON.parse(response);
                                    for (var i = 0; i < datos.length; i++) {
                                        tbody.append(fila);
                                        var fila = $("<tr>");
                                        var celda1 = $("<td>").text(datos[i].nombre);
                                        var celda2 = $("<td>").text(datos[i].apellido);
                                        var celda3 = $("<td>").text(datos[i].edad);
                                        var celda4 = $("<td>");

                                        var botonEditar = $("<button>Editar</button>");
                                        botonEditar.attr("id", "editar-btn" + i);
                                        botonEditar.attr("class", "btn btn-primary");

                                        var botonEliminar = $(` 
                                            <form  id="formDelete" action="./src/php/app.php" method="post"> 
                                                <input style="display: none" name="idDelete" value="${
                                            datos[i].id
                                        }" >
                                                <input style="display: none" name="_metodo" value="delete" >
                                                <button type="submit" class="btn btn-danger" >Eliminar</button>
                                            </form>
                                        `);
                                        botonEliminar.attr("id", "eliminar-btn" + i);

                                        celda4.append(botonEditar);
                                        celda4.append(botonEliminar);

                                        var InputNombre = $("#nombre");
                                        var InputApellido = $("#apellido");
                                        var InputEdad = $("#edad");
                                        var InputIdEdit = $("#idEdit");

                                        var modal = $("#modal");

                                        (function (index) {
                                            botonEditar.on("click", function () {
                                                modal.modal("show");
                                                InputNombre.val(datos[index].nombre);
                                                InputApellido.val(datos[index].apellido);
                                                InputEdad.val(datos[index].edad);
                                                InputIdEdit.val(datos[index].id);
                                            });
                                        })(i);

                                        fila.append(celda1[0]);
                                        fila.append(celda2[0]);
                                        fila.append(celda3[0]);
                                        fila.append(celda4[0]);
                                        tbody.append(fila[0]);
                                    }
                                }
                            });

                            modal.modal("hide");
                        });
                    });
                } else {
                    console.error("Error al cargar el documento con AJAX");
                }
            };

            xhr.send();
        } catch (error) {
            console.log(error);
        }
    }

    eliminar(id) {
        console.log(id);
    }
}

const Doc = new DocumentReady();
Doc.consultApi();
