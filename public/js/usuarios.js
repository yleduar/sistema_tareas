
$('#tabla-usuarios').DataTable({
    processing: true,
    serverSide: true,
    responsive: false,
    lengthChange: false,
    info: false,
    paging: true,
    scrollX: true,
    searching: false,
    order: [[2, 'asc']],
    ajax: {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/usuarios-dashboard",
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
            data: 'nombre',
            name: 'nombre'

        },
        {
            data: 'perfil',
            name: 'perfil'

        }
    ],
    language: {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    }
});