<div class="filter-row clearfix">


    <div class="filter-row-left">
        <span class="filter-row-label">Sort By:</span>
        <div class="small-selectbox clearfix">
<!--            <select id="sortSelect" name="orderby" class="selectbox">-->
            <select id="sortSelect" name="orderby" class="" data-current-filter="<?= $_GET['orderby'] ?>">
                <option>None</option>
                <option value="price">Cena</option>
                <option value="date">Najnowsze</option>
            </select>
        </div><!-- End .normal-selectbox-->
    </div><!-- End .filter-row-left -->


    <div class="filter-row-right">

        <a
            href="#"
            id="grid-view"
            class="btn btn-layout btn-border add-tooltip active"
            data-placement="top"
            title="Widok siatki">
            <i class="fa fa-th"></i></a>

        <a
            href="#"
            id="list-view"
            class="btn btn-layout btn-border add-tooltip"
            data-placement="top"
            title="Widok listy">
            <i class="fa fa-th-list"></i></a>

<!--        <a href="compare.html" class="btn btn-compare btn-dark">Compare</a>-->

    </div><!-- End .filter-row-right -->
</div><!-- End .filter-row -->

