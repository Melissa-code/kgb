<!-- Title -->

<section class="container">
    <h1 class="text-light">Détail d'une mission</h1>
</section>


<!-- Detail of a mission -->

<section class="container my-5">
    <div class="row d-flex justify-content-center">
        <article class="col d-flex justify-content-center">

            <!-- Card with the detail of a mission --> 
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <!-- Code name  --> 
                    <h3 class="card-title text-center text-danger fw-bold mb-3">Mission <?= $mission->getCode_mission() ?></h3>
                    <!-- Title  --> 
                    <p class="card-text text-center text-danger"><?= $mission->getTitle_mission() ?></p>
                    <!-- Description --> 
                    <p class="card-text text-dark"><?= $mission->getDescription_mission() ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <!-- Country  --> 
                    <li class="list-group-item">Pays: <?= $mission->getCountry_mission() ?></li>
                    <!-- Agents --> 
                    <li class="list-group-item">Agents:  
                        <?php foreach($agents_missions as $agent_mission):?>
                            <?php foreach($agents as $agent):?>
                                <?php if($mission->getCode_mission() === $agent_mission->getCode_mission() && $agent->getId_agent() === $agent_mission->getId_agent()) :?>
                                    <?= $agent->getFirstname_agent()." ".$agent->getName_agent().", " ?>                        
                                <?php endif ?>
                            <?php endforeach ?> 
                        <?php endforeach ?> 
                    </li>
                    <!-- Contacts --> 
                    <li class="list-group-item">Contacts: 
                        <?php foreach($contacts_missions as $contact_mission):?>
                            <?php foreach($contacts as $contact):?>
                                <?php if($mission->getCode_mission() === $contact_mission->getCode_mission() && $contact->getCode_contact() === $contact_mission->getCode_contact()) :?>
                                    <?= $contact->getFirstname_contact()." ".$contact->getName_contact().", " ?> 
                                <?php endif ?>
                            <?php endforeach ?> 
                        <?php endforeach ?>
                    </li>
                    <!-- Targets --> 
                    <li class="list-group-item">Cibles:
                        <?php foreach($targets_missions as $target_mission):?>
                            <?php foreach($targets as $target):?>
                                <?php if($mission->getCode_mission() === $target_mission->getCode_mission() && $target->getCode_target() === $target_mission->getCode_target()) :?>
                                    <?= $target->getFirstname_target()." ".$target->getName_target().", " ?> 
                                <?php endif ?>
                            <?php endforeach ?> 
                        <?php endforeach ?>
                    </li>
                    <!-- Type --> 
                    <li class="list-group-item">Type: <?= $mission->getName_type() ?></li>
                    <!-- Status --> 
                    <li class="list-group-item">Statut: <?= $mission->getCode_status() ?></li>
                    <!-- Hideouts --> 
                    <li class="list-group-item">Planques:
                        <?php foreach($hideouts_missions as $hideout_mission):?>
                            <?php foreach($hideouts as $hideout):?>
                                <?php if($mission->getCode_mission() === $hideout_mission->getCode_mission() && $hideout->getId_hideout() === $hideout_mission->getId_hideout()) :?>
                                    <?= $hideout->getAddress_hideout()." ".$hideout->getCountry_hideout().", " ?> 
                                <?php endif ?>
                            <?php endforeach ?> 
                        <?php endforeach ?>
                    </li>

                    <!-- Speciality --> 
                    <li class="list-group-item">Spécialité:
                    <?php foreach($specialities as $speciality): ?>
                            <?php if($speciality->getName_speciality() === $mission->getName_speciality()) :?>
                                <?= $mission->getName_speciality() ?></li>
                            <?php endif ?>
                    <?php endforeach ?>

                    <!-- Start date --> 
                    <li class="list-group-item">Date de début: 
                        <?php foreach($durations as $duration):?>
                            <?php if($duration->getId_duration() === $mission->getId_duration()) :?>
                                <?php  
                                    $dateFormatStart = new DateTime($duration->getStart_duration());
                                    echo $dateFormatStart->format('d/m/Y');
                                ?>
                            <?php endif ?>
                        <?php endforeach ?>
                    </li>

                    <!-- End date --> 
                    <li class="list-group-item">Date de fin: 
                        <?php foreach($durations as $duration):?>
                            <?php if($duration->getId_duration() === $mission->getId_duration()) :?>
                                <?php
                                    $dateFormatEnd = new DateTime($duration->getEnd_duration()); 
                                    echo $dateFormatEnd->format('d/m/Y');
                                ?>
                            <?php endif ?>
                        <?php endforeach ?>
                    </li>
                </ul>
                
            </div>
        </article>
    </div>
</section>

