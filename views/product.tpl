

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
                <!-- START BLOCK : product -->
                <div class="thumbnail">
                    <img width="40px" src="data:image/jpeg;base64,{image}" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right">&euro;{price}</h4>
                        <h4><a href="#">{name}</a></h4>
                        {desc}
                        <p class="text-right">
                           {stock} <a href="/winkelwagen/add/{id}" class="btn btn-primary {disable}">Kopen!</a>
                        </p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">{reviewcount} reviews</p>
                        <p>
                            <!-- START BLOCK : star -->
                            <span class="glyphicon glyphicon-star{empty}"></span>
                            <!-- END BLOCK : star -->
                            {starscount} stars
                        </p>
                    </div>
                </div>

                <div class="well">
                    <!-- START BLOCK : reviewbtn -->
                    <div class="text-right">
                        <a id="open-review-box" class="btn btn-success">laat een Review achter</a>
                    </div>
                    <div class="row" id="post-review-box" style="display:none;">
                        <div class="col-md-12">
                            <form method="POST" action="" accept-charset="UTF-8">
                                <input id="ratings-hidden" name="rating" value="0" type="hidden">
                                <textarea rows="5" id="new-review" class="form-control animated" placeholder="Enter your review here..." name="comment" cols="50" required></textarea>
                                <div class="text-right">
                                    <div class="stars starrr" data-rating="0"></div>
                                    <a href="#" class="btn btn-danger btn-sm" id="close-review-box" style="display:none; margin-right:10px;"> <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                                    <button class="btn btn-success btn-lg" name="submit" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END BLOCK : reviewbtn -->

                    <!-- START BLOCK : review -->
                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- START BLOCK : reviewstar -->
                            <span class="glyphicon glyphicon-star{empty}"></span>
                            <!-- END BLOCK : reviewstar -->
                            {name}
                            <span class="pull-right">{time}</span>
                            <p>{text}</p>
                        </div>
                    </div>
                    <!-- END BLOCK : review -->



                </div>
                <!-- END BLOCK : product -->
                <!-- START BLOCK : notfound -->
                <h2>Sorry! het product kan niet gevonden worden.</h2>
                <!-- END BLOCK : notfound -->
            </div>

        </div>

    <script type="application/javascript" src="/js/starrr.js"></script>
    <script type="text/javascript">

        $(function(){

            var reviewBox = $('#post-review-box');
            var newReview = $('#new-review');
            var openReviewBtn = $('#open-review-box');
            var closeReviewBtn = $('#close-review-box');
            var ratingsField = $('#ratings-hidden');

            openReviewBtn.click(function(e)
            {
                reviewBox.slideDown(400, function()
                {
                    newReview.focus();
                });
                openReviewBtn.fadeOut(100);
                closeReviewBtn.show();
            });

            closeReviewBtn.click(function(e)
            {
                e.preventDefault();
                reviewBox.slideUp(300, function()
                {
                    newReview.focus();
                    openReviewBtn.fadeIn(200);
                });
                closeReviewBtn.hide();

            });

            $('.starrr').on('starrr:change', function(e, value){
                ratingsField.val(value);
            });
        });
    </script>