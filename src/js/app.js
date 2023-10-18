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

                            fila.append(celda1[0]);
                            fila.append(celda2[0]);
                            fila.append(celda3[0]);

                            tbody.append(fila[0]);
                        }
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
}

const Doc = new DocumentReady();
Doc.consultApi();
