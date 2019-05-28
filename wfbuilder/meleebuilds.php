<?php








?>

<body>

    <!-- Custom CSS -->

    <main>

        <div class="wrapper">
            <div class="container">
                <div class="col-lg-12">
                    <div class="row">
                        <h2 class="col-lg-12">Melee Weapon Builds</h2>
                    </div>
                    <form id="filterFrameForm">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputBuildName">Build Name</label>
                                <input type="text" class="form-control bg-light text-white" id="inputBuildName" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAuthor">Author</label>
                                <input type="text" class="form-control bg-light text-white" id="inputAuthor" placeholder="Author's Name">
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                                <label for="inputMelee" class="col-md-12">Melee Weapon</label>
                                <select id="inputMelee" class="selectpicker col-md-12" data-live-search="true">
                                    <option selected>Any</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputForma" class="col-md-12">Forma Amount</label>
                                <select id="inputForma" class="selectpicker col-md-12">
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
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputContains" class="col-md-12">Contains</label>
                                <select id="inputContains" class="selectpicker col-md-12" multiple data-live-search="true">
                                    <option>Test1</option>
                                    <option>ABC</option>
                                    <option>123</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputDoesntContain" class="col-md-12">Doesn't Contain</label>
                                <select id="inputDoesntContain" class="selectpicker col-md-12" multiple data-live-search="true">
                                    <option>Test1</option>
                                    <option>ABC</option>
                                    <option>123</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="inputMissionType" class="col-md-12">Mission Type</label>
                                <select id="inputMissionType" class="selectpicker col-md-12" data-live-search="true">
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
                            <div class="form-group col-md-4">
                                <label for="inputPatch" class="col-md-12">Patch</label>
                                <select id="inputPatch" class="selectpicker col-md-12">
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