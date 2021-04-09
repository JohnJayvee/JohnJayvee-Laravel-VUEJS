<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 Crud operation using ajax(Real Programmer)</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>
    <div id="app">
 <userview-vue></userview-vue>
</div>
</body>
<script src="{{ asset('js/app.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ url('users') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'firstName',
                        name: 'firstName'
                    },
                    {
                        data: 'lastName',
                        name: 'lastName'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            // setInterval(function() {
            //     table.draw();
            // }, 500);



            $('#createNewUser').click(function() {
                $('#saveBtn').val("create-user");
                $('#user_id').val('');
                $('#userForm').trigger("reset");
                $('#modelHeading').html("Create New User");
                $('#ajaxModel').modal('show');
            });
            // Edit function
            $('body').on('click', '.editUser', function() {
                var user_id = $(this).data('id');
                var editUrl = '{{ route('user.edit', ':id') }}';
                editUrl = editUrl.replace(':id', user_id);
                $.get(editUrl, function(data) {
                    $('#modelHeading').html("Edit User");
                    $('#saveBtn').val("edit-user");
                    $('#ajaxModel').modal('show');
                    $('#user_id').val(data.id);
                    $('#firstName').val(data.firstName);
                    $('#lastName').val(data.lastName);
                })
            });
            // show function
            $('body').on('click', '.showUser', function() {
                var user_id = $(this).data('id');
                var showUrl = '{{ route('user.show', ':id') }}';
                showUrl = showUrl.replace(':id', user_id);
                $.get(showUrl, function(data) {
                    $('.modelHeading').html("Show User");
                    $('.ajaxShowModel').modal('show');
                    $(".btn").click(function() {
                        $(".ajaxShowModel").modal('hide');
                    });
                    $('.firstName').text(data.firstName);
                    $('.lastName').text(data.lastName);
                    console.log(data.lastName);
                })
            });
            $('#saveBtn').click(function(e) {
                e.preventDefault();
                $(this).html('Save');

                $.ajax({
                    data: $('#userForm').serialize(),
                    url: "{{ route('user.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {

                        $('#userForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        console.log('Success:', data);
                        table.draw();

                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });

            // Delete function
            $('body').on('click', '.deleteUser', function() {
                var user_id = $(this).data('id');
                var deleteUrl = '{{ route('user.destroy', ':id') }}';
                deleteUrl = deleteUrl.replace(':id', user_id);


                if (confirm("Are You sure want to delete !")) {
                    $.ajax({
                        type: "DELETE",
                        url: deleteUrl,

                        error: function() {
                            console.log('Error:', data);
                            table.draw();
                        },
                        success: function(data) {
                            console.log('Success:', data);
                            table.draw();
                        }

                    });
                }
            });
        });

    </script>
</body>

</html>
