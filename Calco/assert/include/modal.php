<!-- *******************************************modal d'inscription pour les emtrepreneurs********************** -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true" id="emtrepreneur">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Insription emtrepreneur</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form">
                    <div id="messages" ></div>
                    <form action="php/inscriptionEmtrepreneur.php" method="post" enctype="multipart/form-data" id='emtrepreneur'>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="text" name="nom" id="" placeholder="Nom" class="form-control fas fa-user" >
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="text" name="prenom" id="" placeholder="prenom" class="form-control fas fa-user" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="Numero" name="num" id="" class="form-control" placeholder="Numero">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" id="" class="form-control" placeholder="Password">
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="estDiplone">Etres vous diplome ?</label>
                                <input type="radio" name="estDiplom" id=""  value="false">
                                <input type="radio" name="estDiplom" id="" value="false">
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="text" name="diplome" id="" placeholder="saisir votre dipolme " class="form-control fas fa-user" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="text" name="ville" id=""  class="form-control" placeholder="ville">
                            </div>
                        </div>
                        <div class="col-sm">
                        <div class="form-group">
                                <input type="text" name="commune" id=""  class="form-control" placeholder="commune">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="file" name="photo" id="" class="form-control" placeholder="charger une image de profil">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="condition" id="">
                        <a>j'accepte les comdition d'utilisation</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                    <div>
                        <input type="submit" value="s'inscrire " class="btn btn-outline-success">
                    </div>
            </form>
                    </div>
                        <button class="btn btn-danger"> fermer</button>
                    </div>
            </div>
        </div>
    </div>
</div>


<!-- *******************************************MODAL CLIEN ********************************************* -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true" id="client">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Insription Client</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="messages" ></div>
                <div class="form">
                    <form action="php/inscriptionClient.php" method="post" enctype="multipart/form-data" id='client'>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="text" name="nom" id="" placeholder="Nom" class="form-control fas fa-user" >
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="text" name="prenoms" id="" placeholder="prenom" class="form-control fas fa-user" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="Numero" name="num" id="" class="form-control" placeholder="Numero">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" id="" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" id="" class="form-control" placeholder="charger une image de profil">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="condition" id="">
                        <a>j'accepte les comdition d'utilisation</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                    <div>
                        <input type="submit" value="s'inscrire " class="btn btn-outline-success">
                    </div>
            </form>
                    </div>
                        <button class="btn btn-danger"> fermer</button>
                    </div>
            </div>
        </div>
    </div>
</div>

<!-- *******************************************MODAL FOURNISSEUR ********************************************* -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true" id="fournisseur">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Insription Fournisseur</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div id="messages" ></div>
                <div class="form">
                    <form action="php/AjaxInscription.php" method="post" enctype="multipart/form-data" id='emtrepreneur'>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="text" name="nom" id="" placeholder="Nom" class="form-control fas fa-user" >
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="text" name="prenom" id="" placeholder="prenom" class="form-control fas fa-user" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="Numero" name="num" id="" class="form-control" placeholder="Numero">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" id="" class="form-control" placeholder="Password">
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="text" name="ville" id="" class="form-control" placeholder="ville">
                            </div>
                        </div>
                        <div class="col-sm">
                        <div class="form-group">
                                <input type="text" name="commune" id=""  class="form-control" placeholder="commune">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="file" name="photo" id="" class="form-control" placeholder="charger une image de profil">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="condition" id="">
                        <a>j'accepte les comdition d'utilisation</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                    <div>
                        <input type="submit" value="s'inscrire " class="btn btn-outline-success">
                    </div>
            </form>
                    </div>
                        <button class="btn btn-danger"> fermer</button>
                    </div>
            </div>
        </div>
    </div>
</div>
