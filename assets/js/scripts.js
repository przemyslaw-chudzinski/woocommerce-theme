/* Extends jQuery for new functions */
$.fn.reverse = [].reverse;
/* *********************************************** */


/*
 * Shopping cart page
 * Author: Przemysław Chudziński
  * */
(function ($) {
    $(document.body).on("updated_wc_div", function () {
        if ($.fn.TouchSpin) {
            // Vertical Spinner
            $(".vertical-spinner").TouchSpin({
                verticalbuttons: true
            });
            //Horizontal spinner
            $(".horizontal-spinner").TouchSpin();
        }
    });
})(jQuery);

/*
 * Belli comment form
 * Author: Przemysław Chudziński
  * */
(function ($) {
    $("#commentform #comment").addClass('form-control');
    $("#commentform #submit").addClass('btn btn-custom');
})(jQuery);

/*
 * Belli ratings
 * Author: Przemysław Chudziński
  * */
(function ($) {

    let setDataValue = function ($ratingLinks) {
        $ratingLinks.each((index, link) => {
            $(link).attr('data-value', index + 1);
        });
    };

    $(document.body).on('init', function (e) {

        let $ratingContainerOuter = $('p.stars');
        let $ratingContainerInner = $ratingContainerOuter.find('span');
        let $ratingLinks = $ratingContainerInner.find('a');
        let $ratingSelect = $('#rating');

        $ratingLinks.empty();

        $ratingLinks.reverse(); // Added on jQUery object fn;


        setDataValue($ratingLinks);


        $ratingLinks.on('click', function (e) {

            $ratingLinks.removeClass('rating-selected');
            setTimeout(() => {
                $.each($ratingLinks,(index,link) => {
                    let $link = $(link);
                    $link.addClass('rating-selected');
                    $link.hasClass('active') ? $ratingSelect.val($link.data('value')) : null;
                });
            },100);
        });

    });

})(jQuery);

/*
 * Sorting and filtering
 * Author: Przemysław Chudziński
  * */
(function ($) {

    let $gridViewBtn = $('#grid-view'),
        $listViewBtn = $('#list-view'),
        $sortSelect  = $('#sortSelect');
        currentFilter = $sortSelect.data('current-filter');


    sortSelectInit();
    resetActiveClass();
    setActiveClass();

    $listViewBtn.on("click", onClickViewBtn.bind(this,'list'));
    $gridViewBtn.on("click", onClickViewBtn.bind(this,'grid'));
    $sortSelect.on("change", onChangeSortSelect.bind(this));
    
    function sortSelectInit() {
        if (currentFilter) {
            const options = $sortSelect.find('option');
            options.each((index, option) => $(option).val() === currentFilter ? $(option).attr('selected', 'selected') : null);
        }
    }

    function onChangeSortSelect(e) {
        e.preventDefault();
        let selecValue = $sortSelect.val();
        window.location.href = prepareSearchParams('orderby='+selecValue);
    }

    function onClickViewBtn(view = 'grid', e) {
        e.preventDefault();
        window.location.href = prepareSearchParams('view=' + view);
    }
    
    function prepareSearchParams(input = '') {

        let search = window.location.search,
            splitedInput = input.split('='),
            key    = splitedInput[0],
            value  = splitedInput[1];

        if (search.length) {
            if (!search.match(input)) {
                if (search.match(key)) {
                    let splitedSearch = search.split("&");
                    $.each(splitedSearch, (index, elem) => {
                        if (elem.match(key)) {
                            let splitedValue = elem.split('=');
                            splitedValue[1] = value;
                            splitedSearch[index] = splitedValue.join('=');
                            search = splitedSearch.join("&");
                            return false;
                        }
                    });
                } else {
                    search += '&' + input;
                }
            }
        } else {
            search += '?' + input;
        }
        return search;

    }

    function resetActiveClass() {
        $gridViewBtn.removeClass('active');
        $listViewBtn.removeClass('active');
    }

    function setActiveClass() {

        let search = window.location.search;

        if (search.length) {

            let searchMatchGrid = search.match('view=grid'),
                searchMatchList = search.match('view=list');

            if (searchMatchGrid) {
                searchMatchGrid[0] === 'view=grid' ? $gridViewBtn.addClass('active') : null;
            } else if (searchMatchList) {
                searchMatchList[0] === 'view=list' ? $listViewBtn.addClass('active') : null;
            } else {
                $gridViewBtn.addClass('active');
            }

        } else {
            $gridViewBtn.addClass('active');
        }
    }

})(jQuery);

/*
 * Product categories widget
 * Author: Przemysław Chudziński
  * */
(function ($) {

    const $categoryWgt = $('#category-widget');
    const $parentsDepth0 = $categoryWgt.find('> li');
    const $collapseBtn = $('<span class="category-widget-btn"></span>');
    const $arrow = $('<i class="fa fa-angle-right"></i>');
    const $childrenUl = $categoryWgt.find('.children');

    $parentsDepth0.find('> a').append($collapseBtn);
    $childrenUl.find('a').prepend($arrow);

    $parentsDepth0.filter('.current-cat').addClass('open').end().filter('.current-cat-parent').addClass('open');

})(jQuery);


/*
 * Add to cart button
 * Author: Przemysław Chudziński
  * */
(function ($) {
    $(document.body).on('adding_to_cart', function (e, $addToCartBtn) {
        $addToCartBtn.text('Dodaję...');
    });
    $(document.body).on('added_to_cart', function (e, fragments, cartHash, $addToCartBtn) {
        $addToCartBtn.text('Dodano do koszyka');
        $addToCartBtn.removeClass('btn-custom');
        $addToCartBtn.addClass('btn-success');
    });
})(jQuery);

/*
 * Belli shop_attributes
 * Author: Przemysław Chudziński
  * */
(function ($) {
    const $shopAttrs = $('table.shop_attributes');
    $shopAttrs.addClass('table');
})(jQuery);


(function ($) {
    $('.woocommerce-Tabs-panel h2').addClass('title-underblock custom mb30');
})(jQuery);

