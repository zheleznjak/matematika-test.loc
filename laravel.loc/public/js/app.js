;(function ($) {
    $(document).ready(function () {
        $(document)
            .on('click', '.create-language-js', function (e) {
                e.preventDefault();
                $('#alert-js').hide();
                $('#success-js').hide();
                var language = $("#language").val();
                $.ajax(
                    {
                        method: 'POST',
                        url:    '/api/language',
                        data:   {'language': language}
                    }
                ).done(function (response) {
                        if (!response.success) {
                            $('#alert-js').show().text(response.error);
                        } else {
                            $('#success-js').show().text(response.success);
                            $("#language").val('');
                        }
                    })
                .error(function(data) { // the data parameter here is a jqXHR instance
                    var errors = data.responseJSON;
                    $.each(errors['language'] , function(i, error) {
                        $('#alert-js').show().text(error);
                    });
                });

            })
            .on('click', '.edit-language-js', function (e) {
                e.preventDefault();
                $('#alert-js').hide();
                $('#success-js').hide();
                var id = $("#invisible_city").val();
                var language = $("#language").val();
                $.ajax(
                    {
                        method: 'PUT',
                        url:    '/api/language/' + id,
                        data:   {'id': id, 'language': language}
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
                    $.each(errors['language'] , function(i, error) {
                        $('#alert-js').show().text(error);
                    });
                });

            })
            .on('click', '.create-country-js', function (e) {
                e.preventDefault();
                $('#alert-js').hide();
                $('#success-js').hide();
                var country = $("#country").val();
                $.ajax(
                    {
                        method: 'POST',
                        url:    '/api/country',
                        data:   {'country': country}
                    }
                ).done(function (response) {
                    if (!response.success) {
                        $('#alert-js').show().text(response.error);
                    } else {
                        $('#success-js').show().text(response.success);
                        $("#country").val('');
                    }
                })
                .error(function(data) { // the data parameter here is a jqXHR instance
                    var errors = data.responseJSON;
                    $.each(errors['country'] , function(i, error) {
                        $('#alert-js').show().text(error);
                    });
                });

            })
            .on('click', '.edit-country-js', function (e) {
                $('#alert-js').hide();
                $('#success-js').hide();
                e.preventDefault();
                var id = $("#invisible_country").val();
                var country = $("#country").val();
                $.ajax(
                    {
                        method: 'PUT',
                        url:    '/api/country/' + id,
                        data:   {'id': id, 'country': country}
                    }
                ).done(function (response) {
                    if (!response.success) {
                        $('#alert-js').show().text(response.error);
                    } else {
                        $('#success-js').show().text(response.success);
                    }
                    response = null;
                })
                .error(function(data) { // the data parameter here is a jqXHR instance
                    var errors = data.responseJSON;
                    $.each(errors['country'] , function(i, error) {
                        $('#alert-js').show().text(error);
                    });
                });

            })
            .on('click', '.create-city-js', function (e) {
                $('#alert-js').hide();
                $('#success-js').hide();
                e.preventDefault();
                var city = $(".city").val();
                var country = $(".country").val();
                var language = $(".language").val();
                $.ajax(
                    {
                        method: 'POST',
                        url:    '/api/city',
                        data:   {'city': city, 'country': country, 'language': language}
                    }
                ).done(function (response) {
                    if (!response.success) {
                        $('#alert-js').show().text(response.error);
                    } else {
                        $('#success-js').show().text(response.success);
                        $(".city").val('');
                        $(".country :selected").removeAttr("selected");
                        $(".language :selected").removeAttr("selected");
                    }
                })
                .error(function(data) { // the data parameter here is a jqXHR instance
                    var errors = data.responseJSON;
                    console.log(errors);
                    $.each(errors['city'] , function(i, error) {
                        $('#alert-js').show().text(error);
                    });
                });

            })
            .on('click', '.edit-city-js', function (e) {
                $('#alert-js').hide();
                $('#success-js').hide();
                e.preventDefault();
                var id = $("#invisible_city").val();
                var city = $(".city").val();
                var country = $(".country").val();
                var language = $(".language").val();
                $.ajax(
                    {
                        method: 'PUT',
                        url:    '/api/city/' + id,
                        data:   {'id': id, 'city': city, 'country': country, 'language': language}
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
                    $.each(errors['city'] , function(i, error) {
                        $('#alert-js').show().text(error);
                    });
                });

            })
        })
})(jQuery);

