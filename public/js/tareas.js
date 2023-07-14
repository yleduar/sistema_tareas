$('#tabla-tareas').DataTable({
    processing: true,
    serverSide: true,
    responsive: false,
    lengthChange: false,
    info: false,
    paging: true,
    scrollX: true,
    searching: false,
    ajax: {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/tareas-dashboard",
        type: 'GET',
    },
    columns: [
        {
            data: 'borrar',
            name: 'borrar',
            className: ''

        },
        {
            data: 'editar',
            name: 'editar'

        },
        {
            data: 'completar',
            name: 'completar'

        },
        {
            data: 'estado',
            name: 'estado'

        },
        {
            data: 'nombre',
            name: 'nombre'

        },
        {
            data: 'tarea',
            name: 'tarea'

        },
        {
            data: 'fecha_comprometida',
            name: 'fecha_comprometida'

        }
    ],
    language: {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    }
});

