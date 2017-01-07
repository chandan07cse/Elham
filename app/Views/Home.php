<style>
    @import url(https://fonts.googleapis.com/css?family=Tangerine);
    h1{
        font-family: 'Tangerine', cursive;
        font-size:50px;
        text-shadow: 6px 6px 0px rgba(0,0,0,0.2);
    }
    body {
        background: #ff9c08;
        color: #fff;
    }
    a {
        color:#fff;
    }
    p {
        padding: 3em 0;
    }
    .container {
        text-align:center;
        padding: 3em 0;
        margin-top: 5%;
    }
</style>
<div class="container">
    <?php include('_partials/svg.php'); ?>
    <h1><?= $values['me']; ?></h1><p><?= $values['message'];?></p>
</div>