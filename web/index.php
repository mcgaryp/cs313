<?php 

session_start();

$_SESSION["current"] = "index"; 

?>

<!DOCTYPE html>
<html>
<head>
   <title>Home</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="shared/base.css">
   <link rel="stylesheet" type="text/css" href="shared/nav.css">
   <link rel="stylesheet" type="text/css" href="shared/columns.css">
   <link rel="stylesheet" type="text/css" href="shared/text.css">
   <meta charset="UTF-8">
   <meta name="author" content="Porter McGary">
   <meta name="description" content="Home page intended to help the user get 
            to know Porter freaking McGary">
   <meta name="viewport" content="width=device-width, inital-scale=1.0">
</head>
<body>
   <!-- Header -->
   <?php include "./shared/header.php" ?>
   <div id="content" class="columns">
      <div class="column">
         <p>
            <h3>Jedi ranks</h3>
            <p>
               Members of the Jedi Order held various positions within the Order at times. These included:
            </p>
            <ul>
               Jedi youngling: A young child who was Force-sensitive would be identified at birth and taken to the Jedi Temple on Coruscant to be trained as a Jedi. They were to be put into classes of other Jedi younglings and trained together before being taken as an apprentice by a Jedi Knight. Younglings were not to be trained once they had reached a certain age, with the sole exception to this rule being Anakin Skywalker. Younglings would participate in the Gathering, which was the pilgrimage to the Ilum Temple to gain a kyber crystal for their lightsaber.
            </ul>
            <ul>
               Padawan: A youngling who had been chosen by a Jedi Knight or Jedi Master to train under their tutelage personally into becoming a fully fledged Jedi Knight. Their readiness was decided by the Initiate Trials. Padawans wore a braid.
            </ul>
            <ul>
               Jedi Knight: Once a Padawan has successfully passed the Jedi trials, they were be granted the rank of Jedi Knight and went out on missions of their own, no longer under the tutelage of a master.
            </ul>
            <ul>
               Jedi Master: A Jedi Knight was granted the rank of Jedi Master and offered a seat on the Jedi High Council when they had shown great skill, wisdom and devotion to the Force. When a Jedi Knight successfully led a Padawan to becoming a Jedi Knight themselves, they would also be granted the rank of Master.
            </ul>
            <ul>
               Grand Master: The leader of the Jedi High Council, the position of Grand Master was given to the oldest and considered to be the wisest member of the Jedi Order.
            </ul>
         </p>
         <p>
            <h3>Jedi occupations</h3>
            <p>
               Some members of the Jedi Order had specific titles and roles within the Order. These included:
            </p>
            <ul>
               Master of the Order: This position was assumed by the leader of the Jedi Order. He or she had to be voted unanimously into the position by the Jedi High Council.
            </ul>
            <ul>
               Jedi Temple Guard: Headed by Cin Drallig during the Clone Wars, these anonymous Jedi guarded the Jedi Temple with lightsaber pikes.
            </ul>
            <ul>
               Jedi investigator: Detectives aiding police with the use of the Force. They also used crime scene analysis droids.
            </ul>
            <ul>
               Consular Jedi: The ones who devoted themselves to the study of diplomacy or science, avoiding combat and warfare duties.
            </ul>
            <ul>
               Chief Librarian: The overseer of the Jedi Archives and Holocron Vault.
            </ul>
         </p>
         <p>
            <h3>Jedi military ranks</h3>
            <p>
               At the onset of the Clone Wars, the Jedi, the guardians of peace and justice in the Galactic Republic, were chosen by the Galactic Senate, whom the Jedi owed their allegiance to, to lead the new Grand Army of the Republic. They were thus given either of the respective ranks in the Republic Military:
            </p>
            <ul>
               Jedi Commander: Granted to Padawans and Jedi Knights, who served as second-in-commands to Jedi Generals in the Grand Army of the Republic.
            </ul>
            <ul>
               Jedi General: Granted to Jedi Knights and Jedi Masters, who served as the highest ranking officers within the Grand Army of the Republic.
            </ul>
         </p>
         <p class="font-small align-right">
            Information was taken from Wookipedia
         </p>
      </div>
   </div>

   <!-- Footer -->
   <?php include "shared/footer.php";?>

   <!-- Scripts -->
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   <script type="text/javascript" src="shared/nav.js"></script>
</body>
</html>