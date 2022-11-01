$(document).ready(function () {
    $("#button-download-excel").on("click", function () {

        $.ajax({
            type: "POST",
            url: "inlcudes_function/download_file_excel.php",
            data: {
                Action: "download-list-order",
            },
            cache: false,
            success: function (result) {
                var n = result.search("Unknown database");
                if (n > 0) {
                    alert("Database không đúng!");
                } else {
                    /* Convert json to array */
                    var data = JSON.parse(result);
                    // dùng console.log xem biến in ra ở trên trình duyệt ở mục console . debug cho dễ
                    console.log(data);
                }
            }
        });
    })
});