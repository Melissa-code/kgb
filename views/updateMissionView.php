<!------------- Main --------------->

<div class="row">
        
        <div class="col-12 mb-3">
            <h1>Modifier une mission  </h1>
        </div>

        <div class="col-12 d-flex justify-content-center" >
            <form action="<?= URL?>updateMissionValidation" method="POST" >
                <!-- code_mission --> 
                <div class="mb-3">
                    <label for="code_mission" class="form-label">Nom de code : </label>
                    <input type="text" class="form-control" id="code_mission" name="code_mission"  >
                </div>
                <!-- title_mission --> 
                <div class="mb-3">
                    <label for="title_mission" class="form-label">Titre : </label>
                    <input type="text" class="form-control" id="title_mission" name="title_mission">
                </div>
                <!-- description_mission --> 
                <div class="mb-3">
                    <label for="description_mission">Description : </label>
                    <textarea class="form-control" id="description_mission" name="description_mission"></textarea>
                </div>
                <!-- country_mission --> 
                <div class="mb-3">
                    <label for="country_mission" class="form-label">Pays : </label>
                    <input type="text" class="form-control" id="country_mission" name="country_mission">
                </div>
                <!-- id_agent --> 
                <div class="btn-group d-block mb-3" role="group" aria-label="Basic checkbox toggle button group">
                    <label class="form-label me-3">Agent(s) : </label>
                        <label class="btn btn-outline-secondary" for="btncheck1">Agent 1 </label>
                        <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                        <label class="btn btn-outline-secondary" for="btncheck2">Agent 2 </label>
                        <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                        <label class="btn btn-outline-secondary" for="btncheck3">Agent 3 </label>
                        <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                        <label class="btn btn-outline-secondary" for="btncheck4">Agent 4 </label>
                        <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
                </div>
                <!-- code_contact --> 
                <div class="btn-group d-block mb-3" role="group" aria-label="Basic checkbox toggle button group">
                    <label class="form-label me-3">Contact(s) : </label>

                    <label class="btn btn-outline-secondary" for="btncheck1">Contact 1 </label>
                    <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="btncheck2">Contact 2 </label>
                    <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="btncheck3">Contact 3 </label>
                    <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="btncheck4">Contact 4 </label>
                    <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
                </div>
                <!-- code_cible --> 
                <div class="btn-group d-block mb-3" role="group" aria-label="Basic checkbox toggle button group">
                    <label class="form-label me-3">Cible(s) : </label>

                    <label class="btn btn-outline-secondary" for="btncheck1">Cible 1 </label>
                    <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="btncheck2">Cible 2 </label>
                    <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="btncheck3">Cible 3 </label>
                    <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="btncheck4">Cible 4 </label>
                    <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
                </div>

                <!-- id_duration --> 
                <select class="form-select mb-3" aria-label="Default select example" name="id_duration">
                    <option selected> -- Durée -- </option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>

                <!-- code_status --> 
                <select class="form-select mb-3" aria-label="Default select example" name="code_status">
                    <option selected> -- Statut -- </option>
                    <option value="en préparation">en préparation</option>
                    <option value="en cours">en cours</option>
                    <option value="terminé">terminé</option>
                    <option value="échec">échec</option>
                </select>

                <!-- name_type --> 
                <select class="form-select mb-3" aria-label="Default select example" name="name_type">
                    <option selected> -- Type de mission -- </option>
                    <option value="Surveillance" >Surveillance</option>
                    <option value="Assassinat">Assassinat</option>
                    <option value="Infiltration">Infiltration</option>
                </select>

                <!-- id_hideout --> 
                <label class="form-label me-3">Planque(s) : </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="id_hideout1" id="id_hideout1" value="option1">
                    <label class="form-check-label" for="id_hideout1">planque n°1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="id_hideout2" id="id_hideout2" value="option2">
                    <label class="form-check-label" for="id_hideout2">planque n°2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="id_hideout3" id="id_hideout3" value="option3">
                    <label class="form-check-label" for="id_hideout3">planque n° 3</label>
                </div>

                <!-- name_speciality --> 
                <select class="form-select mb-3" aria-label="Default select example">
                    <option selected> -- Spécialité -- </option>
                    <option value="1">Ville</option>
                    <option value="2">Montagne</option>
                    <option value="3">Campagne</option>
                    <option value="3">Mer</option>
                    <option value="3">A l'étranger</option>
                </select>


                <button type="submit" class="btn btn-danger d-block mx-auto m-3">Enregistrer</button>
            </form>

    </div>
</div>



<?php ?>