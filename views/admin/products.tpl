<div class="container">
    <div class="row">
        <div class="col-md-3">
            <p class="lead">Beheer</p>
            <div class="list-group">
                <a href="/beheer/" class="list-group-item">Home</a>
                <a href="/beheer/gebruikers" class="list-group-item">Gebruikers</a>
                <a href="/beheer/producten" class="list-group-item active">Producten</a>
            </div>
        </div>
        <div class="col-sm-12 col-md-9">
            <!-- START BLOCK : delete -->
            <h1>Het product is verwijdert</h1>
            <!-- END BLOCK : delete -->
            <!-- START BLOCK : edited -->
            <h1>Het product is bewerkt</h1>
            <!-- END BLOCK : edited -->
            <!-- START BLOCK : products -->
                <table class="table table-responsive">
                    <thead>
                        <th>pid</th>
                        <th>naam</th>
                        <th>prijs</th>
                        <th>vooraad Webshop</th>
                        <th></th>
                        <th></th>
                        <th class="text-right"><a href="producten/toevoegen" class="btn btn-success">toevoegen <span class="glyphicon glyphicon-plus"></span> </a></th>
                    </thead>
                    <tbody>
                        <!-- START BLOCK : product -->
                            <tr>
                                <td>{pid}</td>
                                <td>{name}</td>
                                <td>&euro;{price}</td>
                                <td>{stock}</td>
                                <td class="text-right"><a href="/beheer/product/bewerk/{pid}" class="btn btn-default">Bewerk <span class="glyphicon glyphicon-pencil"></span></a></td>
                                <td class="text-right"><a href="/beheer/vooraad/{pid}" class="btn btn-success">Vooraad <span class="glyphicon glyphicon-stats"></span></a></td>
                                <td class="text-right"><a href="/beheer/product/delete/{pid}" class="btn btn-danger">Verwijder <span class="glyphicon glyphicon-trash"></span></a></td>
                            </tr>
                        <!-- END BLOCK : product -->
                    </tbody>

               </table>
            <!-- END BLOCK : products -->
            <!-- START BLOCK : add -->
                <form action="" method="post" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>product nummer:</label>
                        <input type="text" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="name">product naam:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="brand">product merk:</label>
                        <input type="text" class="form-control" id="brand" name="brand">
                    </div>
                    <div class="form-group">
                        <label for="price">product prijs:</label>
                        <div class="input-group">
                            <span class="input-group-addon">&euro;</span>
                        <input type="text" class="form-control" id="price" name="price">
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="stock">product voorraad:</label>
                        <input type="text" class="form-control" id="stock" name="stock">
                    </div>
                    <div class="form-group">
                        <label for="cat">product Categorie:</label>
                        <input type="text" class="form-control" id="cat" name="cat">
                    </div>
                    <div class="form-group">
                        <label for="img">product foto:</label>
                       <span class="btn btn-primary btn-file">
    Browse <input type="file" id="img" name="img" onchange="this.parentElement.classList.add('btn-success')">
</span>
                    </div>
                    <div class="form-group">
                        <label for="details">product details:</label>
                        <textarea id="details" class="form-control" rows="10" name="details"></textarea>
                    </div>
                    <div class="form-group">
                       <input type="submit" name="add" class="btn btn-default" value="Toevoegen">
                    </div>

                </form>

            <!-- END BLOCK : add -->
            <!-- START BLOCK : edit -->
            <form action="" method="post" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label>product nummer:</label>
                    <input type="text" class="form-control"  value="{pid}" disabled>
                    <input type="hidden" value="{pid}" name="pid">
                </div>
                <div class="form-group">
                    <label for="name">product naam:</label>
                    <input type="text" class="form-control" id="name" value="{name}" name="name">
                </div>
                <div class="form-group">
                    <label for="brand">product merk:</label>
                    <input type="text" class="form-control" id="brand" value="{brand}" name="brand">
                </div>
                <div class="form-group">
                    <label for="price">product prijs:</label>
                    <div class="input-group">
                        <span class="input-group-addon">&euro;</span>
                        <input type="text" class="form-control" id="price" value="{price}" name="price">
                    </div>
                </div>
                <div class="form-group">
                    <label for="stock">product voorraad:</label>
                    <input type="text" class="form-control" id="stock" value="{stock}" name="stock">
                </div>
                <div class="form-group">
                    <label for="cat">product Categorie:</label>
                    <input type="text" class="form-control" id="cat" value="{cat}" name="cat">
                </div>
                <div class="form-group">
                    <label for="img">product foto:</label>
                       <span class="btn btn-primary btn-file">
    Browse <input type="file" id="img" name="img" onchange="this.parentElement.classList.add('btn-success')">
</span>
                </div>
                <div class="form-group">
                    <label for="details">product details:</label>
                    <textarea id="details" class="form-control" rows="10" name="details">{details}</textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-default" value="Opslaan">
                </div>

            </form>

            <!-- END BLOCK : edit -->
         </div>
    </div>


