$(document).ready(function() {
     //Capitalize input fields
     $('#course').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#abbr').keyup(function(){
        $(this).css("text-transform", "uppercase");
    });


    $('#addCourse').click(function() {
        $('#coursesForm')[0].reset();
        $('.title').text(' Add Course');
        $('#action').val("Save");
        $('#operation').val("Add");
    })

    var coursesTable = $('#coursesTable').dataTable({
        "paging": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "info": true,
        "pageLength": 5,
        "ajax": {
            url: "codes/fetch_courses.php",
            type: "POST"

        },
        "columnDefs": [{
            "target": [0, 1, 2, 3],
            "orderable": false,
        }, ],
    });

    $(document).on('submit', '#coursesForm', function(event) {
        event.preventDefault();

            $.ajax({
                url: "codes/coursescrud.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Courses Table Updated!',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    $('#coursesModal').modal('hide');

                    // $('#usersForm')[0].reset();

                    coursesTable.api().ajax.reload();
                }

            })
       
    })


    $(document).on('click', '.edit_course', function() {
        var course_id = $(this).attr('id');
        //alert (course_id);

        $.ajax({
            url: "codes/coursescrud.php",
            method: "POST",
            data: {
                course_id: course_id
            },
            dataType: "json",
            success: function(data) {
                $('#coursesModal').modal('show');
                $('#course_id').val(data.id);
                $('#dept').val(data.deptid);
                $('#abbr').val(data.abbr);
                $('#course').val(data.course);
                
                $('.title').text(' Edit Course');
                $('#course_id').val(course_id);

                $('#operation').val("Edit");
                $('#action').val("Save");
            }
        })
    })

    $(document).on('click', '.delete', function() {
        var course_id = $(this).attr('id');
        Swal.fire({
            title: 'Confirm',
            text: "Are you sure you want to delete this course?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "codes/coursescrud.php",
                    method: "POST",
                    data: {
                        delete_course_id: course_id
                    },
                    success: function(data) {
                        coursesTable.api().ajax.reload();
                    }
                })
                Swal.fire(
                    'Success!',
                    'Course has been deleted!.',
                    'success'
                )
            }
        })

    })



    $(document).on('click', '.close', function() {
        $('#coursesModal').modal('hide');
    })

    $(document).on('click', '#close', function() {
        $('#coursesModal').modal('hide');
    })


});