<?php

    $sql = "SELECT Mod_Name, Mod_Desc FROM wf_mods WHERE Mod_Category=? OR Mod_Category=? OR Mod_Category=? ORDER BY Mod_Category ASC;";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute(["Primary", "Rifle", "Shotgun"]);

    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);


?>

<body>

    <!-- Custom CSS -->

    <main>

        <div class="wrapper">
            <div class="container">
                <div class="col-lg-12">
                    <div class="row">
                        <h2 class="col-lg-12">Primary Weapon Builds</h2>
                    </div>
                    <form id="filterFrameForm" method="get">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputBuildName">Build Name</label>
                                <input type="text" class="form-control bg-light text-white" id="inputBuildName" placeholder="Name">
                                <input type="text" class="d-none" name="buildtype" value="Primary Weapon" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAuthor">Author</label>
                                <input type="text" class="form-control bg-light text-white" id="inputAuthor" placeholder="Author's Name">
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                                <label for="inputPrimary" class="col-md-12">Primary Weapon</label>
                                <select id="inputPrimary" class="selectpicker col-md-12" data-live-search="true">
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
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputContains" class="col-md-12">Contains</label>
                                <select id="inputContains" class="selectpicker col-md-12" multiple data-live-search="true">
                                    
                                    <?php foreach ($result as $row => $mod) : ?>
                                    <option><?=$mod['Mod_Name']?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputDoesntContain" class="col-md-12">Doesn't Contain</label>
                                <select id="inputDoesntContain" class="selectpicker col-md-12" multiple data-live-search="true">
                                    
                                    <?php foreach ($result as $row => $mod) : ?>
                                    <option><?=$mod['Mod_Name']?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="inputMissionType" class="col-md-12">Mission Type</label>
                                <select id="inputMissionType" class="selectpicker col-md-12" data-live-search="true">
                                    <option selected>Any</option>
                                    <optgroup label="Regular">
                                        <option>Arena</option>
                                        <option>Assassination</option>
                                        <option>Assault</option>
                                        <option>Capture</option>
                                        <option>Defection</option>
                                        <option>Defense</option>
                                        <option>Disruption</option>
                                        <option>Excavation</option>
                                        <option>Exterminate</option>
                                        <option>Free Roam/Bounty</option>
                                        <option>Hijack</option>
                                        <option>Infested Salvage</option>
                                        <option>Interception</option>
                                        <option>Junction</option>
                                        <option>Mobile Defense</option>
                                        <option>Rescue</option>
                                        <option>Sabotage</option>
                                        <option>Sanctuary Onslaught</option>
                                        <option>Spy</option>
                                        <option>Survival</option>
                                    </optgroup>
                                    <optgroup label="Archwing">
                                        <option>Pursuit</option>
                                        <option>Rush</option>
                                    </optgroup>
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