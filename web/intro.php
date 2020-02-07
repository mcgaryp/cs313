<?php 

session_start();

$_SESSION["current"] = "intro"

?>

<!DOCTYPE html>
<html>
<head>
   <title>Introduction of the Author</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="shared/base.css">
   <link rel="stylesheet" type="text/css" href="shared/nav.css">
   <link rel="stylesheet" type="text/css" href="shared/columns.css">
   <link rel="stylesheet" type="text/css" href="shared/text.css">
   <meta charset="UTF-8">
   <meta name="author" content="Porter McGary">
   <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
   <?php include "shared/header.php";?>
   <div class="columns is-full">
      <div class="column is-one-fifth"></div>
      <div class="columns is-three-fifths">
         <div class="column is-full">
            <h2>Somethings about Porter</h2>
            <div class="columns is-full">
               <div class="column">
                  <p class="justified">
                     Born in Rexburg, ID, only to grow up in Arkansas. Porter loves exploring and 
                     has traveled much in his life including Brasil, Guatemala, Mexico, Hawaii, 
                     Barbados, Honduras, Belize, and Equador. He has accomplished a serving a mission, 
                     starting a business, and playing violin in an orchestra. He served a two-year mission 
                     where he learned what sacrifice really meant. Became diligent at making goals and plans 
                     to achieve his desires. Before serving a mission, he spent four years saving money. 
                  </p>
                  <p class="justified">
                     Working hard with his father gave him the courage to establish his own lawn care 
                     business. He discovered how much he loves reaping the rewards of work hard. 
                     Managing and financing this business taught him to be thrifty, wise, and innovative. First-hand experience of negotiation, and a great mentor, taught him how listening to customers is important for customer service. Listening to his mentor’s advice 
                     taught him the value of knowledge, and talking to others, to gain more insight. 
                     This helped him as he started to expand his business from one property, to 2 to 4 
                     to 8, and until eventually he was caring for 14 properties. 
                  </p>
                  <p class="justified">
                     Life running the 
                     business kept him busy in the summer and spring but it did not stop him from 
                     taking on other task and developing other talents. During the school year he
                     dedicated himself to studying and learning the violin. In this accomplishment, 
                     he learned to not give up. He studied and practiced hard for six years. In this 
                     time, he mentored other students, learned the importance of practice, and the 
                     sweet taste of success! He went from a concert orchestra to the highest level, 
                     chamber. In the four years, he played for the high school orchestra they won three 
                     interstate competitions in Chicago, Nashville, and Dallas. These accomplishments
                     in his life have helped him to develop who he is and are some distinctive building 
                     building blocks that lead him to a noble future.
                  </p>
                  <p class="justified">
                     Since his mission, Porter has spent his summers in the southern states working as a sales rep for Greenix Pest Control and studying the rest of the year at BYU-Idaho. The job has helped him excll at communication and learn true determination. He has worked at Greenix for 2 years and plans to finish his last summer in 2020. After retiring from selling he will persue a career in computer science and technology field. Eventually go on to become the best he can.
                  </p>
                  <!-- Optimize picture to smaller resolution -->
                  <img class="is-full" src="pictures/herAndI.jpg" alt="Porter and Kayla">
               </div>
            </div>
         </div>
      </div>
      <div class="column is-one-fifth"></div>
   </div>

   <!-- Footer -->
   <?php include "shared/footer.php"; ?>

   <!-- Scripts -->
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   <script type="text/javascript" src="shared/nav.js"></script>
</body>
</html>