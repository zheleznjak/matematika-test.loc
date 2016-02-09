;(function ($) {
    var promise = $.get('/api/country');

    $(function () {
        promise.done(function (data) {
            var header = "<table class=\"table table-striped table-bordered\"> \
                        <thead> \
                        <tr> \
                            <th class=\"text-center\">id</th> \
                            <th class=\"text-center\">Country</th> \
                            <th class=\"text-center\">Edit</th> \
                            <th class=\"text-center\">Delete</th> \
                        </tr> \
                        </thead> \
                        <tbody>";
            $('.center_div').append(header);
            $(data.countries).each(function () {
                var markup = "<tr> \
                            <th class=\"text-center\" scope=\"row\">" + $(this).attr('id') + "</th> \
                        <td class=\"text-center\">" + $(this).attr('country') + "</td> \
                        <td class=\"text-center\"><a class=\"btn btn-primary\" href=\"/api/country/"+
                    $(this).attr('id')+"/edit\" role=\"button\">Edit</a></td> \
                        <td class=\"text-center\"><button class=\"btn btn-danger delete-js\" type=\"submit\">Delete</button></td> \
                        </tr>";
                $('tbody').append(markup);
            });
        });
    });
    $(document).ready(function () {
        $(document)
            .on('click', '.delete-js', function (e) {
                $('#alert-js').hide();
                $('#success-js').hide();
                var id = $(this).closest('tr').children('th').text();
                $.ajax(
                    {
                        method: 'DELETE',
                        url:    '/api/country/' + id,
                        data:   {}
                    }
                ).done(function (response) {
                        if (!response.success) {
                            $('#alert-js').show().text(response.error);
                        } else {
                            $('#success-js').show().text(response.success);
                        }
                    })
                .error(function(data) { // the data parameter here is a jqXHR instance
                    var errors = data.responseJSON;
                    $.each(errors['country'] , function(i, error) {
                        $('#alert-js').show().text(error);
                    });
                });
                $(this).closest('tr').hide();
            })
    })
})(jQuery);
