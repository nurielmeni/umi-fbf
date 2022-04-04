var App = App || (
    function ($) {
        var selectJob = '';
        function showSpinner() {
            $('.footer .spinner svg').removeClass('hidden');
        }

        function hideSpinner() {
            $('.footer .spinner svg').addClass('hidden');
        }

        function clearResults() {
            $(employersGrid).html('');
        }

        function initSumoSelect(selectBoxItem) {
            var name = $(selectBoxItem).attr('name') || '';
            var placeholder = $(selectBoxItem).attr('placeholder') || '';

            $('select.sumo[name="' + name + '"]').SumoSelect({
                placeholder: placeholder,
                clearAll: true,
                search: true,
                searchText: (rtl ? 'חפש ' : 'Search ') + placeholder,
                noMatch: (rtl ? 'אין התאמות עבור "{0}"' : 'No matches for "{0}"')
            });
        }

        function clearAllSelection(selectEl) {
            $(selectEl).length && $(selectEl).get(0).sumo.unSelectAll();
        }

        function loadEmployers(page) {
            if (loading) return;
            var searchPhrase = $(searchBoxButton).data('search-phrase') ? $(searchBoxButton).data('search-phrase').trim() : '';

            var page = page || $(employersGrid).data('page');
            var data = {
                action: 'load_employers_function',
                page: page,
                searchPhrase: searchPhrase
            };
            $.ajax({
                url: frontend_ajax.url,
                data: data,
                type: "POST",
                beforeSend: function () {
                    showSpinner();
                    loading = true;
                    $(searchBoxButton).prop('disabled', true)
                },
                success: function (response) {
                    var page = Number(response.page);
                    hideSpinner();
                    if (isNaN(page) || page < 0) return;

                    $(employersGrid).append(response.html);
                    $(employersGrid).data('page', page);

                    // Call this function so the wp will inform the change to the post
                    $(document.body).trigger("post-load");

                    ScrollTo && ScrollTo.setCalls('#employers-loader .spinner', 1);
                },
                complete: function () {
                    loading = false;
                    $(searchBoxButton).prop('disabled', false)
                }
            });
        }

        $(document).ready(function () {
            ScrollTo && ScrollTo.add('#employers-loader .spinner', loadEmployers, 1);

            $('.jobs-wrapper select.sumo').each(function () { initSumoSelect(this); });
            clearAllSelection(areaSelect);

        });

    }
)(jQuery)