;(function ($) {
    $(document).ready(function () {
        $('.country').change(function () {
            var country_id	 = $(this).val();
            var city = $('.city');
            if (country_id == '0') {
                city.html('<option>- select city -</option>');
                city.attr('disabled', true);
                return (false);
            }
            city.attr('disabled', true);
            city.html('<option>loading...</option>');
            var url = 'api/country/' + country_id + '/city';
            $.get(
                url,
                '',
                function (response) {
                    if (response.error) {
                        alert('error');
                        return (false);
                    }
                    else {
                        var options = '';
                        $(response.cities).each(function () {
                            options += '<option value="' + $(this).attr('id') + '">' + $(this).attr('city') + '</option>';
                        });

                        city.html('<option value="0">- select city -</option>' + options);
                        city.attr('disabled', false);
                    }
                },
                "json"
            );
        });
        $('.city').change(function () {
            $('.center_div').remove();
            var country_id	 = $('.country :selected').val();
            var city_id = $('.city :selected').val();
            if (city_id == '0') {
                return (false);
            }
            var header = null;
            var markup = null;
            var url = 'api/country/' + country_id + '/city/' + city_id + '/language';
            $.get(
                url,
                '',
                function (response) {
                    if (response.error) {
                        alert('error');
                        return (false);
                    } else {
                        header = "<div class=\"center_div\"><table class=\"table table-striped table-bordered\"> \
                            <thead> \
                            <tr> \
                                <th class=\"text-center\">id</th> \
                                <th class=\"text-center\">Language</th> \
                            </tr> \
                            </thead> \
                            <tbody>";

                        $('.filter').after(header);
                        $(response.languages).each(function () {
                            markup = "<tr> \
                                <th class=\"text-center\" scope=\"row\">" + $(this).attr('id') + "</th> \
                            <td class=\"text-center\">" + $(this).attr('language') + "</td> \
                            </tr>";

                            $('tbody').append(markup);
                        });
                        $('tr').append('</tbody></table></div>');
                    }
                },
                "json"
            );
        });
    });
})(jQuery);