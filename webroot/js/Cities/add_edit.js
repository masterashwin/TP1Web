$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#region-id').on('change', function () {
        var regionId = $(this).val();
        if (regionId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'region_id=' + regionId,
                success: function (counties) {
                    /**/      $select = $('#county-id');
                            $select.find('option').remove();
                            $.each(counties, function (key, value)
                                {
                                $.each(value, function (childKey, childValue) {
                                $select.append('<option value=' + childValue.id + '>' + childValue.name + '</option>');
                                });
                            });
                    /**/
                    /*      $('#okres-county-id').html(counties);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }

                /**/                }
                 });
                 } else {
                 $('#county-id').html('<option value="">Select Region first</option>');
                 }
                 /**/});
});