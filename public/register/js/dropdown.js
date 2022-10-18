$('#region').change(function() {
    var regionID = $(this).val();
    console.log(regionID);
    if (regionID) {
        $.ajax({
            type: "GET",
            url: "/all/district/list/?region_id=" + regionID,
            success: function(res) {
                if (res) {
                    // console.log(res);
                    $("#district").empty();
                    $("#district").append('<option>Select District</option>');
                    $.each(res, function(key, value) {
                        // console.log(value);
                        $("#district").append('<option value="' + key + '">' + value + '</option>');
                    });

                } else {
                    $("#district").empty();
                }
            }
        });
    } else {
        $("#district").empty();
        $("#ward").empty();
    }
});
$('#district').on('change', function() {
    var districtID = $(this).val();
    // console.log(districtID);
    ;
    if (districtID) {
        $.ajax({
            type: "GET",
            url: "/all/ward/list/?district_id=" + districtID,
            success: function(res) {
                if (res) {
                    // console.log(res);
                    $("#ward").empty();
                    $("#ward").append('<option>Select Ward</option>');
                    $.each(res, function(key, value) {
                        $("#ward").append('<option value="' + key + '">' + value + '</option>');
                    });

                } else {
                    $("#ward").empty();
                }
            }
        });
    } else {
        $("#ward").empty();
    }

});