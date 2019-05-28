<?php








?>

<body>

    <!-- Custom CSS -->

    <main>

        <div class="wrapper">
            <div class="container">
                <div class="col-lg-12">
                    <div class="row">
                        <h2 class="col-lg-12">Secondary Weapon Builds</h2>
                    </div>
                    <form id="filterFrameForm">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputBuildName">Build Name</label>
                                <input type="text" class="form-control" id="inputBuildName" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAuthor">Author</label>
                                <input type="text" class="form-control" id="inputAuthor" placeholder="Author's Name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputFrame">Warframe</label>
                                <select id="inputFrame" class="form-control">
                                    <option selected>Any</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputForma">Forma Amount</label>
                                <select id="inputForma" class="form-control">
                                    <option selected>Any</option>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputContains">Contains</label>
                                <input type="text" class="form-control" id="inputContains" placeholder="Mods, Arcanes, Etc.">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputDoesntContain">Doesn't Contain</label>
                                <input type="text" class="form-control" id="inputDoesntContain" placeholder="Mods, Arcanes, Etc.">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputPrimary">Primary Weapon</label>
                                <select id="inputPrimary" class="form-control">
                                    <option selected>Any</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputSecondary">Secondary Weapon</label>
                                <select id="inputSecondary" class="form-control">
                                    <option selected>Any</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputMelee">Melee Weapon</label>
                                <select id="inputMelee" class="form-control">
                                    <option selected>Any</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label for="inputMissionType">Mission Type</label>
                                <select id="inputMissionType" class="form-control">
                                    <option selected>Any</option>
                                    <option>Arena</option>
                                    <option>Assassination</option>
                                    <option>Assault</option>
                                    <option>Capture</option>
                                    <option>Defection</option>
                                    <option>Defense</option>
                                    <option>Disruption</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputPatch">Patch</label>
                                <select id="inputPatch" class="form-control">
                                    <option selected>Any</option>
                                    <option>25.0.3</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Custom JS -->

</body>