<!DOCTYPE html>
<html>
<head>
    <title>Daryn Cuarto Lab3</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f1ea;
            margin: 0;
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 80px auto;
            background: white;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        h1 {
            color: #4b6043;
        }

        p {
            color: #555;
        }

        a {
            display: inline-block;
            margin: 10px;
            padding: 12px 20px;
            background: #4b6043;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        a:hover {
            background: #35452f;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Welcome to Student Information page.</h1>

    <p>This contain the student information of Daryn Cuarto.</p>
    <a href="<?= site_url('student/profile'); ?>">View Student Profile</a>

</div>

</body>
</html>