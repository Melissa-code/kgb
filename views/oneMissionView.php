<?php session_start()?>

<!------------- Main --------------->

<section class="mb-4">
    <h1>Détail d'une mission</h1>
</section>


<section class="row ">
    <article class="col-12 mb-5">

        <!-- Card with the detail of a mission --> 
        <div class="card mx-auto mt-5" style="width: 30rem;">
            <div class="card-body">
                <!-- Code name  --> 
                <h3 class="card-title text-center text-danger fw-bold mb-3">Mission <?= $mission->getCode_mission() ?></h3>
                <!-- Title  --> 
                <p class="card-text text-dark"><?= $mission->getTitle_mission() ?></p>
                <!-- Description --> 
                <p class="card-text text-dark"><?= $mission->getDescription_mission() ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <!-- Country  --> 
                <li class="list-group-item">Pays: <?= $mission->getCountry_mission() ?></li>
                <!-- Agents --> 
                <li class="list-group-item">Agent(s):  
                    <?php foreach($agents_missions as $agent_mission):?>
                        <?php foreach($agents as $agent):?>
                            <?php if($mission->getCode_mission() === $agent_mission->getCode_mission() && $agent->getId_agent() === $agent_mission->getId_agent()) :?>
                                <?= $agent->getFirstname_agent()." ".$agent->getName_agent().", " ?>                        
                            <?php endif ?>
                        <?php endforeach ?> 
                    <?php endforeach ?> 
                </li>
                <!-- Contacts --> 
                <li class="list-group-item">Contact(s): 
                    <?php foreach($contacts_missions as $contact_mission):?>
                        <?php foreach($contacts as $contact):?>
                            <?php if($mission->getCode_mission() === $contact_mission->getCode_mission() && $contact->getCode_contact() === $contact_mission->getCode_contact()) :?>
                                <?= $contact->getFirstname_contact()." ".$contact->getName_contact().", " ?> 
                            <?php endif ?>
                        <?php endforeach ?> 
                    <?php endforeach ?>
                </li>
                <!-- Targets --> 
                <li class="list-group-item">Cible(s):
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

                <!-- Speciality --> 
                <li class="list-group-item">Spécialité:
                        <?php foreach($specialities as $speciality):?>
                            <?= $speciality->getName_speciality() ?>
                        <?php endforeach ?> 
                </li>

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
</section>


<?php 

?>