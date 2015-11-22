<div class="container">

    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <!-- START BLOCK : cart -->
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Total</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                <!-- START BLOCK : item -->
                <tr>
                    <td class="col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="data:image/jpeg;base64,{image}" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="/product/{id}">{name}</a></h4>
                                <h5 class="media-heading"> by <a href="#">{brand}</a></h5>
                                <span>Status: </span>{stock}</span>
                            </div>
                        </div></td>
                    <td class="col-md-1">
                        {value}
                    </td>
                    <td class="col-md-1 text-center"><strong>&euro;{price}</strong></td>
                    <td class="col-md-1 text-center"><strong>&euro;{total}</strong></td>
                    <td class="col-md-1">
                        <a href="/winkelwagen/remove/{id}">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Verwijder
                        </button>
                        </a>
                    </td>
                </tr>
                <!-- END BLOCK : item -->
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h5>Sub-totaal</h5></td>
                    <td class="text-right"><h5><strong>&euro;{subtotal}</strong></h5></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h5>Verzendkosten</h5></td>
                    <td class="text-right"><h5><strong>{shipping}</strong></h5></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h3>Totaal</h3></td>
                    <td class="text-right"><h3><strong>&euro;{globaltotal}</strong></h3></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td>
                        <a href="{goto}">
                        <button  type="button" class="btn btn-default">
                             <span class="glyphicon glyphicon-shopping-cart"></span> Doorgaan met winkelen
                        </button></a></td>
                    <td>
                        <a href="{link}" {data} class="btn btn-success">
                            Betalen <span class="glyphicon glyphicon-play"></span>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
            <!-- END BLOCK : cart -->
            <!-- START BLOCK : empty -->
            <h1>Uw winkelwagen is nog leeg</h1>
            <!-- END BLOCK : empty -->
            <!-- START BLOCK : error -->
            <h1>Er is iets verkeerds gegaan</h1>
            <!-- END BLOCK : error -->
        </div>
    </div>
