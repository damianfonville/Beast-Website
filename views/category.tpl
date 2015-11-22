

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Categori&euml;n</p>
                <div class="list-group">
                    <!-- START BLOCK : category -->
                    <a href="/categorie/{category}" class="list-group-item {active}">{category}</a>
                    <!-- END BLOCK : category -->
                </div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner">
                                <!-- START BLOCK : carousel -->
                                <div class="item {active}">
                                   <a href="/product/{id}"> <img class="slide-image" src="data:image/jpeg;base64,{image}" alt=""></a>
                                </div>
                                <!-- END BLOCK : carousel -->
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <!-- START BLOCK : product -->
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="data:image/jpeg;base64,{image}" alt="">
                            <div class="caption">
                                <h4 class="pull-right">&euro;{price}</h4>
                                <h4><a href="/product/{id}">{name}</a>
                                </h4>
                                {desc}.
                                {stock}
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{reviewcount} reviews</p>
                                <p>
                                    <!-- START BLOCK : star -->
                                    <span class="glyphicon glyphicon-star{empty}"></span>
                                    <!-- END BLOCK : star -->
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END BLOCK : product -->

                    <!-- START BLOCK : notfound -->
                    <h2>Sorry! de categori&euml; kan niet gevonden worden.</h2>
                    <!-- END BLOCK : notfound -->

                </div>

            </div>

        </div>

