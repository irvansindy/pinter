<script>
    // fetchUser()

    // function fetchUser() {
    //     $.ajax({
    //         header: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url: "{{ route('fetch-user') }}",
    //         type: 'GET',
    //         dataType: 'json',
    //         async: true,
    //         beforeSend: () => {
    //             // SwalLoading('Please wait ...');
    //             swal.fire({
    //                 html: '<h5>Loading...</h5>',
    //                 showConfirmButton: false,
    //                 onRender: function() {
    //                     // there will only ever be one sweet alert open.
    //                     $('.swal2-content').prepend(sweet_loader);
    //                 }
    //             });
    //         },
    //         success: function(res) {
    //             swal.close()
    //             let number = 1
    //             $('#user_management').DataTable({
    //                 processing: true,
    //                 serverSide: true,
    //                 responsive: true,
    //                 scrollY: 300,
    //                 deferRender: true,
    //                 scroller: true,
    //                 fixedHeader: true,
    //                 bSort: false,
    //                 order: [1, 'asc'],
    //                 data: res.data,
    //                 columns: [{
    //                         "data": null,
    //                         "render": function(data, type, row, meta) {
    //                             return meta.row + 1;
    //                         }
    //                     },
    //                     {
    //                         'data': 'username',
    //                         "defaultContent": "<i>Not set</i>"
    //                     },
    //                     {
    //                         'data': 'roles[0].name',
    //                         "defaultContent": "<i>Not set</i>"
    //                     },
    //                     {
    //                         'data': 'email',
    //                         "defaultContent": "<i>Not set</i>"
    //                     },
    //                     {
    //                         'data': null,
    //                         title: 'Action',
    //                         wrap: true,
    //                         "render": function(item) {
    //                             return '<div class="btn-group d-flex align-items-center justify-content-sm-center ms-auto px-auto" role="group" aria-label="Basic mixed styles example"><button type="button" data-user_id="' +
    //                                 item.id +
    //                                 '" class="btn btn-outline-info btn-sm mt-2 btn_detail_user" data-bs-toggle="modal" data-bs-target="#formUserDetail">View</button><button type="button" data-user_id="' +
    //                                 item.id +
    //                                 '" class="btn btn-outline-danger btn-sm mt-2 btn_detail_user" data-bs-toggle="modal" data-bs-target="#myModal">Delete</button></div>'
    //                         }
    //                     },
    //                 ]
    //             })
    //         }
    //     })
    // }

    $('#user_management').DataTable({
        processing: true,
        // serverSide: true,
        serverside: false,
        responsive: true,
        scrollY: 300,
        scroller: true,
        fixedHeader: true,
        ajax: {
            url: '{{ route("fetch-user") }}',
            type: 'GET',
        },
        "draw": 1,
        "recordsTotal": 100,
        "recordsFiltered": 100,
        columns: [
            {
                "data": null,
                "render": function(data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            {
                'data': 'username',
                "defaultContent": "<i>Not set</i>"
            },
            {
                'data': 'roles[0].name',
                "defaultContent": "<i>Not set</i>"
            },
            {
                'data': 'email',
                "defaultContent": "<i>Not set</i>"
            },
            {
                'data': null,
                title: 'Action',
                wrap: true,
                "render": function(item) {
                    return '<div class="btn-group d-flex align-items-center justify-content-sm-center ms-auto px-auto" role="group" aria-label="Basic mixed styles example"><button type="button" data-user_id="' +
                        item.id +
                        '" class="btn btn-outline-info btn-sm mt-2 btn_detail_user" data-bs-toggle="modal" data-bs-target="#formUserDetail">View</button><button type="button" data-user_id="' +
                        item.id +
                        '" class="btn btn-outline-danger btn-sm mt-2 btn_detail_user" data-bs-toggle="modal" data-bs-target="#myModal">Delete</button></div>'
                }
            },
        ],
        language: {
            // Customize DataTable language settings if needed
            emptyTable: "No data available in table",
            zeroRecords: "No matching records found",
        },
    })

    $('#create_role').select2({
        dropdownParent: $('#form_create_user')
    })

    $(document).on('click', '#btn_create_user', function(e) {
        e.preventDefault()
        $('#form_create_user')[0].reset()
        $.ajax({
            header: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{ route("create-user") }}',
            type: 'get',
            dataType: 'json',
            async: true,
            success: function(res) {
                // console.log(res.data)
                $('#create_role').append(`
                    <option value="" hidden>Select Role</option>
                `)
                for (let i = 0; i < res.data.length; i++) {
                    $('#create_role').append(`
                        <option value="${res.data[i].name}" hidden>${res.data[i].name}</option>
                    `)
                }
            },
            error: function(xhr, status, error) {
                var errorMessage = JSON.parse(xhr.responseText);
                alert(errorMessage.messages)
            }
        })
    })

    // store-user
    $(document).on('click', '#create_user', function(e) {
        e.preventDefault()
        // alert('bisa save')
        let create_first_name = $('#create_first_name').val()
        let create_last_name = $('#create_last_name').val()
        let create_user_name = $('#create_user_name').val()
        let create_email = $('#create_email').val()
        let create_role = $('#create_role').val()

        if (create_first_name == '' || create_first_name == null) {
            Swal.fire({
                icon: "warning",
                title: "Oops...",
                text: "First name cannot empty"
            })
            return false
        }

        if (create_last_name == '' || create_last_name == null) {
            Swal.fire({
                icon: "warning",
                title: "Oops...",
                text: "Last name cannot empty"
            })
            return false
        }

        if (create_user_name == '' || create_user_name == null) {
            Swal.fire({
                icon: "warning",
                title: "Oops...",
                text: "User name cannot empty"
            })
            return false
        }

        if (create_email == '' || create_email == null) {
            Swal.fire({
                icon: "warning",
                title: "Oops...",
                text: "Email cannot empty"
            })
            return false
        }

        if (create_role == '' || create_role == null) {
            Swal.fire({
                icon: "warning",
                title: "Oops...",
                text: "User role cannot empty"
            })
            return false
        }
        
        let data = {
            'firstname': create_first_name,
            'lastname': create_last_name,
            'username': create_user_name,
            'email': create_email,
            'roles': create_role,
        }
        CreateOrUpdate('store-user', 'post', data, '#role_managament')
    })

    $('#detail_role').select2({
        dropdownParent: $('#form_detail_user')
    })

    $('#user_management').on('click', '.btn_detail_user', function(e) {
        e.preventDefault()
        let id = $(this).data('user_id')
        $('#form_detail_user')[0].reset()

        $.ajax({
            header: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{ route("detail-user") }}',
            type: 'get',
            data: {
                'id': id
            },
            dataType: 'json',
            async: true,
            success: function(res) {
                // console.log(JSON.stringify(res.data[1][0].name))
                $('#detail_id').val(res.data[0].id == null ? 'No Set' : res.data[0]
                    .id)
                $('#detail_first_name').val(res.data[0].firstname == null ? 'No Set' : res.data[0]
                    .firstname)
                $('#detail_last_name').val(res.data[0].lastname == null ? 'No Set' : res.data[0]
                    .lastname)
                $('#detail_user_name').val(res.data[0].username == null ? 'No Set' : res.data[0]
                    .username)
                $('#detail_email').val(res.data[0].email == null ? 'No Set' : res.data[0].email)
                $('#detail_role').empty()
                $('#detail_role').append(`
                    <option value="${res.data[0].roles[0].name}">${res.data[0].roles[0].name}</option>
                `)
                $('#detail_role').append(`
                    <option value="" hidden>Select Role</option>
                `)
                for (let i = 0; i < res.data[1].length; i++) {
                    $('#detail_role').append(`
                        <option value="${res.data[1][i].name}">${res.data[1][i].name}</option>
                    `)
                }
                $('#current_role').val(res.data[0].roles[0].name)
                $('#update_user').attr('data-user_id', res.data[0].id);
            },
            error: function(xhr, status, error) {
                var errorMessage = JSON.parse(xhr.responseText);
                alert(errorMessage.messages)
            }
        })
    })

    $(document).on('click', '#exSweetalert', function(e) {
    })

    $(document).on('click', '#update_user', function(e) {
        e.preventDefault()
        let user_id = $(this).data('user_id')
        let detail_id = $('#detail_id').val()
        let detail_first_name = $('#detail_first_name').val()
        let detail_last_name = $('#detail_last_name').val()
        let detail_user_name = $('#detail_user_name').val()
        let detail_email = $('#detail_email').val()
        let detail_role = $('#detail_role').val()
        let current_role = $('#current_role').val()

        if (detail_first_name == '' || detail_first_name == null || detail_first_name == 'No Set') {
            Swal.fire({
                icon: "warning",
                title: "Oops...",
                text: "First name cannot empty"
            })
            return false
        }
        
        if (detail_last_name == '' || detail_last_name == null || detail_last_name == 'No Set') {
            Swal.fire({
                icon: "warning",
                title: "Oops...",
                text: "Last name cannot empty"
            })
            return false
        }
        
        if (detail_user_name == '' || detail_user_name == null || detail_user_name == 'No Set') {
            Swal.fire({
                icon: "warning",
                title: "Oops...",
                text: "User name cannot empty"
            })
            return false
        }
        
        if (detail_role == '' || detail_role == null || detail_role == 'No Set') {
            Swal.fire({
                icon: "warning",
                title: "Oops...",
                text: "User role cannot empty"
            })
            return false
        }

        let data = {
            'id': detail_id,
            'firstname': detail_first_name,
            'lastname': detail_last_name,
            'username': detail_user_name,
            'email': detail_email,
            'roles': detail_role,
            'current_role': current_role
        }

        // let url = '/update-user/' + detail_id
        let url = 'update-user'

        CreateOrUpdate( url, 'post', data)
        
    })
</script>
