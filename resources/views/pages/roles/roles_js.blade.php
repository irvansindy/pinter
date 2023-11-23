<script>
    new DataTable('#role_managament', {
        pagingType: 'first_last_numbers'
    });
    
    $('#create_role_user').click(function(e) {
        e.preventDefault()
        // alert('success')
        let create_role_name = $('#create_role_name').val()
        let create_permission_role = $('#create_permission_role').val()

        if (create_role_name == '' || create_role_name == null) {
            alert('kosong bro')
            return false;
        }

        let data = {
            'name': create_role_name,
        }

        // CreateOrUpdate('/roles/store', 'post', data)
        CreateOrUpdate('rolesStore', 'post', data, '#role_managament')
    })
</script>