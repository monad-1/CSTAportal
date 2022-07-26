$(document).ready(function() {



    $('#addUser').click(function() {
        $('#usersForm')[0].reset();
        $('.title').text(' Add User');
        $('#action').val("Register");
        $('#operation').val("Add");
    })

    var enrolltrackTable = $('#enrolltrackTable').dataTable({
        "paging": false,
        "processing": false,
        "serverSide": true,
        "order": [],
        "info": true,
        "searching": false,
        "bInfo": false,
        "ajax": {
            url: "codes/fetch_trackenroll.php",
            type: "POST"

        },
        "columnDefs": [{
            "target": [0, 1, 2, 3, 4,5,6],
            "orderable": false,
        }, ],
    });

    $(document).on('submit', '#usersForm', function(event) {
        event.preventDefault();
        var lname = $("#lname").val();
        var fname = $("#fname").val();
        var mname = $("#mname").val();
        var gender = $("#gender").val();
        var email = $("#email").val();
        var gender = $("#gender").val();
        var mobile = $("#mobile").val();
        var office = $("#office").val();
        var dept = $("#dept").val();
        var role = $("#role").val();
        var position = $("#position").val();


        if (lname == "" || fname == "" || mname == "" || gender == "" ||
            email == "" || gender == "" || mobile == "" || !office || !dept || !role
            || position=="") {

            Swal.fire({
                icon: 'warning',
                title: 'Oops!',
                text: 'Insufficient Data!'
            })
        } else {
            $.ajax({
                url: "codes/userscrud.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Record Updated!',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    $('#usersModal').modal('hide');

                    // $('#usersForm')[0].reset();

                    enrolltrackTable.api().ajax.reload();
                }

            })
        }
    })


    $(document).on('click', '.update', function() {
        var user_id = $(this).attr('id');


        $.ajax({
            url: "codes/userscrud.php",
            method: "POST",
            data: {
                user_id: user_id
            },
            dataType: "json",
            success: function(data) {
                $('#usersModal').modal('show');
                $('#user_id').val(data.id);
                $('#lname').val(data.lname);
                $('#fname').val(data.fname);
                $('#mname').val(data.mname);
                $('#gender').val(data.Gender);
                $('#email').val(data.email);
                $('#mobile').val(data.mobile);
                $("#office").val(data.office);
                $("#dept").val(data.dept);
                $("#position").val(data.position);
                $("#role").val(data.role);
                


                $('.title').text(' Edit User');
                $('#user_id').val(user_id);

                $('#operation').val("Edit");
                $('#action').val("Save");

            }
        })
    })

    $(document).on('click', '.restrict', function() {
        var user_id = $(this).attr('id');
        Swal.fire({
            title: 'Confirm',
            text: "Are you sure you want to restrict this user?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "codes/userscrud.php",
                    method: "POST",
                    data: {
                        restrict_id: user_id
                    },
                    success: function(data) {
                        enrolltrackTable.api().ajax.reload();
                    }
                })
                Swal.fire(
                    'Success!',
                    'User has been restricted.',
                    'success'
                )
            }
        })

    })

    $(document).on('click', '.delete', function() {
        var delete_id = $(this).attr('id');
        Swal.fire({
            title: 'Confirm',
            text: "Are you sure you want to delete this record?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "codes/trackercrud.php",
                    method: "POST",
                    data: {
                        delete_id: delete_id
                    },
                    success: function(data) {
                       location.reload();
                    }
                })
                Swal.fire(
                    'Success!',
                    'Data Deleted!.',
                    'success'
                )
            }
        })

    })

    $(document).on('click', '.close', function() {
        $('#usersModal').modal('hide');
    })

    $(document).on('click', '#close', function() {
        $('#usersModal').modal('hide');
    })


});