<!DOCTYPE html>
<html>
<head>
    <title>Daryn's Student Profile</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e8eee3;
            margin: 0;
        }

        .profile {
            width: 80%;
            max-width: 700px;
            margin: 50px auto;
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        h1 {
            color: #4b6043;
            text-align: center;
        }

        .info {
            margin-top: 25px;
        }

        .info p {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        strong {
            color: #4b6043;
        }

        .info-row { 
            display: flex; justify-content: space-between;
         }

        .nav {
            text-align: center;
            margin-top: 25px;
        }

        a {
            display: inline-block;
            margin: 5px;
            padding: 10px 18px;
            background: #4b6043;
            color: white;
            text-decoration: none;
            border-radius: 7px;
        }
    </style>
</head>

<body>

<div class="profile">

    <h1>Student Profile</h1>

    <div class="info">
        <p class="info-row"><strong>Student ID:</strong> <?= $student_id; ?></p>
        <p class="info-row"><strong>Name:</strong> <?= $name; ?></p>
        <p class="info-row"><strong>Course:</strong> <?= $course; ?></p>
        <p class="info-row"><strong>Year Level:</strong> <?= $year; ?></p>
        <p class="info-row"><strong>Section:</strong> <?= $section; ?></p>
        <p class="info-row"><strong>Email:</strong> <?= $email; ?></p>
    </div>

    <div class="nav">
        <a href="<?= site_url('student'); ?>">Home</a>
    </div>

</div>

</body>
</html>