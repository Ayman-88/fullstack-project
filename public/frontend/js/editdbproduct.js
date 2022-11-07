// get category value //
$(document).ready(function () {
    $('select[name="category_id"]').change(function () {
        var id = $(this).val();
        //call brand on category selected//
        // ajax setup//

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            dataType: "json",
            url: "/getBrand/" + id,
            type: "GET",
            success: function (brands) {
                $('select[name="brand_id"]').empty();
                $.each(brands, function (x, y) {
                    $('select[name="brand_id"]').append(
                        `<option value="${y.id}">${y.brand_name}</option> `
                    );
                });
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
});
