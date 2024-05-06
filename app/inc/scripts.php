<?php defined('APPBASE') or die; ?>

<script src="app/scripts/jquery-3.5.1.js"></script>
<script src="app/scripts/bootstrap.bundle.min.js"></script>
<script src="app/scripts/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#news-table').DataTable({
            dom: '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
            order: [
                [0, 'desc']
            ],
        });

        // // Select all <time> elements with class "date-time"
        // $('time').each(function() {
        //     var originalDateTime = $(this).text(); // Get the original date-time string
        //     var formattedDateTime = formatDateTime(originalDateTime); // Format the date-time
        //     $(this).text(formattedDateTime); // Update the content of the <time> element
        // });

        // // Function to format date-time
        // function formatDateTime(dateTimeStr) {
        //     var options = {
        //         year: 'numeric',
        //         month: 'numeric',
        //         day: 'numeric',
        //         hour: 'numeric',
        //         minute: 'numeric',
        //         second: 'numeric'
        //     };
        //     var formattedDateTime = new Date(dateTimeStr).toLocaleDateString('en-US', options);
        //     return formattedDateTime;
        // }
    });
</script>