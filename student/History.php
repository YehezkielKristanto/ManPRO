<?php
require_once "../databased.php";
if ($_SESSION['username']) {
  $sql = "SELECT * FROM `student` WHERE `id_student` LIKE ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_SESSION['username']]);
  $fetch = $stmt->fetch();
} else {
  echo header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <title>E-COURSE</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https:/s.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <link rel="stylesheet" href="../asset/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,800&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/png" href="../asset/favicon.png">
  <style>
    .table tr th {
      color: #F2B643;
    }

    .table tr td {
      font-weight: 700;
      color: #4F2BA8;
    }

    .logout {
      color: black;
    }

    .logout:hover {
      color: red;
    }

    .find {
      color: black;
    }

    .find:hover {
      color: darkblue;
    }
  </style>
</head>


<?php
$sql = "SELECT * 
FROM `upload`
JOIN class ON upload.id_class = class.id_class
JOIN course ON class.id_course = course.id_course
JOIN teacher ON class.id_teacher = teacher.id_teacher
WHERE upload.id_student = ? AND status_verify != 0";
$stmt2 = $pdo->prepare($sql);
$stmt2->execute([$_SESSION['username']]);

?>

<body>
  <div class="container-fluid">
    <div class="row p-4" style="background: #5a47ab; width: 100%; left: 0">
      <div class="col-sm-2" id="section1">
        <div class="icon mt-0">
          <div class="ecourse">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1636 363.5">
              <defs>
                <style>
                  .cls-1 {
                    fill: #00c2cb;
                  }
                </style>
              </defs>
              <path class="cls-1" d="M375.93,284.21h74.5v24.64H352.55V138.34H450.2V163H375.93V211h72.66v24.88H375.93Z" transform="translate(-142 -52.25)" />
              <path class="cls-1" d="M731,162.73c14-15.36,33.7-25.36,55.48-25.36,36.67,0,65.56,24.39,74.73,62.93H838.28c-8.48-25.61-28.19-38.54-51.8-38.54-15.36,0-29.35,7.07-39.43,18.29a66,66,0,0,0,0,87.33c10.08,11.22,24.07,18.29,39.43,18.29,24.29,0,44.93-14.88,53.18-40.73h22.69c-9.17,38.78-38.51,65.13-75.87,65.13-21.78,0-41.5-9.76-55.48-25.37a92.59,92.59,0,0,1,0-122Z" transform="translate(-142 -52.25)" />
              <path class="cls-1" d="M901.78,161.76c14.67-15.86,35.3-25.86,57.76-25.86,22.7,0,43.1,10,58,25.86a91.8,91.8,0,0,1,0,123.43c-14.9,16.1-35.3,25.85-58,25.85a78,78,0,0,1-57.76-25.85,91.8,91.8,0,0,1,0-123.43ZM1001,179.32c-10.78-11.46-25.68-18.54-41.5-18.54s-30.48,7.08-41,18.54a65.29,65.29,0,0,0,0,88.3c10.55,11.47,25.22,18.54,41,18.54s30.72-7.07,41.5-18.54a65.95,65.95,0,0,0,0-88.3Z" transform="translate(-142 -52.25)" />
              <path class="cls-1" d="M1064.53,257.62V138.34h23.38V257.87c0,18.78,19,28.05,36,28.05,16.73,0,35.76-9.52,35.76-28.3V138.34H1183V257.87c0,34.63-31.63,52.68-59.14,52.68C1095.7,310.55,1064.53,292.5,1064.53,257.62Z" transform="translate(-142 -52.25)" />
              <path class="cls-1" d="M1239,222.25h27c19.49,0,29.11-14.88,29.11-29.76,0-14.63-9.62-29.51-29.11-29.51h-35.53V308.85h-22.92V138.1H1266c34.84,0,52.27,27.32,52.27,54.39,0,24.15-14,47.08-41.5,52.2l50.67,64.16h-30L1239,234Z" transform="translate(-142 -52.25)" />
              <path class="cls-1" d="M1424,182.25c-3.21-15.37-18.8-21.95-32.78-21.71-10.78.24-22.7,4.15-29.11,12.93-3.21,4.39-4.36,10-3.9,15.85,1.14,17.57,19.25,19.76,36.45,21.47,22,2.93,49.28,9,55.47,36.34a64.25,64.25,0,0,1,1.15,11.22c0,32.93-30.72,52-59.6,52-24.76,0-54.79-15.61-57.77-46.1l-.23-4.64,23.38-.48.23,3.66v-1c1.61,15.85,19.71,24.15,34.62,24.15,17.19,0,36-10.25,36-27.81a28.74,28.74,0,0,0-.68-5.85c-2.75-12.93-19.26-15.13-35.3-16.83-25-2.69-54.33-8.54-56.85-44.16v.25a48.27,48.27,0,0,1,8.71-32.44c10.77-14.88,30-22.69,48.59-22.69,24.76,0,50.43,13.66,54.56,44.88Z" transform="translate(-142 -52.25)" />
              <path class="cls-1" d="M1494.1,284.21h74.5v24.64h-97.88V138.34h97.65V163H1494.1V211h72.67v24.88H1494.1Z" transform="translate(-142 -52.25)" />
              <rect class="cls-1" x="409" y="173.5" width="64" height="36" />
              <path class="cls-1" d="M1596.25,415.75H323.75C223.53,415.75,142,334.22,142,234S223.53,52.25,323.75,52.25h1272.5C1696.47,52.25,1778,133.78,1778,234S1696.47,415.75,1596.25,415.75ZM323.75,86.25C242.28,86.25,176,152.53,176,234s66.28,147.75,147.75,147.75h1272.5c81.47,0,147.75-66.28,147.75-147.75S1677.72,86.25,1596.25,86.25Z" transform="translate(-142 -52.25)" />
            </svg>
          </div>
        </div>
      </div>
      <div class="col-sm-5 offset-3">
        <ul class="nav offset-4">
          <li style="margin-left: 2vw"><a href="./student.php">Home</a></li>
          <li style="margin-left: 2vw;"><a href="./history.php">Class</a></li>
          <li><a href="../student/schedule.php" class="mt-2 fas fa-bookmark" style="font-size: 2vw; color: #fbd15b;  margin-left: 3vw;"></a></li>
          <li> <a href="../Manage/transaction_payment.php" class="mt-2 fas fa-bell" style="font-size: 2vw; color: #fbd15b; margin-left: 3vw;"></a></li>
        </ul>
      </div>
      <button class="col-sm-2" style="background: #fbd15b; border-radius: 10px; border-style:none;" onclick="">
        <div class="m-2 text-center">
          <a href="../student/profile.php" style="color:black;">
            <img src="<?php echo $fetch['picture'] ?>" style="width:2vw; height:2vw; object-fit:cover; border-radius:50%;" alt="">
            <span class="m-2" style="font-size: 1.5vw"><?php echo $fetch['first_name'] ?> </span>
            <a class="logout" href="../Manage/Logout.php"><i class="ms-1 fas fa-sign-out-alt" style="font-size:1.5vw;"></i></a>
          </a>
        </div>
      </button>
      <div class="row text-center">
        <div class="col" style="margin-top: 20vw; margin-bottom: 20vw; color: white">
          <h2>WELCOME, <?php echo $fetch['first_name']; ?></h2>
          <h1>This your history class</h1>
        </div>
      </div>
    </div>
    <div class="row p-5">
      <h1>CLASS</h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Course Name</th>
            <th scope="col">Course level</th>
            <th scope="col">Teacher</th>
            <th scope="col">Nilai</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($fetch = $stmt2->fetch()) {
            $classid = $fetch['id_class']; ?>
            <tr>
              <td><?php echo $fetch['class_name'] ?></td>
              <td><?php echo $fetch['course_name'] ?></td>
              <td><?php echo $fetch['first_name'] . " " . $fetch['last_name'] ?></td>
              <td><?php

                  $sql = "SELECT * 
                  FROM `student__score`
                  JOIN score ON student__score.id_score = score.id_score
                  WHERE id_class = ?";
                  $stmt3 = $pdo->prepare($sql);
                  $stmt3->execute([$classid]);
                  $overall = 0;

                  while ($nilai = $stmt3->fetch()) {
                    $overall = $overall + ($nilai['score'] * ($nilai['percentage'] / 100));
                  }
                  if ($overall >= 86 && $overall < 100) {
                    echo "A";
                  } else if ($overall >= 70 && $overall < 86) {
                    echo "B";
                  } else if ($overall >= 50 && $overall < 70) {
                    echo "C";
                  } else if ($overall >= 0 && $overall < 50) {
                    echo "D";
                  }

                  ?>
              </td>
              <td>
                <?php if ($fetch['status_progress'] == 1) {
                  echo '<p style="color:#48B08B;">Pass</p>';
                } else if ($fetch['status_progress'] == 2) {
                  echo '<p style="color:#DA5077;">Failed</p>';
                } else {
                  echo '<p style="color:Black;">On Going</p>';
                }
                ?></td>
              <td class="text-center">
                <form action="../student/attedance.php" method="POST">
                  <button type="submit" name="id_class" value="<?php echo $fetch['id_class'] ?>" id="reg_button" class="btn btn-primary" style="background: #39229a">
                    <span style="padding-left: 2em; padding-right: 2em;">Attendace</span>
                  </button>
                </form>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <div class="row text-center" style="background: #5a47ab; width: 100%; left: 0; color: white">
      <center>
        <div class="col-10" style="margin-top: 20vw; margin-bottom: 20vw; letter-spacing: 0.5em">
          <h2>Make Sure You Attend All Classes</h2>
          <h4 style="
                border-top: yellow solid 5px;
                padding-top: 5vh;
                margin-top: 5vh;
              ">
            Attend Other Class
          </h4>
          <a href="../student/student.php">
            <button style="
                width: 15em;
                height: 5em;
                border-style: none;
                border-radius: 10px;
                background: white;
                color: #39229a;
                font-family: 'Open Sans', sans-serif;
                margin-top: 5vh;
              ">
              See Other Course
            </button>
          </a>
        </div>
      </center>
    </div>
    <div class="row p-5">
      <div class="col-sm-4 text-end ms-4">
        <div class="col-10 offset-2">
          <div class="icon mt-0">
            <div class="ecourse">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1636 363.5">
                <defs>
                  <style>
                    .cls-1 {
                      fill: #00c2cb;
                    }
                  </style>
                </defs>
                <path class="cls-1" d="M375.93,284.21h74.5v24.64H352.55V138.34H450.2V163H375.93V211h72.66v24.88H375.93Z" transform="translate(-142 -52.25)" />
                <path class="cls-1" d="M731,162.73c14-15.36,33.7-25.36,55.48-25.36,36.67,0,65.56,24.39,74.73,62.93H838.28c-8.48-25.61-28.19-38.54-51.8-38.54-15.36,0-29.35,7.07-39.43,18.29a66,66,0,0,0,0,87.33c10.08,11.22,24.07,18.29,39.43,18.29,24.29,0,44.93-14.88,53.18-40.73h22.69c-9.17,38.78-38.51,65.13-75.87,65.13-21.78,0-41.5-9.76-55.48-25.37a92.59,92.59,0,0,1,0-122Z" transform="translate(-142 -52.25)" />
                <path class="cls-1" d="M901.78,161.76c14.67-15.86,35.3-25.86,57.76-25.86,22.7,0,43.1,10,58,25.86a91.8,91.8,0,0,1,0,123.43c-14.9,16.1-35.3,25.85-58,25.85a78,78,0,0,1-57.76-25.85,91.8,91.8,0,0,1,0-123.43ZM1001,179.32c-10.78-11.46-25.68-18.54-41.5-18.54s-30.48,7.08-41,18.54a65.29,65.29,0,0,0,0,88.3c10.55,11.47,25.22,18.54,41,18.54s30.72-7.07,41.5-18.54a65.95,65.95,0,0,0,0-88.3Z" transform="translate(-142 -52.25)" />
                <path class="cls-1" d="M1064.53,257.62V138.34h23.38V257.87c0,18.78,19,28.05,36,28.05,16.73,0,35.76-9.52,35.76-28.3V138.34H1183V257.87c0,34.63-31.63,52.68-59.14,52.68C1095.7,310.55,1064.53,292.5,1064.53,257.62Z" transform="translate(-142 -52.25)" />
                <path class="cls-1" d="M1239,222.25h27c19.49,0,29.11-14.88,29.11-29.76,0-14.63-9.62-29.51-29.11-29.51h-35.53V308.85h-22.92V138.1H1266c34.84,0,52.27,27.32,52.27,54.39,0,24.15-14,47.08-41.5,52.2l50.67,64.16h-30L1239,234Z" transform="translate(-142 -52.25)" />
                <path class="cls-1" d="M1424,182.25c-3.21-15.37-18.8-21.95-32.78-21.71-10.78.24-22.7,4.15-29.11,12.93-3.21,4.39-4.36,10-3.9,15.85,1.14,17.57,19.25,19.76,36.45,21.47,22,2.93,49.28,9,55.47,36.34a64.25,64.25,0,0,1,1.15,11.22c0,32.93-30.72,52-59.6,52-24.76,0-54.79-15.61-57.77-46.1l-.23-4.64,23.38-.48.23,3.66v-1c1.61,15.85,19.71,24.15,34.62,24.15,17.19,0,36-10.25,36-27.81a28.74,28.74,0,0,0-.68-5.85c-2.75-12.93-19.26-15.13-35.3-16.83-25-2.69-54.33-8.54-56.85-44.16v.25a48.27,48.27,0,0,1,8.71-32.44c10.77-14.88,30-22.69,48.59-22.69,24.76,0,50.43,13.66,54.56,44.88Z" transform="translate(-142 -52.25)" />
                <path class="cls-1" d="M1494.1,284.21h74.5v24.64h-97.88V138.34h97.65V163H1494.1V211h72.67v24.88H1494.1Z" transform="translate(-142 -52.25)" />
                <rect class="cls-1" x="409" y="173.5" width="64" height="36" />
                <path class="cls-1" d="M1596.25,415.75H323.75C223.53,415.75,142,334.22,142,234S223.53,52.25,323.75,52.25h1272.5C1696.47,52.25,1778,133.78,1778,234S1696.47,415.75,1596.25,415.75ZM323.75,86.25C242.28,86.25,176,152.53,176,234s66.28,147.75,147.75,147.75h1272.5c81.47,0,147.75-66.28,147.75-147.75S1677.72,86.25,1596.25,86.25Z" transform="translate(-142 -52.25)" />
              </svg>
            </div>
          </div>
        </div>
        <div class="pt-4">
          <h6>
            One mission, Becoming your english solution
          </h6>
        </div>
      </div>
      <div class="col offset-3" style="font-size: 3vw">
        <div class="col-sm-5">
          <h2 style="color: #39229a">Find us on</h2>
        </div>
        <div class="col-sm-5">
          <a class="find" href=""><i class="fab size-7 fa-linkedin"></i></a>
          <a class="find" href=""><i class="fab fa-twitter-square"></i></a>
          <a class="find" href=""><i class="fab fa-facebook-square"></i></a>
          <a class="find" href=""><i class="fab fa-instagram-square"></i></a>
        </div>
      </div>
    </div>
  </div>
  <script src="https://kit.fontawesome.com/1ee3078536.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>